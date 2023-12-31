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
        <div class="reservas">
        <li class="dropdown__list">
            <a href="../reservar/reservas.php" class="dropdown__link">
                <span class="dropdown__span"><B>RESERVAR</B></span>
            </a>
        </li>
       </div>
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
        <center>
                
        <form class="formulario-reserva" action="../php/realizar_reserva.php" method="POST">
            
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
    </center>
        </div> 
        </div>
        </div>

<div id="contenido_factura">
<h3>EMITIR FACTURAS</h3>
<b><p>Imprescindible ticket de cosumición del Block House para emitir una factura.</p></b>

<form class="formulario_factura" action="" method="post">
    
<b> <label  for="">Nº Factura del ticket:</label></b> <br class="br_pantallaipad">
            <input class="input-factura" type="text" id="nombre" value="" name="N_Factura" max="" placeholder=""  required> 
          <br  class="br_pantallaipad">  <b> <label  for="">Euro total del ticket:</label></b>
          <br  class="br_pantallaipad">  <input class="input-factura" type="text" id="nombre" value="" name="Euro total" max="" placeholder=""  required> 
        <br class="br_pantallapequeña">    <b> <label  for="">Tu NIE o CIF:</label></b>
        <br  class="br_pantallaipad"> <input class="input-factura" type="text" id="nombre" value="" name="NIE" max="" placeholder=""  required> 
        <br  class="br_pantallaipad">  <b> <label  for="campo1">Concepto:</label></b>
        <br  class="br_pantallaipad"> <select class="input-factura" name="Concepto"  required>

                <option value="detallado">Detallado</option>
                <option value="Comidas y Bebidas">Comidas y Bebidas</option>
                <option value="Comidas">Comidas</option>
                <option value="Un menu del día">Un menu del día</option>
                <option value="Dos menus del día">Dos menus del día</option>
                <option value="Tres menus del día">Tres menus del día</option>
                <option value="Cuatro menus del día">Cuatro menus del día</option>

            </select> 

            <div class="input-factura2">
                 <b><label for="menu_dia">Mostrar propina pagada por tarjeta de crédito:</label> </b> 
                 <input class="input-factura1" type="checkbox" name="menu_dia" value="1">      
            </div> 

            <div class="input-factura2">
              <b><label class="input-factura2" for="menu_dia">Nombre y Dirección</label> </b> <br>
              <textarea  rows="4"></textarea> <br>
            </div>
           
            <button type="submit"><b>Emitir Factura</b></button>     
</form>
</div>
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