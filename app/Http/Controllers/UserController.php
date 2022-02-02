<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = [];
        
        if(Auth::user()->can('user.all')){
            $users = User::where('users.email','LIKE','%'.$request->keyword.'%')
                        ->leftJoin('stores','users.store_id','=','stores.id')
                        ->join('model_has_roles','users.id','=','model_has_roles.model_id')
                        ->join('roles','model_has_roles.role_id','=','roles.id')
                        ->select('users.*','roles.name as role','stores.name as store')->paginate(3);
        }
        if(Auth::user()->can('user.credit')){
            $users = User::where('users.email','LIKE','%'.$request->keyword.'%')
                        ->leftJoin('stores','users.store_id','=','stores.id')
                        ->join('model_has_roles','users.id','=','model_has_roles.model_id')
                        ->join('roles','model_has_roles.role_id','=','roles.id')
                        ->join('zones','zones.user_id','=','users.id')
                        ->select('users.*','roles.name as role','stores.name as store',)->paginate(3);            
        }
        if(Auth::user()->can('user.store')){
            $users = User::where('users.email','LIKE','%'.$request->keyword.'%')
            ->leftJoin('stores','users.store_id','=','stores.id')
            ->join('model_has_roles','users.id','=','model_has_roles.model_id')
            ->join('roles','model_has_roles.role_id','=','roles.id')
            ->where('stores.id','=',Auth::user()->store->id)
            ->select('users.*','roles.name as role','stores.name as store',)->paginate(3);
        }
        return Inertia::render('GestionUsers/Show',[
            'users' => $users,
            'roles' => Role::all(),
            'zones' => Zone::all(),
        ]);
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
            'name'      =>'required',//campo requerido
            'lastname'  =>'required',//campo requerido
            'email'     =>'required||email||unique:users',//campo requerido tipo email y unico
            'telefono'  =>'required||unique:users',//campo requerido
            'role'      =>'required',//campo requerido
        ]);
        $usuario = User::create([//crea usuario en el sistema
            'name'      => $request->name,//pasa el nombre del usuario
            'lastname'  => $request->lastname,//pasa el apellido del usuario
            'email'     => $request->email,//pasa el email
            'telefono'  => $request->telefono,// pasa telefono
            'password'  => Hash::make(Str::random(8)),// pasa telefono
        ]);

        $usuario->assignRole(Role::find($request->role)->name);

        if($request->role==3){
            $zone = Zone::find($request->zone);
            $zone->user_id = $usuario->id;
            $zone->save();

        }
        //
        return Inertia::render('GestionUsers/Show',[
            'users' => User::where('users.email','LIKE','%'.$request->keyword.'%')
                            ->leftJoin('stores','users.store_id','=','stores.id')
                            ->join('model_has_roles','users.id','=','model_has_roles.model_id')
                            ->join('roles','model_has_roles.role_id','=','roles.id')
                            ->select('users.*','roles.name as role','stores.name as store')->paginate(3),
            'roles' => Role::all(),
            'zones' => Zone::all(),
        ]);//establace la vista a la que debe seguir
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

}
