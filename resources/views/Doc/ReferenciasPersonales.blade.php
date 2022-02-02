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
           <table style="width: 100%;" >
                     
            <tr>
                <td style="text-align: center;  width: 20%"><img style="width: 3cm"
                        src="{{ public_path('images/multicredito.png') }}" alt=""></td>
                <td style="text-align: center;  width: 60%">
                    <h1>Fundacion Multicredito</h1> Nit. 901.367.058-0
                </td>
                
                <td style="text-align: center;  width: 20%">{{$referencias[0]->solicitud_id}}#Id De la solicitud</td>
            </tr>
        </table>
        <hr>
    </header>
    <main>
        <div style="display: inline; width: 100%;">
            @foreach ($referencias  as $referencia) 
            <table>
                             
                <thead>
                    <tr>
                        
                        <th colspan="4" style="text-align: left;">
                            <h4>Referencias Peronales</h4>
                        </th>
                    </tr>
                </thead>      
                
 
                <tbody>
                    <tr style="margin-bottom: 10px;">
                        <td><span style="margin-rights: 10px">Nombre Completo:</span></td>
                        
                    </tr><tr style="margin-bottom: 10px;">

                       
                        <td colspan="2">
                            <div
                                style=" margin-right: 5px; border: 1px solid #000;text-align: center; border-radius: 5px; padding: 6px 0px; width: 10cm;">
                                {{ strtoupper($referencia->name) }}</div>
                        </td>
                    </tr>
                    <tr style="margin-bottom: 10px;">
                        <td><span style="margin-right: 5px">Telefono:</span></td>
                    </tr><tr style="margin-bottom: 10px;">
                        <td>
                            <div
                                style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 5.7cm;">
                                {{ strtoupper($referencia->phone) }}</div>
                        </td>
                    </tr>

                </tbody>
            </table>
  
                <br>
                <hr>
                <br>
                   @endforeach                
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
