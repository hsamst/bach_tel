<?php require_once("../sistemas.php");
require_once("./mdlGrap.php");
$datosTicketCels = $graficas->read();
$equiposRobo=$graficas->robos();
$equiposReposicion=$graficas->reposicion();
$equiposExtravio=$graficas->extravio();
$equiposNuevo=$graficas->nuevo();
$equiposDañoUs=$graficas->danoUs();
$equiposDañoEq=$graficas->danoEqui();
$DiademaNuevo=$graficas->nuevoDia();
$DiademaDaUs=$graficas->danoUsDia();
$DiademaDanEq=$graficas->danoEquiDia();
$DiademaRepo=$graficas->reposicionDia();
$DiademaRobo=$graficas->roboDia();

?>

<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/Proyecto_Tel_Bach/css/dasboard.css">
    <link rel="stylesheet" href="/Proyecto_Tel_Bach/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="/Proyecto_Tel_Bach/css/datatable.css"> -->

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <style>.wrapper {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 10px;
  grid-auto-rows: minmax(100px, auto);
}
.one {
  grid-column: 1 / 2;
  grid-row: 1;
  height: 300px;
}
.two {
  grid-column: 2 / 2;
  grid-row: 1 ;
  height: 300px;
}
.three {
  grid-column: 3/1;
  grid-row: 2 ;
  height: 500px;
  padding: 30px
}
.one2 {
  grid-column: 1 / 2;
  grid-row: 3;
  background-color:blue;
  height: 300px;
}
.two2 {
  grid-column: 2 / 2;
  grid-row: 3 ;
  background-color:green;
  height: 300px;
}
</style>

    <title>Dashboard Sidebar Menu</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],

            <?php echo"['Robo', ".$equiposRobo[0]['robo']."]," ?>
            <?php echo"['Reposicion', ".$equiposReposicion[0]['reposicion']."]," ?>
            <?php echo"['Extravio', ".$equiposExtravio[0]['extravio']."]," ?>
            <?php echo"['Nuevo', ".$equiposNuevo[0]['nuevo']."]," ?>
            <?php echo"['Daño Usuario', ".$equiposDañoUs[0]['Dano_Usuario']."]," ?>
            <?php echo"['Daño Equipo', ".$equiposDañoEq[0]['Dano_Equipo']."]" ?>
        ]);

        var options = {
            title: 'Recuento de equipos que fueron entregados especificados por el tipo de cambio',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
    </script>

    <!-- ----------------------grafica de barras ------------------------>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
            [ 'Nuevo', 'Nuevo', 'Dano Usuario', 'Daño Equipo', 'Reposicion', 'Robo'],
            <?php echo "[2,".$DiademaNuevo[0]['nuevo'].", ".$DiademaDaUs[0]['Dano_Usuario'].", ".$DiademaDanEq[0]['Dano_Equipo'].", ".$DiademaRepo[0]['reposicion'].",".$DiademaRobo[0]['robo']."]"?>
        ]);

        var options = {
            title: 'Recuento de diademas que fueron entregadas por el tipo de cambio',
            vAxis: {
                title: 'Entregas'
            },
            hAxis: {
                title: 'Tipos de cambio'
            },
            seriesType: 'bars',
            series: {
                5: {
                    type: 'line'
                }
            }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>

</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="/Proyecto_Tel_Bach/images/bachoco_logo.jpeg" alt="">
                </span>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="menu-links">
                        <i class="bi bi-phone-fill"></i>
                        <span class="text nav-text">Equipos</span>
                    </li>
                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/marca/ctrlMarca.php">
                            <i id="ico" class="bi bi-android2"></i>
                            <i id="ico" class="bi bi-apple"></i>
                            <span class="text nav-text">Marca</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/modelo/ctrlModelo.php">
                            <i id="ico" class="bi bi-tag"></i>
                            <span class="text nav-text">Modelo</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/telefono/ctrlTelefono.php">
                            <i id="ico" class="bi bi-phone"></i>
                            <span class="text nav-text">Celular</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/sim/ctrlSim.php">
                            <i id="ico" class="bi bi-sim"></i>
                            <span class="text nav-text">Sim</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/plan_datos/ctrlPlan.php">
                            <i id="ico" class="bi bi-file-bar-graph"></i>
                            <span class="text nav-text">Plan Datos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/cambios/ctrlCambio.php">
                            <i id="ico" class="bi bi-phone-flip"></i>
                            <span class="text nav-text">Cambios</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/ticket_cel/ctrlTicketCel.php">
                            <i id="ico" class="bi bi-ticket"></i>
                            <span class="text nav-text">Ticket Cel</span>
                        </a>
                    </li>

                    <li class="menu-links">
                        <i class="bi bi-headset"></i>
                        <span class="text nav-text">Diadema</span>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/diadema/ctrlDiadema.php">
                            <i id="ico" class="bi bi-headphones"></i>
                            <span class="text nav-text">Diadema</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/marca/ctrlMarca.php">
                            <i id="ico" class="bi bi-android2"></i>
                            <i id="ico" class="bi bi-apple"></i>
                            <span class="text nav-text">Marca</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/modelo/ctrlModelo.php">
                            <i id="ico" class="bi bi-tag"></i>
                            <span class="text nav-text">Modelo</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/ticket_diadema/ctrlTicketDiadema.php">
                            <i id="ico" class="bi bi-ticket"></i>
                            <span class="text nav-text">Ticket Diadema</span>
                        </a>
                    </li>
                    <li class="menu-links">
                        <i class="bi bi-people-fill"></i>
                        <span class="text nav-text">Personal</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/empleado/ctrlEmpleado.php">
                            <i id="ico" class="bi bi-people-fill"></i>
                            <span class="text nav-text">Empleados</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/usuariobach/ctrlUsuarioB.php">
                            <i id="ico" class="bi bi-person-badge"></i>
                            <span class="text nav-text">Usuario Adm</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/usubach_rol/crtlUsu_rol.php">
                            <i id="ico" class="bi bi-credit-card-2-front-fill"></i>
                            <span class="text nav-text">Asignacion Permisos</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/puesto/ctrlPuesto.php">
                            <i id="ico" class="bi bi-person-exclamation"></i>
                            <span class="text nav-text">Puesto</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/un/ctrlUn.php">
                            <i id="ico" class="bi bi-building-fill"></i>
                            <span class="text nav-text">Unidad Negocio</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/rol/ctrlRol.php">
                            <i id="ico" class="bi bi-arrow-left-right"></i>
                            <span class="text nav-text">Rol</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i id="ico" class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    <section class="page-content">

    <div class="wrapper">
  <div class="one"><div id="donutchart" style="width: 90%; height: 100%; margin-left:50px"></div></div>
  <div class="two"><div id="chart_div" style="width: 90%; height: 100%; margin-left:50px"></div></div>
  <div class="three"><div><table style = "height=500px;">
        <thead>
            <tr>
                <td>id_ticket_cel</td>
                <td>Fecha de entrega</td>
                <td>Descripcion</td>
                <td>No. empleado</td>
                <td>imei</td>
                <td>id_cambio</td>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosTicketCels as $key => $datosTicketCel):
            ?>

            <tr>
                <td><?php echo $datosTicketCel['id_ticket_cel'] ?></td>
                <td><?php echo $datosTicketCel['fecha_entrega'] ?></td>
                <td><?php echo $datosTicketCel['descripcion'] ?></td>
                <td><?php echo $datosTicketCel['empleado'] ?></td>
                <td><?php echo $datosTicketCel['imei'] ?></td>
                <td><?php echo $datosTicketCel['cambio'] ?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table></div></div>
