<?php 
//var_dump($decode);
//exit;
//todos los datos creados, actualizados y eliminados
$creados = 0;
        $actualizado = 0;
        $eliminado= 0;
        for ($i = 0; $i < count($decode);$i++){
            if($decode[$i]->actividad==='CREADO'){
                $creados++;
            }
            elseif($decode[$i]->actividad==='ACTUALIZADO'){
                $actualizado++;
            }
            elseif($decode[$i]->actividad==='ELIMINADO'){
                $eliminado++;
            }

        }
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
        <th>Actividad</th>
        <th>N° IP</th>
        <th>Sistema operativo</th>
        <th>Fecha de actividad</th>
        <th>Hora</th>
      </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < count($decode);$i++)
            <tr>
                <th scope="row">{{$decode[$i]->id}}</th>
                <td>{{$decode[$i]->actividad}}</td>
                <td align="center">{{$decode[$i]->ip}}</td>
                <td align="center">{{$decode[$i]->so}}</td>
                <td align="center">{{$decode[$i]->fecha}}</td>
                <td align="center">{{$decode[$i]->hora}}</td>
            </tr>
        @endfor
    </tbody>
    <br>
    <br>
    <tfoot style="margin-top: 20px;">
        <tr>
            <td colspan="4"></td>
            <td align="right">Creados</td>
            <td align="center">{{$creados}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right">Actualizados</td>
            <td align="center">{{$actualizado}}</td>
        </tr>

        <tr>
            <td colspan="4"></td>
            <td align="right">Eliminados</td>
            <td align="center">{{$eliminado}}</td>
        </tr>

        <tr>
            <td colspan="4"></td>
            <td align="right">Total</td>
            <td align="center" class="gray">{{$creados+$actualizado+$eliminado}}</td>
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