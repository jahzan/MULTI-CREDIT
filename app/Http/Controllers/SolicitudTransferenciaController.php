<?php

namespace App\Http\Controllers;

use App\Models\GestionCredito;
use App\Models\Movimiento;
use App\Models\Solicitud;
use App\Models\SolicitudTransferencia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SolicitudTransferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $smMvAp = null;
        $smRtRl = null;
        $smCrCn = null;
        $disp = null;
        try {
            $smMvAp     = Movimiento::where('socio_de_negocio_id',Auth::user()->store->socio_de_negocio_id)->where('concepto_id',1)->sum('amount');
            $smCrCn     = Movimiento::where('socio_de_negocio_id',Auth::user()->store->socio_de_negocio_id)->where('concepto_id',1)->where('created_at','>',Carbon::now()->subMonths())->sum('amount');
            $smRtRl     = Movimiento::where('socio_de_negocio_id',Auth::user()->store->socio_de_negocio_id)->where('concepto_id',21)->orWhere('concepto_id',2)->sum('amount');
            $disp       = null;
        } catch (\Throwable $th) {
            //throw $th;
        }




        $ctnMilan   = $smMvAp - $smRtRl;
        $ctnBcon    = $ctnMilan - $smCrCn;

        return Inertia::render('SolicitudTransferencia/Show',[
            'solicitudes' => Solicitud::where('numeroDeDocumento','LIKE','%'.$request->keyword.'%')->where('solicitud_estado_id','=','1')->orderBy('updated_at')->paginate(3),
            'ctnMilan'    => $ctnMilan,
            'ctnBcon'     => $ctnBcon,
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
