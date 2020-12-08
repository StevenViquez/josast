<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //List Order
            $orders = Order::with(['customer', 'employee', 'products', 'products.productbrand', 'products.productclassification', 'products.productfeatures', 'statuses'])->get();
            $response = $orders;
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
        $pTotal = 0;
        $pSubTotal = 0;
        $pTax = 0;
        $productsIds = [];
        $productQuantity = [];

        $check = $request->all();
        foreach ($check as $p) {
            foreach ($p as $x) {
                //$productId = array();
                array_push($productsIds, $x["idItem"]);
                array_push($productQuantity, $x["cantidad"]);
                $pSubTotal = $pSubTotal + $x["subtotal"];
            }
            $pTax = $pSubTotal * 0.13;
            $pTotal = $pTax + $pSubTotal + 800;
        }
        /* $validator = Validator::make(
            $request->all(),
            [
                'need_delivery' => 'required|boolean:1,0',
                'delivery_fee' => 'required|numeric|max:10000000',
                'subtotal' => 'required|numeric|max:10000000',
                'tax' => 'required|numeric|max:10000000',
                'total' => 'required|numeric|max:10000000',
                'employee_id' => 'required|numeric|max:10000000',
                'customer_id' => 'required',
                'product_id' => 'required',
                'quantity' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }*/
        try {
            $order = new Order();

            //Need to work here
            // $order->need_delivery = NULL;

            $order->delivery_fee = 800;
            $order->subtotal = $pSubTotal;
            $order->tax = $pTax;
            $order->total = $pTotal;
            //$order->hired_date = Carbon::parse($request->input('hired_date'))->format('Y-m-d');

            //$order->is_enabled = $request->input('is_enabled');

            //Need to work here
            //$order->employee_id = $request->input('employee_id');
            // $order->customer_id = $request->input('customer_id');

            //Save Employee
            if ($order->save()) {
                $myID= $order->id;//New ID inserted in DB
                $products = $productsIds; // Array with products IDs
                $productsQuantity = $productQuantity; // Array with quantity per product

                if (!is_null($productsIds)) {

                    //This for each will map product id with quantity. "$products" and "$productsQuantity" must have always exactly the same lenght in order to determine the quantity on a product in an order.
                    $count = 0;
                    foreach ($products as $p) {

                        //$order->products()->attach($p);
                        $order->products()->attach($p, ['quantity' => $productsQuantity[$count]]);
                        $count++;
                    }

                    //https://laravel.com/docs/5.5/eloquent-relationships#updating-many-to-many-relationships
                    //https://stackoverflow.com/questions/47034969/inserting-data-into-additional-attributes-in-pivot-table
                }

                   //Agregar status
                    $order->statuses()->attach([1]);



                $response = 'Orden creada!';
                return response()->json([$response, $myID], 201);
            } else {
                $response = [
                    'msg' => 'Error durante la creación'
                ];
                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            //Exception $e;
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //get an order
            $order = Order::where('id', $id)->with(['customer', 'employee', 'products', 'products.productbrand', 'products.productclassification', 'products.productfeatures', 'statuses'])->first();
            $response = $order;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }




    public function completeOrder(Request $request, $id)
    {
        

        //Employee's data
        $order = Order::find($id);
        $order->need_delivery = $request->input('need_delivery');
        $order->employee_id = $request->input('employee_id');
        $order->customer_id = $request->input('customer_id');


        if ($order->update()) {
            //Sincronice generos
            //Array de generos
            $response = 'Orden completada!';
            return response()->json($response, 200);
        }
        $response = [
            'msg' => 'Error durante la actualización'
        ];

        return response()->json($response, 404);
    }


    public function changeStatus(Request $request)
    {
        $myData = $request->all();
        //Employee's data
        $order = Order::find($myData[1]);//data[1] == contiene el id del producto
        $order->statuses()->attach($myData[0]);//data[0] == contiene el id del status
            //Sincronice generos
            //Array de generos
            $response = 'El estado ha sido cambiado!';
            return response()->json($response, 200);

        $response = [
            'msg' => 'Error durante la actualización'
        ];

        return response()->json($response, 404);
    }








}
