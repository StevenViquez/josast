<?php

namespace App\Http\Controllers;

use App\Models\EmployeePosition;
use Illuminate\Http\Request;

class EmployeePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $employeePosition = EmployeePosition::orderBy('id', 'desc')->get();
            $response = $employeePosition;

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
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePosition $employeePosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeePosition $employeePosition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeePosition $employeePosition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeePosition $employeePosition)
    {
        //
    }
}
