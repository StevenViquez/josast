<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //List Products
            $products = Product::with(['productbrand', 'productclassification', 'productfeatures'])->get();
            $response = $products;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            //Exception $e;
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /* Request entradas del formulario enviadas,
            debe establecer las entradas requeridas para crear el videojuego
         */
        //Especificar las reglas de validación para los campos del videojuego
        //https://laravel.com/docs/8.x/validation#available-validation-rules
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'description' => 'required|max:500',
                'cost' => 'required|numeric|max:10000000',
                'is_enabled' => 'required',
                'productclassification_id' => 'required',
                'productbrand_id' => 'required',
                'image' => 'required|mimes:jpeg,jpg,bmp,png',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        try {
            //Instancia
            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->cost = $request->input('cost');
            $product->is_enabled = $request->input('is_enabled');
            $product->productclassification_id = $request->input('productclassification_id');
            $product->productbrand_id = $request->input('productbrand_id');

            /*
        Asociar con un usuario
        Relación de uno a muchos
        https://laravel.com/docs/8.x/eloquent-relationships#updating-belongs-to-relationships
        Existen dos opciones para realizar la asociación
            $vj->user()->associate($user->id);
             $vj->user_id=$user->id;
        */
            // $user = auth('api')->user();
            // $vj->user()->associate($user->id);
            //Información de la imagen
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $nombreImagen = time() . "foto." . $file->getClientOriginalExtension();
                $imageUpload = Image::make($file->getRealPath());
                $path = 'images/';
                $imageUpload->save(public_path($path) . $nombreImagen);
                $product->url_picture = url($path) . "/" . $nombreImagen;
            }
            //Guardar el videojuego en la BD
            if ($product->save()) {
                /*
            Asociarle varias generos
            Relación de muchos a muchos
            https://laravel.com/docs/8.x/eloquent-relationships#inserting-and-updating-related-models
            */
                //Solo es necesario con la imagen
                $product_features = $request->input('product_feature_id');

                //Solo es necesario con la imagen
                if (!is_array($request->input('product_feature_id'))) {
                    //Formato array relación muchos a muchos
                    $product_features =
                        explode(',', $request->input('product_feature_id'));
                }
                if (!is_null($request->input('product_feature_id'))) {
                    //Agregar generos
                    $product->product_features()->attach($product_features);
                }
                $response = 'Producto creado!';
                return response()->json($response, 201);
            } else {
                $response = [
                    'msg' => 'Error durante la creación'
                ];
                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //get a product
            $products = Product::where('id', $id)->with(['productbrand', 'productclassification', 'productfeatures'])->first();
            $response = $products;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|max:500',
            'cost' => 'required|numeric|max:10000000',
            'is_enabled' => 'required',
            'productclassification_id' => 'required',
            'productbrand_id' => 'required',
            //'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        //Retornar mensajes de validación
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //Datos del videojuego
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->cost = $request->input('cost');
        $product->is_enabled = $request->input('is_enabled');
        $product->productclassification_id = $request->input('productclassification_id');
        $product->productbrand_id = $request->input('productbrand_id');

        //Validar usuario que actualiza coincida con el que lo registro
        //$user = auth('api')->user();
        //$user_id = $user->id;

        //Información de la imagen
        if ($request->hasFile('image')) {
            //Borrar la imagen anterior

            //Obtener archivo de imagen anterior
            $videojuegoImagen
                = public_path(Str::after($product->url_picture, 'http://127.0.0.1:8000/images/'));
            if (File::exists($videojuegoImagen)) {
                //Borrar imagen anterior
                File::delete($videojuegoImagen);
            }

            $file = $request->file('image');
            $nombreImagen = time() . "foto." . $file->getClientOriginalExtension();
            $imageUpload = Image::make($file->getRealPath());
            $path = 'images/';
            $imageUpload->save(public_path($path) . $nombreImagen);
            $product->url_picture = url($path) . "/" . $nombreImagen;
        }
        //Actualizar videojuego
        if ($product->update()) {
            //Sincronice generos
            //$product_features = $request->input('product_feature_id');
            //Solo es necesario con la imagen
            if (!is_array($request->input('product_feature_id'))) {
                //Formato array relación muchos a muchos
                $product_features =
                    explode(',', $request->input('product_feature_id'));
            }
            //Postman does not send an array, so the request has a null "product_feature_id", due to the null array all product features may not be updated.
            if (!is_null($request->input('product_feature_id'))) {
                //Agregar generos
                $product->product_features()->sync($product_features);
            }
            $response = 'Videojuego actualizado!';
            return response()->json($response, 200);
        }
        $response = [
            'msg' => 'Error durante la actualización'
        ];

        return response()->json($response, 404);
    }

    public function products_product_features(Request $request)
    {
        try {
            $product_features = $request->input('product_features');
            //Listar los videojuegos
            $products = Product::whereHas('product_features', function ($query) use ($product_features) {
                $query->whereIn('product_feature_id', [$product_features]);
            })->with(["product_features"])->get();
            $response = $products;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
}
