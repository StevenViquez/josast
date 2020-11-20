<?php

namespace App\Http\Controllers;

use App\Models\ProductClassification;
use Illuminate\Http\Request;

class ProductClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $productClassification = ProductClassification::orderBy('id', 'desc')->get();
            $response = $productClassification;

            return response()->json($response, 200);
        } catch (\Exception $e) {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductClassification  $productClassification
     * @return \Illuminate\Http\Response
     */
    public function show(ProductClassification $productClassification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductClassification  $productClassification
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductClassification $productClassification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductClassification  $productClassification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductClassification $productClassification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductClassification  $productClassification
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductClassification $productClassification)
    {
        //
    }
}
