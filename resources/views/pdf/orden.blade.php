<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Orden de trabajo</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @page {
            margin: 10mm 12mm 15mm 12mm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        /* Layout principal con tabla (compatibilidad DomPDF) */
        .main-table {
            width: 80%;
            border-collapse: collapse;
        }

        .aside {
            width: 14%;
            vertical-align: middle;
            text-align: center;
        }

        .aside img {
            max-height: 100%;
            width: auto;
        }

        .contenido {
            width: 95%;
            vertical-align: top;
            padding-left: 20px;
        }

        /* Header */
        .header-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: middle;
        }

        .header-table h1 {
            font-size: 22px;
            color: #AE2B2F;
            text-align: right;
            padding-right: 50px;
        }

        .logo img {
            width: 150px;
        }

        /* Contenido de la orden */
        .contenido-orden {
            padding: 0px 50px;
            width: 100%;
            margin-top: 20px;
        }

        .datos-trabajador {
            width: 100%;
            margin-top: 20px;
        }

        /* Campos con subrayado (nombre, cargo, etc.) */
        .data-nombre-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .data-nombre-table td {
            vertical-align: bottom;
            padding: 2px 0;
        }

        .data-nombre-table .label-cell {
            white-space: nowrap;
            width: 1%;
            padding-right: 10px;
        }

        .data-nombre-table .value-cell {
            border-bottom: 1px solid #000000;
            width: 99%;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }

        .bordex {
            border-bottom: 1px solid #000000;
            width: 100%;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
        }

        /* Modalidad contrato y área */
        .sin_subrayado_completo {
            margin-top: 10px;
        }

        .contrato {
            margin-bottom: 5px;
        }

        .contrato span {
            margin-right: 10px;
        }

        .area-horario-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .area-horario-table td {
            vertical-align: middle;
            padding: 2px 0;
        }

        .area-cell span {
            margin-right: 8px;
        }

        /* Campos paralelos (fecha, hora, etc.) */
        .paralelo-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .paralelo-table td {
            width: 50%;
            vertical-align: top;
            padding: 4px 0;
        }

        .paralelo-table u {
            margin-left: 4px;
        }

        /* Horas (primer tiro, catering, etc.) */
        .div25 {
            margin-top: 20px;
        }

        /* Observaciones */
        .observaciones {
            width: 100%;
            margin-top: 20px;
        }

        /* Sección de firmas */
        .autorizacion {
            width: 100%;
            margin-top: 10px;
            
        }

        .tabla-autorizacion {
            width: 100%;
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
            width: 50%;
            font-size: 11px;
        }

        .tabla-autorizacion td {
            height: 100px;
            vertical-align: bottom;
            padding: 8px;
            width: 50%;
        }

        .firma-espacio {
            height: 50px;
            border-bottom: 1px solid black;
            margin: 0 auto 8px auto;
            width: 75%;
        }

        .nombre-firmante {
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
    </style>
</head>

<body>
    @php
        // --- Carga de imágenes en base64 para compatibilidad con DomPDF / NativePHP ---

        // Membrete lateral
        $membretePaths = [
            public_path('images/Membrete.png'),
            base_path('public/images/Membrete.png'),
            resource_path('images/Membrete.png'),
        ];
        $membreteData = null;
        $membreteMime = 'image/png';
        foreach ($membretePaths as $path) {
            if (file_exists($path) && is_readable($path)) {
                try { $membreteData = base64_encode(file_get_contents($path)); break; } catch (\Exception $e) { continue; }
            }
        }

        // Logo CORTV
        $logoPaths = [
            public_path('images/logo_cortv.png'),
            base_path('public/images/logo_cortv.png'),
            resource_path('images/logo_cortv.png'),
        ];
        $logoData = null;
        $logoMime = 'image/png';
        foreach ($logoPaths as $path) {
            if (file_exists($path) && is_readable($path)) {
                try { $logoData = base64_encode(file_get_contents($path)); break; } catch (\Exception $e) { continue; }
            }
        }
    @endphp

    <main>
        {{-- Layout principal: aside (membrete) + contenido --}}
        <table class="main-table">
            <tr>
                {{-- ASIDE: Membrete lateral --}}
                <td class="aside">
                    @if($membreteData)
                        <img src="data:{{ $membreteMime }};base64,{{ $membreteData }}" alt="Membrete del formato">
                    @endif
                </td>

                {{-- CONTENIDO PRINCIPAL --}}
                <td class="contenido">

                    {{-- HEADER: Logo + Título --}}
                    <table class="header-table">
                        <tr>
                            <td class="logo">
                                @if($logoData)
                                    <img src="data:{{ $logoMime }};base64,{{ $logoData }}" alt="Logo CORTV">
                                @endif
                            </td>
                            <td>
                                <h1>ORDEN DE TRABAJO</h1>
                            </td>
                        </tr>
                    </table>

                    {{-- CONTENIDO DE LA ORDEN --}}
                    <div class="contenido-orden">
                        <div class="datos-trabajador">

                            {{-- Nombre --}}
                            <table class="data-nombre-table">
                                <tr>
                                    <td class="label-cell"><b>Nombre:</b></td>
                                    <td class="value-cell">{{ strtoupper(session('ultima_orden.nombre')) }}</td>
                                </tr>
                            </table>

                            {{-- Cargo --}}
                            <table class="data-nombre-table">
                                <tr>
                                    <td class="label-cell"><b>Cargo:</b></td>
                                    <td class="value-cell">{{ strtoupper(session('ultima_orden.cargo')) }}</td>
                                </tr>
                            </table>

                            {{-- Modalidad del contrato --}}
                            <div class="sin_subrayado_completo">
                                <div class="contrato">
                                    <span><b>Modalidad del contrato:</b></span>
                                    <span>Contrato:</span>
                                    <span><u>{{ session('ultima_orden.contrato') ? ' X ' : '____' }}</u></span>
                                    <span>Confianza:</span>
                                    <span><u>{{ session('ultima_orden.contrato') ? '____' : ' X ' }}</u></span>
                                </div>

                                {{-- Área de adscripción + Horario habitual --}}
                                <table class="area-horario-table">
                                    <tr>
                                        <td class="area-cell">
                                            <span><b>Área de adscripción:</b></span>
                                            <span>CORTV</span> <span><u>{{ session('ultima_orden.area') === 'CORTV' ? ' X ' : '___' }}</u></span>
                                            <span> TV</span> <span><u>{{ session('ultima_orden.area') === 'TV' ? ' X ' : '___' }}</u></span>
                                            <span>Radio</span> <span><u>{{ session('ultima_orden.area') === 'RADIO' ? ' X ' : '___' }}</u></span>
                                        </td>
                                        <td style="text-align: right;">
                                            <span><b>Horario Habitual:</b></span>
                                            <span><u> 
                                                {{session('ultima_orden.horario_habitual') }}
                                            </u></span>
                                        </td>
                                    </tr>
                                </table>

                                {{-- Fecha de solicitud / Fecha de llamado --}}
                                <table class="paralelo-table">
                                    <tr>
                                        <td>
                                            <span><b>Fecha de solicitud:</b></span>
                                            <span><u> {{ session('ultima_orden.fecha_solicitud') }} </u></span>
                                        </td>
                                        <td style="text-align: right;">
                                            <span><b>Fecha de llamado:</b></span>
                                            <span><u> {{ session('ultima_orden.fecha_llamado') }} </u></span>
                                        </td>
                                    </tr>
                                </table>

                                {{-- Hora de llamado / Lugar de cita --}}
                                <table class="paralelo-table">
                                    <tr>
                                        <td>
                                            <span><b>Hora de llamado:</b></span>
                                            <span><u> {{ session('ultima_orden.hora_llamado') }}  </u></span>
                                        </td>
                                        <td style="text-align: right;">
                                            <span><b>Lugar de cita:</b></span>
                                            <span><u> {{ session('ultima_orden.lugar_cita') }} </u></span>
                                        </td>
                                    </tr>
                                </table>

                                {{-- Locaciones --}}
                                <table class="data-nombre-table" style="margin-top: 10px;">
                                    <tr>
                                        <td class="label-cell"><b>Locaciones:</b></td>
                                        <td class="value-cell">{{ session('ultima_orden.locacion') }}</td>
                                    </tr>
                                </table>

                                {{-- Actividades --}}
                                <table class="data-nombre-table">
                                    <tr>
                                        <td class="label-cell"><b>Actividades:</b></td>
                                        <td class="value-cell">{{ session('ultima_orden.actividades') }}</td>
                                    </tr>
                                </table>

                                {{-- Nombre del proyecto --}}
                                <table class="data-nombre-table">
                                    <tr>
                                        <td class="label-cell"><b>Nombre del proyecto:</b></td>
                                        <td class="value-cell">{{ session('ultima_orden.nombre_proyecto') }}</td>
                                    </tr>
                                </table>

                                {{-- Productor --}}
                                <table class="data-nombre-table">
                                    <tr>
                                        <td class="label-cell"><b>Productor:</b></td>
                                        <td class="value-cell">{{ session('ultima_orden.productor') }}</td>
                                    </tr>
                                </table>

                                {{-- Director --}}
                                <table class="data-nombre-table">
                                    <tr>
                                        <td class="label-cell"><b>Director:</b></td>
                                        <td class="value-cell"></td>
                                    </tr>
                                </table>

                                {{-- Asistente --}}
                                <table class="data-nombre-table">
                                    <tr>
                                        <td class="label-cell"><b>Asistente:</b></td>
                                        <td class="value-cell"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        {{-- Horas: primer tiro, catering, reinicio, último tiro --}}
                        <div class="div25">
                            <table class="paralelo-table">
                                <tr>
                                    <td>
                                        <span><b>Hora del primer tiro:</b></span>
                                        <span><u> {{ session('ultima_orden.hora_primer_tiro')  }}  </u></span>
                                    </td>
                                    <td>
                                        <span><b>Hora del catering:</b></span>
                                        <span><u> {{ session('ultima_orden.hora_catering') }}  </u></span>
                                    </td>
                                </tr>
                            </table>

                            <table class="paralelo-table">
                                <tr>
                                    <td>
                                        <span><b>Hora de reinicio de grabación:</b></span>
                                        <span><u> {{ session('ultima_orden.hora_reinicio') }}  </u></span>
                                    </td>
                                    <td>
                                        <span><b>Hora del último tiro:</b></span>
                                        <span><u> {{ session('ultima_orden.hora_ultimo_tiro') }}  </u></span>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        {{-- Observaciones --}}
                        <div class="observaciones">
                            <table class="data-nombre-table">
                                <tr>
                                    <td class="label-cell"><b>Observaciones:</b></td>
                                    <td class="value-cell">{{ session('ultima_orden.observaciones') }}</td>
                                </tr>
                            </table>
                        </div>

                        {{-- SECCIÓN DE FIRMAS --}}
                        <div class="autorizacion">
                            <table class="tabla-autorizacion">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="firma-espacio"></div>
                                            <p class="nombre-firmante">{{ strtoupper(session('ultima_orden.nombre')) }}</p>
                                            <p class="cargo-firmante">
                                                <b>FIRMA DEL TRABAJADOR</b>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="firma-espacio"></div>
                                            <p class="nombre-firmante">{{ strtoupper(session('ultima_orden.operaciones_nombre')) }}</p>
                                            <p class="cargo-firmante">
                                                <b>OPERACIONES</b>
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
                                                <b>PRODUCTOR</b>
                                            </p>
                                        </td>
                                        <td>
                                            <div class="firma-espacio"></div>
                                            <p class="nombre-firmante">{{ strtoupper(session('ultima_orden.director')) }}</p>
                                            <p class="cargo-firmante">
                                                <b>Vo.Bo. DIRECTOR</b>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div> {{-- .contenido-orden --}}
                </td> {{-- .contenido --}}
            </tr>
        </table> {{-- .main-table --}}
    </main>
</body>

</html>