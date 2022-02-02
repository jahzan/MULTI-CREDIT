<?php

namespace App\Http\Controllers;

use App\Events\AfterCreateStore;
use App\Models\SocioDeNegocio;
use App\Models\Store;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd(Store::where('nit','LIKE','%'.$request->keyword.'%')->paginate(1));
        return Inertia::render('RegitroAlmacen/Show',[
            'stores' => Store::withTrashed()->where('nit','LIKE','%'.$request->keyword.'%')->orWhere('name','LIKE','%'.$request->keyword.'%')->paginate(2),
            'zones' => Zone::all(),
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
     * Funcion que ejecuta y crea el almacen tanto como socio de negocios, user y stores
     *
     *
     */
    public function store(Request $request, CreatesNewUsers $creator)
    {
        ///validaciones de  los datos que entrar 
            $request->validate([
                'name' => 'required',//campo requerido
                'nit'=> 'required|unique:stores|unique:stores',//campo requerido, llave unica(en tabal store y socio de negocios)
                'email'=> 'required|unique:stores|unique:stores',//campo requerido, llave unica(en tabal store y socio de negocios)
                'telefono'=> 'required',// campo requerido
                'representante'=> 'required',// campo requerido
                'nombre' => 'required',// campo requerido
                'apellido'=>'required',// campo requerido
                'zone'=>'required',// campo requerido
            ]);
   
          $sn = SocioDeNegocio::create([
            'nombre'=> $request['name'],
            'numDoc'=> "NIT" . $request['nit'],
            'telefono' => $request['telefono'],
            'email'=> $request['email'],
            'tipo_socio_id' =>'1',
          ]);
           $store = Store::create([
                'name' =>  $request['name'],
                'nit' =>  $request['nit'],
                'email' =>  $request['email'],
                'telefono' =>  $request['telefono'],
                'representante' =>  $request['representante'],
                'socio_de_negocio_id' => $sn->id,
                'zone_id' => $request['zone'],
           ]);
        //    event(new AfterCreateStore($request['nombre'],$request['apellido'],$request['email'],$store->id,$request['telefono']));

            $user = User::create([
                'name' => $request['nombre'],
                'lastname' => $request['apellido'],
                'email' => $request['email'],
                'password' => Hash::make(Str::random(40)),
                'store_id' => $store->id,
                'socio_de_negocio_id' => $request['socio_de_negocio_id'],
                'telefono' => $request['telefono'],
             ]);
             $user->assignRole('store.admin');
           return Redirect::route('almacen.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $user=Store::find(1);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->nit = $request->nit;
        $user->save();
         return Redirect::route('almacen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
