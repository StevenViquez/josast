<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //List Employees
            $employee = Employee::with(['employeeposition', 'vehicle', 'vehicle.vehicletype', 'vehicle.vehiclebrand'])->get();
            $response = $employee;
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
                'name' => 'required|min:5',
                'second_name' => 'required|min:5',
                'email' => 'required|max:30|email:rfc',
                'phone_number' => 'required|max:500',
                'salary' => 'required|numeric|max:10000000',
                'hired_date' => 'required||date',
                'is_enabled' => 'required|boolean:1,0',
                'vehicle_id' => 'required',
                'employeeposition_id' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        try {
            $employee = new Employee();
            $employee->name = $request->input('name');
            $employee->second_name = $request->input('second_name');
            $employee->email = $request->input('email');
            $employee->phone_number = $request->input('phone_number');
            $employee->salary = $request->input('salary');
            $employee->hired_date = Carbon::parse($request->input('hired_date'))->format('Y-m-d');
            $employee->is_enabled = $request->input('is_enabled');
            $employee->vehicle_id = $request->input('vehicle_id');
            $employee->employeeposition_id = $request->input('employeeposition_id');

            //Save Employee
            if ($employee->save()) {
                $response = 'Empleado creado!';
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //get a employee
            $employee = Employee::where('id', $id)->with(['employeeposition', 'vehicle', 'vehicle.vehicletype', 'vehicle.vehiclebrand'])->first();
            $response = $employee;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:5',
                'second_name' => 'required|min:5',
                'email' => 'required|max:30|email:rfc',
                'phone_number' => 'required|max:500',
                'salary' => 'required|numeric|max:10000000',
                'hired_date' => 'required|date',
                'is_enabled' => 'required|boolean:1,0',
                'vehicle_id' => 'required',
                'employeeposition_id' => 'required',
            ]
        );
        //Retornar mensajes de validación
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //Employee's data
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->second_name = $request->input('second_name');
        $employee->email = $request->input('email');
        $employee->phone_number = $request->input('phone_number');
        $employee->salary = $request->input('salary');
        $employee->hired_date = Carbon::parse($request->input('hired_date'))->format('Y-m-d');
        $employee->is_enabled = $request->input('is_enabled');
        $employee->vehicle_id = $request->input('vehicle_id');
        $employee->employeeposition_id = $request->input('employeeposition_id');

        //Validar usuario que actualiza coincida con el que lo registro
        //$user = auth('api')->user();
        //$user_id = $user->id;

        //Información de la imagen
        /* if ($request->hasFile('image')) {
            //Borrar la imagen anterior

            //Obtener archivo de imagen anterior
            $videojuegoImagen
                = public_path("images/{$vj->nombreImagen}");
            if (File::exists($videojuegoImagen)) {
                //Borrar imagen anterior
                File::delete($videojuegoImagen);
            }

            $file = $request->file('image');
            $nombreImagen = time() . "foto." . $file->getClientOriginalExtension();
            $imageUpload = Image::make($file->getRealPath());
            $path = 'images/';
            $imageUpload->save(public_path($path) . $nombreImagen);
            $vj->nombreImagen = $nombreImagen;
            $vj->pathImagen = url($path) . "/" . $nombreImagen;
        }*/
        //Actualizar videojuego
        if ($employee->update()) {
            //Sincronice generos
            //Array de generos
            $response = 'Empleado actualizado!';
            return response()->json($response, 200);
        }
        $response = [
            'msg' => 'Error durante la actualización'
        ];

        return response()->json($response, 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
