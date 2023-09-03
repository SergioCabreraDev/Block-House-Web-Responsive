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
    <link rel="shortcut icon" href="../imagenes/bh-favicon.ico"/>
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
                    <li class="dropdown__li"><a href="../Restaurantes/malaga-larios.php" class="dropdown__anchor">Málaga Larios</a></li>
                    <li class="dropdown__li"><a href="../Restaurantes/malaga-plaza-mayor.php" class="dropdown__anchor">Málaga Plaza Mayor</a></li>
                    <li class="dropdown__li"><a href="../Restaurantes/marbella.php" class="dropdown__anchor">Marbella</a></li>
                    <li class="dropdown__li"><a href="../Restaurantes/Palma.php" class="dropdown__anchor">Palma</a></li>
                    <li class="dropdown__li"><a href="../Restaurantes/SantaPonsa.php" class="dropdown__anchor">Santa Ponsa</a></li>
                    <li class="dropdown__li"><a href="../Restaurantes/FestivalPark.php" class="dropdown__anchor">Festival Park</a></li>
                    <li class="dropdown__li"><a href="../Restaurantes/PortoPi.php" class="dropdown__anchor">Porto Pi</a></li>
                </ul>

            </div>
        </li>

        <li class="dropdown__list">
            <a href="../ParaLLevar/pide-para-llevar.php" class="dropdown__link">
                <span class="dropdown__span"><B>PIDE PARA LLEVAR</B></span>
            </a>
        </li>

        

        <li class="dropdown__list">
            <a href="../CARTA/cartas.php" class="dropdown__link">
                <span class="dropdown__span"><B>CARTA</B></span>

            </a>
        </li>
       
        <li class="dropdown__list">
            <a href="../reservar/reservas.php" class="dropdown__link">
                <span class="dropdown__span"><B>RESERVAR</B></span>
            </a>
        </li>
    
            <?php if ($usuarioAutenticado) { ?>
                <li class="dropdown__list">
            <a href="#" class="dropdown__link">
                <span class="dropdown__span"><B>MI CUENTA</B></span>
                <img src="../assets/down.svg" class="dropdown__arrow">

                <input type="checkbox" class="dropdown__check">
            </a>

            <div class="dropdown__content">

                <ul class="dropdown__sub">
                    <li class="dropdown__li"><a href="inicio_exitoso.php" class="dropdown__anchor">Cuenta</a></li>
                    <li class="dropdown__li"><a href="datos_personales.php" class="dropdown__anchor">Tus Datos Personales</a></li>
                    <li class="dropdown__li"><a href="notificaciones.php" class="dropdown__anchor">Notificaciones</a></li>
                    <li class="dropdown__li"><a href="facturas.php" class="dropdown__anchor">Emitir Facturas</a></li>
                    <li class="dropdown__li"><a href="feedback.php" class="dropdown__anchor">Feedback</a></li>
                    <li class="dropdown__li"><a href="wifi.php" class="dropdown__anchor">Wi-Fi</a></li>
                    <li class="dropdown__li"><a href="eliminar.php" class="dropdown__anchor">Eliminar Cuenta</a></li>
                </ul>

            </div>
        </li>
    <?php } else { ?>
        <li class="dropdown__list">
            <a href="../iniciarsesion.php" class="dropdown__link">
                <span class="dropdown__span"><B>INICIAR SESION</B></span>
            </a>
        </li>
    <?php } ?>
    </ul>

</div>

</nav>
     
        </div> 
        </div>
        </div>
 <center>
<?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "bh_db";

                        // Crear conexión
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $query = "SELECT Nombre FROM Usuarios WHERE CorreoElectronico = '" . $_SESSION['email'] . "'";
                        $result = $conn->query($query);
            
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $nombre_usuario = $row['Nombre'];
                        }
            ?>
    <h2>Bienvenido a la página de miembros Block House, <?php echo $nombre_usuario; ?>!</h2>
    <p>Si desea cerrar sesion pulse en este boton.</p>
    <!-- Botón de cierre de sesión -->
    <a href="cerrar_sesion.php" class="boton-cerrar-sesion">Cerrar sesión</a>
    </center>
    <script>
 // Obtenemos el elemento del input de fecha
 const fechaInput = document.getElementById('campo2');

// Obtenemos la fecha actual en formato yyyy-mm-dd
const fechaActual = new Date().toISOString().slice(0, 10);

// Establecemos la fecha actual como valor predeterminado en el input de fecha
fechaInput.value = fechaActual;



</script>
</body>
</html>