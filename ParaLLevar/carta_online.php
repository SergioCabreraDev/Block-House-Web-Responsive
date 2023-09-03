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


    </div> 
    </div>
    </div> 


    <form action="../php/procesar_pedido.php" method="post">
    <div class="parte-superior">
   
            <div>

                <b> <label  for="campo1">RESTAURANTE:</label></b>
                        <select class="input-reserva1" name="restaurante" required>
                            <option value="" disabled selected>Selecciona un restaurante</option>
                            <option value="malaga_larios_pedidos">Málaga Larios</option>
                            <option value="malaga_plaza_mayor_pedidos">Málaga Plaza Mayor</option>
                            <option value="marbella_pedidos">Marbella</option>
                            <option value="palma_pedidos">Palma</option>
                            <option value="santa_ponsa_pedidos">Santa Ponsa</option>
                            <option value="festival_park_pedidos">Festival Park</option>
                            <option value="porto_pi_pedidos">Porto Pi</option>
                        </select>

            </div>

            <div>
                    <b><label class="label-reserva1" for="hora">HORA DE RECOGIDA:</label></b>
                    <select class="input-reserva1" name="hora" id="hora" required onchange="validarHora()">
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

            </div>

            <div>
            <b> <label  for="">TU NOMBRE:</label></b>
                    <input class="input-reserva1" type="text" id="nombre" name="nombre" max="" placeholder=""  required>  
            </div>
            <div>
            <b> <label  for="">CODIGO DE PROMOCIÓN:</label></b>
                    <input class="input-reserva1" type="text" id="codigo" name="codigo" max="" placeholder="" >  
            </div>

    </div>


    <!-- Elemento para mostrar el carrito -->
    <div id="carrito">
        <center><h2 class="titulo-carrito">Carrito de tu Compra</h2></center>
        <ul id="carrito-lista">
            <!-- Aquí se mostrarán los productos agregados con JavaScript -->
        </ul>
       

       
        <p>Total: <span id="carrito-total">0€</span></p>
        <button type="submit" id="enviar-pedido" onclick="validarCarrito()">Enviar Pedido</button>
       
    </div>
    </form>
    <center><h2 class="titulo-carrito">Steaks Suculentos</h2></center>
    <div class="menu">

    <div class="menu-item">
            <h2>MRS STRIPLOIN</h2>
            <p>Sabroso y jugoso filete de lomo de novillo de 180 gr. el corte por excelencia de nuestra carnicería.</p>
            <p class="menu-item-price">19.20€</p>
            <select id="mrs-striploin">
                <option value="Rojo">Rojo</option>
                <option value="En su punto">A su punto/rojo</option>
                <option value="A su punto">A su punto</option>
                <option value="A su punto/hecho">A su punto/hecho</option>
                <option value="Bien hecho">Bien hecho</option>
            </select>
            <select id="guarnicion1">
                <option value="Patatas Fritas">Patatas Fritas</option>
                <option value="Baked Potato">Baked Potato</option>
            </select>
            <button onclick="agregarAlCarrito('MRS STRIPLOIN', document.getElementById('mrs-striploin').value,document.getElementById('guarnicion1').value, 19.20)">Agregar al Carrito</button>
        </div>
        <div class="menu-item">
            <h2>MR. STRIPLOIN</h2>
            <p>Nuestro campeón del lomo de novillo, 250 gr. bien crujiente y el interior de color rosa.</p>
            <p class="menu-item-price">23.80€</p>
            <select id="mr-striploin">
                <option value="Rojo">Rojo</option>
                <option value="En su punto">A su punto/rojo</option>
                <option value="A su punto">A su punto</option>
                <option value="A su punto/hecho">A su punto/hecho</option>
                <option value="Bien hecho">Bien hecho</option>
            </select>
            <select id="guarnicion2">
                <option value="Patatas Fritas">Patatas Fritas</option>
                <option value="Baked Potato">Baked Potato</option>
            </select>
            <button onclick="agregarAlCarrito('MR STRIPLOIN', document.getElementById('mr-striploin').value,document.getElementById('guarnicion2').value, 23.80)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>FILET MIGNON</h2>
            <p>El solomillo de 180 gr. La mejor parte del novillo, pequeño y estupendo. Condimentado con nuestra especial Pimienta Block House.</p>
            <p class="menu-item-price">27.80€</p>
            <select id="filet-mignon">
                <option value="Rojo">Rojo</option>
                <option value="En su punto">A su punto/rojo</option>
                <option value="A su punto">A su punto</option>
                <option value="A su punto/hecho">A su punto/hecho</option>
                <option value="Bien hecho">Bien hecho</option>
            </select>
            <select id="guarnicion3">
                <option value="Patatas Fritas">Patatas Fritas</option>
                <option value="Baked Potato">Baked Potato</option>
            </select>
            <button onclick="agregarAlCarrito('FILET MIGNON', document.getElementById('filet-mignon').value,document.getElementById('guarnicion3').value, 27.80)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>GAUCHO STEAK</h2>
            <p>180 gr. de bistec tierno de corazón de cuadril, Baked Potato con Sour Cream.</p>
            <p class="menu-item-price">18.70€</p>
            <select id="gaucho-steak">
                <option value="Rojo">Rojo</option>
                <option value="En su punto">A su punto/rojo</option>
                <option value="A su punto">A su punto</option>
                <option value="A su punto/hecho">A su punto/hecho</option>
                <option value="Bien hecho">Bien hecho</option>
            </select>
            <select id="guarnicion4">
                <option value="Patatas Fritas">Patatas Fritas</option>
                <option value="Baked Potato">Baked Potato</option>
            </select>
            <button onclick="agregarAlCarrito('GAUCHO STEAK', document.getElementById('gaucho-steak').value,document.getElementById('guarnicion4').value, 18.70)">Agregar al Carrito</button>
        </div>
        <div class="menu-item">
            <h2>HEREFORD RIB-EYE</h2>
            <p>El entrecôte, 250 gr. de Block House, jugosísimo, con su pequeño medallón de grasa.</p>
            <p class="menu-item-price">22.60€</p>
            <select id="hereford-rib-eye">
                <option value="Rojo">Rojo</option>
                <option value="En su punto">A su punto/rojo</option>
                <option value="A su punto">A su punto</option>
                <option value="A su punto/hecho">A su punto/hecho</option>
                <option value="Bien hecho">Bien hecho</option>
            </select>
            <select id="guarnicion5">
                <option value="Patatas Fritas">Patatas Fritas</option>
                <option value="Baked Potato">Baked Potato</option>
            </select>
            <button onclick="agregarAlCarrito('HEREFORD RIB-EYE', document.getElementById('hereford-rib-eye').value,document.getElementById('guarnicion5').value, 22.60)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Barbacoa de Ternera</h2>
            <p>Pequeños trozos de carne de ternera sin grasa, Baked Potato con Sour Cream.</p>
            <p class="menu-item-price">17.50€</p>
            <select id="barbacoa-de-ternera">
                <option value="Rojo">Rojo</option>
                <option value="En su punto">A su punto/rojo</option>
                <option value="A su punto">A su punto</option>
                <option value="A su punto/hecho">A su punto/hecho</option>
                <option value="Bien hecho">Bien hecho</option>
            </select>
            <select id="guarnicion6">
                <option value="Patatas Fritas">Patatas Fritas</option>
                <option value="Baked Potato">Baked Potato</option>
            </select>
            <button onclick="agregarAlCarrito('Barbacoa de Ternera', document.getElementById('barbacoa-de-ternera').value,document.getElementById('guarnicion6').value, 17.50)">Agregar al Carrito</button>
            
        </div>
        
        
    </div>





    <center><h2 class="titulo-carrito">Hamburguesas</h2></center>




    <div class="menu">

        <div class="menu-item">
                <h2>Classic Block Burger</h2>
                <p>200 gr. de las mejores terneras de Block House, Baked Potato con Sour Cream.</p>
                <p class="menu-item-price">13.50€</p>
                <select id="guarnicion7">
            <option value="Patatas Fritas">Patatas Fritas</option>
            <option value="Baked Potato">Baked Potato</option>
                </select> <br>
        <button onclick="agregarAlCarrito('Classic Block Burger', '', document.getElementById('guarnicion7').value, 13.50)">Agregar al Carrito</button>
            </div>

            <div class="menu-item">
                <h2>New York Cheeseburger</h2>
                <p>El famoso Block Burger con dados frescos de tomate y cebolla, queso gratinado, Baked Potato con Sourcream.</p>
                <p class="menu-item-price">14.50€</p>
                <select id="guarnicion8">
            <option value="Patatas Fritas">Patatas Fritas</option>
            <option value="Baked Potato">Baked Potato</option>
                </select> <br>
        <button onclick="agregarAlCarrito('New York Cheeseburger', '', document.getElementById('guarnicion8').value, 14.50)">Agregar al Carrito</button>
            </div>

            <div class="menu-item">
                <h2>Beefy montado para niños</h2>
                <p>Block Burger de 125gr. en nuestro panecillo especial. Con salsa hamburguesa Block House, acompañado de patatas fritas.</p>
                <p class="menu-item-price">7.20€</p>
                <select id="guarnicion9">
            <option value="Patatas Fritas">Patatas Fritas</option>
            <option value="Baked Potato">Baked Potato</option>
                </select> <br>
        <button onclick="agregarAlCarrito('Beefy montado para niños', '', document.getElementById('guarnicion9').value, 7.20)">Agregar al Carrito</button>
            </div>

            <div class="menu-item">
                <h2>Cheeseburger</h2>
                <p>125gr. puro carne en nuestro panecillo-burger especial, ensalada, tomate, cebolla roja y queso Emmental. Baked Potato con Sour Cream.</p>
                <p class="menu-item-price">12.80€</p>
                <select id="guarnicion10">
            <option value="Patatas Fritas">Patatas Fritas</option>
            <option value="Baked Potato">Baked Potato</option>
                </select> <br>
        <button onclick="agregarAlCarrito('Cheeseburger', '', document.getElementById('guarnicion10').value, 12.80)">Agregar al Carrito</button>
            </div>

            <div class="menu-item">
                <h2>BBQ Burger</h2>
                <p>Beefburger 125gr. en nuestro panecillo-burger especial con Bacon, ensalada, tomate, cebolla roja, queso Emmental y nuestra salsa barbacoa. Baked Potato con Sour Cream.</p>
                <p class="menu-item-price">14.00€</p>
                <select id="guarnicion11">
            <option value="Patatas Fritas">Patatas Fritas</option>
            <option value="Baked Potato">Baked Potato</option>
                </select> <br>
        <button onclick="agregarAlCarrito('BBQ Burger', '', document.getElementById('guarnicion11').value, 14.00)">Agregar al Carrito</button>
            </div>

            <div class="menu-item">
                <h2>Hot Salsa Burger</h2>
                <p>125gr. Carne en el panecillo-burger especial. Mezcla de tomate, cebolla y pesto gratinado con Emmental. Salsa Kansas con Jalapeños. Baked Potato con Sour Cream.</p>
                <p class="menu-item-price">14.80€</p>
                <select id="guarnicion12">
            <option value="Patatas Fritas">Patatas Fritas</option>
            <option value="Baked Potato">Baked Potato</option>
                </select> <br>
        <button onclick="agregarAlCarrito('Hot Salsa Burger', '', document.getElementById('guarnicion12').value, 14.80)">Agregar al Carrito</button>
            </div>
    
