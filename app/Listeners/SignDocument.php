<?php

namespace App\Listeners;

use App\Events\BeforeCreateSolicitud;
use App\Models\SignDocument as ModelsSignDocument;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SignDocument
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
     * @param  BeforeCreateSolicitud  $event
     * @return void
     */
    public function handle(BeforeCreateSolicitud $event)
    {
         try{
             $privateKeyPem = Storage::exists('public/'.$event->solicitud->path_solicitud. '/cert/private_key.pem');
             $publicKeyPem  = Storage::exists('public/'.$event->solicitud->path_solicitud. '/cert/public_key.pem');
         }catch (\Throwable $th) {
             $privateKeyPem  = null;
             $publicKeyPem   = null;
         }


         if (!($privateKeyPem && $publicKeyPem)) { // valida si el usuario ya tiene los certificados creados keys si no es asi se crean los certificados
             //A continuación el array de configuración para la creación del juego de claves
             $configArgs = [
                //  'private_key_bits' => 2048,
                //  'private_key_type' => OPENSSL_KEYTYPE_RSA
                'config' => 'C:\xampp\php\extras\openssl\openssl.cnf',
                'private_key_bits' => 2048,
                'private_key_type' => OPENSSL_KEYTYPE_RSA
             ];

             $resourceNewKeyPair = openssl_pkey_new($configArgs); // Genera una clave par de llaves teniendo encuenta la informacion suministrada
             if (!$resourceNewKeyPair) {// si hay un error en el llenado se retorna http 500
                 return response()->json([
                     'message' => 'Puede que tengas problemas con la ruta indicada en el array de configuración "$configArgs',
                     'error'   => openssl_error_string(), //en el caso que la función anterior de openssl arrojará algun error, este sería visualizado gracias a esta línea
                     'code'    => 500
                 ],500,[]);
             }

             //obtengo del recurso $resourceNewKeyPair la clave publica como un string
             $details = openssl_pkey_get_details($resourceNewKeyPair); //Devuelve una matriz con los detalles de la clave
             $publicKeyPem = $details['key']; //Un recurso que contiene la clave publica.
             //obtengo la clave privada como string dentro de la variable $privateKeyPem (la cual es pasada por referencia)
             if (!openssl_pkey_export($resourceNewKeyPair, $privateKeyPem, NULL, $configArgs)) {
                 return response()->json([
                     'message' => 'No se pudo obtener la clave privada',
                     'error'   => openssl_error_string(), //en el caso que la función anterior de openssl arrojará algun error, este sería visualizado gracias a esta línea
                     'code'    => 500
                 ],500,[]);
             }


             //guardo la clave publica y privada en disco:
             Storage::put('public/'.$event->solicitud->path_solicitud. '/cert/private_key.pem', $privateKeyPem); //carga el archivo private_key.pem en la carpeta creada
             Storage::put('public/'.$event->solicitud->path_solicitud. '/cert/public_key.pem', $publicKeyPem); //cargar el archivo public_key.pem en la carpeta creada
             //$privateKeyPem = Storage::get('public/solicitud/'. $event->solicitud->numeroDeDocumento.'/'. date_format(now(), 'j-F-Y') . '/cert/private_key.pem'); // obtiene la llave guardada.
         }
         $publicKeyPem = null; // una vez validado que existe el archivo  se elimina de memoria.


         $resourcePrivateKey = openssl_get_privatekey($privateKeyPem); // obtengo la clave privada como resource desde el string
         if (!openssl_sign($event->datosFirmar, $firma, $resourcePrivateKey, OPENSSL_ALGO_SHA256)) {
             return response()->json([
                'message' => 'No se pudo firmar el los datos',
                'error'   => openssl_error_string(), //en el caso que la función anterior de openssl arrojará algun error, este sería visualizado gracias a esta línea
                'code'    => 500
            ], 500, []);
         }
         Storage::put('public/'.$event->solicitud->path_solicitud .'/'.$event->tipoDoc.'/firma.dat', $firma);
         $ecrypDatos =  $event->datosFirma;
         $singDocument = ModelsSignDocument::create([
            'id_otp' => $event->idOtp,
            'pathDocument' =>'public/'.$event->solicitud->path_solicitud .'/'.$event->tipoDoc,
            'tipoDoc' => $event->tipoDoc,
            'firma' =>$firma,
            'datosFirmar' => $ecrypDatos
            // 'solicitud_id' =>  $event->solicitud->id
         ]);
          return $singDocument;

    }
}
