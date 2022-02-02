<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MessageBird\Objects\Verify;
use MessageBird\Client;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'numeroDeDocumento'=>'required',
            'fechaExpedicion'=>'required',
            'fechaNacimiento'=>'required',
            'telefono'=>'required',
            'email'=>'required||email||unique:solicituds',
            'monto'=>'required',
        ]);
        $verify = new Verify();
        $verify->originator = 'YourName';
        $verify->recipient = '3054750172';
        $verify->template = "Mulricredito codigo: %token para autorizar el manejo de informacion";
        $client = new Client(config('messagebird.key'));
        $verify->type = "sms";
        dd( $result = $client->verify->create($verify));
    }
    public function verify(Request $request)
    {
        $configArgs = [
            'config' => 'C:\xampp\php\extras\openssl\openssl.cnf', //<-- esta ruta es necesaria si trabajas con XAMPP
           'private_key_bits' => 2048,
            'private_key_type' => OPENSSL_KEYTYPE_RSA
        ];        
        $client = new Client(config('messagebird.key'));
        $result = $client->verify->verify($request['id'], $request['otp']);
        $isVerified = $result->status === 'verified';
        dd($result);
    }
}
