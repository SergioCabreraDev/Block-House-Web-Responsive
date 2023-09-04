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
</head>
<body>
    <!-- Tu contenido HTML y código PHP aquí -->


    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restaurante = $_POST['restaurante'];
    $hora = $_POST['hora'];
    $nombre = $_POST['nombre'];
        // Conexión a la base de datos
        $servername = "localhost"; // Cambia esto al nombre de tu servidor MySQL
        $username = "root"; // Cambia esto al nombre de tu usuario de MySQL
        $password = ""; // Cambia esto a tu contraseña de MySQL
        $dbname = "bh_db"; // Nombre de la base de datos específica del restaurante
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
    // Verifica si el campo "carrito" está presente en la solicitud POST
    if (isset($_POST["carrito"])) {
        // Obtiene el carrito de productos en formato JSON
        $carritoJSON = $_POST["carrito"];

        // Decodifica el JSON para obtener el array de productos
        $carrito = json_decode($carritoJSON, true);

        // Ahora, $carrito contiene los productos agregados al carrito

        // Inicializa una cadena para almacenar el contenido del carrito
        $contenidoCarrito = "";

        $totalCarrito = 0; // Inicializa el total del carrito

        foreach ($carrito as $producto) {
            $contenidoCarrito .="*" . $producto["nombre"] . ", ";
            $contenidoCarrito .= $producto["puntoCoccion"] . ", ";
            $contenidoCarrito .= $producto["guarnicion"] . ".    ";

      
        }

         // Calcula el total del carrito
         $totalCarrito = 0;
         foreach ($carrito as $producto) {
             $totalCarrito += $producto["precio"];
         }
         

    }
    // Genera un número aleatorio de 6 dígitos
$numeroAleatorio = mt_rand(100000, 999999);

// Convierte el número en una cadena
$codigoAleatorio = strval($numeroAleatorio);




    $sqlInsert = "INSERT INTO $restaurante (Codigo,Hora, Nombre, Productos, Precio_Total) VALUES ('$codigoAleatorio', '$hora', '$nombre', '$contenidoCarrito', '$totalCarrito')";
    if ($conn->query($sqlInsert) === TRUE) {
        echo '<div class="error-messagephp">';
        echo "Pedido realizado con éxito.
        <br>" ;
        echo "Tu código de recogida es: $codigoAleatorio <br>";
        echo "<a href='../index.php' class='codigo'>YA HE APUNTADO MI CODIGO</a>";
        echo '</div>';
    } else {
        echo "Error al realizar la reserva: " . $conn->error;
    }

// Cierra la conexión
$conn->close();
}


?>






</body>