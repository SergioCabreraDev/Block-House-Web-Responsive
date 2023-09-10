# Block-House-Web-Responsive
## Link of website: sergiocabreradev-bh.site
This website is based on the functions and services provided by the [blockhouse.es](https://www.block-house.es/), but with a more modern and updated design. 
The original website did not have a responsive design, so I decided to implement it to adapt to the screens of all devices.
Web Oficial:
![image](https://github.com/SergioCabreraDev/Block-House-Web-Responsive/assets/126020976/a9d5fe89-b781-4ae1-b2be-d9e63e0acf4d)
Mi Web:
![image](https://github.com/SergioCabreraDev/Block-House-Web-Responsive/assets/126020976/f4837601-fdaf-42ec-bc3d-89216473abd8)
# Funciones 
Las funciones que se veran a continución son todas las que tiene la web oficial.
## 1. Reservas Restaurante.
El sistema de reservas no tiene mucho misterio, consiste en rellenar el formulario con el restaurante al que vas a acudir, con la fecha y la hora la cual valida que no hay otra reserva a la misma hora el mismo dia.
Luego pones tu nombre y al darle al boton la reserva se guarda en la tabla del restaurante especifica que marco el usuario.
## 2. Sistema de login, registros y sesiones con PHP y MYSQL.
 ### 2.1 Registro.
 El registro consiste en rellenar un formulario con los campos requeridos para luego posteriormente almacenar el usuario en la base de datos, los campos tienen unos filtros y son validados en PHP.
 Entre esas validaciones hay una que mira que no haya el mismo correo registrado en la base de datos ni en mismo telefono, la demas validaciones se filtran mediante expresiones regulares.
 ### 2.2 Login.
 En la pagina del login hay un formulario con correo y contraseña, al darle al boton para entrar mediante PHP comprueba si hay alguna fila en la tabla en la que el correo y la contraseña coincidan.
 Una vez se verifica que existe una cuenta con ese correo entrara directamente a la pagina de bienvenida.
 ### 2.3 Sesiones.
 Una vez iniciada la session, el boton de "iniciar sesion" que habia en el menu cambiara a "mi cuenta" si la session esta en marcha, en este boton encontrara varias opciones.
 - Mi Cuenta: aqui es donde accede al iniciar sesion, en esta pagina tendra un boton si desea finalizar la sesion.
 - Tus Datos Personales: el usuario en esta pagina encontrara sus datos los cuales podra modificar libremente si le apatece, esta funcion esta desarrollada en PHP y con sentencias de MYSQL.
 - Notificaciones, Feedback, Emitir Facturas: son formularios varios los cuales se pueden usar solamente si tienes una cuenta, estos formulario actualmente no esta conectados a una base de datos, ya que el hosting que tengo contratado tiene un espacio muy limitado.
 - Wi-Fi: un apartado no muy relevante en el cual dice como conectarse a la red wifi del local.
 - Eliminar Cuenta: aqui encontraremos un boton el cual borrara la cuenta de la tabla usuarios en la base de datos.
## 3. Sistema de compras online, desarrollado JS en MYSQL.
El sistema de compra consiste en hacer un pedido añadiendo los productos al carrito, el usuario tendrá que elegir el restaurante donde irá a recoger el pedido y una hora de recogida, el formulario no te dejara elegir una hora inferior a la actual.
Por ultimo al hacer el pedido te dara un codigo de recogida para enseñar en el restaurante.
# Diseño Responsive.
Algo que no tenia la web oficial era un diseño responsive, por eso pense que seria una buena idea hacer que se adaptara a todos los dispositivos.
## 1920 x 1080 (Pantallas de Escritorio, con minimo 1500px de ancho)
![image](https://github.com/SergioCabreraDev/Block-House-Web-Responsive/assets/126020976/21794e72-adbf-4ff2-bfc3-d6173932c216)
## 1300 x 904 (Pantalla de Portatiles, con minimo 1024px de ancho hasta 1500px)
![image](https://github.com/SergioCabreraDev/Block-House-Web-Responsive/assets/126020976/2e094672-5357-4197-a3e5-ec1062a4cc86)
## 805 x 904 (Pantalla de Ipad o Tablets, con minimo 768px de ancho hasta 1024px)
Aqui se puede apreciar que el menu cambia un icono parecido a una hamburguesa el cula si pinchas se abre el menu, esto hace que sea mucho mas comodo ver el menu en esta resolucion.
![image](https://github.com/SergioCabreraDev/Block-House-Web-Responsive/assets/126020976/1a39df64-09c7-4666-a152-35238aa695ad)
![image](https://github.com/SergioCabreraDev/Block-House-Web-Responsive/assets/126020976/db9a7a2d-22b1-414d-b03c-f4bba7b70c23)

## 805 x 904 (Pantalla Movil,para pantallas con maximo 767px de ancho)
El menu cambia al igual que en las tablets con el mismo diseño.

![image](https://github.com/SergioCabreraDev/Block-House-Web-Responsive/assets/126020976/a5210a3b-9921-4d01-84ab-14899eb300f7)
