<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Memorando {{ $memorando->id }}</title>
    <style>
        @page {
            margin: 1cm 2cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.5;
            color: #333;
            font-size: 12pt;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .header h1 {
            font-size: 14pt;
            margin: 0;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 13pt;
            margin: 5px 0;
        }

        .header p {
            font-size: 10pt;
            margin: 0;
            font-weight: bold;
        }

        .memo-title {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            margin: 30px 0;
            font-size: 13pt;
        }

        .data-table {
            width: 100%;
            margin-bottom: 30px;
        }

        .data-table td {
            vertical-align: top;
            padding: 5px 0;
        }

        .label {
            width: 80px;
            font-weight: bold;
        }

        .content {
            text-align: justify;
            margin-bottom: 50px;
        }

        .footer-sign {
            margin-top: 100px;
            text-align: center;
        }

        .sign-line {
            width: 250px;
            border-top: 1px solid #000;
            margin: 0 auto;
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

        .firma-wrapper {
            position: relative;
            height: 100px;
            /* Espacio reservado para la imagen de la firma */
        }

        .firma-wrapper img {
            max-height: 200px;
            /* Ajusta según el tamaño de tu PNG */
            width: auto;
            display: block;
            margin: 0 auto -20px auto;
            /* El -20px hace que la firma "pise" la línea */
        }

        .sign-line {
            border-top: 1px solid #000;
            width: 250px;
            margin: 0 auto;
        }

        .sign-name {
            font-weight: bold;
            font-size: 11pt;
            margin-top: 5px;
            text-transform: uppercase;
        }

        .sign-cargo {
            font-size: 9pt;
            display: block;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="row">
            <div class="col-sm-3">
                <img src="{{ public_path('assets/img/logoEscudo.png') }}">
            </div>
            <div class="col-sm-9">
                <h1>Instituto de Educación Superior Tecnológico Público</h1>
                <h2>“Manuel Seoane Corrales”</h2>
                <p>SAN JUAN DE LURIGANCHO</p>
            </div>
        </div>
    </div>

    <div class="memo-title">
        MEMORANDO N° {{ $memorando->id }} CCI/HACH/IESTP “MSC”- 2026
    </div>

    <table class="data-table">
        <tr>
            <td class="label">De</td>
            <td>:</td>
            <td><strong>: LIC. HENRY B. ARTEAGA CHAUCA
                </strong><br>
                <small> Coordinador Académico de Computación e Informática
                </small>
            </td>
        </tr>
        <tr>
            <td class="label">A</td>
            <td>:</td>
            <td><strong>{{ $memorando->profesor->name }}</strong><br>
                <small>Docente de Computación del IESTP “MSC”</small>
            </td>
        </tr>
        <tr>
            <td class="label">Asunto</td>
            <td>:</td>
            <td style="text-transform: uppercase;"><strong>{{ $memorando->asunto }}</strong></td>
        </tr>
        <tr>
            <td class="label">Fecha</td>
            <td>:</td>
            <td>San Juan de Lurigancho, {{ \Carbon\Carbon::parse($memorando->created_at)->translatedFormat('d \d\e F \d\e\l Y') }}</td>
        </tr>
    </table>

    <div class="content">
        <p>Por medio del presente me dirijo a Ud. para saludarle cordialmente y a la vez solicitarle supervisión de prácticas del egresado</p>

        <p style="margin-top: 20px;"><strong>MODULO {{ $memorando->modulo}}</strong></p>

        <p style="margin-top: 20px;">Agradezco de antemano su atención a la presente.</p>
        <p>Atentamente.</p>
    </div>

    <div class="footer-sign">
        <div class="firma-wrapper">
            <img src="{{ public_path('assets/img/firmaJefe.png') }}" alt="Firma">
        </div>
        <div class="sign-line"></div>
        <h4 class="">INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO</h4>
    </div>    
</body>

</html>