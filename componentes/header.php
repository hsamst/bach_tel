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

    <title>Dashboard Sidebar Menu</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="/Proyecto_Tel_Bach/js/grafica.js"></script>
    <script type="text/javascript" src="/Proyecto_Tel_Bach/js/graficaA.js"></script>

</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Codinglab</span>
                    <span class="profession">Web developer</span>
                </div>
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
                        <i class="bi bi-phone"></i>
                        <span class="text nav-text">Equipos</span>
                    </li>
                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/marca/ctrlMarca.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Marca</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/modelo/ctrlModelo.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Modelo</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/telefono/ctrlTelefono.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Celular</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/sim/ctrlSim.php">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Sim</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/plan_datos/ctrlPlan.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Plan Datos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/cambios/ctrlCambio.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Cambios</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/ticket_cel/ctrlTicketCel.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Ticket Cel</span>
                        </a>
                    </li>

                    <li class="menu-links">
                    <i class="bi bi-headset"></i>
                        <span class="text nav-text">Diadema</span>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/diadema/ctrlDiadema.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Diadema</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/marca/ctrlMarca.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Marca</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/modelo/ctrlModelo.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Modelo</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/ticket_diadema/ctrlTicketDiadema.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Ticket Diadema</span>
                        </a>
                    </li>

                    <a href="#">
                    <i class="bi bi-people-fill"></i>
                            <span class="text nav-text">Usuarios</span>
                        </a>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Usuario Trabajador</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/usuariobach/ctrlUsuarioB.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Usuario Bach</span>
                        </a>
                    </li>


                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/puesto/ctrlPuesto.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Puesto</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/un/ctrlUn.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Unidad Negocio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="/Proyecto_Tel_Bach/panel/views/rol/ctrlRol.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Rol</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Asignacion Permisos</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
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