<?php
session_start();

$usuarioAutenticado = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $usuarioAutenticado = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/bh-favicon.ico"/>
    <link rel="stylesheet" href="../css/estilo-movil.css">
    <link rel="stylesheet" href="../css/estilo-tablet.css">
    <link rel="stylesheet" href="../css/estilo-pc.css">

    <title>Block House - Best Steaks since 1968</title>
</head>
<body>
<nav class="nav">

<div class="nav__container">

    <a href="../index.php"><img class="nav__title" src="../assets/logonavbar.png" alt=""></a>

    <a href="#menu" class="nav__menu">
        <img src="../assets/menu-icon.svg" class="nav__icon">
    </a>

    <a href="#" class="nav__menu nav__menu--second">
        <img src="../assets/close.svg" class="nav__icon ">
    </a>

    <ul class="dropdown" id="menu">

        <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <span class="dropdown__span"><B>RESTAURANTES Y HORARIOS</B></span>
                <img src="../assets/down.svg" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">
                    <li class="dropdown__li"><a href="Restaurantes/malaga-larios.html" class="dropdown__anchor">Málaga Larios</a></li>
                    <li class="dropdown__li"><a href="Restaurantes/malaga-plaza-mayor.html" class="dropdown__anchor">Málaga Plaza Mayor</a></li>
                    <li class="dropdown__li"><a href="Restaurantes/marbella.html" class="dropdown__anchor">Marbella</a></li>
                    <li class="dropdown__li"><a href="Restaurantes/Palma.html" class="dropdown__anchor">Palma</a></li>
                    <li class="dropdown__li"><a href="Restaurantes/SantaPonsa.html" class="dropdown__anchor">Santa Ponsa</a></li>
                    <li class="dropdown__li"><a href="Restaurantes/FestivalPark.html" class="dropdown__anchor">Festival Park</a></li>
                    <li class="dropdown__li"><a href="Restaurantes/PortoPi.html" class="dropdown__anchor">Porto Pi</a></li>
                </ul>

            </div>
        </li>

        <li class="dropdown__list">
            <a href="ParaLLevar/pide-para-llevar.html" class="dropdown__link">
                <span class="dropdown__span"><B>PIDE PARA LLEVAR</B></span>
            </a>
        </li>

        

        <li class="dropdown__list">
            <a href="CARTA/cartas.html" class="dropdown__link">
                <span class="dropdown__span"><B>CARTA</B></span>

            </a>
        </li>
        <div class="reservas">
        <li class="dropdown__list">
            <a href="reservar/reservas.html" class="dropdown__link">
                <span class="dropdown__span"><B>RESERVAR</B></span>
            </a>
        </li>
       </div>
            <?php if ($usuarioAutenticado) { ?>
        <li class="dropdown__list">
            <a href="php/inicio_exitoso.php" class="dropdown__link">
                <span class="dropdown__span"><B>MI CUENTA</B></span>
            </a>
        </li>
    <?php } else { ?>
        <li class="dropdown__list">
            <a href="iniciarsesion.html" class="dropdown__link">
                <span class="dropdown__span"><B>INICIAR SESION</B></span>
            </a>
        </li>
    <?php } ?>
    </ul>

</div>

</nav> <center>
    <h2>Bienvenido a la página de inicio exitoso, <?php echo $_SESSION['email']; ?>!</h2>
    <p>Aquí puedes mostrar el contenido para usuarios autenticados.</p>
    <!-- Botón de cierre de sesión -->
    <a href="cerrar_sesion.php" class="boton-cerrar-sesion">Cerrar sesión</a>
    </center>
    
</body>
</html>