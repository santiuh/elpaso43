<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Habitacione;
use App\Models\Cuenta;
use Carbon\Carbon;
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
        return $reservas;
    }

    // public function getReservasPub()
    // {
    //     $reservas = Reserva::select('hotel_id', 'habitacion_id', 'desde', 'hasta')->get();
    //     return $reservas;
    // }

    public function getReservasPub()
    {
        // Obtén la fecha actual y resta un mes para obtener el primer día del mes anterior
        $fechaMesAnterior = Carbon::now()->subMonth()->startOfMonth();
    
        // Filtra las reservas donde la fecha de inicio sea mayor o igual al primer día del mes anterior
        $reservas = Reserva::select('hotel_id', 'habitacion_id', 'desde', 'hasta')
            ->where('desde', '>=', $fechaMesAnterior)
            ->get();
    
        return $reservas;
    }

    public function getCuentas()
    {
        $cuentas = Cuenta::all();
        return $cuentas;
    }

    public function buscarPorNombre(request $request)
    {
        $data = $request->all();

        $reservas = Reserva::where('pasajero','LIKE','%'.$data['pasajero'].'%')->get();
        return response()->json(['resultados' => $reservas], 400);

    }

    public function auth()
    {
        return response()->json(['Estado' => 'Autorizado'], 300);
        ;
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
        $data = $request->all();

        $existingReservas = Reserva::where('habitacion_id','=', $data['habitacion_id'])
        ->where(function ($query) use ($data) {
            $query->where(function ($query) use ($data) {
                $query->where('desde', '>',[$data['desde']])->where('hasta','<',[$data['hasta']]);
            })
            ->orWhere(function ($query) use ($data) {
                $query->where('hasta','>',[$data['desde']])->where('desde','<',[$data['hasta']]);
            });
        })->get();
        if ($existingReservas->isNotEmpty()) {
                return response()->json(['error' => 'Ya existen reservas.'], 400);
            
        }

        
        else {
            $reserva = new Reserva();
            $reserva->hotel_id = $request->hotel_id;
            $reserva->habitacion_id = $request->habitacion_id;
            $reserva->desde = $request->desde;
            $reserva->hasta = $request->hasta;
            $reserva->noches = $request->noches;
            $reserva->precio_noche = $request->precio_noche;
            $reserva->seña = $request->seña;
            $reserva->seña_cuenta = $request->seña_cuenta;
            $reserva->pago_debe = $request->pago_debe;
            $reserva->pago_cancelado_fecha = $request->pago_cancelado_fecha;
            $reserva->pago_cancelado_cuenta = $request->pago_cancelado_cuenta;
            $reserva->pasajero = $request->pasajero;
            $reserva->pasajero_contacto = $request->pasajero_contacto;
            $reserva->nota = $request->nota;
            $reserva->personas = $request->personas;
            $reserva-> save();

            return response()->json(['Agregado exitosamente.'], 200);

        }
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request)
    {
        try{
        $reserva = Reserva::findOrFail($request->id);
        $reserva->hotel_id = $request->hotel_id;
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->desde = $request->desde;
        $reserva->hasta = $request->hasta;
        $reserva->noches = $request->noches;
        $reserva->precio_noche = $request->precio_noche;
        $reserva->seña = $request->seña;
        $reserva->seña_cuenta = $request->seña_cuenta;
        $reserva->pago_debe = $request->pago_debe;
        $reserva->pago_cancelado_fecha = $request->pago_cancelado_fecha;
        $reserva->pago_cancelado_cuenta = $request->pago_cancelado_cuenta;
        $reserva->pasajero = $request->pasajero;
        $reserva->pasajero_contacto = $request->pasajero_contacto;
        $reserva->nota = $request->nota;
        $reserva->personas = $request->personas;

        $reserva-> save();
        return 'OK';
        } 
            catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return response()->json(['error' => 'No existe la reserva.'], 400);
                
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id);

        $reserva->delete();

        return 'OK';
    }
}
