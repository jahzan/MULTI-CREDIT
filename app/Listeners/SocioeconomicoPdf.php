<?php

namespace App\Listeners;

use App\Events\AfterCreateSoeconomico;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Solicitud;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Barryvdh\DomPDF\Facade as PDF;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class socioeconomicoPdf
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AfterCreateSoeconomico  $event
     * @return void
     */
    public function handle(AfterCreateSoeconomico $event)
    {
        $cliente = (object) [
            'estadoCivil' => $event->socioeconomico->estadoCivil,
            'personasAcargo' => $event->socioeconomico->personasAcargo,
            'sexo' => $event->socioeconomico->sexo,
            'tipoVivienda' => $event->socioeconomico->tipoVivienda,
            'departamento' => Departamento::find(Ciudad::find($event->socioeconomico->ciudad)->departamento_id)->name,
            'ciudad' => Ciudad::find($event->socioeconomico->ciudad)->name,
            'direccion' => $event->socioeconomico->direccion,
            'nivelAcademico' => $event->socioeconomico->nivelAcademico,
            'estadoLaboral' => $event->socioeconomico->estadoLaboral,
            'estadoPensional' => $event->socioeconomico->estadoPensional,
            'empresaLabora' =>  $event->socioeconomico->empresaLabora,
            'telefonoEmpresa' => $event->socioeconomico->telefonoEmpresa,
            'direccionEmpresa' =>  $event->socioeconomico->direccionEmpresa,
            'ingresosFijos' => $event->socioeconomico->ingresosFijos,
            'otrosIngresos' => $event->socioeconomico->otrosIngresos,
            'gastos' => $event->socioeconomico->gastos,
            'solicitudId' => $event->socioeconomico->solicitud_id
        ];
        $pdf = PDF::loadView('Doc.socioeconomico',compact('cliente'));
        $solicitud = Solicitud::find($event->socioeconomico->solicitud_id);
        $pdf->save(public_path('storage/'.$solicitud->path_solicitud) . 'socioeconomico.pdf');
        $oMerger = PDFMerger::init();
        $oMerger->addPDF(public_path("storage/".$solicitud->path_solicitud."solicitud.pdf"),'all');
        $oMerger->addPDF(public_path('storage/'.$solicitud->path_solicitud) . 'socioeconomico.pdf','all');
        $oMerger->merge();
        $oMerger->save(public_path('storage/'.$solicitud->path_solicitud).'index.pdf');
        return $oMerger;
    }
}