</div>

        <!-- <div id="donutchart" style="width: 90%; height: 100%; margin-left:50px"></div>
        </br>
        <div id="chart_div" style="width: 90%; height: 100%; margin-left:50px"></div> -->
    </section>
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

    <!--Datatable plugin JS library file -->
    <script src="/Proyecto_Tel_Bach/js/script.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    </script>
    <script>
    /* Initialization of datatables */
    $(document).ready(function() {
        $('table.display').DataTable({
            language: {
                processing: "Tratamiento en curso...",
                search: "Buscar&nbsp;:",
                lengthMenu: "Agrupar de  _MENU_ items",
                info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                infoEmpty: "No existen datos",
                infoFiltered: "(Filtrado de _MAX_ elementos en total)",
                infoPostFix: "",
                loadingRecords: "Cargando...",
                zeroRecords: "No se econtraron resultados en tu busqueda",
                emptyTable: "No hay datos disponibles en la tabla",
                paginate: {
                    first: "Primero",
                    previous: "Anteriror",
                    next: "Next",
                    last: "Ultimo"
                },
                aria: {
                    sortAscending: ": Active para ordenar la columna en orden ascendente",
                    sortDescending: ": Active para ordenar la columna en orden descendente"
                }
            }
        });
    });
    </script>
    <script src="/EQUIPOSBACH/JS/das.js"></script>
    <!-- Script para las tablas con paginacion -->

</body>
</html>