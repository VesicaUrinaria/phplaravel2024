<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Asistencia::query();
        if($request->has('estudiante_id')){
            $query->where('estudiante_id','like', '%' . $request->estudiante_id . '%');
        }

        if($request->has('fecha')){
            $query-where('fecha','like', '%' . $request->fecha . '%');
        }
        if($request->has('hora')){
            $query-where('hora','like', '%' . $request->hora . '%');
        }
        $asistencias = $query->orderBy('id','desc')->simplePaginate(10);
        
        return view('asistencia.index',compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asistencias = Asistencia::all();
        //$estudiantes = Estudiante::all();
        //return view('asistencia.create',compact('asistencias','estudiante'));
        return view('asistencia.create',compact('asistencias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asistencia = Asistencia::create($request->all());

        return redirect()->route('asistencias.index')->with('success','Marcacion completada');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);
        if(!$asistencia){
            return abort(404);
        }
        return view('asistencia.show',compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
