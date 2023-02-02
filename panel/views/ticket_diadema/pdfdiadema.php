<?php
    $pdfHTML='<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <style>
            h1{text-align: center;}
            table{
                border: 1;
            }
        </style>
</head>
<body>
    <h1>Carta Resguardo</h1>
    <p>Recibí el siguiente equipo auditivo que me fue asignado para el desempeño de mi trabajo, el cual queda bajo mi cuidado y custodia a partir de esta fecha.</p>
    <b>Datos del equipo:</b>
    <p>
    <table style="border: 2px solid black; border-collapse: collapse" border="2" width="100%">
        <tbody>
            <tr>
                <td><b>Tipo de equipo</b></td>
                <td>Auditivo</td>
            </tr>
            <tr>
                <td><b>Marca</b></td>
                <td>'.$datosResDia['marca'].'</td>
            </tr>
            <tr>
                <td><b>Modelo</b></td>
                <td>'.$datosResDia['modelo'].'</td>
            </tr>
            <tr>
                <td><b>Id</b></td>
                <td>'.$datosResDia['id_diadema'].'</td>
            </tr>
        </tbody>
    </table>
    </p>
    <br />
    <b>Datos del usuario responsable del Equipo:</b>
    <p>
    <table style="border: 2px solid black; border-collapse: collapse" border="1" width="100%">
        <tbody>
            <tr>
                <td><b>Nombre</b></td>
                <td>'.$datosResDia['nombre'].'</td>
            </tr>
            <tr>
                <td><b>Puesto</b></td>
                <td>'.$datosResDia['puesto'].'</td>
            </tr>
            <tr>
                <td><b>No. Empleado</b></td>
                <td>'.$datosResDia['no_empleado'].'</td>
            </tr>
            <tr>
                <td><b>UN</b></td>
                <td>'.$datosResDia['un'].'</td>
            </tr>
        </tbody>
    </table>
    </p>
    <br />
    <p>Estoy enterado de que el equipo y servicio que se me entrega es para uso exclusivo de la compañía por lo que no está permitido hacer uso de servicios de audio, video o cualquier otra aplicación de contenido no productivo o no laboral, independientemente de su formato. Está prohibido participar en juegos o promociones vía electrónica ajenas a la operación del negocio así como contratar servicios adicionales o descarga de tonos o música (ringtones) con cargo a la cuenta o factura del teléfono.
    En caso de excedentes o uso de servicios no permitidos, extravío o mal uso del equipo, autorizo a la Empresa a la cual pertenezco, proceder a descontar el importe total del excedente y/o reposición del equipo vía nomina en una sola exhibición. 
    </p>
    <br /><br />
    <table style= width="100%"; cellpadding="15";>
        <tbody>  
            <tr>
            <td align="center">__________________________ Firma del usuario</td>
            <td align="center">__________________________ Firma del jefe inmediato</td>
            <td align="center">__________________________ Firma del supervisor TI</td>
            </tr>
        </tbody>
    </table>
    </p>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>
</html>
    ';
    return $pdfHTML;
?>