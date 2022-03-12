<?php

namespace App\Http\Controllers;

use App\Events\AfterCreateSolicitud;
use App\Events\BeforeCreateSolicitud;
use App\Events\CreateVerifyOtp;
use App\Events\VerifyOtpSened;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Desembolso;
use App\Models\DesembolsoAnexo;
use App\Models\EstudioCredito;
use App\Models\EstudioCreditoAnexo;
use App\Models\SocioDeNegocio;
use App\Models\SolicitudEstado;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class SolicitudController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:solicitud')->only('create','store','sendOtp');
        $this->middleware('permission:solicitud.firmar')->only('firmar');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->can('solicitudes.all')){// revisa si tiene el permiso de revisar todas las solicitudes
            $solicitudes = Solicitud::where('numeroDeDocumento','LIKE','%'.$request->keyword.'%')->where('solicitud_estado_id','LIKE','%'.$request->estado.'%')->orderBy('updated_at')->paginate(3);
            //si tiene el permiso se guarda en la variable solicitudes todas las solicitudes
        }
        if(Auth::user()->can('solicitudes.all.pendientes')){// revisa que tenga el permiso revisar todas las solicitudes pendientes
            $solicitudes = Solicitud::where('numeroDeDocumento','LIKE','%'.$request->keyword.'%')->where('solicitud_estado_id','=',1)->orderBy('updated_at')->paginate(3);
            //si tiene el permiso se guarda en la variable solicitudes todas las solicitudes que estas pendientes
        }
        if(Auth::user()->can('solicitudes.pendientes')){// revisa que tenga el permiso de revisar las solicitudes pendientes de su zona
            $solicitudes = DB::table('solicituds')
                                ->join('users','users.id','=','solicituds.user_id')
                                ->join('stores','stores.id','=','users.store_id')
                                ->join('zones','zones.id','=','stores.zone_id')
                                ->where('zones.user_id',Auth::user()->id)
                                ->where('solicitud_estado_id','=',1)
                                ->select('solicituds.*')
                                ->orderBy('updated_at')
                                ->paginate(3);
            //si tiene el permiso se guarda en la variable solicitudes todas las solicitudes que estas pendientes
        }
        if(Auth::user()->can('solicitudes.store.all')){//revisa que tenga el permisos de ver todas las solicitudes de el almacen al que pertenece
            $solicitudes = Store::find(Auth::user()->store_id)->solicitudes()->where('numeroDeDocumento','LIKE','%'.$request->keyword.'%')->where('solicitud_estado_id','LIKE','%'.$request->estado.'%')->orderBy('updated_at')->paginate(3);
            //si tiene el permiso se guarda en la variable solicitudes todas las solicitudes que pertenencen al almacen
        }

        if(Auth::user()->can('solicitudes.user')){//revisa que tenga el permisos de ver solicitudes realizadas
            $solicitudes = Solicitud::where('numeroDeDocumento','LIKE','%'.$request->keyword.'%')->where('solicitud_estado_id','LIKE','%'.$request->estado.'%')->where('user_id','=',Auth::user()->id)->orderBy('updated_at')->paginate(3);
            //si tiene el permiso se guarda en la variable solicitudes todas las solicitudes realizadas
        }
        // se retorna la vista con los datos que de las solicitudes segun su permiso para visualisar. la variable estado se uriliza para traer los estados para el filtro
        return Inertia::render('SolicitudCredito/ListSolicitudes',[
            'solicitudes' =>    $solicitudes,
            'solicitudes' =>    fn () =>  $solicitudes,
            'estados'     =>    SolicitudEstado::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return Inertia::render('SolicitudCredito/IndexFormAut', [
            'otpId'             =>      $request->otpId,
            'ciudades'          =>      Ciudad::where('departamento_id',$request->id)->get(),
            'departamentos'     =>      Departamento::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * Funcion para guardar datos en la base de datos.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validador de los datos que ingresaron para que cumplan los parametros
        $request->validate([
            'nombre'                        => 'required',           //campo requerido
            'apellido'                      => 'required',           //campo requerido
            'numeroDeDocumento'             => 'required',           //campo requerido
            'fechaExpedicion'               => 'required',           //campo requerido
            'fechaNacimiento'               => 'required',           //campo requerido
            'telefono'                      => 'required',           //campo requerido
            'email'                         => 'required||email|',   //campo requerido y tipo email
            'monto'                         => 'required',           // campo requerido
            'tipoDoc'                       => 'required',           // campo requerido
            'otpId'                         => 'required',
            'otpToken'                      => 'required',
        ]);

        //Datos para crear el hash y los datos para la firma electronica
        $datos = 'Datos personales Nombre ' .
            $request->nombre .
            ', Apellido ' .
            $request->apellido .
            ', Docuemento de identidad ' .
            $request->tipoDoc .
            ' ' .
            $request->numeroDeDocumento .
            'Fec. exp ' .
            $request->fechaExpedicion .
            'Fec. nac ' .
            $request->fechaNacimiento .
            'email ' .
            $request->email .
            'telefono ' .
            $request->telefono .
            'Fec. doc' .
            now() .
            'AVISO DE PRIVACIDAD – AUTORIZACIÓN PARA EL MANEJO DE INFORMACIÓN REGISTRO Y REPORTE A
                               CENTRALES DE RIESGO.
                               De conformidad a la Ley 1581 de 2012, al Decreto 1377 de 2013 y a la política de tratamiento de datos de la FUNDACIÓN
                               MULTICRÉDITO de manera expresa, informada y suficiente autorizo a la FUNDACIÓN MULTICRÉDITO para que haga el
                               tratamiento de mis datos personales, de acuerdo a los lineamientos estipulados en el presente documento.
                               (1) Tratamiento de la información: Autorizo a la FUNDACIÓN MULTICRÉDITO para que en el desarrollo de su objeto social
                               recolecte, utilice, almacene, custodie, suprima, transfiera, transmita y en general procese mis datos personales.
                               (2) Finalidades del tratamiento: Conozco y acepto expresamente que el tratamiento de mis datos personales por parte de la
                               FUNDACIÓN MULTICRÉDITO tendrán entre otras las siguientes finalidades: (2.1) Mantenerme informado a través de cualquier
                               medio acerca de productos o servicios que la FUNDACIÓN MULTICRÉDITO ofrezca o llegue a ofrecer en el mercado, o los que sean
                               ofrecidos por sus subsidiarias o aliados estratégicos. (2.2) Informarme y hacerme partícipe a través de cualquier medio acerca de
                               actividades publicitarias y/o promocionales de la FUNDACIÓN MULTICRÉDITO. (2.3) Utilizar mi información para que la
                               FUNDACIÓN MULTICRÉDITO realice todas las gestiones administrativas, financieras y de mercadeo relacionadas directamente con
                               el giro ordinario de sus actividades. (2.4) Utilizar mi información para que la FUNDACIÓN MULTICRÉDITO la transmita o
                               transfiera cuando sea requerido por alguna entidad estatal o tercero debidamente autorizado. (2.5) Utilizar mi información para que la
                               FUNDACIÓN MULTICRÉDITO pueda Realizar controles para evaluar mi solvencia y evitar fraudes acceder, consultar, comparar y
                               evaluar mi información con bases de datos de centrales de riesgo crediticio, financiero, de antecedentes judiciales o de empresas de
                               seguridad privada. (2.6) Utilizar y administrar mis datos personales, consultar, reportar, actualizar, rectificar y obtener de las centrales de
                               información y de los demás bancos de datos autorizados para tales efectos, la información referente con mi comportamiento crediticio
                               producto de toda clase de operaciones que efectúe o haya efectuado con entidades del sector financiero, comercial e industrial y en
                               general, toda aquella información que sirva de referencia o base para el análisis del crédito y su permanencia, auditorías, corroborar los
                               datos suministrados con terceros con el fin de realizar actividades relacionadas con el objeto social, hasta que la FUNDACIÓN
                               MULTICRÉDITO o las centrales de información lo considere necesario. (2.7) Utilizar mi información para que la FUNDACIÓN
                               MULTICRÉDITO pueda realizar y/o publicar informes estadísticos.
                               (3) Derechos del titular: Declaro que la FUNDACIÓN MULTICRÉDITO me informó acerca de los derechos que me asisten como
                               titular de los datos personales, los cuales están contemplados en el artículo 8 de la Ley 1581 de 2012, en especial mi derecho a conocer,
                               rectificar y actualizar mis datos personales.
                               (4) Datos personales obtenidos antes de la presente autorización: En caso de que antes de haber oprimido el botón de aceptación de la
                               presente autorización, la FUNDACIÓN MULTICRÉDITO haya venido realizando el tratamiento de mis datos personales, lo autorizo
                               expresa e informada mente para que continúe realizando dicho tratamiento en los términos que se detallan en el presente documento.
                               (5) Identificación del responsable del tratamiento de la información: Declaro que se me informó que el responsable del tratamiento
                               de mis datos personales es la FUNDACIÓN MULTICRÉDITO sociedad legalmente existente con domicilio principal en la el
                               Boulevard Santander # 16 – 03 de Bucaramanga; con Correo electrónico: notificacines@multicredito.com teléfono: (7) 6711707. La
        política para tratamiento de datos personales se encuentra publicada en la página web www.fundacionmulticredito.com';

        //se comenta el codigo de verificacion de de otp
        //$verifed = event(new VerifyOtpSened($request["otpId"],$request["otpToken"]));
         if(true){
            $solicitud = new Solicitud([// se crea un parametro del modelo para pasar para el evento BeforeCreateSolicitud.
                'nombre'               => $request->nombre,
                'apellido'             => $request->apellido,
                'numeroDeDocumento'    => $request->numeroDeDocumento,
                'tipoDocument'         => $request->tipoDoc,
                'fechaExpedicion'      => $request->fechaExpedicion,
                'fechaNacimiento'      => $request->fechaNacimiento,
                'telefono'             => $request->telefono,
                'email'                => $request->email,
                'monto'                => $request->monto,
                'user_id'              => Auth::id(),
                'path_solicitud'       => 'solicitud/'. $request->numeroDeDocumento.'/'. date_format(now(), 'j-F-Y') . '/'.Str::uuid().'/',
                'solicitud_estado_id'  => null,
                'otp_id'               => $request->otpId
            ]);
            $signDocument = event(new BeforeCreateSolicitud($solicitud, $datos, "Autorizacion", $request->otpId))[0];// se ejecuta el evento que crea la firma electronica y  devuelve una intancia de SingDocument
            $solicitud->save();
            $signDocument->solicitud_id = $solicitud->id;
            $signDocument->save();
            event(new AfterCreateSolicitud($solicitud,$signDocument->pathDocument));
            try {
                $prospecta = Http::post("http://localhost:62251/api/Prospecta",[
                    "code"   => "3058",
                    "id"     => $request->numeroDeDocumento,
                    "typId"  => config("documento." . $request->tipoDoc),
                    "password" => "Ja-458",
                    "user"     => "532662"
                ])->json();
            } catch (\Throwable $th) {
                Log::error($th);
                abort(502);
            }
            if ($prospecta["inconsistenciasField"]) {
                //resultado si en la consulta es errada
                return redirect()->back()->withErrors([
                    "message"       => "No se pudo Realizar",
                    "description"   => "Revisa la informacion suministrada y vuelve a intentar",
                    "type"          => "warning"
                ])->withInput();
            }
            else if($prospecta["resultadoField"]==="No Elegible" || $prospecta["resultadoField"]==="Sin Información"){
                return redirect()->back()->withErrors([
                    "message"       => "Solicitud Rechazada",
                    "description"   => "No fue posible otorgarte tu crédito. Esperamos atenderte en otra ocasion.",
                    "type"          => "error"
                    ])->withInput();
            }


            return Redirect::route('socioeconomico.index',['id_solicitud'=>$solicitud->id]);
        }
    }

    /**
     * sendOtp a newly created resource in storage.
     *
     *
     * Funcion para enviar el codigo otp.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendOtp(Request $request)
    {
        //validador de los datos que ingresaron para que cumplan los parametros
        $request->validate([
            'nombre'                        => 'required',           //campo requerido
            'apellido'                      => 'required',           //campo requerido
            'numeroDeDocumento'             => 'required',           //campo requerido
            'fechaExpedicion'               => 'required',           //campo requerido
            'fechaNacimiento'               => 'required',           //campo requerido
            'telefono'                      => 'required',           //campo requerido
            'email'                         => 'required||email|',   //campo requerido y tipo email
            'monto'                         => 'required',           // campo requerido
            'tipoDoc'                       => 'required',           // campo requerido
        ]);

        $template = "El código de verificación de Fundación Multicredito es %token, al dar este código se aceptan terminos y condiciones";//se establece el mensaje aa ser enviado
        //$otpId = event(new CreateVerifyOtp($template,$request->telefono));
        $otpId="10f3537e2d86475597ae9af312b6d054";
        return Redirect::route('solicitud.create', ['otpId' => $otpId]); // se le indica que se seguira con la vista de index pero se le pasara el id, del objeto creado

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        return redirect(Storage::url($solicitud->path_solicitud.'solicitud.pdf'));// redirect('http://localhost:8000/storage/'.$solicitud->path_solicitud.'solicitud.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        // dd($request->file[0]->getClientOriginalName());
        //estudio de credito
        //dd("public/solicitud/1090368410/10-February-2022/a9fee054-7598-40fb-8232-b2c8058701da/Anexos/Document (7).pdf \n "."public/".$solicitud->path_solicitud."Anexos/".$request->file[0]->getClientOriginalName());

        if($request->solicitud_estado_id == 3 || $request->solicitud_estado_id == 4){
            $files = $request->file;//('file')[0]->store("public/".$solicitud->path_solicitud."Anexos"));
            $datosEstudio = $request->only("solicitud_estado_id","valor", "descripcion");
            $datosEstudio["solicitud_id"] = $request->id;
            $estudioCredito = EstudioCredito::create($datosEstudio);
            foreach ($files as $file) {
                if(Storage::exists("public/".$solicitud->path_solicitud."Anexos".$file->getClientOriginalName())){

                    $anexo = $file->storeAs("public/".$solicitud->path_solicitud."Anexos",$file->getClientOriginalName().'(1)');
                }
                 EstudioCreditoAnexo::create([
                    'estudio_credito_id'    => $estudioCredito->id,
                    'anexo'                 => $anexo,

                ]);
            }
        }
        //desemboso del credito
        if($request->solicitud_estado_id == 2){
            SocioDeNegocio::create([
                "nombre"            => $solicitud->nombre . " " . $solicitud->apellido,
                "numDoc"            => $solicitud->tipoDocument . $solicitud->numeroDeDocumento,
                "telefono"          => $solicitud->telefono,
                "email"             => $solicitud->email,
                "tipo_socio_id"     => 2
            ]);
            $datosDesembolso=$request->only("amount","solicitud_id","cuotas");
            $desembolso = Desembolso::create($datosDesembolso);
            $files = $request->file;//('file')[0]->store("public/".$solicitud->path_solicitud."Anexos"));
            foreach ($files as $file) {
                $pathAnexo = $file->store("public/".$solicitud->path_solicitud."DesembolsoAnexos");
                $anexo["desembolso_id"] = $desembolso->id;
                $anexo["anexo"] = $pathAnexo;
                DesembolsoAnexo::create($anexo);
            }
            //codigo para firmado de contrato y pagare
        }
        $solicitud->update($request->only('solicitud_estado_id'));
        $solicitud->save();
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }

    /**
     * firma el contrato de credito.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function firmar(Request $request)
    {
        //
    }
}
