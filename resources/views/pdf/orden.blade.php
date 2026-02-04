<style>
:root {
    --font-size: 14px;
}
img.logo{
        width: 200px;
}
img.membrete_v{

}
body {
    font-family: Arial, sans-serif;
    margin: 40px;

    h1 {
        text-align: right;
        font-size: 16px;
        margin-bottom: 20px;
    }
    b {
        font-size: var(--font-size);
        font-weight: bold;
    }
    b.sub {
        font-size: var(--font-size);
        font-weight: 500;
        margin-right: 5px;
    }
    i
    {
        font-size: var(--font-size);
        color: grey;
        text-decoration: underline;
        font-style: italic;
    }
    tr.firma{
        td{
            padding-top: 60px;
            color: grey;
            text-align: center;
            font-size: var(--font-size);
            border-bottom: 1px solid black;
            padding: 0px 10px;
        }
    }
    tr.cargo{
        td{
            padding-top: 60px;
            text-align: center;
            font-size: var(--font-size);
            padding: 5px 10px;
        }
    }
}



</style>
<div>
    <body>
        <img class="logo" src="https://www.oaxaca.gob.mx/comunicacion/wp-content/uploads/sites/28/2023/04/LOGOTIPO-CORTV.jpeg" alt="LOGOTIPO-CORTV">
        <h1>ORDEN DE TRABAJO</h1>
        
        <br>
        <!--Nombre del trabajador-->
            <b>NOMBRE:</b> 
            <i>{{$nombre}}</i>
        <br>
        <!--Cargo del trabajador-->
            <b>CARGO:</b>
            <i>{{$cargo}}</i>
        <br>
        <!--Modalidad de contrato-->
            <b>MODALIDAD DE CONTRATO:</b>
            
            <b class="sub">CONTRATO:</b>
            <i>{{$contrato ? 'X' : ' '}}</i>

            <b class="sub">CONFIANZA:</b>
            <i >{{$contrato ? ' ' : 'X'}}</i>
        <br>
        <!--Area de adscripcion-->
            <b>AREA DE ADSCRIPCION:</b> 
            <b class="sub">CORTV:</b>
            <i>{{$area === 'CORTV' ? 'X' : ' '}}</i>
            <b class="sub">TV:</b>
            <i>{{$area === 'TV' ? 'X' : ' '}}</i>
            <b class="sub">RADIO:</b>
            <i>{{$area === 'RADIO' ? 'X' : ' '}}</i>
        <br>
            <b>HORARIO HABITUAL:</b> 
            <i>{{$hora_inicio}} - {{$hora_fin}}</i>
        <br>
            <b>FECHA DE SOLICITUD:</b>
            <i>{{$fecha_solicitud}}</i>
        <br>
            <b>FECHA DE LLAMADO:</b>
            <i>{{$fecha_llamado}}</i>
        <br>
            <b>HORA DE LLAMADO:</b>
            <i>{{$hora_llamado}}</i>
        <br>
            <b>LUGAR DE CITA:</b>
            <i>{{$lugar_cita}}</i>
        <br>
            <b>LOCACIONES:</b>
            <i>{{$locacion}}</i>
        <br>
            <b>ACTIVIDADES:</b>
            <i>{{$actividades}}</i>
        <br>
            <b>NOMBRE DEL PROYECTO:</b>
            <i>{{$nombre_proyecto}}</i>
        <br>
            <b>PRODUCTOR:</b>
            <i>{{$productor}}</i>
        <br>
            <b>DIRECTOR:</b>
            <i>{{$director}}</i>
        <br>
            <b>ASISTENTE:</b>
            <i>{{$asistente}}</i>
        <br>
            <b>HORA DE CATERING:</b>
            <i>{{$hora_catering}}</i>
        <br>
            <b>HORA DE REINICIO DE GRABACION:</b>
            <i>{{$hora_reinicio}}</i>
        <br>
            <b>HORA DE ULTIMO TIRO:</b>
            <i>{{$hora_ultimo_tiro}}</i>
        <br>
            <b>OBSERVACIONES:</b>
            <i>{{$observaciones}}</i>
        <table>
            <tr class="firma">
                <td>
                    {{$nombre}}
                </td>
                
                <td>
                    ING. {{$operaciones_nombre}}
                </td>
            </tr>
            <tr class="cargo">
                <td>
                    FIRMA DEL TRABAJADOR
                </td>
                <td>
                    OPERACIONES
                </td>
            </tr>

            <tr class="firma">
                <td >
                    {{$productor}}
                </td>
                
                <td>
                    LIC. {{$director}}
                </td>
            </tr>
            <tr class="cargo">
                <td>
                    PRODUCTOR
                </td>
                <td>
                    Vo.Bo. DIRECTOR
                </td>
            </tr>
            
        </table>
    </body>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
</div>
