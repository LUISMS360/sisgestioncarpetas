<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acta de Prácticas - {{ $carpeta->fut->documento_identidad }}</title>
    <style>
        @page {
            margin: 1cm 2cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 13px;
            line-height: 1.6;
            color: #000;
        }

        .header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            font-size: 25px;
        }

        .module-name {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            padding: 0 20px;
        }

        .content {
            text-align: justify;
            margin-bottom: 25px;
        }

        .table-grades {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        .table-grades th,
        .table-grades td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        .table-grades th {
            background-color: #f2f2f2;
            font-size: 11px;
        }

        .final-score {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .final-score td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }

        .footer-info {
            text-align: justify;
            margin-top: 20px;
        }

        .date-location {
            text-align: right;
            margin-top: 40px;
        }

        .signature-space {
            margin-top: 80px;
            width: 100%;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 250px;
            margin: 0 auto;
            text-align: center;
            padding-top: 5px;
        }
        .footer-sign {
            margin-top: 20px;
            /* Espacio antes de la firma */
            text-align: center;
            width: 300px;
            /* Ancho del bloque de firma */
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <<div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ public_path('assets/img/header.png') }}" style="width: 100%; max-width: 700px; height: auto;">
        </div>

        <div class="module-name">
            @if($carpeta->modulo == 'I')
            MODULO I: GESTIÓN DE SOPORTE TÉCNICO, SEGURIDAD Y TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN
            @elseif($carpeta->modulo == 'II')
            MODULO II: DESARROLLO DE SOFTWARE Y GESTIÓN DE BASE DE DATOS
            @elseif($carpeta->modulo == 'III')
            MODULO III: GESTIÓN DE APLICACIONES PARA INTERNET Y PRODUCCIÓN MULTIMEDIA
            @endif
        </div>

        <div class="content">
            En San Juan de Lurigancho, <strong> {{ now()->day }} de {{ now()->translatedFormat('F') }} del {{ now()->year }} </strong>, a horas: 09:00 a.m.; el Coordinador del Área de Computación e Informática, Lic. HENRY BERNARDO ARTEAGA CHAUCA, luego de examinar el expediente de supervisión N.º 2182 - 2025 del estudiante:
        </div>

        <div class="content" style="text-align: center; font-size: 15px;">
            <strong>{{ strtoupper($carpeta->fut->datos_del_solicitante) }}</strong> identificado con DNI N.º <strong>{{ $carpeta->fut->documento_identidad }}</strong> perteneciente a la carrera profesional de Computación e Informática, conforme a las normas legales vigentes dictamino lo siguiente:
        </div>

        <table class="table-grades">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>EVALUACIÓN</th>
                    <th>NOTAS EN NÚMERO</th>
                    <th>NOTAS EN LETRAS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>EVALUACION DEL IESTP<br>“MANUEL SEOANE CORRALES”</td>
                    <td>{{$carpeta->nota}}</td>
                    <td>{{$carpeta->nota_letra}}</td>
                </tr>
            </tbody>
        </table>

        <table class="final-score">
            <tr>
                <td rowspan="2" style="width: 50%; vertical-align: middle;">NOTA FINAL DE PRÁCTICAS PRE-PROFESIONALES</td>
                <td style="background-color: #f2f2f2;">EN NÚMEROS</td>
                <td style="background-color: #f2f2f2;">EN LETRAS</td>
            </tr>
            <tr>
                <td>{{$carpeta->nota}}</td>
                <td>{{$carpeta->nota_letra}}</td>
            </tr>
        </table>

        <div class="footer-info">
            Es cuanto consta en los Documentos oficiales del Archivo de Practicas Pre-Profesionales, habiendo realizado <strong>300 horas</strong> de Prácticas, con fecha <strong>{{ $carpeta->fecha_inicio }}</strong> al <strong>{{ $carpeta->fecha_fin }}</strong> en el <strong>{{$carpeta->lugar}}</strong>
        </div>

        <div class="date-location">
            San Juan de Lurigancho, {{ date('d') }} de {{ \Carbon\Carbon::now()->monthName }} del {{ date('Y') }}
        </div>

        <div class="footer-sign">
            <div class="firma-wrapper">
                <img src="{{ public_path('assets/img/firmaJefe.png') }}" alt="Firma">
            </div>
            <div class="sign-line"></div>
        </div>

</body>

</html>