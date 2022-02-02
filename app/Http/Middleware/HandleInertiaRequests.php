<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {



        /**
         * 
         * Consulta el trait de notificaciones para traer el # de todas las notificaciones sin leer
         */
        try {
            $numNotify = Auth::user()->unreadNotifications->count(); //cuenta cuantas notificaciones sin leer hay
        } catch (\Throwable $th) {
            $numNotify = 0; // si llega haber un error en la consulta se llenara con 0
        }


        /**
         * 
         * Consulta el trait de Permissions para traer los permisos
         * Guarda con la estructura clave valor.
         * 'permiso':'resultado'
         */
        try {
            //use()->getAllPermissions trae un array con todos los permisos del usuario
            // se itera con el foreach para guardar en permisos el nombre del permiso y el estado que seria true
            foreach (Auth::user()->getAllPermissions() as $value) {
                $permisos[str_replace('.', '_', $value['name'])] = true;
            }
        } catch (\Throwable $th) {
            //si falla o la variable permiso se asigna null para que pueda ser enviada a la vista sin errores.
            $permisos = null; // si llega haber un error en la consulta se llenara con 0
        }


        /**
         * 
         * Consulta el trait de Roles para traer los Roles
         * Guarda con la estructura clave valor.
         * 'Roles':'resultado'
         */
        try {
            //use()->getAllPermissions trae un array con todos los permisos del usuario
            // se itera con el foreach para guardar en permisos el nombre del permiso y el estado que seria true
            foreach (Auth::user()->getRoleNames() as $value) {
                $roles[str_replace('.', '_', $value)] = true;
            }
        } catch (\Throwable $th) {
            //si falla o la variable permiso se asigna null para que pueda ser enviada a la vista sin errores.
            $roles = null; // si llega haber un error en la consulta se llenara con 0
        }



        /**
         * Retornan a la vista en inertia.page.props las variables anterior mente estableciadas 
         */
        return array_merge(parent::share($request), [
            'Nnotifications'    => $numNotify,  //se le pasa el numero de notificaciones del usuario
            'permissions'       => $permisos,   //se le pasa la variable con los permisos del usuario
            'roles'             => $roles,      //se le pasa la bariable que contiene los roles del usuario
        ]);
    }
}
