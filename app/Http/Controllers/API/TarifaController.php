<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tarifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime,DateInterval;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifas = Tarifa::all();
        foreach ($tarifas as $tarifa)
        {
            $tarifa = $this->translateFechaFin($tarifa);
        }
        return $tarifas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ultima_tarifa = DB::table('tarifas')
                            ->orderBy('id','desc')
                            ->get();

        if (!$ultima_tarifa->isEmpty())
            $ultima_tarifa = $this->updateLastTarifa($ultima_tarifa->first(), $request);

        $tarifa = new Tarifa;
        $tarifa->fecha_ini = $request->input('fecha_ini');
        $tarifa->fecha_fin = $request->input('fecha_fin');
        $tarifa->tarifa = $request->input('tarifa');

        try {
            $tarifa->save();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($tarifa,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarifa = Tarifa::find($id);
        $tarifa = $this->translateFechaFin($tarifa);
        return response()->json($tarifa);
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
    private function translateFechaFin($tarifa)
    {
        if ($tarifa->fecha_fin == null)
        {
            $tarifa->fecha_fin = "Indefinido";
        }
        return $tarifa;
    }
    private function updateLastTarifa($ultima_tarifa, $request)
    {
        $ultima_tarifa = $this->translateFechaFin($ultima_tarifa);
        if ($ultima_tarifa->fecha_fin == "Indefinido")
        {
            $tarifa = Tarifa::findOrFail($ultima_tarifa->id);
            $fecha_fin = new DateTime($request->input('fecha_ini'));
            $fecha_fin->sub(new DateInterval('P1D'));
            $tarifa->fecha_fin = $fecha_fin;

            try {
                $tarifa->save();
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
            return response()->json($tarifa,201);
        }
    }
}
