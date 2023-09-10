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
<?php
include("conexion.php");

// Recuperar datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta SQL para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE CorreoElectronico='$email' AND Contrasena='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Inicio de sesión exitoso
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    header("Location: inicio_exitoso.php"); // Redirige a la página después de iniciar sesión correctamente
} else {
    
    echo '<div class="error-messagephp">';
    echo "La contraseña y el correo no coinciden. Por favor, inténtelo de nuevo.";
    echo '</div>';
    echo '<script>
    setTimeout(function() {
        window.location.href = "../iniciarsesion.php";
    }, 5000); // 5000 milisegundos = 3 segundos
  </script>';
    exit();


}

$conn->close();
?>
</body>
</html>