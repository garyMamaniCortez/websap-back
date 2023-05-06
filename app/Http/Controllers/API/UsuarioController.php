<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $usuario = new Usuario;
        $usuario->nombres = $request->input('nombres');
        $usuario->apellidos = $request->input('apellidos');
        $usuario->ci = $request->input('ci');
        $usuario->email = $request->input('email');
        $usuario->celular = $request->input('celular');
        $usuario->contraseña = "12345678";
        $usuario->tipo_usuario = "guardia";

        try {
            $usuario->save();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($usuario,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function login(Request $request){
        $email = $request->input('email');
        $contraseña = $request->input('contraseña');

        $usuarios = Usuario::where('email',$email)->get();
        if ($usuarios->isEmpty()){
            return response()->json(['error' => 'Usuario no encontrado'], 401);
        }
        $usuario = $usuarios->first();
        if ($contraseña == $usuario->contraseña){
            return response()->json(['mensaje' => 'Inicio de sesión exitoso']);;
        } else{
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }

    }
}
