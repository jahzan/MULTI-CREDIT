<?php

namespace App\Http\Controllers;

use App\Models\Referencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ReferenciaController extends Controller
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
        return Inertia::render('SolicitudCredito/FormReferencias',[
            'id_solicitud' => $request->id_solicitud,
            'referencias'  => Referencia::where('solicitud_id',$request->id_solicitud)->get()
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
            'solicitud_id' => 'required',
            'name' => 'required',
            'phone' => 'required'
        ]);
        Referencia::create(
            $request->only('solicitud_id','name','phone')
        );
        return Redirect::route('referencia.index',['id_solicitud'=>$request->solicitud_id]);

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
    public function destroy(Request $request,$id)
    {
        Referencia::find($id)->delete();
        return Redirect::route('referencia.index',['id_solicitud'=>$request->solicitud_id]);
    }
}