</div>





<center><h2 class="titulo-carrito">Otros</h2></center>




<div class="menu">

    <div class="menu-item">
            <h2>Pavo al Grill</h2>
            <p>Tiernas pechugas de pavo al grill, mantequilla de hierbas, Baked Potato con Sour Cream.</p>
            <p class="menu-item-price">14.20€</p>
            <select id="guarnicion13">
        <option value="Patatas Fritas">Patatas Fritas</option>
        <option value="Baked Potato">Baked Potato</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Classic Block Burger', '', document.getElementById('guarnicion13').value, 13.50)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Salmón del Fiordo</h2>
            <p>Fresco de los fiordos noruegos a la plancha, sobre una base de espinacas frescas. Con patatas gratinadas y mantequilla de hierbas.</p>
            <p class="menu-item-price">20.60€</p>

    <button onclick="agregarAlCarrito('Salmón del Fiordo', '', '', 20.60)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Spare Ribs</h2>
            <p>Crujientes costillas de cerdo al grill, untadas con Kansas Dip, Baked Potato con Sour Cream.</p>
            <p class="menu-item-price">17.80€</p>
            <select id="guarnicion14">
        <option value="Patatas Fritas">Patatas Fritas</option>
        <option value="Baked Potato">Baked Potato</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Spare Ribs', '', document.getElementById('guarnicion14').value, 17.80)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Veggie Potato</h2>
            <p>Nuestra Baked Potato con verduras frescas salteadas y setas a la crema.</p>
            <p class="menu-item-price">12.20€</p>
    <button onclick="agregarAlCarrito('Veggie Potat', '', '', 12.20)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Salchichas Alemanas</h2>
            <p>Con mostaza.</p>
            <p class="menu-item-price">7.20€</p>
    <button onclick="agregarAlCarrito('Salchichas Alemanas', '', '', 7.20)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Nuggets de Pollo</h2>
            <p>4 nuggets de pollo para los niños con patatas fritas.</p>
            <p class="menu-item-price">5.20€</p>
    <button onclick="agregarAlCarrito('Nuggets de Pollo', '', '', 5.20)">Agregar al Carrito</button>
        </div>
        </div>
        <div class="menu">
        <div class="menu-item">
            <h2>Plato Cowboy Niños</h2>
            <p>Dos trocitos de carne de ternera sin grasa con baked potato.</p>
            <p class="menu-item-price">7.60€</p>
            <select id="guarnicion15">
        <option value="Patatas Fritas">Patatas Fritas</option>
        <option value="Baked Potato">Baked Potato</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Plato Cowboy Niños', '', document.getElementById('guarnicion15').value, 7.60)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Spicy Beef</h2>
            <p>Tiras de ternera con champiñones en salsa pimienta verde con patatas fritas.</p>
            <p class="menu-item-price">12.20€</p>
    <button onclick="agregarAlCarrito('Spicy Beef', '', '', 12.20)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Plato Vegetal</h2>
            <p>Verduras salteadas o espinacas frescas con patata asada.</p>
            <p class="menu-item-price">11.90€</p>
            <select id="guarnicion-vegetal16">
        <option value="Espinacas">Espinacas</option>
        <option value="Verduras Salteadas">Verduras Salteadas</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Plato Vegetal', '', document.getElementById('guarnicion-vegetal16').value, 11.90)">Agregar al Carrito</button>
        </div>
