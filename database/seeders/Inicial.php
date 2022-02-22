<?php

namespace Database\Seeders;

use App\Models\SolicitudEstado;
use App\Models\TipoSocio;
use App\Models\User;
use App\Models\Zone;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Inicial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/******************************************************************************************************************************* */
/*                                                    Roles                                                                      */
/******************************************************************************************************************************* */
        $admin              =   Role::create(['name' => 'admin']);//                                                             */
        $admin_credit       =   Role::create(['name' => 'admin.credit']);//                                                      */
        $credit             =   Role::create(['name' => 'credit']);//                                                            */
        $store_user         =   Role::create(['name' => 'store.user']);//                                                        */
        $store_admin        =   Role::create(['name' => 'store.admin']);//                                                       */
        $client             =   Role::create(['name' => 'client']);//                                                            */
/******************************************************************************************************************************* */



/*************************************************************************************************************************************** */
/*                                                    Permisos                                                                           */
/*************************************************************************************************************************************** */
        $solicitud          =   Permission::create(['name' => 'solicitud']); //permiso para vista del formulario de solicitud             */
        $solicitud_aprobar  =   Permission::create(['name' => 'solicitud.aprobar']); //permiso para vista del formulario de solicitud             */
        $solicitud_rechazar =   Permission::create(['name' => 'solicitud.rechazar']); //permiso para vista del formulario de solicitud             */
        $solicitud_firmar   =   Permission::create(['name' => 'solicitud.desembolsar']); //permiso para vista del formulario de solicitud             */
        $solicitud_anular   =   Permission::create(['name' => 'solicitud.anular']);//permiso formulario de gestion de usuarios                 */
        $solicitudes        =   Permission::create(['name' => 'solicitudes']);//permiso para la vista para ver las solicitudes           */
        $solicitud_all      =   Permission::create(['name' => 'solicitudes.all']);//revisar todas las solicitudes                        */
        $solicitud_pen      =   Permission::create(['name' => 'solicitudes.pendientes']);// revisar todas las solicitudes pendientes */
        $solicitud_all_pen  =   Permission::create(['name' => 'solicitudes.all.pendientes']);// revisar todas las solicitudes pendientes */
        $solicitud_sto      =   Permission::create(['name' => 'solicitudes.store.all']);// revisar todas las solicitudes del almacen     */
        $solicitud_user     =   Permission::create(['name' => 'solicitudes.user']);//revisar solicitudes realizadas por el usuario       */
        $almacenes          =   Permission::create(['name' => 'almacenes']);//permisos para vista almacen                                */
        $almacenes_c        =   Permission::create(['name' => 'almacenes.create']);//permiso para crear almacenes                        */
        $almacenes_u        =   Permission::create(['name' => 'almacenes.update']);//permiso para actualizar almacenes                   */
        $transferencia      =   Permission::create(['name' => 'transferencia']);//permiso formulario de solicitud de tranferencia        */
        $gUser              =   Permission::create(['name' => 'user']);//permiso formulario de gestion de usuarios                       */
        $gRole              =   Permission::create(['name' => 'role']);//permiso formulario de gestion de usuarios                       */
        $gUserAll           =   Permission::create(['name' => 'user.all']);//permiso formulario de gestion de usuarios                       */
        $gUserCredit        =   Permission::create(['name' => 'user.credit']);//permiso formulario de gestion de usuarios                */
        $gUserStore         =   Permission::create(['name' => 'user.store']);//permiso formulario de gestion de usuarios                 */
/*************************************************************************************************************************************** */



