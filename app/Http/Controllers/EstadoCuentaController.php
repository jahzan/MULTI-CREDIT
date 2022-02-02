<?php

namespace App\Http\Controllers;

use App\Models\OtpValidation;
use App\Models\SocioDeNegocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EstadoCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render("EstadoCuenta/ConsultarCuenta");
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createValidation()
    {
        return Inertia::render("EstadoCuenta/EstadoCuenta");
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showValidation($snId)
    {
        return Inertia::render("EstadoCuenta/ValidateOtp");
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeValidation()
    {
        return Inertia::render("EstadoCuenta/FormIdentidad");
    }



    /**
     * SendOtp a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendOtp(Request $request)
    {
        $sn = SocioDeNegocio::where('numDoc','=',$request->numDoc)->first();
        $validacion = OtpValidation::where('socio_de_negocio_id','=',$sn->id)->where('channel','=',$request->channel)->first();

        if(!$validacion && $sn){
            $otp = Str::random(6);
            $newValidate= OtpValidation::create([
                'socio_de_negocio_id' => $sn->id,
                'otp'                 => Hash::make($otp),
                'channel'             => $request->channel,
                'validated_at'        => Carbon::now()->add(15,'minute')
            ]);
            return response()->json([
                "otp" => $newValidate
            ]);
        }
        $restante = Carbon::parse($validacion->validated_at)->diff(Carbon::now());
        if($restante > 0 && $sn){
             $validacion->delete();
             $otp = Str::random(6);
             $newValidate= OtpValidation::create([
                 'socio_de_negocio_id' => $sn->id,
                 'otp'                 => $otp,
                 'channel'             => $request->channel,
                 'validated_at'        => Carbon::now()->add(15,'minute')
             ]);
        }

        //return Redirect::route('solicitud.create', ['otpId' => $otpId]); // se le indica que se seguira con la vista de index pero se le pasara el id, del objeto creado
    }

    
    /**
     * SendOtp a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateOtpPost(Request $request)
    {
        $validacion = OtpValidation::where('socio_de_negocio_id','=',$request->id)->where('channel','=',$request->channel)->first();

    }
    


    /**
     * SendOtp a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateOtp(Request $request)
    {
        return Inertia::render("EstadoCuenta/ConsultarCuenta");
    }
}
