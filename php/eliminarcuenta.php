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

include("conexion.php");

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
<footer class="footer_inicioexitoso">
    <div class="footer-content">
        <ul class="footer-links">
            <li><p>Sergio Cabrera</p></li>
            <li><a href="#"><p>Administracion Central</p></a></li>
          </ul>
          <ul class="footer-links">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../empresa.php">Empresa</a></li>
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
</html>