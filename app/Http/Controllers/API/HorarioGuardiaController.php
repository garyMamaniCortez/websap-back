<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HorarioGuardia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioGuardiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HorarioGuardia::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_guardia = $request->input('nombre');
        $apellido_guardia = $request->input('apellido');
        $usuario = DB::table('usuarios')
                        ->where('nombres','LIKE','%'.$nombre_guardia.'%')
                        ->where('apellidos','LIKE','%'.$apellido_guardia.'%')
                        ->where('tipo_usuario','LIKE','%guardia%')
                        ->get();

        if ($usuario->isEmpty()){
            return response()->json(['error' => 'Usuario no encontrado'], 400);
        }
        $id_usuario = $usuario->first()->id;

        $horario_guardia = new HorarioGuardia;
        $horario_guardia->id_usuario = $id_usuario;
        $horario_guardia->hora_ini = $request->input('hora_ini');
        $horario_guardia->hora_fin = $request->input('hora_fin');
        $horario_guardia->dias = $request->input('dias');

        $horario_guardia->save();
        return response()->json($horario_guardia,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
