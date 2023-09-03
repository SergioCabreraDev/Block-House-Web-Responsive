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
// Verifica si se enviaron datos mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los valores del formulario
    $restaurante = $_POST["restaurante"];
    $fecha = $_POST["fecha"];
    $personas = $_POST["personas"];

    
    // Conexión a la base de datos
    $servername = "localhost"; // Cambia esto al nombre de tu servidor MySQL
    $username = "root"; // Cambia esto al nombre de tu usuario de MySQL
    $password = ""; // Cambia esto a tu contraseña de MySQL
    $dbname = "bh_db"; // Nombre de la base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    
    // Prepara la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO reservas (restaurante, fecha, personas) 
            VALUES ('$restaurante', '$fecha', '$personas')";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo '<div class="error-messagephp">';
        echo "Su reserva se ha realizado correctamente. Espere 5s y inicie sesión";
        echo '</div>';
        echo '<script>
            setTimeout(function() {
                window.location.href = "../index.php";
            }, 5000); // 5000 milisegundos = 5 segundos
          </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>


</body>