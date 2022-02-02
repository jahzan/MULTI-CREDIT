<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrato Mutuo </title>
    
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
        .table1, .td1, .th1 {
  border: 1px solid black;
}
.table1 {
  width: 100%;
  border-collapse: collapse;
}
td{
    width: 90%;  
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
            <h3 style="text-align: center">CONTRATO DE CREDITO <h3>
            <table class="table1" >
             <tr ><td class="td1"><b>ACREEDOR</b>
                <table><tr><td>Fundación Multicredito</td></tr>
                   <tr> <td>Nit. 901367058-0</td></tr>
                   <tr> <td>Dirección: Boulevard Santander No. 16-03 de Bucaramanga</td></tr>
                   <tr> <td>telefono</td></tr>
                   <tr> <td>notificaciones@fundacionmulticredito.com.</td></tr></table>
                </td>
                <td class="td1"><b>CLIENTE</b>
                    <table><tr><td>Nombre Cliente </td></tr>
                        <tr> <td>C.C. No.</td></tr>
                        <tr> <td>Dirección: </td></tr>
                        <tr> <td>Teléfono de contacto:</td></tr>
                        <tr> <td>Correo electrónico para notificaciones electrónicas: </td></tr></table></td></tr>
             <tr> <td class="td1">Modalidad del crédito </td>
                <td class="td1"></td></tr>
             <tr><td class="td1">Valor del crédito</td>
                <td class="td1"></td></tr>
             <tr><td class="td1">Cuota inicial</td>
                <td class="td1"></td></tr>
             <tr><td class="td1">Tasa de interés remuneratorio: </td>
                <td class="td1"></td></tr>
             <tr><td class="td1">Tasa de interés moratorio:</td>
                <td class="td1"></td></tr>
             <tr><td class="td1"> Interés bancario corriente vigente al firmar:</td>
                <td class="td1"></td></tr>
             <tr><td class="td1">   Sistema de amortización:</td>
                <td class="td1"></td></tr>
             <tr><td class="td1"> Beneficiario del credito:</td>
                <td class="td1"></td></tr>
              </table>
              <br>
            <div style="text-align: justify;">
                Las partes,<b> ACREEDOR y CLIENTE</b>, debidamente identificadas al finalizar este escrito, respectivamente, convienen celebrar un contrato de crédito, el cual se regirá bajo las estipulaciones del presente acuerdo y bajo las normas del Código de Comercio para el mutuo mercantil.
                    <br>
                    <br>
                    <b> PRIMERA: Objeto. </b> El ACREEDOR otorga al CLIENTE un crédito mediante el cual entregará, en calidad de préstamo o mutuo, la suma de _____________ ({{'$ '.number_format(($monto))}}) pesos colombianos m/cte. En obediencia a las indicaciones del CLIENTE, el ACREEDOR realizará el desembolso, en nombre y por cuenta del CLIENTE, 
                    en la cuenta bancaria que el BENEFICIARIO del crédito indique al ACREEDOR.
                     Desde el momento en que el ACREEDOR realice el desembolso, el presente contrato adquirirá el carácter de mutuo mercantil o préstamo con intereses para el financiamiento, total o parcial, de una compra de bienes por el CLIENTE al BENEFICIARIO.
                     <br>
                     <br>
                    En virtud del crédito concedido, el CLIENTE reconocerá al ACREEDOR, además de la restitución del capital debido (el valor del crédito), el pago de intereses remuneratorios,
                     según lo establecido en el punto sexto del presente contrato.
                     <br>
                     <br>
                    El CLIENTE reconoce y acepta como prueba del desembolso del crédito, los registros y/o los comprobantes internos (
                        magnéticos o electrónicos) del ACREEDOR que contengan dicha operación.
                    <br>
                    <br>
                    <b>SEGUNDA: Beneficiario.</b> Para efectos del presente contrato, se entenderá
                     por BENEFICIARIO al establecimiento de comercio con el que el CLIENTE ha celebrado 
                     una operación de compraventa de bienes, que será financiada, en todo o parte, con el
                      desembolso del crédito que realizará el ACREEDOR al BENEFICIARIO.<br>

                    El BENEFICIARIO del crédito contará previamente con un acuerdo comercial 
                    (el cual es externo a este contrato) con el ACREEDOR, que le permitirá tener este rol.<br>

                    Bajo ninguna circunstancia, el BENEFICIARIO se considerará como parte del presente contrato, ni estará obligado a responder por el mismo. El pago al BENEFICIARIO tampoco podrá entenderse como una cesión de posición contractual por parte del CLIENTE, quien para todos los efectos del presente acuerdo será el único responsable por las sumas de dinero otorgadas mediante este contrato.
                    <br>
                    <br>
            
                    <b>TERCERA: Intereses.</b> Las partes acuerdan que, en contraprestación por el crédito, el CLIENTE, además de restituir la suma de dinero entregada en préstamo, reconocerá y pagará al ACREEDOR intereses remuneratorios a una tasa del _________ efectivo anual.
                    <br> 
                    <br>
                    El interés remuneratorio se liquidará mensualmente y será pagado a mes vencido por el CLIENTE por el número de cuotas establecidas o hasta el momento en que restituya completamente el valor del crédito, junto con los intereses generados hasta la fecha. 
                    <br>
                    <br>
                    <b>CUARTA: Forma de pago.</b> Así las cosas, EL MUTUARIO pagará al MUTUANTE, ______ cuotas mensuales por valor de _____________________________________  PESOS M/CTE ($____________________) el día 30 de cada mes, a partir del día 30 de noviembre de 2021.
                    <br>
                    <br>
                     Los valores dispuestos en la presente cláusula, serán cancelados a órdenes de la FUNDACIÓN MULTICRÉDITO a mediante consignación o transferencia bancaria con los siguientes datos: 
                       <br>
                   <ul>
                  <li>  Banco de Bogotá  Cuenta corriente No. 162294771</li>
                   </ul>
                      
                    Todos los pagos que realice el CLIENTE se aplicarán en el siguiente orden: 1) Gastos para el recobro de la obligación, si los hubiere. 2) Cualquier suma adeudada por el CLIENTE por concepto diferente al pago del capital del crédito y sus intereses (remuneratorios y/o moratorios). 3) Intereses moratorios, si los hubiere. 4) Intereses remuneratorios causados. 5) El capital vencido. 6) Por último, los pagos anticipados del crédito.
    <br>                
    <br>
                    <b>QUINTA: EL MUTUARIO</b> incurrirá en mora en los siguientes casos:
                <ol>
                    <li>No cancela en el plazo y condiciones indicadas el capital entregado por EL MUTUANTE.</li> 
                    <li >No cancela o cancela parcialmente, el valor de las cuotas acordadas en la cláusula tercera.</li> 
                    <li > Viola cualquiera de las prohibiciones establecida en la cláusula cuarta.</li> 
                    <li > Es objeto de una intervención judicial o administrativa, de todo o parte de su activo;</li> 
                </ol>      
                    En caso de presentarse mora en el pago de cualquiera de las cuotas convenidas, EL MUTUARIO pagará a la FUNDACIÓN MULTICRÉDITO un interés moratorio liquidado a la tasa mensual máxima legal vigente fijada por la Superintendencia Financiera y hasta el día del pago efectivo de la totalidad de las obligaciones consignadas en el presente acuerdo.
