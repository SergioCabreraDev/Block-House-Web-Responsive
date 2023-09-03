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
    <link rel="shortcut icon" href="imagenes/bh-favicon.ico"/>
    <link rel="stylesheet" href="css/estilo-movil.css">
    <link rel="stylesheet" href="css/estilo-tablet.css">
    <link rel="stylesheet" href="css/estilo-pc.css">

    <title>Block House - Best Steaks since 1968</title>
</head>
<body>
    <div class="superior">
    
    <nav class="nav">

        <div class="nav__container">

            <a href="index.php"><img class="nav__title" src="./assets/logonavbar.png" alt=""></a>

            <a href="#menu" class="nav__menu">
                <img src="./assets/menu-icon.svg" class="nav__icon">
            </a>

            <a href="#" class="nav__menu nav__menu--second">
                <img src="./assets/close.svg" class="nav__icon ">
            </a>

            <ul class="dropdown" id="menu">

                <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <span class="dropdown__span"><B>RESTAURANTES Y HORARIOS</B></span>
                        <img src="./assets/down.svg" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">
                            <li class="dropdown__li"><a href="Restaurantes/malaga-larios.php" class="dropdown__anchor">Málaga Larios</a></li>
                            <li class="dropdown__li"><a href="Restaurantes/malaga-plaza-mayor.php" class="dropdown__anchor">Málaga Plaza Mayor</a></li>
                            <li class="dropdown__li"><a href="Restaurantes/marbella.php" class="dropdown__anchor">Marbella</a></li>
                            <li class="dropdown__li"><a href="Restaurantes/Palma.php" class="dropdown__anchor">Palma</a></li>
                            <li class="dropdown__li"><a href="Restaurantes/SantaPonsa.php" class="dropdown__anchor">Santa Ponsa</a></li>
                            <li class="dropdown__li"><a href="Restaurantes/FestivalPark.php" class="dropdown__anchor">Festival Park</a></li>
                            <li class="dropdown__li"><a href="Restaurantes/PortoPi.php" class="dropdown__anchor">Porto Pi</a></li>
                        </ul>

                    </div>
                </li>

                <li class="dropdown__list">
                    <a href="ParaLLevar/pide-para-llevar.php" class="dropdown__link">
                        <span class="dropdown__span"><B>PIDE PARA LLEVAR</B></span>
                    </a>
                </li>

                

                <li class="dropdown__list">
                    <a href="CARTA/cartas.php" class="dropdown__link">
                        <span class="dropdown__span"><B>CARTA</B></span>

                    </a>
                </li>
                <div class="reservas">
                <li class="dropdown__list">
                    <a href="reservar/reservas.php" class="dropdown__link">
                        <span class="dropdown__span"><B>RESERVAR</B></span>
                    </a>
                </li>
               </div>
                    <?php if ($usuarioAutenticado) { ?>
                        <li class="dropdown__list">
                    <a href="#" class="dropdown__link">
                        <span class="dropdown__span"><B>MI CUENTA</B></span>
                        <img src="./assets/down.svg" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">
                            <li class="dropdown__li"><a href="php/inicio_exitoso.php" class="dropdown__anchor">Cuenta</a></li>
                            <li class="dropdown__li"><a href="php/datos_personales.php" class="dropdown__anchor">Tus Datos Personales</a></li>
                            <li class="dropdown__li"><a href="php/notificaciones.php" class="dropdown__anchor">Notificaciones</a></li>
                            <li class="dropdown__li"><a href="php/facturas.php" class="dropdown__anchor">Emitir Facturas</a></li>
                            <li class="dropdown__li"><a href="php/feedback.php" class="dropdown__anchor">Feedback</a></li>
                            <li class="dropdown__li"><a href="php/wifi.php" class="dropdown__anchor">Wi-Fi</a></li>
                            <li class="dropdown__li"><a href="php/eliminar.php" class="dropdown__anchor">Eliminar Cuenta</a></li>
                        </ul>

                    </div>
                </li>
            <?php } else { ?>
                <li class="dropdown__list">
                    <a href="iniciarsesion.php" class="dropdown__link">
                        <span class="dropdown__span"><B>INICIAR SESION</B></span>
                    </a>
                </li>
            <?php } ?>
            </ul>

        </div>

    </nav>
    <center>
            
        <form class="formulario-reserva" action="php/realizar_reserva.php" method="POST">
            
         <b>   <label class="label-reserva" for="campo1">RESTAURANTE:</label>
            <select class="input-reserva" name="restaurante">
                <option value="" disabled selected>Selecciona un restaurante</option>
                <option value="Málaga Larios">Málaga Larios</option>
                <option value="Málaga Plaza Mayor">Málaga Plaza Mayor</option>
                <option value="Marbella">Marbella</option>
                <option value="Palma">Palma</option>
                <option value="Santa Ponsa">Santa Ponsa</option>
                <option value="Festival Park">Festival Park</option>
                <option value="Porto Pi">Porto Pi</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select>                

              <label class="label-reserva" for="campo2">FECHA:</label>
              <input class="input-reserva" type="date" id="campo2" name="fecha"  placeholder="Selecciona una fecha">

            <label class="label-reserva" for="campo3">PERSONAS:</label>
            <input class="input-reserva" type="number" id="campo3" name="personas" max="6" placeholder="Numero de Personas">

            <button class="button-reserva" type="submit"><b>RESERVAR</b></button></b>
        </form>
        <div class="novedades">
        <b><p class="avisos"> Esta disponible "take away" en algunos restaurantes. Detalles en "Pide para llevar" </p></b>
        </div>
    </div> 
    </div>
    </div> 
    </center>
    <center>
        <div class="video-container">
            <h1 class="titulo">BLOCK HOUSE</h1>
            <div id="video">
                <video width="100%" playsinline autoplay loop muted>
                  <source src="./video/video_web.mp4" type="video/mp4">
                </video>
        </div>
        </center>

        <div id="contenido">

            <div class="bloques">
                <div class="bloque1">
                    <div class="textobloque1">
                        <h2>CALIDAD EN ELABORACIÓN</h2>
                        <p class="parraforindex">Nuestro equipo de cocina está perfectamente formado, ya que su trabajo no es nada fácil.
                            Imagínate tener que parrillar tantos Steaks diferentes con acabados distintos en una parrilla de lava que alcanza los 400ºC. Algunos rojos, otros medium o muy hechos, grandes, pequeños, con o sin hueso.
                            Y todo ello de tal forma que los comensales de una mesa puedan disfrutar de sus carnes en el mismo momento.</p>
                    </div>
                    <img class="imagen1" src="./imagenes/bloque1.webp" alt="">  
                   <center> <img class="imagen2" src="./imagenes/bloque1.webp" alt=""> </center>
                </div>
                <div class="bloque2">
                    <img class="imagen1" src="./imagenes/bloque2.webp" alt="">
                    <div class="textobloque1">
                        <h2>CALIDAD EN SERVICIOS</h2>
                        <p class="parraforindex">Nuestros camareros te escuchan y entienden.
                            En Block House todos los camareros son profesionales. Reciben una constante formación de servicio y productos lo que les da la seguridad necesaria para trabajar relajados y con mucha alegría y así ofrecer la mejor atención.
                            ¡Dejales recomendarte sus platos favoritos, seguro que quedarás satisfecho!</p>
                    </div>
                    <center>  <img class="imagen2" src="./imagenes/bloque2.webp" alt=""></center>
                </div>
                <div class="bloque3">
                    <div class="textobloque1">
                        <h2>CALIDAD EN AMBIENTE</h2>
                        <p class="parraforindex">En Block House empleamos las ultimas técnicas de extracción de humos, filtros y sistemas de aire para asegurarte un ambiente libre de olores, cómodo y agradable.
                            Las luces, la música y la decoración están todos diseñados para hacerte sentir como en casa. A parte de esto hacemos uso de la última tecnologia en ahorro de energía para respetar el medio ambiente.</p>
                    </div>
                <img class="imagen1" src="./imagenes/bloque3.webp" alt="">
                <center><img class="imagen2" src="./imagenes/bloque3.webp" alt=""></center>
            </div>
        
            </div>
        
        </div>

        <div id="overlay">
            <div id="popup">
                <p>Esta página web no es oficial, ha sido creada por Sergio Cabrera.</p>
                <button id="entendido">Entendido</button>
            </div>
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

        <script src="app.js"></script>
<script>
 // Obtenemos el elemento del input de fecha
 const fechaInput = document.getElementById('campo2');

// Obtenemos la fecha actual en formato yyyy-mm-dd
const fechaActual = new Date().toISOString().slice(0, 10);

// Establecemos la fecha actual como valor predeterminado en el input de fecha
fechaInput.value = fechaActual;

    // En tu archivo JavaScript
const novedadesElement = document.querySelector('.novedades');

// Cuando quieras mostrar el aviso de novedades
novedadesElement.classList.add('visible');


// A esto
element.setPointerCapture(pointerId);


</script>
</body>
</html>