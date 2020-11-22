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
        $validator = Validator::make(
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
        }
        try {
            $order = new Order();
            $order->need_delivery = $request->input('need_delivery');
            $order->delivery_fee = $request->input('delivery_fee');
            $order->subtotal = $request->input('subtotal');
            $order->tax = $request->input('tax');
            $order->total = $request->input('total');
            //$order->hired_date = Carbon::parse($request->input('hired_date'))->format('Y-m-d');
            //$order->is_enabled = $request->input('is_enabled');
            $order->employee_id = $request->input('employee_id');
            $order->customer_id = $request->input('customer_id');

            //Save Employee
            if ($order->save()) {

                $products = $request->input('product_id'); // Array with products IDs
                $productsQuantity = $request->input('quantity'); // Array with quantity per product

                if (!is_null($request->input('product_id'))) {

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

                $statuses = $request->input('status_id');

                if (!is_null($request->input('status_id'))) {
                    //Agregar generos
                    $order->statuses()->attach($statuses);
                }



                $response = 'Orden creada!';
                return response()->json($response, 201);
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
}
