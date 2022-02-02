<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\SocioEconimico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class SocioEconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $request->validate([
             'id_solicitud' => 'required'
         ]);
        return Inertia::render('SolicitudCredito/FormSocioEconomico',[
            'idSolicitud'       =>      $request->id_solicitud,
            'ciudades'          =>      Ciudad::where('departamento_id',$request->id_departamento)->get(),
            'departamentos'     =>      Departamento::all()
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
        $request->validate([
            'estadoCivil'                        => 'required',           //campo requerido
            'personasCargo'                      => 'required',           //campo requerido
            'sexo'                               => 'required',           //campo requerido
            'tipoVivienda'                       => 'required',           //campo requerido
            'departamento'                       => 'required',           //campo requerido
            'ciudad'                             => 'required',           //campo requerido
            'direccion'                          => 'required',           //campo requerido 
            'nivelAcademico'                     => 'required',           //campo requerido
            'estadoLaboral'                      => 'required',           //campo requerido
            'pensionado'                         => 'required',           //campo requerido
            'ingresos'                           => 'required',           //campo requerido
            'otrosIngresos'                      => 'required',           //campo requerido
            'gastos'                             => 'required',           //campo requerido
            'idSolicitud'                        => 'required',           //campo requerido
        ]);

        $socioEconomico = SocioEconimico::create([
            'estadoCivil'           => $request->estadoCivil,
            'personasAcargo'        => $request->personasCargo,
            'sexo'                  => $request->sexo,
            'tipoVivienda'          => $request->tipoVivienda,
            'ciudad'                => $request->ciudad,
            'direccion'             => $request->direccion,
            'nivelAcademico'        => $request->nivelAcademico,
            'estadoLaboral'         => $request->estadoLaboral,
            'estadoPensional'       => $request->pensionado,
            'empresaLabora'         => $request->empresaLabora,
            'telefonoEmpresa'       => $request->telEmpresa,
            'direccionEmpresa'      => $request->dirEmpresa,
            'ingresosFijos'         => $request->ingresos,
            'otrosIngresos'         => $request->otrosIngresos,
            'gastos'                => $request->gastos,
            'solicitud_id'          => $request->idSolicitud
        ]);
        return Redirect::route('referencia.index',['id_solicitud'=>$request->idSolicitud]);
        $pdf = PDF::loadView('Doc.socioEconomico', $socioEconomico);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocioEconimico  $socioEconimico
     * @return \Illuminate\Http\Response
     */
    public function show(SocioEconimico $SocioEconimico)
    {
        return redirect(Storage::url($SocioEconimico->path_socioEconimico.'socioEconimico.pdf'));// redirect('http://localhost:8000/storage/'.$solicitud->path_solicitud.'solicitud.pdf');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocioEconimico  $socioEconimico
     * @return \Illuminate\Http\Response
     */
    public function edit(SocioEconimico $socioEconimico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocioEconimico  $socioEconimico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocioEconimico $socioEconimico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocioEconimico  $socioEconimico
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocioEconimico $socioEconimico)
    {
        //
    }
}
