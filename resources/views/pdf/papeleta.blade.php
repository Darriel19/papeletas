<?php 
//var_dump($datos2);
//echo $datos2[0]['nombre'];
//var_dump($decode);
//exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Papeleta</title>

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
            width: 150px;
            height: 80px;
        }

        .page-break{
            page-break-after: always;
        }
    </style>

</head>
<body>
    <table width="50%" style="float: left;" border="solid">
        <tr>
            <td valign="top"> <img src="{{asset('img/logo.png')}}"/> </td>
            <td valign="middle">N° de papeleta: <p>{{$decode->num_papeleta}}</p> </td>
        </tr>

        <tr>
            <td valign="top">Número de tarjeta:  </td>
            <td valign="top">{{$decode->dni}}</td>
        </tr>

        <tr>
            <td valign="top">Nombre:  </td>
            <td valign="top">{{$datos2[0]['nombre']." ".$datos2[0]['apepater']." ".$datos2[0]['apemater']}}</td>
        </tr>
    
        <tr>
            <td valign="top">Cargo:  </td>
            <td valign="top">{{$datos2[0]['cargo']}}</td>
        </tr>

        <tr>
            <td valign="top">Motivo:  </td>
            <td valign="top">{{$decode->motivo}}</td>
        </tr>

        <tr>
            <td valign="top">Lugar:  </td>
            <td valign="top">{{$decode->lugar}}</td>
        </tr>

        <tr>
            <td valign="top">Hora salida: <p>{{$decode->hora_salida}}</p></td>
            <td valign="right">Hora llegada: <p>{{$decode->hora_llegada}}</p> </td>
        </tr>

        <tr>
            <td valign="top">Fecha de inicio: <p>{{$decode->fecha_ini}}</p></td>
            <td valign="right">Fecha fin: <p>{{$decode->fecha_fin}}</p> </td>
        </tr>

        <table width="185%" style="float: left;">
            <tr>
                <p align="center" style="margin-top: 75px;"> Interesado&nbsp;&nbsp;&nbsp;&nbsp;Jefe inmediato&nbsp;&nbsp;&nbsp;&nbsp;V°B°ORRHH </p>
            </tr>
        </table>
      </table>


      <table width="50%" style="float: left;" border="solid">
        <tr>
            <td valign="top"> <img src="{{asset('img/logo.png')}}"/> </td>
            <td valign="middle">N° de papeleta: <p>{{$decode->num_papeleta}}</p> </td>
        </tr>

        <tr>
            <td valign="top">Número de tarjeta:  </td>
            <td valign="top">{{$decode->dni}}</td>
        </tr>

        <tr>
            <td valign="top">Nombre:  </td>
            <td valign="top">{{$datos2[0]['nombre']." ".$datos2[0]['apepater']." ".$datos2[0]['apemater']}}</td>
        </tr>
    
        <tr>
            <td valign="top">Cargo:  </td>
            <td valign="top">{{$datos2[0]['cargo']}}</td>
        </tr>

        <tr>
            <td valign="top">Dependencia:  </td>
            <td valign="top">{{$decode->dependencia}}</td>
        </tr>

        <tr>
            <td valign="top">Lugar:  </td>
            <td valign="top">{{$decode->lugar}}</td>
        </tr>

        <tr>
            <td valign="top">Puno: </td>
            <td valign="top">{{$decode->fecha_ini}}</td>
        </tr>

        <table width="185%" style="float: left;" >
            <tr>
                <p align="center" style="margin-top: 75px;">Firma y sello (Lugar 1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma  y sello (Lugar 2)</p>
                <p align="center" style="margin-top: 80px;">Firma y sello (Lugar 3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma  y sello (Lugar 4)</p>
            </tr>
        </table>

      </table>

      
</body>
</html>