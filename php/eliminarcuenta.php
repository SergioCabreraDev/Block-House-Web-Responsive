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
// Iniciar sesión
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bh_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if(isset($_SESSION['email'])) {
    $correo = $_SESSION['email'];
    
    // Consulta para eliminar la fila
    $sql = "DELETE FROM Usuarios WHERE CorreoElectronico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);

    if ($stmt->execute()) {
        session_destroy();
        echo '<div class="error-messagephp">';
        echo "Cuenta eliminada exitosamente. <br>";
        echo "Por favor, espera 3 segundos";
        echo '</div>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "../index.php";
        }, 5000); // 5000 milisegundos = 3 segundos
      </script>';

exit();

    } else {
        echo "Error al eliminar fila: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "La variable de sesión 'email' no está definida.";
}

$conn->close();
?>
</body>
<script>
 // Obtenemos el elemento del input de fecha
 const fechaInput = document.getElementById('campo2');

// Obtenemos la fecha actual en formato yyyy-mm-dd
const fechaActual = new Date().toISOString().slice(0, 10);

// Establecemos la fecha actual como valor predeterminado en el input de fecha
fechaInput.value = fechaActual;



</script>
</html>