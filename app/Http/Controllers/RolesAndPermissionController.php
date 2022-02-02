<?php

namespace App\Http\Controllers;

use Faker\Extension\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionController extends Controller
{
    /**
     *  en este funcion se  devuelven los todos los permisos pero con una condicion
     *  true si el permiso lo  tine asignado el rol o un false si el permiso no esta asignado al rol
     *  
    */
    public function permisosRole(Request $request){
        
        $permisos_role = array();// se crea un array donde se va a guardar los permisos especificacndo cuales tiene y cuales no.
        $permissions = Permission::all();//se guarda en una variable que contiene la coleccion de permisos
        foreach ($permissions as $permission){// se hace un foreach para recorer la colecion de permisos 

            try {
                //code...
                $validate = Role::find($request->role)->hasPermissionTo($permission);
            } catch (\Throwable $th) {
                //throw $th;
                $validate = false;
            }
            if($validate){
                $permisos_role[$permission['name']]= Arr::add(Arr::only($permission->attributesToArray(), ['name','id']),'value',true);//si es falso se gurada con el titulo del nombre del permiso y false en la array que se retornara  
            }
            else{
                $permisos_role[$permission['name']]= Arr::add(Arr::only($permission->attributesToArray(), ['name','id']),'value',false);//si es falso se gurada con el titulo del nombre del permiso y false en la array que se retornara  
            }
        }
        return Inertia::render('GestionPermisos/Show',[
            'permissionsPg'   => $permisos_role,
            'roles'         => Role::all(),
            'role'          => $request->role,
        ]);


    }

    /**
     *  en este funcion se  devuelven los todos los permisos pero con una condicion
     *  true si el permiso lo  tine asignado el rol o un false si el permiso no esta asignado al rol
     *  
    */
    public function permisosRoleStore(Request $request){

        $request->validate([//validaciones de los datos de entrada
            'role' => 'required'// se especifica que se tine que ingresar un datos con name role
        ]);



        //Parte logica del los datos a ingresar


        if($request->role==0){//si es 0 es decir crear un nuevo rol se crea el rol y se le asugnan los permisos
            $role = Role::create(['guard_name' => 'web','name' => $request->roleName]);
            $role->syncPermissions($request->rolePermissions);
        }
        else{// si es diferente de 0 quiere ddecir que es un rol existente se busca y se actualizan los permisos
            $role = Role::find($request->role);
            $role->syncPermissions($request->rolePermissions);
        }




        
        $permisos_role = array();// se crea un array donde se va a guardar los permisos especificacndo cuales tiene y cuales no.
        $permissions = Permission::all();//se guarda en una variable que contiene la coleccion de permisos
        foreach ($permissions as $permission){// se hace un foreach para recorer la colecion de permisos 

            try {
                //code...
                $validate = Role::find($request->role)->hasPermissionTo($permission);
            } catch (\Throwable $th) {
                //throw $th;
                $validate = false;
            }
            if($validate){
                $permisos_role[$permission['name']]= Arr::add(Arr::only($permission->attributesToArray(), ['name','id']),'value',true);//si es falso se gurada con el titulo del nombre del permiso y false en la array que se retornara  
            }
            else{
                $permisos_role[$permission['name']]= Arr::add(Arr::only($permission->attributesToArray(), ['name','id']),'value',false);//si es falso se gurada con el titulo del nombre del permiso y false en la array que se retornara  
            }
        }
        return Inertia::render('GestionPermisos/Show',[
            'permissionsPg'   => $permisos_role,
            'roles'         => Role::all(),
            'role'          => null,
        ]);


    }
}