</div>




<center><h2 class="titulo-carrito">Ensaladas Frescas</h2></center>




<div class="menu">

    <div class="menu-item">
            <h2>Ensalada Block House</h2>
            <p>Fresca del día, bien mezclada, con lechuga Iceberg, tomate, pepino, cebolla, pimiento y champiñones.</p>
            <p class="menu-item-price">6.40€</p>
            <select id="Salsa-Ensalada17">
        <option value="Salsa Francesa">Salsa Francesa</option>
        <option value="Salsa Americana">Salsa Americana</option>
        <option value="Salsa Italiana">Salsa Italiana</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Ensalada Block House', '', document.getElementById('Salsa-Ensalada17').value, 6.40)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Ensalada César</h2>
            <p>Lechuga larga e Iceberg con picatostes, Grana Padano y French Dressing.</p>
            <p class="menu-item-price">7.20€</p>
            <select id="Salsa-Ensalada18">
        <option value="Salsa Francesa">Salsa Francesa</option>
        <option value="Salsa Americana">Salsa Americana</option>
        <option value="Salsa Italiana">Salsa Italiana</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Ensalada César', '', document.getElementById('Salsa-Ensalada18').value, 7.20)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Ensalada de Tomate</h2>
            <p>Con cebollas rojas suaves y aderezada con Balsámico Dressing.</p>
            <p class="menu-item-price">5.60€</p>
            <select id="Salsa-Ensalada19">
        <option value="Salsa Francesa">Salsa Francesa</option>
        <option value="Salsa Americana">Salsa Americana</option>
        <option value="Salsa Italiana">Salsa Italiana</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Ensalada de Tomate', '', document.getElementById('Salsa-Ensalada19').value, 5.60)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Ensalada de César con Pavo</h2>
            <p>Lechuga larga con queso Grana Padano, picatostes y French Dressing.</p>
            <p class="menu-item-price">13.60€</p>
            <select id="Salsa-Ensalada20">
        <option value="Salsa Francesa">Salsa Francesa</option>
        <option value="Salsa Americana">Salsa Americana</option>
        <option value="Salsa Italiana">Salsa Italiana</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Ensalada de César con Pavo', '', document.getElementById('Salsa-Ensalada20').value, 13.60)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Ensalada Rancho</h2>
            <p>Sabrosa ensalada con jugosas tiras de ternera, bacon asado crujiente.</p>
            <p class="menu-item-price">13.80€</p>
            <select id="Salsa-Ensalada21">
        <option value="Salsa Francesa">Salsa Francesa</option>
        <option value="Salsa Americana">Salsa Americana</option>
        <option value="Salsa Italiana">Salsa Italiana</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Ensalada Rancho', '', document.getElementById('Salsa-Ensalada21').value, 13.80)">Agregar al Carrito</button>
        </div>

        </div>



        <center><h2 class="titulo-carrito">Vino y Cerveza</h2></center>




