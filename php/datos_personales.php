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

</nav> 


<div class="margenes-login">

<div class="login-container">
    <h2 class="tituloregistro">Tus datos personales</h2>
    <h3 class="tituloregistro1">Aqui puedes modificar los datos que quieras acerca sobre tu cuenta</h3>
        <form id="login-form" method="POST" action="modificardatos.php">

            
            
                        <?php 
                                    // Conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bh_db";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);
                        // Realiza una consulta para obtener la contraseña del usuario
            $query = "SELECT Contrasena FROM Usuarios WHERE CorreoElectronico = '" . $_SESSION['email'] . "'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $contrasena_usuario = $row['Contrasena'];
            } ?>

            <label for="password">Contraseña:</label>
            <input type="text" id="password" name="password" value="<?php echo $contrasena_usuario; ?>" required>

            <?php
                        $query = "SELECT Restaurante FROM Usuarios WHERE CorreoElectronico = '" . $_SESSION['email'] . "'";
                        $result = $conn->query($query);
            
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $restaurante_usuario = $row['Restaurante'];
                        }
            ?>
            <b> <label  for="campo1">Mi Block House:</label></b>
            <select class="input-reserva1" name="restaurante"  required>
                <option value="<?php echo $restaurante_usuario; ?>"><?php echo $restaurante_usuario; ?></option>
                <option value="Málaga Larios">Málaga Larios</option>
                <option value="Málaga Plaza Mayor">Málaga Plaza Mayor</option>
                <option value="Marbella">Marbella</option>
                <option value="Palma">Palma</option>
                <option value="Santa Ponsa">Santa Ponsa</option>
                <option value="Festival Park">Festival Park</option>
                <option value="Porto Pi">Porto Pi</option>

            </select>   

            <?php
                        $query = "SELECT Nombre FROM Usuarios WHERE CorreoElectronico = '" . $_SESSION['email'] . "'";
                        $result = $conn->query($query);
            
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $nombre_usuario = $row['Nombre'];
                        }
            ?>
            <b> <label  for="">Nombre:</label></b>
            <input class="input-reserva1" type="text" id="nombre" value="<?php echo $nombre_usuario; ?>" name="nombre" max="" placeholder=""  required>  

            <?php
                        $query = "SELECT Apellidos FROM Usuarios WHERE CorreoElectronico = '" . $_SESSION['email'] . "'";
                        $result = $conn->query($query);
            
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $apellidos_usuario = $row['Apellidos'];
                        }
            ?>
            <b> <label  for="">Apellidos:</label></b>
            <input class="input-reserva1" type="text" value="<?php echo $apellidos_usuario; ?>" id="apellidos" name="apellidos" max="" placeholder="" required> 
            <?php
                        $query = "SELECT Telefono FROM Usuarios WHERE CorreoElectronico = '" . $_SESSION['email'] . "'";
                        $result = $conn->query($query);
            
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $telefono_usuario = $row['Telefono'];
                        }
            ?>

            <b> <label  for="">Telefono:</label></b>
            <input class="input-reserva1" type="number" value="<?php echo $telefono_usuario; ?>" " id="telefono" name="telefono" max="" placeholder="" required>                                   
          
                <button class="botonlogin" type="submit">MODIFICAR DATOS</button>

    </form>
</div>   


<footer>
<div class="footer-content">
<ul class="footer-links">
    <li><p>Sergio Cabrera</p></li>
    <li><a href="#"><p>Administracion Central</p></a></li>
  </ul>
<ul class="footer-links">
<li><a href="index.html">Inicio</a></li>
<li><a href="#">Empresa</a></li>
<li><a href="https://www.facebook.com/blockhouseES/"><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"> <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" fill="white"></path> </svg>
</a></li>
</ul>
</div>
</footer>
    
</body>
</html>