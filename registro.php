<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-movil.css">
    <link rel="stylesheet" href="css/estilo-tablet.css">
    <link rel="stylesheet" href="css/estilo-pc.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    var overlay = document.getElementById("overlay");
    var entendidoButton = document.getElementById("entendido");

    entendidoButton.addEventListener("click", function() {
        overlay.style.display = "none";
    });


    
});
         window.onload = function () {
            const form = document.getElementById("login-form");

            form.addEventListener("submit", function (event) {
                const nombre = document.getElementById("nombre").value;
                const apellidos = document.getElementById("apellidos").value;
                const email = document.getElementById("email").value;
                const password = document.getElementById("password").value;
                const telefono = document.getElementById("telefono").value;

                const letrasRegExp = /^[A-Za-z]+$/;
                const correoRegExp = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                const passwordRegExp = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

                if (!letrasRegExp.test(nombre)) {
                    alert("El nombre debe contener solo letras.");
                    event.preventDefault();
                }

                if (!letrasRegExp.test(apellidos)) {
                    alert("Los apellidos deben contener solo letras.");
                    event.preventDefault();
                }

                if (!correoRegExp.test(email)) {
                    alert("Por favor, introduce un correo válido.");
                    event.preventDefault();
                }

                if (!passwordRegExp.test(password)) {
                    alert("La contraseña debe contener al menos 8 caracteres, incluyendo letras y números.");
                    event.preventDefault();
                }

                if (telefono.length !== 9) {
                    alert("El número de teléfono debe tener 9 dígitos.");
                    event.preventDefault();
                }
            });
        };
    </script>
</head>
<body>
    <div class="superior">
    
    <nav class="nav">

        <div class="nav__container">

            <a href="index.html"><img class="nav__title" src="./assets/logonavbar.png" alt=""></a>

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
                <li class="dropdown__list">
                    <a href="iniciarsesion.php" class="dropdown__link">
                        <span class="dropdown__span"><B>INICIAR SESION</B></span>
                    </a>
                </li>
            </ul>

        </div>

    </nav>
    <center>
            
        <form class="formulario-reserva" action="/ruta/del/servidor" method="POST">
            
         <b>   <label class="label-reserva" for="campo1">RESTAURANTE:</label>
            <select class="input-reserva" name="campo1">
                <option value="" disabled selected>Selecciona un restaurante</option>
                <option value="opcion1">Málaga Larios</option>
                <option value="opcion2">Málaga Plaza Mayor</option>
                <option value="opcion3">Marbella</option>
                <option value="opcion4">Palma</option>
                <option value="opcion5">Santa Ponsa</option>
                <option value="opcion6">Festival Park</option>
                <option value="opcion7">Porto Pi</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select>                

              <label class="label-reserva" for="campo2">FECHA:</label>
              <input class="input-reserva" type="date" id="campo2" name="campo2"  placeholder="Selecciona una fecha">

            <label class="label-reserva" for="campo3">PERSONAS:</label>
            <input class="input-reserva" type="number" id="campo3" name="campo3" max="6" placeholder="Numero de Personas">

            <button class="button-reserva" type="submit"><b>RESERVAR</b></button></b>
        </form>

    </div> 
    </div>
    </div> 
    </center>

    <div class="margenes-login">

        <div class="login-container">
            <h2 class="tituloregistro">¡Hazte miembro de Block-House Comunity en España!</h2>
            <h3 class="tituloregistro1">Una cuenta Block House te da las siguientes ventajas:</h3>
            <p class="parraforegistro">- Realizar una reserva online hasta 30 minutos antes de la hora reservada <br>
                - Realizar pedidos para llevar Comida<br>
                - Recibir una pequeña sorpresa por tu cumpleaños<br>
                - Abonar información sobre acciones y ofertas especiales</p>
                <form id="login-form" method="POST" action="php/validacionregistro.php">

                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>

                    <b> <label  for="campo1">Mi Block House:</label></b>
                    <select class="input-reserva1" name="restaurante" required>
                        <option value="" disabled selected>Selecciona un restaurante</option>
                        <option value="Málaga Larios">Málaga Larios</option>
                        <option value="Málaga Plaza Mayor">Málaga Plaza Mayor</option>
                        <option value="Marbella">Marbella</option>
                        <option value="Palma">Palma</option>
                        <option value="Santa Ponsa">Santa Ponsa</option>
                        <option value="Festival Park">Festival Park</option>
                        <option value="Porto Pi">Porto Pi</option>

                    </select>   
                    <b> <label  for="">Nombre:</label></b>
                    <input class="input-reserva1" type="text" id="nombre" name="nombre" max="" placeholder="" required>  
                    <b> <label  for="">Apellidos:</label></b>
                    <input class="input-reserva1" type="text" id="apellidos" name="apellidos" max="" placeholder="" required>  
                    <b> <label  for="">Cumpleaños:</label></b>
                    <input class="input-reserva1" type="date" id="" name="cumpleanos" max="" placeholder="">  
                    <b> <label  for="campo1">Sexo:</label></b>
                    <select class="input-reserva1" name="sexo" required>
                        <option value="" disabled selected>Selecciona un sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otros">Otros</option>

                    </select>   
                    <b> <label  for="">Telefono:</label></b>
                    <input class="input-reserva1" type="number" id="telefono" name="telefono" max="" placeholder="" required>                                   
                  
                        <button class="botonlogin" type="submit">CREAR CUENTA</button>

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
