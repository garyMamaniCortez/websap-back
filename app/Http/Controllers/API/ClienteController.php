<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $cliente = new Cliente;

        $cliente->nombre_cliente = $request->input('nombre_cliente');
        $cliente->codigo_sis  = $request->input('codigo_sis');
        $cliente->email  = $request->input('email');
        $cliente->celular  = $request->input('celular');
        $cliente->matricula  = $request->input('matricula');

        try {
            $cliente->save();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return $cliente->id;
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
        $cliente = Cliente::findOrFail($id);

        $cliente->nombre_cliente = $request->input('nombre_cliente');
        $cliente->codigo_sis  = $request->input('codigo_sis');
        $cliente->email  = $request->input('email');
        $cliente->celular  = $request->input('celular');
        $cliente->matricula  = $request->input('matricula');

        try {
            $cliente->save();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return $cliente->id;
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

    public function getByCodSis($codigo_sis)
    {
        $cliente = Cliente::where('codigo_sis', $codigo_sis)->first();
        if ($cliente) {
            return $cliente->id;
        } else {
            return null;
        }
    }
}
