<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autorizacion Pagare </title>

    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            margin-right: 0.5cm;
            margin-left: 0.5cm;
            margin-top: 0.5cm;
            text-align: center;
            line-height: 10px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
        }

        .table1,
        .td1,
        .th1 {
            border: 1px solid black;
        }

        .table1 {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            width: 90%;
        }

    </style>

</head>
  <body>
    <header>
        <table style="width: 100%;">
            <tr>
                <td style="text-align: center;  width: 20%"><img style="width: 3cm"
                        src="{{ public_path('images/multicredito.png') }}" alt=""></td>
                <td style="text-align: center;  width: 60%">
                    <h1>Fundacion Multicredito</h1> Nit. 901.367.058-0
                </td>
                <td style="text-align: center;  width: 20%">#{{ $id ?? '' }}</td>
            </tr>
        </table>
        <hr>
    </header>
    <main>
        <div style="display: inline; width: 100%;">
            <h3 style="text-align: center">Autorizacion pagare <h3>
        </div>
        <div style="text-align: justify;">
            Señores,
            <br>
            FUNDACION MULTICREDITO
            <br>
            Ciudad
            <br>
            Ref.: Autorización para llenar Pagaré Electrónico No. {{$id}}
            En mi condición de persona natural y obrando en mi propio nombre, con la presente dejo en su poder un
            esqueleto de Pagaré en blanco, contenido en la hoja sin número con espacios en blanco firmado por mí en que
            autorizo a FUNDACION MULTICREDITO, con Nit. No. CCCCCC-5, llenar según el Artículo 622 del Código de
            Comercio de acuerdo con las siguientes instrucciones:
            <ol>
                <li> CAUSA: Cualquier saldo exigible a nuestro cargo y a favor de FUNDACION MULTICREDITO por
                    obligaciones que tuviére contraídas o contrajéra con FUNDACION MULTICREDITO.
                </li>
                <li> FECHA DEL TÍTULO: Al establecerse por FUNDACION MULTICREDITO cualquier saldo exigible por
                    obligaciones a mi cargo.
                </li>
                <li> CUANTÍA: El valor de las obligaciones exigibles a mi cargo en la fecha en que se llene este
                    instrumento.
                </li>
                <li> VENCIMIENTO: FUNDACION MULTICREDITO, podrá optar por considerar el título a la vista o con
                    vencimiento al día siguiente del otorgamiento.
                </li>
                <li> INTERESES: Los ordinarios o de mora que FUNDACION MULTICREDITO, este autorizado a cobrar por las
                    operaciones que dan origen al perfeccionamiento del título.
                    Expresamente manifiesto que estoy de acuerdo con lo que conste en los libros y papeles de FUNDACION
                    MULTICREDITO, respecto a las obligaciones a mi(nuestro) cargo. (Artículo 71 del Código de Comercio).
                    Anexo(amos) pagaré referenciado debidamente firmado.
                </li>
                <li> PAGARÉ ELECTRONICO: Dada la naturaleza de los pagarés electrónicos en blanco de ser documentos
                    incompletos y estar llamados a ser modificados con el fin de completarlos, el pagaré electrónico
                    deberá contar con dos momentos de integridad. En tal sentido, el emisor comprende y acepta el
                    procedimiento descrito a continuación para mantener la integridad del pagaré electrónico:
                </li>
             <ol>
            <li>El primer momento de integridad del documento será el de su creación. Entonces, una vez firmado
                electrónicamente por el emisor (deudor) del título valor, quien vaya a custodiar el pagaré electrónico
                deberá realizar una segunda firma electrónica con el fin de garantizar su integridad desde su creación y
                el no repudio del documento.
                   </li>
            <li>El segundo momento se dará una vez los espacios en blanco sean rellenados de acuerdo con las
                instrucciones aquí dadas, por lo que posterior a esta modificación, quien custodie el pagaré electrónico
                lo firmará nuevamente (mediante firma electrónica) con el fin de identificar el momento exacto de su
                modificación, y desde el cual se reputará su integridad definitiva,
                siendo inmodificable a partir de este momento.</li>
            </ol>
        </ol>
            El presente procedimiento se encuentra sustentado en lo dispuesto por el artículo 9 de la Ley 527 de 1999,
            sobre la integridad de los documentos electrónicos y la posibilidad de la adición de algún endoso o de algún
            cambio que le sea inherente a su proceso de comunicación, archivo o presentación.
            <br>
           Cordialmente,
            <br>
            XXXXXXXX
            <br>
            C.C. No. XXXXXXX
        </div>
        </div>
    </main>
    <footer>
        <hr style="width:95%">
        <table style="width: 100%;">
            <tr>
                <td style="text-align: center;  width: 20%"></td>
                <td style="text-align: center;  width: 60%"></td>
                <td style="text-align: center;  width: 20%"></td>
            </tr>
        </table>

    </footer>
 </body>
</html>