<div class="menu">

    <div class="menu-item">
            <h2>Cerveza Warsteiner sin alcohol bot. 0,33</h2>
            <p class="menu-item-price">3.80€</p>
    <button onclick="agregarAlCarrito('Cerveza Warsteiner sin alcohol bot. 0,33', '', '', 3.80)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Cerveza Warsteiner bot. 0,33</h2>
            <p class="menu-item-price">3.80€</p>
    <button onclick="agregarAlCarrito('Cerveza Warsteiner bot. 0,33', '', '', 3.80)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Cerveza de Trigo bot. 0,5l</h2>
            <p class="menu-item-price">5.00€</p>
    <button onclick="agregarAlCarrito('Cerveza de Trigo bot. 0,5l', '', '', 5.00)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Ramón Bilbao Rosado, Garnacha, 0,75l</h2>
            <p class="menu-item-price">15.00€</p>
    <button onclick="agregarAlCarrito('Ramón Bilbao Rosado, Garnacha, 0,75l', '', '', 15.00)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Vino Tinto Ederra Crianza 0,75l</h2>
            <p class="menu-item-price">16.00€</p>
    <button onclick="agregarAlCarrito('Vino Tinto Ederra Crianza 0,75l', '', '', 16.00)">Agregar al Carrito</button>
        </div>

        </div>




        <center><h2 class="titulo-carrito">Extra Acompañamientos</h2></center>




