<?php
session_start();

$usuarioAutenticado = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $usuarioAutenticado = true;
}
?>
<!DOCTYPE html>
<html lang="es">
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
    <div class="superior">
    
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
                            <li class="dropdown__li"><a href="malaga-larios.php" class="dropdown__anchor">Málaga Larios</a></li>
                            <li class="dropdown__li"><a href="malaga-plaza-mayor.php" class="dropdown__anchor">Málaga Plaza Mayor</a></li>
                            <li class="dropdown__li"><a href="marbella.php" class="dropdown__anchor">Marbella</a></li>
                            <li class="dropdown__li"><a href="Palma.php" class="dropdown__anchor">Palma</a></li>
                            <li class="dropdown__li"><a href="SantaPonsa.php" class="dropdown__anchor">Santa Ponsa</a></li>
                            <li class="dropdown__li"><a href="FestivalPark.php" class="dropdown__anchor">Festival Park</a></li>
                            <li class="dropdown__li"><a href="PortoPi.php" class="dropdown__anchor">Porto Pi</a></li>
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
                            <li class="dropdown__li"><a href="../php/inicio_exitoso.php" class="dropdown__anchor">Cuenta</a></li>
                            <li class="dropdown__li"><a href="../php/datos_personales.php" class="dropdown__anchor">Tus Datos Personales</a></li>
                            <li class="dropdown__li"><a href="../php/notificaciones.php" class="dropdown__anchor">Notificaciones</a></li>
                            <li class="dropdown__li"><a href="../php/facturas.php" class="dropdown__anchor">Emitir Facturas</a></li>
                            <li class="dropdown__li"><a href="../php/feedback.php" class="dropdown__anchor">Feedback</a></li>
                            <li class="dropdown__li"><a href="../php/wifi.php" class="dropdown__anchor">Wi-Fi</a></li>
                            <li class="dropdown__li"><a href="../php/eliminar.php" class="dropdown__anchor">Eliminar Cuenta</a></li>
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
    <center>
            
    <form class="formulario-reserva" action="../php/realizar_reserva.php" method="POST">
            
    <b>   <label class="label-reserva" for="campo1">RESTAURANTE:</label>
            <select class="input-reserva" name="restaurante">
                <option value="" disabled selected>Selecciona un restaurante</option>
                <option value="malaga_larios">Málaga Larios</option>
                <option value="malaga_plaza_mayor">Málaga Plaza Mayor</option>
                <option value="marbella">Marbella</option>
                <option value="palma">Palma</option>
                <option value="santa_ponsa">Santa Ponsa</option>
                <option value="festival_park">Festival Park</option>
                <option value="porto_pi">Porto Pi</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select>                

              <label class="label-reserva" for="campo2">FECHA:</label>
              <input class="input-reserva" type="date" id="campo2" name="fecha"  placeholder="Selecciona una fecha">

            <!-- Agregar un campo de selección de hora que termine a las 22:00 -->
<b><label class="label-reserva" for="hora">HORA DE RESERVA:</label></b>
<select class="input-reserva" name="hora" id="hora">
    <option value="" disabled selected>Selecciona una hora</option>
    <?php
    // Genera opciones de hora de 13 a 22 en incrementos de 15 minutos
    for ($hour = 13; $hour <= 22; $hour++) {
        // Verifica si la hora es igual a las 22:00
        if ($hour == 22) {
            echo "<option value='22:00'>22:00</option>";
        } else {
            for ($minute = 0; $minute < 60; $minute += 15) {
                $time = sprintf("%02d:%02d", $hour, $minute);
                echo "<option value='$time'>$time</option>";
            }
        }
    }
    ?>
</select>

            <label class="label-reserva" for="campo3">PERSONAS:</label>
            <input class="input-reserva" type="number" id="campo3" name="personas" max="6" placeholder="Numero de Personas">

             <!-- Campo de nombre -->
    <b><label class="label-reserva" for="nombre">NOMBRE:</label></b>
    <input class="input-reserva" type="text" id="nombre" name="nombre" placeholder="Nombre del Cliente">
            <button class="button-reserva" type="submit"><b>RESERVAR</b></button></b>
           </form>

    </div> 
    </div>
    </div> 
    </center>




    <h2 class="titulo-larios">FESTIVAL PARK</h2>
    <div id="contenedor-larios">
        <div id="foto-nombre">
            <div>
                <img class="foto-encargado" src="../imagenes/Franzi.webp" alt="">
                <p>Franzi Jung</p>  
            </div>
            <div id="horarios1">
                <h2>Horario</h2>
               <b><p>¡ Esperamos ilusionados verle ! <br></b>
                Lunes:	12:00-22:30<br>
                Martes:	12:00-22:30<br>
                Miercoles:	12:00-22:30<br>
                Jueves:	12:00-22:30<br>
                Viernes:	12:00-23:00<br>
                Sabado:	12:30-23:00<br>
                Domingo:	12:00-22:30<br>
                <b>Reserva Online <a href="../reservar/reservas.php">clic AQUI</a></p></b>
            </div>            
        </div>
        <div id="direccion-mapa">
            <p class="parrafo-direccion">Festival Park <br>Upper Level <br>
            07141, Marratxí<br><a href="">600-440-700</a>☎️
            Mallorca</p>
            <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3072.7495224069426!2d2.729536875827465!3d39.63284327157634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1297eb2435219d3d%3A0x7e6aa98c2f3cd6ff!2sBlock%20House%2C%20Mallorca%20Fashion%20Outlet%20(Festival%20Park)!5e0!3m2!1ses!2ses!4v1692705716743!5m2!1ses!2ses" 
            width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div id="horarios">
            <h2>Horario</h2>
           <b><p>¡ Esperamos ilusionados verle ! <br></b>
            Lunes:	12:00-22:30<br>
            Martes:	12:00-22:30<br>
            Miercoles:	12:00-22:30<br>
            Jueves:	12:00-22:30<br>
            Viernes:	12:00-23:00<br>
            Sabado:	12:30-23:00<br>
            Domingo:	12:00-22:30<br>
                <b>Reserva Online <a href="../reservar/reservas.php">clic AQUI</a></p></b>
        </div>
</div>
    <div class="gallery">
        <div class="image">
            <img class="imagenes-restaurantes" src="../imagenes/foto-festivalpark.webp" alt="">
        </div>
        <div class="image">
          <img class="imagenes-restaurantes" src="../imagenes/foto-festivalpark2.webp" alt="Descripción de la imagen 2">
        </div>
        <div class="image">
            <img class="imagenes-restaurantes" src="../imagenes/foto-festivalpark1.webp" alt="Descripción de la imagen 2">
          </div>
      </div>
      

<footer>
    <div class="footer-content">
        <ul class="footer-links">
            <li><p>Sergio Cabrera</p></li>
            <li><a href="#"><p>Administracion Central</p></a></li>
          </ul>
      <ul class="footer-links">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Acerca de nosotros</a></li>
        <li><a href="#">Contacto</a></li>
        <li><a href="https://www.facebook.com/blockhouseES/"><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"> <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" fill="white"></path> </svg>
        </a></li>
      </ul>
    </div>
  </footer>
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
