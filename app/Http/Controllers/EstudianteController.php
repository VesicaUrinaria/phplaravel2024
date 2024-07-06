<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Estudiante::query();

        if($request->has('nombre')){
            $query->where('nombre','like', '%' . $request->nombre . '%');
        }

        if($request->has('apellido')){
            $query-where('apellido','like', '%' . $request->apellido . '%');
        }
        $estudiantes = $query->orderBy('id','desc')->simplePaginate(10);
        
        return view('estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['pin' => Hash::make($request->pin)]);
        $estudiante = Estudiante::create($request->all());
        return redirect()->route('estudiantes.index')->with('success','Se creo nuevo Estudiante con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        if(!$estudiante){
            return abort(404);
        }
        return view('estudiantes.show',compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        if(!$estudiante){
            return abort(404);
        }
        $estudiantes = Estudiante::all();
        return view('estudiantes.edit',compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        if(!$estudiante){
            return abort(404);
        }

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->email = $request->email;

        $estudiante->save();
        return redirect()->route('estudiantes.index')->with('success','Estudiante actualizado con exito.');
    }

    public function delete($id){
        $estudiante = Estudiante::find($id);
        if(!$estudiante){
            return abort(404);
        }
        return view('estudiantes.delete',compact('estudiante'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id); 
        

        if(!$estudiante){
            return abort(404);
        }

        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success','El estudiante se elimino con exito');
    }

    public function showLoginForm(){
        return view('estudiantes.login');
    }

    public function login(Request $request){
        //dd($request->all());

        $credentials = $request->only('email', 'pin');

        if (Auth::guard('estudiante')->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors([
            'InvalidCredentials' => 'LAS CREDENCIALES PROPORCIONADAS NO COINCIDEN CON NUESTROS REGISTROS.',
        ]);
    }

    public function logout(){
        Auth::guard('estudiante')->logout();
        return redirect()->route('estudiantes.showLoginForm');
    }
}
