<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Salidas del inventario</title>
    <style>
        /* Reset - basado en salidas.css */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @page {
            margin: 10mm 12mm 15mm 12mm;
        }

        body {
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        main {
            width: 100%;
        }

        /* Header - basado en salidas.css */
        .header {
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
        }

        .tabla-logos {
            text-align: center;
            margin-bottom: 3px;
        }

        .tabla-logos table {
            width: 80%;
            margin: 0 auto;
            border: none;
        }

        .tabla-logos td {
            text-align: center;
            border: none;
            padding: 5px 20px;
            width: 50%;
        }

        .tabla-logos img {
            max-width: 180px;
            height: auto;
        }

        /* Corporación - basado en salidas.css */
        .corporacion {
            text-align: center;
            margin-bottom: 10px;
            margin-top: -40px;
        }

        .corporacion h1 {
            font-weight: bold;
            font-size: 18px;
            margin: 0 0 5px 0;
        }

        .corporacion h2 {
            font-weight: normal;
            font-size: 14px;
            margin: 0;
        }

        /* Solicitud */
        .solicitud {
            width: 100%;
            margin-top: 10px;
            text-align: center;
        }

        .titulo-documento {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            padding: 3px;
        }

        /* Información - basado en salidas.css */
        .informacion-s {
            width: 100%;
            margin-top: 8px;
            margin-bottom: 15px;
        }

        .informacion-s table {
            width: 90%;
            margin: 0 auto;
            border: none;
        }

        .informacion-s td {
            text-align: center;
            vertical-align: top;
            padding: 3px 10px;
            font-size: 12px;
            border: none;
        }

        .informacion-s .label {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
        }

        /* Tabla de productos - basado en salidas.css */
        .tabla-contenido {
            width: 100%;
            margin-bottom: 20px;
        }

        .tabla-productos {
            width: 85%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: center;
        }

        .tabla-productos thead {
            display: table-header-group;
        }

        .tabla-productos thead th {
            background-color: #AE2B2F;
            color: white;
            padding: 6px;
            border: 1px solid #888;
            font-weight: bold;
            font-size: 11px;
        }

        .tabla-productos tbody td {
            padding: 5px;
            border: 1px solid #888;
            text-align: center;
            vertical-align: middle;
            font-size: 10px;
        }

        .tabla-productos tr {
            page-break-inside: avoid;
        }

        /* Autorización - basado en salidas.css */
        .autorizacion {
            width: 100%;
            margin-top: 25px;
            page-break-inside: avoid;
        }

        .tabla-autorizacion {
            width: 85%;
            margin: 0 auto 8px auto;
            border-collapse: collapse;
            text-align: center;
            table-layout: fixed;
        }

        .tabla-autorizacion th {
            background-color: #AE2B2F;
            color: white;
            font-weight: bold;
            padding: 6px;
            /* border: 1px solid #888; */
            width: 50%;
            font-size: 11px;
        }

        .tabla-autorizacion td {
            height: 100px;
            vertical-align: bottom;
            padding: 8px;
            /* border: 1px solid #888; */
            width: 50%;
        }

        .firma-espacio {
            height: 50px;
            border-bottom: 1px solid black;
            margin: 0 auto 8px auto;
            width: 75%;
        }

        .nombre-firmante {
            /* font-weight: bold; */
            margin: 0;
            font-size: 10px;
            color: #454444;
        }

        .cargo-firmante {
            font-weight: bold;
            margin: 0;
            margin-top: 3px;
            font-size: 9px;
        }

        /* Saltos de página */
        .page-break {
            page-break-after: always;
        }

        .avoid-break {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <main>
        <!-- HEADER -->
        <div class="header">
            {{-- Logos --}}
            <div class="tabla-logos">
                <table>
                    <tr>
                        @php 
                            // Intentar múltiples rutas para compatibilidad con NativePHP
                            $possiblePaths = [
                                public_path('images/logo_oaxaca.png'),
                                base_path('public/images/logo_oaxaca.png'),
                                resource_path('images/logo_oaxaca.png'),
                            ];
                            
                            $logo1Data = null;
                            $logo1Mime = 'image/png';
                            
                            foreach ($possiblePaths as $path) {
                                if (file_exists($path) && is_readable($path)) {
                                    try {
                                        $logo1Data = base64_encode(file_get_contents($path));
                                        break;
                                    } catch (\Exception $e) {
                                        continue;
                                    }
                                }
                            }
                            
                            // Logo CORTV
                            $possiblePaths2 = [
                                public_path('images/logo_cortv.png'),
                                base_path('public/images/logo_cortv.png'),
                                resource_path('images/logo_cortv.png'),
                            ];
                            
                            $logo2Data = null;
                            $logo2Mime = 'image/png';
                            
                            foreach ($possiblePaths2 as $path) {
                                if (file_exists($path) && is_readable($path)) {
                                    try {
                                        $logo2Data = base64_encode(file_get_contents($path));
                                        break;
                                    } catch (\Exception $e) {
                                        continue;
                                    }
                                }
                            }
                        @endphp
                        <td>
                            @if($logo1Data)
                                <img src="data:{{ $logo1Mime }};base64,{{ $logo1Data }}" alt="Logo Oaxaca">
                            @endif
                        </td>
                        <td>
                            @if($logo2Data)
                                <img src="data:{{ $logo2Mime }};base64,{{ $logo2Data }}" alt="Logo CORTV">
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="corporacion">
                <h1>
                        ORDEN DE TRABAJO
                </h1>
            </div>
        </div>

        <!-- DATOS DEL DOCUMENTO -->
        <div class="solicitud">
            <div class="titulo-documento">
                {{ session('datos_registro.formato') }}
            {{-- </div>

                <div class="informacion-s">
                    <table>
                        <tr>
                            <td>
                                <span class="label">Área que solicita:</span>
                                <span>{{ session('datos_registro.area') }}</span>
                            </td>
                            <td>
                                <span class="label">Nombre:</span>
                                <span>{{ session('datos_registro.nombre') }}</span>
                            </td>
                            <td>
                                <span class="label">Fecha:</span>
                                <span>{{ date('d/m/Y') }}</span>
                            </td>
                            <td>
                                <span class="label">Categoría:</span>
                                <span>{{ session('datos_registro.categoria') }}</span>
                            </td>
                        </tr>
                    </table>
                </div>
        </div> --}}
        <!--Nombre del trabajador-->
            <b>NOMBRE:</b> 
            <i>{{strtoupper(session('ultima_orden.nombre'))}}</i>
        <br>
        <!--Cargo del trabajador-->
            <b>CARGO:</b>
            <i>{{strtoupper(session('ultima_orden.cargo'))}}</i>
        <br>
        <!--Modalidad de contrato-->
            <b>MODALIDAD DE CONTRATO:</b>
            
            <b class="sub">CONTRATO:</b>
            <i>{{session('ultima_orden.contrato') ? 'X' : ' '}}</i>

            <b class="sub">CONFIANZA:</b>
            <i >{{session('ultima_orden.contrato') ? ' ' : 'X'}}</i>
        <br>
            <b>AREA DE ADSCRIPCION:</b> 
                <b class="sub">CORTV:</b>
                <i>{{session('ultima_orden.area') === 'CORTV' ? 'X' : ' '}}</i>
                <b class="sub">TV:</b>
                <i>{{session('ultima_orden.area') === 'TV' ? 'X' : ' '}}</i>
                <b class="sub">RADIO:</b>
                <i>{{session('ultima_orden.area') === 'RADIO' ? 'X' : ' '}}</i>
        <br>
        <b>HORARIO HABITUAL:</b> 
            <i>{{ date('H:i', strtotime(session('ultima_orden.hora_inicio'))) }} - {{ date('H:i', strtotime(session('ultima_orden.hora_fin'))) }} hrs.</i>
        <br>
            <b>FECHA DE SOLICITUD:</b>
            <i>{{session('ultima_orden.fecha_solicitud')}}</i>
        <br>
            <b>FECHA DE LLAMADO:</b>
            <i>{{session('ultima_orden.fecha_llamado')}}</i>
        <br>
            <b>HORA DE LLAMADO:</b>
            <i>{{session('ultima_orden.hora_llamado')}} hrs.</i>
        <br>
            <b>LUGAR DE CITA:</b>
            <i>{{session('ultima_orden.lugar_cita')}}</i>
        <br>
            <b>LOCACIONES:</b>
            <i>{{session('ultima_orden.locacion')}}</i>
        <br>
            <b>ACTIVIDADES:</b>
            <i>{{session('ultima_orden.actividades')}}</i>
        <br>
            <b>NOMBRE DEL PROYECTO:</b>
            <i>{{session('ultima_orden.nombre_proyecto')}}</i>
        <br>
            <b>PRODUCTOR:</b>
            <i>{{session('ultima_orden.productor')}}</i>
        <br>
            <b>DIRECTOR:</b>
            <i>{{session('ultima_orden.director')}}</i>
        <br>
            <b>ASISTENTE:</b>
            <i>{{session('ultima_orden.asistente')}}</i>
        <br>
            <b>HORA DE CATERING:</b>
            <i>{{session('ultima_orden.hora_catering')}}</i>
        <br>
            <b>HORA DE REINICIO DE GRABACION:</b>
            <i>{{session('ultima_orden.hora_reinicio')}}</i>
        <br>
            <b>HORA DE ULTIMO TIRO:</b>
            <i>{{session('ultima_orden.hora_ultimo_tiro')}}</i>
        <br>
            <b>OBSERVACIONES:</b>
            <i>{{session('ultima_orden.observaciones')}}</i>
        <!-- SECCIÓN DE FIRMAS -->
        <div class="autorizacion avoid-break">
            <table class="tabla-autorizacion">

                <tbody>
                    <tr>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">{{ strtoupper(session('ultima_orden.nombre')) }}</p>
                            <p class="cargo-firmante"> 
                                <b>
                                    FIRMA DEL TRABAJADOR
                                </b>
                             </p>

                        </td>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">{{ strtoupper(session('ultima_orden.operaciones_nombre')) }}</p>
                            <p class="cargo-firmante">
                                <b>
                                    OPERACIONES
                                </b>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="tabla-autorizacion">
                <tbody>
                    <tr>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">{{ strtoupper(session('ultima_orden.productor')) }}</p>
                            <p class="cargo-firmante">
                                <b>
                                    PRODUCTOR
                                </b>
                            </p>
                        </td>
                        <td>
                            <div class="firma-espacio"></div>
                            <p class="nombre-firmante">LIC.  {{ strtoupper(session('ultima_orden.director')) }}</p>
                            <p class="cargo-firmante">
                                <b>
                                    Vo.Bo. DIRECTOR
                                </b>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>