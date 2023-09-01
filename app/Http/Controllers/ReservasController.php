<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

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
        $reserva-> save();
        return 'agregado';
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
        $reserva-> save();
        return 'editado';
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

        return 'borrado';
    }
}
