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
// Obtén los datos del formulario
// Obtén los datos del formulario
$restaurante = $_POST['restaurante'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$nombre = $_POST['nombre']; // Agregamos la variable para el nombre

include("conexion.php");
// Consulta si la hora ya está ocupada en la tabla correspondiente al restaurante
$sql = "SELECT COUNT(*) as count FROM $restaurante WHERE fecha = '$fecha' AND hora = '$hora'";
$resultado = $conn->query($sql);

if ($resultado) {
    $fila = $resultado->fetch_assoc();
    $reservasExistente = $fila['count'];
    
    if ($reservasExistente > 0) {
        echo '<div class="error-messagephp">';
        // La hora ya está ocupada, muestra un mensaje de error al usuario
        echo "La hora seleccionada ya está ocupada. Por favor, elige otra hora.
        <br> Espere 3 segundos";
        echo '</div>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "../reservar/reservas.php";
        }, 5000); // 5000 milisegundos = 3 segundos
      </script>';
    } else {
        // La hora está disponible, procede a insertar la reserva en la base de datos
        $personas = $_POST['personas'];
        $sqlInsert = "INSERT INTO $restaurante (fecha, hora, nombre, personas) VALUES ('$fecha', '$hora', '$nombre', $personas)";
        
        if ($conn->query($sqlInsert) === TRUE) {
            echo '<div class="error-messagephp">';
            echo "Reserva realizada con éxito.
            <br> Espere 3 segundos";
            echo '</div>';
            echo '<script>
            setTimeout(function() {
                window.location.href = "../index.php";
            }, 5000); // 5000 milisegundos = 3 segundos
          </script>';
        } else {
            echo "Error al realizar la reserva: " . $conn->error;
        }
    }
} else {
    echo "Error al verificar la hora: " . $conn->error;
}

// Cierra la conexión
$conn->close();



?>


</body>