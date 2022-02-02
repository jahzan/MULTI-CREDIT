<?php

namespace App\Http\Controllers;

use App\Models\GestionCredito;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GestionCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('GestionCredito/Show',[
            'solicitudes' => Solicitud::where('numeroDeDocumento','LIKE','%'.$request->keyword.'%')->where('solicitud_estado_id','=','1')->orderBy('updated_at')->paginate(3),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GestionCredito  $gestionCredito
     * @return \Illuminate\Http\Response
     */
    public function show(GestionCredito $gestionCredito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GestionCredito  $gestionCredito
     * @return \Illuminate\Http\Response
     */
    public function edit(GestionCredito $gestionCredito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GestionCredito  $gestionCredito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GestionCredito $gestionCredito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GestionCredito  $gestionCredito
     * @return \Illuminate\Http\Response
     */
    public function destroy(GestionCredito $gestionCredito)
    {
        //
    }
}
