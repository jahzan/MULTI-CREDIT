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
                <td style="text-align: center;  width: 20%"><img style="width: 3cm" src="{{public_path('images/multicredito.png')}}" alt=""></td>
                <td style="text-align: center;  width: 60%"><h1>Fundacion Multicredito</h1> Nit. 901.367.058-0</td>
                <td style="text-align: center;  width: 20%">#{{$id ?? ''}}</td>
            </tr>
        </table>
        <hr>
    </header>
    
    <main>
        <div style="display: inline; width: 100%;">
            <table>
                <thead>
                    <tr>
                        <th colspan="4" style="text-align: left;"><h4>Datos Peronales</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px">Nombre:</span></td>
                        <td colspan="2"><div style=" margin-right: 5px; border: 1px solid #000;text-align: center; border-radius: 5px; padding: 6px 0px; width: 7cm;">{{strtoupper($nombre)}}</div></td>
                        <td><span style="margin-right: 5px">Apellido:</span></td>
                        <td><div style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 5.7cm;">{{strtoupper($apellido)}}</div></td>
    
                    </tr>
                    <tr>
                        <td><span style="margin-right: 5px">Doc Identidad:</span></td>
                        <td><div style=" margin-right: 5px; border: 1px solid #000;text-align: center; border-radius: 5px; padding: 6px 0px; width: 1cm;">C.C.</div></td>
                        <td><div style=" margin-right: 5px; border: 1px solid #000;text-align: center; border-radius: 5px; padding: 6px 0px; width: 5.7cm;">{{$numeroDeDocumento}}</div></td>
                        <td><span style="margin-right: 5px">Fec. Exp.:</span></td>
                        <td><div style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 5.7cm;">{{date_format(DateTime::createFromFormat('Y-m-d',$fechaExpedicion), 'j - F - Y')}}</div></td>    
                    </tr>

                    <tr>
                        <td><span style="margin-right: 5px">Fec. Nac.:</span></td>
                        <td colspan="2"><div style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 7cm;">{{date_format(DateTime::createFromFormat('Y-m-d',$fechaNacimiento), 'j - F - Y')}}</div></td>
                        <td><span style="margin-right: 5px"></span></td>
                        <td></td>
                        <td></td>

    
                    </tr>                                             
                </tbody>

            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th colspan="4" style="text-align: left;"><h4>Informacion de la Solicitud</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="margin-bottom: 5px;">
                        <td><span style="margin-right: 5px">Email:</span></td>
                        <td colspan=""><div style=" margin-right: 5px; border: 1px solid #000;text-align: center; border-radius: 5px; padding: 6px 0px; width: 7cm;">{{$email}}</div></td>
                        <td><span style="margin-right: 5px">Celular:</span></td>
                        <td><div style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 5.86cm;">{{$telefono}}</div></td>
    
                    </tr>

                    <tr>
                        <td><span style="margin-right: 5px">Monto solicitado:</span></td>
                        <td colspan="2"><div style="border: 1px solid #000; border-radius: 5px;text-align: center; padding: 6px 0px; width: 7cm;">{{'$ '.number_format(($monto))}}</div></td>
                        <td><span style="margin-right: 5px"></span></td>
                        <td></td>
                        <td></td>

    
                    </tr>                                             
                </tbody>

            </table>
            <br>
            <hr>
            <br>
            <div style="text-align: justify;">
                <span style="font-size: 11.6px;">
                    <b>AVISO DE PRIVACIDAD – AUTORIZACIÓN PARA EL MANEJO DE INFORMACIÓN REGISTRO Y REPORTE A CENTRALES DE RIESGO</b>.
                    <br> 
                    De conformidad a la Ley 1581 de 2012, al Decreto 1377 de 2013 y a la política de tratamiento de datos de la 
                    <b>FUNDACIÓN MULTICRÉDITO</b> de manera expresa, informada y suficiente autorizo a la <b>FUNDACIÓN MULTICRÉDITO</b> 
                    para que haga el tratamiento de mis datos personales, de acuerdo a los lineamientos estipulados en el presente 
                    documento. <br> <b>(1) Tratamiento de la información:</b> Autorizo a la <b>FUNDACIÓN MULTICRÉDITO</b> para que en el 
                    desarrollo de su objeto social recolecte, utilice, almacene, custodie, suprima, transfiera, transmita y en general 
                    procese mis datos personales. <br> <b>(2) Finalidades del tratamiento:</b> Conozco y acepto expresamente que el tratamiento 
                    de mis datos personales por parte de la <b>FUNDACIÓN MULTICRÉDITO</b> tendrán entre otras las siguientes finalidades: 
                    <b>(2.1)</b> Mantenerme informado a través de cualquier medio acerca de productos o servicios que la <b>FUNDACIÓN MULTICRÉDITO</b> 
                    ofrezca o llegue a ofrecer en el mercado, o los que sean ofrecidos por sus subsidiarias o aliados estratégicos. 
                    <b>(2.2)</b> Informarme y hacerme partícipe a través de cualquier medio acerca de actividades publicitarias y/o 
                    promocionales de la <b>FUNDACIÓN MULTICRÉDITO</b>. <b>(2.3)</b> Utilizar mi información para que la <b>FUNDACIÓN MULTICRÉDITO</b> 
                    realice todas las gestiones administrativas, financieras y de mercadeo relacionadas directamente con el giro ordinario 
                    de sus actividades. <b>(2.4)</b> Utilizar mi información para que la <b>FUNDACIÓN MULTICRÉDITO</b> la transmita o transfiera 
                    cuando sea requerido por alguna entidad estatal o tercero debidamente autorizado. <b>(2.5)</b> Utilizar mi información 
                    para que la <b>FUNDACIÓN MULTICRÉDITO</b> pueda Realizar controles para evaluar mi solvencia y evitar fraudes acceder, 
                    consultar, comparar y evaluar mi información con bases de datos de centrales de riesgo crediticio, financiero, de 
                    antecedentes judiciales o de empresas de seguridad privada. <b>(2.6)</b> Utilizar y administrar mis datos personales, 
                    consultar, reportar, actualizar, rectificar y obtener de las centrales de información y de los demás bancos de datos 
                    autorizados para tales efectos, la información referente con mi comportamiento crediticio producto de toda clase de 
                    operaciones que efectúe o haya efectuado con entidades del sector financiero, comercial e industrial y en general, 
                    toda aquella información que sirva de referencia o base para el análisis del crédito y su permanencia, auditorías, 
                    corroborar los datos suministrados con terceros con el fin de realizar actividades relacionadas con el objeto social, 
                    hasta que la <b>FUNDACIÓN MULTICRÉDITO</b> o las centrales de información lo considere necesario. <b>(2.7)</b> Utilizar 
                    mi información para que la <b>FUNDACIÓN MULTICRÉDITO</b> pueda realizar y/o publicar informes estadísticos. <br> <b>(3) Derechos 
                    del titular:</b> Declaro que la <b>FUNDACIÓN MULTICRÉDITO</b> me informó acerca de los derechos que me asisten como titular 
                    de los datos personales, los cuales están contemplados en el artículo 8 de la Ley 1581 de 2012, en especial mi derecho a 
                    conocer, rectificar y actualizar mis datos personales. <br> <b>(4) Datos personales obtenidos antes de la presente autorización:</b> 
                    En caso de que antes de haber oprimido el botón de aceptación de la presente autorización, la <b>FUNDACIÓN MULTICRÉDITO</b> 
                    haya venido realizando el tratamiento de mis datos personales, lo autorizo expresa e informada mente para que continúe 
                    realizando dicho tratamiento en los términos que se detallan en el presente documento. <br> <b>(5) Identificación del responsable 
                    del tratamiento de la información:</b> Declaro que se me informó que el responsable del tratamiento de mis datos personales 
                    es la <b>FUNDACIÓN MULTICRÉDITO</b> sociedad legalmente existente con domicilio principal en la el Boulevard Santander # 16 – 03 
                    de Bucaramanga; con Correo electrónico: notificacines@multicredito.com teléfono: (7) 6711707. La política para tratamiento 
                    de datos personales se encuentra publicada en la página web www.fundacionmulticredito.com
                </span>
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