<br>
<br>
                    <b>SEXTA:</b> La falta de ejercicio por parte del MUTUANTE de cualquiera de los derechos que este contrato le otorga como acreedor y tenedor del presente título ejecutivo, así como el otorgamiento al MUTUARIO, bajo cualquier forma jurídica, de una prórroga en los plazos pactados, no implicará la renuncia a estos derechos ni a sus garantías, ni impedirá al MUTUANTE ejercer tales derechos u otros en lo sucesivo.
                    <br>
                    <br>
                    <b>SÉPTIMA:</b> Cláusula Aceleratoria. EL MUTUANTE podrá dar por terminado el plazo concedido para el pago total de la deuda y hacer exigible la totalidad de las obligaciones a favor del acreedor, las cuales incluyen sin limitarse, al monto del capital, intereses corrientes o de plazo, interés moratorio liquidado a la tasa máxima legal vigente fijada por la Superintendencia Financiera , gastos de consulta y administración, gastos de cobranza, entre otros, en caso de la ocurrencia de cualquiera de los eventos de la cláusula quinta.
                    <br>
                    <br>
                                        <b>OCTAVA:</b> Merito ejecutivo. El presente contrato contiene una obligación clara expresa y exigible y  presta mérito ejecutivo conforme a lo señalado en el artículo 422 del Código General del proceso y demás normas civiles y comerciales. Así mismo, el único que tiene obligaciones pendientes en cumplirse según ese título es EL MUTUARIO.
                    <br>
                    <br>
                    <b>NOVENA:</b> Gastos. Serán de cargo de EL MUTUARIO los gastos judiciales y extrajudiciales de cobranza en que incurra EL MUTUANTE, por el cobro de las obligaciones convenidas en este acto, así como los gastos e impuestos que pueda ocasionar la suscripción del presente contrato y su desembolso. 
                    <br>
                    <br>
                   <b> DECIMA:</b> Envío del extracto de crédito al cliente. Por lo menos 5 días hábiles antes de la fecha límite de pago de cada cuota mensual, el ACREEDOR enviará al correo electrónico del cliente (según la información que entregó libremente en el punto primero del presente contrato) o al domicilio de este último a elección del ACREEDOR, el extracto      correspondiente a la información de la siguiente cuota a pagar.
                    El extracto de crédito contendrá al menos la siguiente información:
                    a.	El valor de la cuota mensual a pagar.
                    b.	La fecha límite de pago.
                    c.	El saldo total pendiente según lo pactado en el presente contrato.
                    Las partes reconocen y aceptan que los montos anteriormente señalados son vinculantes y concluyentes, salvo que se identifique un error manifiesto. La entrega se entenderá realizada con la remisión del correo respectivo, no será necesario un acuse de recibo por parte del cliente para este efecto. En todo caso, la falta de dicho cálculo y/o envío del respectivo correo, por parte del ACREEDOR al CLIENTE, no eximirá al CLIENTE de la obligación de pagar la respectiva cuota mensual.
                    <br>
                    <br>
                    <b>DECIMA PRIMERA:</b> Pagaré electrónico.  Con el fin de asegurar el cumplimiento del presente contrato, el CLIENTE ha firmado, a favor del ACREEDOR, el pagaré electrónico No. __________, el cual cuenta con espacios en blanco, los cuales serán rellenados de acuerdo con lo indicado en su carta de instrucciones.
                    El CLIENTE acepta comprender que el pagaré electrónico en blanco, por su misma naturaleza, será modificado posterior a su creación para llenar los espacios en blanco. El ACREEDOR usará los mecanismos tecnológicos a su disposición para garantizar la integridad del pagaré aún luego de llenar sus espacios en blanco, todo lo cual se dará según lo dispuesto en la carta de instrucciones de este.
                    <br>
                    <br>
                   <b> DECIMA SEGUNDA: Pago anticipado:</B> El CLIENTE tendrá derecho, en todo momento, de pagar anticipadamente el crédito, de forma total o parcial, sin que ello le conlleve ningún tipo de sanción, multa o penalidad y sin que se le puedan exigir intereses no causados. Todo pago anticipado se aplicará según el orden establecido en el punto noveno.
                   <br>
                    <b> DECIMA TERCERA: Cesión.</B>
                   <ol>
                    a.	Por parte del CLIENTE: Todo acto de cesión de los derechos derivados de este contrato o de la posición contractual del mismo por parte del CLIENTE, deberá contar con autorización escrita del ACREEDOR. 
                    b.	Por parte del ACREEDOR: El ACREEDOR podrá ceder a quién o a quienes desee, sin necesidad del consentimiento del CLIENTE, todo o parte de los beneficios, derechos, acciones y/o obligaciones que le corresponden bajo este contrato.
                   </ol>
                   <br>
                   <b>
                    DÉCIMA CUARTA:</b> Autorización Recolección Y Tratamiento De Datos Personales: En cumplimiento de las normas vigentes sobre protección de datos HABEAS DATA, autorizo la recolección y el tratamiento de los datos personales aquí descritos, con el fin de permitir que FUNDACION MULTICREDITO los incorpore en sus bases de datos, realice el estudio de la solicitud  de crédito registrada en el presente documento, y les de el tratamiento de futuros clientes y/o clientes de acuerdo a la Política de Tratamiento de la Información de la empresa de acuerdo a las siguientes finalidades del presente contrato:
                   <br>
                    <ol> a.	Consultar, reportar, actualizar y rectificar información ante las centrales de información y de riesgo.
                    b.	Gestionar y llevar a cabo labores de cobranza del crédito, ya sea directamente o a través de terceros.
                    c.	Gestionar el cumplimiento de obligaciones legales o contractuales.
                    d.	Gestionar el cumplimiento de las políticas internas del ACREEDOR, incluyendo sus políticas del tratamiento de datos personales.
                    e.	Transferir los datos personales a terceros, a discreción del ACREEDOR, así como a quien resulte titular de los derechos del crédito en caso de una cesión o a quien estos designen, para las finalidades establecidas en este contrato.
                    f.	Ofrecer al CLIENTE y promocionar a este productos nuevos y existentes.
                    g.	Realizar campañas de actualización de datos.
                    h.	Realizar estudios de seguridad, para la prevención de fraudes, lavado de activos y financiación del terrorismo.
                    i.	Realizar y organizar actividades promocionales.
                    j.	Proveer reportes de información a las autoridades competente.
                    
                   </ol><br>
                   En calidad de titular de los datos, declaro que conozco los derechos y deberes que me asisten en el tratamiento de datos personales tales como: conocer, acceder, rectificar, actualizar, suprimir y revocar la autorización, y los demás derechos consagrados en el artículo 8 de la Ley 1581 de 2012, salvo las excepciones consagradas en el artículo 10 ibidem, o demás preceptos legales y contractuales que faculten a FUNDACION MULTICREDITO a continuar con el tratamiento de mis datos personales.  Así mismo, que puedo consultar el aviso de privacidad y la política de tratamiento de la información en la página web www.fundacionmulticredito.com.
                    <br>
                    <b>DECIMA QUINTA:</b> Autorización Consulta A Centrales De Riesgo. En nuestra calidad de titulares de información, actuando libre y voluntariamente, autorizamos de manera expresa e irrevocable a FUNDACION MULTICREDITO, o a quien represente sus derechos, a: a) consultar, solicitar, suministrar, reportar, procesar y divulgar toda la información, que se refiera el comportamiento crediticio, financiero, comercial, de servicios de la misma naturaleza a las Centrales de Riesgo y de Entidades Financieras de Colombia, o a quien represente sus derechos. b) Reportar a las centrales de riesgo, datos tratados o sin tratar, así como datos sobre el cumplimiento o incumplimiento de sus obligaciones por concepto de la prestación del servicio o por cualquier otra obligación que haya adquirido con FUNDACION MULTICREDITO. c) Conocemos que el alcance de esta autorización implica que el comportamiento frente a nuestras obligaciones serán registradas con el objeto de suministrar información suficiente y adecuada al mercado sobre el estado de nuestras obligaciones financieras, comerciales, crediticias, de servicios y la proveniente de terceros países de la misma naturaleza. En consecuencia, quienes se encuentren afiliados y/o tengan acceso a la Central de Riesgo podrán conocer esta información, de conformidad con la legislación y jurisprudencia aplicable. La información podrá ser igualmente utilizada para efectos estadísticos. d) Nuestros derechos y obligaciones así como la permanencia de nuestra información en las bases de datos corresponden a lo determinado por el ordenamiento jurídico aplicable del cual, por ser de carácter público, estamos enterados. e) En caso de que, en el futuro, los autorizados en este documento efectúen, a favor de un tercero, una venta de cartera o una cesión a cualquier título de las obligaciones a nuestro cargo, los efectos de la presente autorización se extenderán a éste en los mismos términos y condiciones. f) Así mismo, autorizamos a la Central de Riesgo a que, en su calidad de operador, ponga nuestra información a disposición de otros operadores nacionales o extranjeros, en los términos que establece la ley, siempre y cuando su objeto sea similar al aquí establecido.”  PARAGRAFO: Reporte negativo a centrales de riesgo: En cumplimiento de lo dispuesto por el artículo 12 de la Ley 1266 de 2008, todo reporte negativo a centrales de riesgo, por parte del ACREEDOR, deberá estar precedido de una comunicación al CLIENTE con una antelación no menor a 20 días previos al reporte, a fin de que el CLIENTE pueda demostrar o efectuar el pago de la obligación, así como controvertir aspectos tales como el monto de la obligación o cuota y la fecha de exigibilidad.
                    <br>
                    <br>
                    <b>DECIMA SEXTA: </b>Autorización de envío de comunicaciones. El CLIENTE autoriza al ACREEDOR el envío de comunicaciones o realización de llamadas que tengan que ver con la finalidad de este contrato, ya sea para gestión de cobro, recordar fechas de pago o similares; a los canales de comunicación que constan en el punto primero de este contrato.
                    <br>
                    <br>
                    <b>DECIMA SEPTIMA:</b> Requerimientos prejudiciales: El CLIENTE manifiesta, desde ya, que renuncia a cualquier requerimiento legal o contractual, a notificaciones prejudiciales o de cualquier índole para hacer efectivo el cobro de las obligaciones aquí acordadas.
                    <br>
                    <br>
                    <b>DECIMA OCTAVA:</b> Declaración Prevención De Lavado De Activos Y Financiación Del Terrorismo (La/Ft) Y Lucha Contra La Corrupción: De manera voluntaria y dando certeza de que todo lo aquí consignado es cierto,  acepta acatar las disposiciones de FUNDACION MULTICREDITO en materia de prevención del lavado de activos y la financiación del terrorismo y la lucha contra la corrupción (manual de políticas para la prevención de LA/FT), al igual que las leyes aplicables en este materia. Así entonces, entiendo y declaro que: (i) La fuente de mis ingresos y patrimonio (o los de la persona natural o jurídica que represento) provienen de actividades legales, lícitas y están ligados al desarrollo normal de mis/sus actividades, y que, por lo tanto, los mismos no provienen de ninguna actividad ilícita prohibida o punible de acuerdo con la legislación colombiana, en especial la normatividad Penal o en cualquier norma que lo sustituya, adicione o modifique. (ii) Yo (o la persona natural o jurídica que represento) no he/ha efectuado transacciones u operaciones consistentes en o destinadas a la ejecución de actividades ilícitas de las contempladas en el Código Penal Colombiano o en cualquier norma que lo sustituya, adicione, o modifique, o a favor de personas que ejecuten o estén relacionadas con la ejecución de dichas actividades. (iii) Los bienes o recursos comprometidos para la ejecución del contrato o negocio jurídico acordado con FUNDACION MULTICREDITO. no provienen de ninguna actividad ilícita de acuerdo a lo contemplado en el Código Penal colombiano o en cualquier norma que lo modifique, adicione o sustituya. (iv) En la ejecución del contrato de cualquier otro vínculo comercial o jurídico que tenga con FUNDACION MULTICREDITO, cumpliré con mi obligación legal de no contratar ni tener vínculos de ningún tipo con terceros que realicen operaciones o cuyos recursos provengan de actividades ilícitas, de las contempladas en el Código Penal Colombiano o en cualquier norma que lo sustituya o adicione. (v) La entidad que represento cumple con las normas sobre prevención y control al lavado de activos y financiación del terrorismo (LA/FT) que le resulten aplicables (de ser el caso), teniendo implementadas las políticas, procedimientos y mecanismos de prevención y control al LA/FT que se derivan de dichas disposiciones legales. (vi) Con la firma del presente documento, se entiende que tanto yo como persona natural y como la persona jurídica que represento, otorgamos nuestro consentimiento informado, y por lo tanto autorizamos a FUNDACION MULTICREDITO a realizar verificaciones en listas públicas y las administradas por las siguientes autoridades: Policía, Procuraduría, Contraloría y/o Fiscalía con el propósito de dar cumplimiento a esta politica. Así mismo, autorizamos a FUNDACION MULTICREDITO a comunicar a las autoridades nacionales o de cualquiera de los países en los cuales realice operaciones, sobre cualquiera de las situaciones descritas en este documento, así como a suministrar a las autoridades competentes de dichos países, toda la información personal, pública, privada o semiprivada que sobre mí o sobre la persona natural o jurídica que represento, ellas requieran. Así mismo, para que FUNDACION MULTICREDITO efectúe los reportes a las autoridades competentes, que considere procedentes de conformidad con sus reglamentos y manuales relacionados con su sistema de prevención y/o administración del riesgo de lavado de activos y financiación del terrorismo, exonerándola de toda responsabilidad por tal hecho.
                    <br>
                    <br>
                  <b>  DECIMA NOVENA: </b> electrónica. Las partes acuerdan que los mecanismos o técnicas de identificación o autenticación electrónicas      usados      para la firma electrónica de este contrato, cumplen con los requisitos           dispuestos en la Ley 527 de 1999, el Decreto 1074 del 2015      y demás normas que los adicionen y/o modifiquen.
                <br>
                <br>
                
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