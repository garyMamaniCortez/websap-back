<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Http\Controllers\API\SitioController;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        foreach ($reservas as $reserva)
        {
            $reserva = $this->translateFechaFin($reserva);
        }
        return response()->json($reservas,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->updateSitio(1, $request->input('sitio'));

        $reserva = new Reserva;

        $reserva->cliente = $this->getCliente($request->input('nombre_cliente'),
                                                $request->input('codigo_sis'),
                                                $request->input('email'),
                                                $request->input('celular'),
                                                $request->input('matricula')
                                            );

        $reserva->fecha_ini = $request->input('fecha_ini');
        $reserva->fecha_fin  = $request->input('fecha_fin');
        $reserva->sitio  = $request->input('sitio');

        try {
            $reserva->save();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json($reserva,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);
        $reserva = $this->translateFechaFin($reserva);
        return response()->json($reserva);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {//falta actualizar
        $reserva = Reserva::findOrFail($id);

        $reserva->cliente = $this->getCliente($request->input('nombre_cliente'),
                                                $request->input('codigo_sis'),
                                                $request->input('email'),
                                                $request->input('celular'),
                                                $request->input('matricula')
                                            );

        $reserva->fecha_ini = $request->input('fecha_ini');
        $reserva->fecha_fin  = $request->input('fecha_fin');

        if ($reserva->sitio != $request->input('sitio'))
        {
            $new_sitio = $this->updateSitio(1, $request->input('sitio'));
            $old_sitio = $this->updateSitio(0, $reserva->sitio);
            $reserva->sitio  = $request->input('sitio');
        }

        try {
            $reserva->save();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($reserva,200);
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

    private function updateSitio($is_ocupado, $id_sitio)
    {
        $ocupado = ['ocupado' => $is_ocupado];
        $sitio_controller = new SitioController();
        $response = $sitio_controller->update(new Request($ocupado), $id_sitio);
        return $response;
    }

    private function translateFechaFin($reserva)
    {
        if ($reserva->fecha_fin == null)
        {
            $reserva->fecha_fin = "Indefinido";
        }
        return $reserva;
    }

    private function getCliente($nombre_cliente,$codigo_sis,$email,$celular,$matricula)
    {
        $cliente_controller = new ClienteController();
        $cliente_id = $cliente_controller->getByCodSis($codigo_sis);

        $request = ['nombre_cliente' => $nombre_cliente,
                    'codigo_sis' => $codigo_sis,
                    'email' => $email,
                    'matricula' => $matricula,
                    'celular' => $celular
                    ];
        if ($cliente_id == null)
        {
            $cliente_id = $cliente_controller->store(new Request($request));
        }else
        {
            $cliente =$cliente_controller->update(new Request($request), $cliente_id);
        }
        return $cliente_id;
    }
}