/*************************************************************************************************************************************************** */
/*                                                    Estados de solicitud                                                                           */
/*************************************************************************************************************************************************** */
SolicitudEstado::create(['name' => 'Pendiente']);//revisar todas las solicitudes                                                                     */
SolicitudEstado::create(['name' => 'Finalizada']);// revisar todas las solicitudes pendientes                                                        */
SolicitudEstado::create(['name' => 'Aprobada']);// revisar todas las solicitudes                                                                     */
SolicitudEstado::create(['name' => 'Rechazada']);//revisar solicitudes realizadas                                                                   */
SolicitudEstado::create(['name' => 'Cancelada']);//revisar solicitudes Canceladas                                                                   */
/*************************************************************************************************************************************************** */

/**************************************************************************************************************** */
/*                                    Asignar Prmisos a Roles                                                     */
/**************************************************************************************************************** */
/**                                             Role Store.admin                                                  */
/**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
        $store_admin->givePermissionTo($solicitud);  //permiso para la vista de formulario solicitud de credito   */
        $store_admin->givePermissionTo($solicitud_sto); //administrador de almacen ve las solicitudes del almacen */
        $store_admin->givePermissionTo($solicitudes); //asesor credito solo ve las pendientes                     */
        $store_admin->givePermissionTo($transferencia); //permiso para la visyta de solicitud de tranferencia     */
        $store_admin->givePermissionTo($gUser); //permiso formulario de gestion de usuarios                       */
        $store_admin->givePermissionTo($gUserStore); //permiso para gestion de usuarios de almacenes                    */
        $store_admin->givePermissionTo($solicitud_firmar); //permiso formulario de gestion de usuarios                       */
        $store_admin->givePermissionTo($solicitud_anular); //permiso formulario de gestion de usuarios                       */
        $store_admin->givePermissionTo($solicitudes); //asesor credito solo ve las pendientes
/**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/**                                             Role Store.user                                                   */
/**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
        $store_user->givePermissionTo($solicitud);  //permiso para la vista de formulario solicitud de credito    */
        $store_user->givePermissionTo($solicitud_user); // usuario almacen solo ve las solicitudes realizadas     */
        $store_user->givePermissionTo($solicitudes); //asesor credito solo ve las pendientes                      */
        $store_user->givePermissionTo($solicitud_firmar); //asesor credito solo ve las pendientes                      */
        $store_user->givePermissionTo($solicitud_anular); //asesor credito solo ve las pendientes                      */
/**************************************************************************************************************** */
/**                                             Role Credit                                                       */
/**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
        $credit->givePermissionTo($solicitud_pen); //asesor credito solo ve las pendientes                        */
        $credit->givePermissionTo($almacenes); //asesor credito solo ve las pendientes                            */
        $credit->givePermissionTo($almacenes_u); //administrador actualiza almacenes                              */
        $credit->givePermissionTo($solicitudes); //asesor credito solo ve las pendientes                      */
        $credit->givePermissionTo($solicitud_aprobar); //permiso formulario de gestion de usuarios                      */
        $credit->givePermissionTo($solicitud_rechazar); //permiso formulario de gestion de usuarios                             */
/**************************************************************************************************************** */
/**                                             Role Admin.credit                                                 */
/**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
        $admin_credit->givePermissionTo($solicitud_all); //administrador credito ve todas las solicitudes         */
        $admin_credit->givePermissionTo($almacenes); //administrador credito ve todas las solicitudes             */
        $admin_credit->givePermissionTo($solicitud); ////permiso para la vista de formulario solicitud de credito */
        $admin_credit->givePermissionTo($almacenes_c); //administrador crea almacenes                             */
        $admin_credit->givePermissionTo($almacenes_u); //administrador actualiza almacenes                        */
        $admin_credit->givePermissionTo($solicitudes); //administrador credito ve todas las solicitudes           */
        $admin_credit->givePermissionTo($gUser); //permiso formulario de gestion de usuarios                      */
        $admin_credit->givePermissionTo($gUserCredit); //permiso formulario de gestion de usuarios                      */
        $admin_credit->givePermissionTo($solicitud_aprobar); //permiso formulario de gestion de usuarios                      */
        $admin_credit->givePermissionTo($solicitud_rechazar); //permiso formulario de gestion de usuarios                      */
