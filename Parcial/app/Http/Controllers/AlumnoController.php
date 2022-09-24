<?php

namespace App\Http\Controllers;

use App\accion\ActualizarAlumnoAction;
use App\accion\BuscarAlumnoAction;
use App\accion\EliminarAlumnoAction;
use App\accion\NuevoAlumnoAction;
use App\accion\ObtenerAlumnoAction;
use App\accion\ObtenerFacultadAction;
use App\accion\ObtenerRolAction;
use App\Models\Alumno;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ObtenerAlumnoAction $action)
    {
        $alumno = $action->execute();

        return view('Alumno.index')
        ->with('alumno', $alumno);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ObtenerRolAction $action, ObtenerFacultadAction $action2)
    {
        $rol = $action->execute();
        $facultad = $action2->execute();
        return view('Alumno.create')
        ->with('rol', $rol)
        ->with('facultad', $facultad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, NuevoAlumnoAction $action)
    {
        try
        {
            $alumno = $action->execute($request->all());
            return redirect()->route('Alumno.index');
        }catch(Exception|Throwable $e)
        {

            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show($id, BuscarAlumnoAction $action)
    {
        try
        {
            $alumno = $action->execute($id);
            if(!$alumno)
            {
                return redirect()->route('Alumno.index');
            }

            return view()
            ->with('alumno', $alumno);
        }catch(Exception|Throwable $e)
        {

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BuscarAlumnoAction $action)
    {
        try
        {
            $alumno = $action->execute($id);
            if(!$alumno)
            {
                return redirect()->route('Alumno.index');
            }

            return view()
            ->with('alumno', $alumno);
        }catch(Exception|Throwable $e)
        {

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ActualizarAlumnoAction $action)
    {
        try
        {
            $alumno = $action->execute($request->validated(), $id);
            return redirect()->route('Alumno.index');
        }catch(Exception|Throwable $e)
        {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, EliminarAlumnoAction $action)
    {
        try
        {
            $alumno = $action->execute($id);
            return redirect()->route('Alumno.index');
        }catch(Exception|Throwable $e)
        {
            return redirect()->route('Alumno.index');
        }
    }
}
