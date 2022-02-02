<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagare </title>

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
            <h3 style="text-align: center">PAGARÉ <h3>
        </div>
        <div style="text-align: justify;">
            
PAGARÉ No.: _______<br>
POR VALOR DE:  ____________________________<br>
VENCIMIENTO:  ____________________________<br>
___________________________, identificado con C.C. No. _______________________; me obligo y prometo solidariamente sin condición alguna a pagar a la orden de <b>FUNDACION MULTICREDITO </b>con Nit. No. XXXXXXX o a su origen, o a quien represente sus derechos, en sus oficinas ________________________, en el municipio de Bucaramanga el día ______ del mes de ______________del año __________. La suma de ____________________________ ($_________________) M/Cte,. Si el pago del capital no se efectuare en la(s) fecha(s) indicada(s) en este pagaré y no se hubiere prorrogado, me(nos) comprometo(emos) a pagar, además de él, sobre los saldos insolutos durante todo el tiempo en que se encuentre sin cumplir la obligación y sin requerimiento previo, a título de sanción penal la suma que resulte de aplicar la tasa de interés de mora máxima autorizada por la ley, sin perjuicio de los derechos y acciones legales del acreedor.  Autorizamos a FUNDACION MULTICREDITO, para declarar vencido el plazo y exigir la cancelación inmediata del saldo pendiente a su favor más los intereses, costos y demás gastos, en cualquiera de los siguientes eventos:  a) Si los suscritos fueren demandados judicialmente o se les embarguen bienes por cualquier persona o por el mismo acreedor y con cualquier clase de acción; (b) En caso de declaratoria de quiebra, o la admisión de concordato, fallecimiento o incapacidad  de uno o de varios de los que firmamos el presente documento; c) En caso de mora en el pago de uno o más de los plazos convenidos con FUNDACION MULTICREDITO, por las diferentes obligaciones representadas con cheques, facturas, letras, notas débito, etc., En caso de hacerse el cobro judicialmente serán a mi(nuestro) cargo los costos de la cobranza y los honorarios del abogado.  Acepto(amos) desde ahora cualquier cesión, endoso o traspaso que de este título valor hiciere FUNDACION MULTICREDITO a cualquier persona natural o jurídica, haciendo aclaración expresa de que el presente instrumento, sin necesidad de recurrir a más notificaciones y que la solidaridad subsiste en caso de prórroga o de cualquier modificación a lo estipulado, aunque se pacte con uno de los obligados.  Si el pago fuere parcial, FUNDACION MULTICREDITO, anotará en este título valor la cantidad correspondiente.   Autorizo(amos) expresamente a FUNDACION MULTICREDITO, para completar los espacios en blanco de este pagaré así: 
 a) El valor será aquel que los suscritos adeudemos a FUNDACION MULTICREDITO, por concepto de: préstamo.
b) Los intereses corrientes serán los acordados por las partes.
c) Como fecha emisión y vencimiento se pondrá la misma que corresponda el día en que FUNDACION MULTICREDITO, complete este documento, esto es, a la vista.

El emisor (deudor) de este título declara expresamente conocer que, las firmas electrónicas o digitales plasmadas en este documento electrónico o mensaje de datos y utilizadas para dar constancia de su suscripción, cumplen con los requisitos legales dispuestos para tal efecto en la Ley 527 de 1999, el Decreto 1074 del 2015 y demás normas que los adicionen o modifiquen, y que los mecanismos técnicos de identificación personal o autenticación son seguros y confiables. 

La circulación del presente título valor se garantizará mediante el uso de un sistema de registro, custodia y anotación, de conformidad con el Código de Comercio y la Ley 527 de 1999.

Este pagaré electrónico se suscribe electrónicamente el día __ del mes ___________ del año _____.

Cordialmente, 


xxxxxxxxxxxx
C.C. No. xxxxxxxxxxxx
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
