<?php 
//var_dump($decode);
//exit;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Report</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table{
            font-size: x-small;
        }

        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        img{
            width: 200px;
            height: 100px;
        }

        .page-break{
            page-break-after: always;
        }
    </style>
</head>
<body>

<!--Encabezado-->
<table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('img/logo.png')}}"/></td>
        <td align="right">
            <h3>Direccion Regional de Educación - Puno</h3>
            <pre>
                Jr. Bustamante Dueñas 881 - Urb II Etapa Chanu Chanu - Puno
                yachay@drepuno.gob.pe
                +51 201418 - 357005
            </pre>
        </td>
    </tr>

</table>

<table width="100%">
    <tr>
        <td><strong>Oficina:</strong> Área de informática</td>
        <td><strong>Piso:</strong> 5to - DRE Puno</td>
    </tr>

<!--Fin de Encabezado-->

</table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Numero de papeleta</th>
        <th>Dni</th>
        <th>Dependencia</th>
        <th>Motivo</th>
        <th>Lugar de visita</th>
        <th>Hora</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < count($decode);$i++)
            <tr>
                <th scope="row">{{$decode[$i]->id}}</th>
                <td align="center">{{$decode[$i]->num_papeleta}}</td>
                <td align="center">{{$decode[$i]->dni}}</td>
                <td align="center">{{$decode[$i]->dependencia}}</td>
                <td align="center">{{$decode[$i]->motivo}}</td>
                <td align="center">{{$decode[$i]->lugar}}</td>
                <td align="center">{{$decode[$i]->hora_salida.' a '.$decode[$i]->hora_llegada}}</td>
                <td align="center">{{$decode[$i]->fecha_ini.' a '.$decode[$i]->fecha_fin}}</td>
            </tr>
        @endfor
    </tbody>
    <br>
    <br>
    <tfoot>
        <tr>
            <td colspan="6"></td>
            <td align="right">Total de Registros</td>
            <?php
            $total = count($decode)
            ?>
            <td align="center" class="gray">{{$total}}</td>
        </tr>
    </tfoot>

    <div class="page-break"></div>

  </table>

  <script type="text/php">
    if (isset($pdf)) {
        $x = 270;
        $y = 815;
        $text = "Pág. {PAGE_NUM} de {PAGE_COUNT}";
        $font = $fontMetrics->get_font("Arial,Helvetiva,sans-serif","normal");
        $size = 9;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
  </script>

</body>
</html>