<div class="menu">

    <div class="menu-item">
            <h2>Baked Potato</h2>
            <p>Recién horneado, exclusivamente seleccionado para nosotros con Sour Cream.</p>
            <p class="menu-item-price">3.80€</p>
    <button onclick="agregarAlCarrito('Cerveza Warsteiner sin alcohol bot. 0,33', '', '', 3.80)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Pan Block House</h2>
            <p>Caliente del horno untado con un toque de aceite de ajo.</p>
            <p class="menu-item-price">1.10€</p>
    <button onclick="agregarAlCarrito('Pan Block House', '', '', 1.10)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Mantequilla de Hierbas</h2>
            <p class="menu-item-price">1.20€</p>
    <button onclick="agregarAlCarrito('Mantequilla de Hierbas', '', '', 1.20)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Steak Dip</h2>
            <p>Nuestra salsa Barbacoa especial.</p>
            <p class="menu-item-price">2.20€</p>
    <button onclick="agregarAlCarrito('Steak Dip', '', '', 2.20)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Verduras Salteadas</h2>
            <p>con pimientos, calabacín, champiñones y cebollas.</p>
            <p class="menu-item-price">4.80€</p>
    <button onclick="agregarAlCarrito('Steak Dip', '', '', 4.80)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Patatas Fritas</h2>
            <p>De corte fino.</p>
            <p class="menu-item-price">3.80€</p>
    <button onclick="agregarAlCarrito('Steak Dip', '', '', 3.80)">Agregar al Carrito</button>
        </div>

        </div>

        <div class="menu">

    <div class="menu-item">
            <h2>Espinacas Frescas “Brasserie”</h2>
            <p>Con fino aliño y cebolla.</p>
            <p class="menu-item-price">3.80€</p>
    <button onclick="agregarAlCarrito('Espinacas Frescas “Brasserie”', '', '', 3.80)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Sour Cream</h2>
            <p>Receta original Block House.</p>
            <p class="menu-item-price">1.10€</p>
    <button onclick="agregarAlCarrito('Sour Cream', '', '', 1.10)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Aliño para ensalada 50ml</h2>
            <p class="menu-item-price">1.60€</p>
            <select id="Salsa-Ensalada22">
        <option value="Salsa Francesa">Salsa Francesa</option>
        <option value="Salsa Americana">Salsa Americana</option>
        <option value="Salsa Italiana">Salsa Italiana</option>
            </select> <br>
    <button onclick="agregarAlCarrito('Aliño para ensalada 50ml', '', document.getElementById('Salsa-Ensalada22').value, 1.60)">Agregar al Carrito</button>
        </div>

        <div class="menu-item">
            <h2>Pimienta Steak Vaso 50grs</h2>
            <p class="menu-item-price">3.20€</p>
    <button onclick="agregarAlCarrito('Steak Dip', '', '', 3.20)">Agregar al Carrito</button>
        </div>

        </div>

       
    <script src="../app.js"></script>



</body>
</html>
