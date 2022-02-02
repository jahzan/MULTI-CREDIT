<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud de credito</title>
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
            height: 3cm;
            text-align: center;
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
                <td style="text-align: center;  width: 20%">#{{ $id }} de la Solicitud {{ $solicitud_id }}
                </td>
            </tr>
        </table>
        <hr>
    </header>
    <main>
        <div>
            <table>
                <thead>
                    <tr>
                        <th colspan="4" style="text-align: left;">
                            <h4>Datos Socioeconomicos</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px">Estado Civil:</span></td>
                        <td>
                            <div
                                style=" margin-right: 5px; border: 1px solid #000;text-align: center; border-radius: 5px; padding: 6px 0px; width: 6cm;">
                                {{ strtoupper($estadoCivil) }}</div>
                        </td>
                    </tr>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 8px">Personas A Cargo:</span></td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 1cm;">
                                {{ $personasAcargo }}</div>
                        </td>
                        <td><span style="margin-right: 5px">Sexo:</span></td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 4cm;">
                                {{ strtoupper($sexo) }}</div>
                        </td>
                    </tr>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px">Dirrecion</span></td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 6cm;">
                                {{ $direccion }}</div>
                        </td>
                        <td><span style="margin-right: 5px">Tipo De Vivienda:</span></td>
                        <TD>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 4cm;">
                                {{ $tipoVivienda }}</div>
                        </td>
                    </tr>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px">Departamento:</span> </td>
                        <TD>
                            <div
                                style=" border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 4cm;">
                                Santander</div>
                        </TD>
                        <td>Cuidad: </td>
                        <TD>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 4cm;">
                                Bucaramnga</div>
                        </TD>
                    </tr>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px"> Nivel Academico:</span> </td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 6cm;">
                                {{ $nivelAcademico }}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th colspan="4" style="text-align: left;">
                            <h4>Datos Laborales</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px">Estado Laboral:</span></td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 1cm;">
                                @if($estadoLaboral == 1)
                                SI
                                  @elseif ($estadoLaboral == 0)
                                  NO  
                                  @else
                                  NN.
                                @endif</div>
                        </td>
                        <td><span style="margin-right: 5px"> Pensionado: </span></td>
                        <td>
                            <div
                                style=" border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 1cm;">
                                
                                @if ($estadoPensional === 1)
                                Si
                            @elseif ($estadoPensional == 0)
                                No 
                            @else
                                NN.
                            @endif </div>
                        </td>
                    </tr>
                    @if($estadoLaboral == 1)
                                         
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px"> Empresa:</span> </td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 6cm;">
                                 {{ $empresaLabora }}</div>
                        </td>
                        <td><span style="margin-right: 5px"> Telefono:</span> </td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 6cm;">
                                 {{ $telefonoEmpresa }}</div>
                        </td>
                    </tr>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px"> Direccion:</span> </td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 6cm;">
                                {{ $direccionEmpresa }}</div>
                        </td>
                    </tr>
                    @else
                    
                    @endif
                </tbody>
            </table>
            <!-- estado Financiero-->
            <table>
                <thead>
                    <tr>
                        <th colspan="4" style="text-align: left;">
                            <h4>Datos Finacieros</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px"> Ingresos:</span> </td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 6cm;">
                                ${{ $otrosIngresos }}</div>
                        </td>
                        <td><span style="margin-right: 5px"> Otros Ingresos:</span> </td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 6cm;">
                                ${{ $otrosIngresos }}</div>
                        </td>
                    </tr>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px"> Gastos:</span> </td>
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 6cm;">
                                ${{ $gastos }}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