/**************************************************************************************************************** */
/**                                             Role Admin                                                        */
/**++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
        $admin->givePermissionTo($solicitud); //permiso para la vista de formulario solicitud de credito          */
        $admin->givePermissionTo($almacenes); //administrador ve todas las solicitudes                            */
        $admin->givePermissionTo($almacenes_c); //administrador crea almacenes                                    */
        $admin->givePermissionTo($almacenes_u); //administrador actualiza almacenes                               */
        $admin->givePermissionTo($solicitud_all); //administrador ve todas las solicitudes                        */
        $admin->givePermissionTo($solicitudes); //administrador ve todas las solicitudes                          */
        $admin->givePermissionTo($gRole); //permiso formulario de gestion de usuarios                      */
        $admin->givePermissionTo($gUser); //permiso formulario de gestion de usuarios                      */
        $admin->givePermissionTo($gUserAll); //permiso formulario de gestion de usuarios                      */
        $admin->givePermissionTo($solicitud_aprobar); //permiso formulario de gestion de usuarios                      */
        $admin->givePermissionTo($solicitud_rechazar); //permiso formulario de gestion de usuarios                                */
        $admin->givePermissionTo($solicitud_firmar); //permiso formulario de gestion de usuarios                                */
/**************************************************************************************************************** */




/******************************************************************************************************************************* */
/*                                                   Usuario administrador                                                       */
/******************************************************************************************************************************* */
        $user   =   User::create([//                                                                                             */
                        'name'                  =>      'Admin',//                                                               */
                        'lastname'              =>      ' ',//                                                                   */
                        'email'                 =>      'admin@bicicletasmilan.com',//                                           */
                        'telefono'              =>      '322323',//                                                              */
                        'password'              =>      Hash::make('holamundo1234'),//                                           */
                        'email_verified_at'     =>      new DateTime('now'),//                                                   */
                    ]);//                                                                                                        */
/******************************************************************************************************************************* */
        $user->assignRole('admin');                                                                                              //
/******************************************************************************************************************************* */




/******************************************************************************************************************************* */
/*                                                   Usuario Credit                                                              */
/******************************************************************************************************************************* */
        $user   =   User::create([//                                                                                             */
                            'name'                  =>   'Adriana',                     //                                                            */
                            'lastname'              =>   'Calvo Gonzalez',              //                                                     */
                            'email'                 =>   'credit@bicicletasmilan.com',  //                                   */
                            'telefono'              =>   '322323',                      //                                                             */
                            'password'              =>   Hash::make('holamundo1234'),   //                                          */
                            'email_verified_at'     =>   new DateTime('now'),           //                                                  */
                    ]);//                                                                                                        */
/******************************************************************************************************************************* */
         $user->assignRole('credit');//                                                                                          */
/******************************************************************************************************************************* */



/************************************************************************************************************************************ */
/*                                                   Usuario AdminCredit                                                              */
/************************************************************************************************************************************ */
        $user   =   User::create([//                                                                                                  */
                            'name'                      =>      'stevenson',//                                                        */
                            'lastname'                  =>      'Ariza Abreo',//                                                      */
                            'email'                     =>      'admin.credit@bicicletasmilan.com',//                                 */
                            'telefono'                  =>      '322323',//                                                           */
                            'password'                  =>      Hash::make('holamundo1234'),//                                        */
                            'email_verified_at'         =>      new DateTime('now'),//                                                */
                    ]);//                                                                                                             */
/************************************************************************************************************************************ */
        $user->assignRole('admin.credit');//                                                                                          */
/************************************************************************************************************************************ */


        //tipos de socios de negocios               ID
        TipoSocio::create(['name'=>'Almacen']);//   1
        TipoSocio::create(['name'=>'Cliente']);//   2
        //Zona
        Zone::create(['name'=>'Inicial',"user_id"=> 2]);









    }
}
