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
    $correo = $_POST["email"];
    $contrasena = $_POST["password"];
    $restaurante = $_POST["restaurante"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $cumpleanos = $_POST["cumpleanos"];
    $sexo = $_POST["sexo"];
    $telefono = $_POST["telefono"];

    // Validación del nombre
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $nombre)) {
        echo '<div class="error-messagephp">';
        echo "El nombre solo puede contener letras, espacios, apóstrofes y guiones. Volverás al formulario automáticamente. Por favor, espera 3 segundos";
        echo '</div>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "../registro.php";
        }, 5000); // 5000 milisegundos = 3 segundos
      </script>';
        exit();
    }

    // Validación de los apellidos
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $apellidos)) {
        echo '<div class="error-messagephp">';
        echo "Los apellidos solo pueden contener letras, espacios, apóstrofes y guiones. Volveras al formulario automaticamente, porfavor espera 3segundos";
        echo '</div>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "../registro.php";
        }, 5000); // 5000 milisegundos = 3 segundos
      </script>';
        exit();
    }

    // Validación del correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="error-messagephp">';
        echo "El correo electrónico no es válido. Volveras al formulario automaticamente, porfavor espera 3segundos";
        echo '</div>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "../registro.php";
        }, 5000); // 5000 milisegundos = 3 segundos
      </script>';
        exit();
    }

    // Validación de la contraseña
    if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d).{8,}$/", $contrasena)) {
        echo '<div class="error-messagephp">';
        echo "La contraseña debe contener al menos una letra y un número, y tener al menos 8 caracteres. Volveras al formulario automaticamente, porfavor espera 3segundos";
        echo '</div>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "../registro.php";
        }, 5000); // 5000 milisegundos = 3 segundos
      </script>';
        exit();
    }

    
    include("conexion.php");

    


        // Verifica si el correo electrónico ya está registrado
    $email = $_POST["email"];
    $sql_check_email = "SELECT * FROM Usuarios WHERE CorreoElectronico = '$email'";
    $result_email = $conn->query($sql_check_email);

    if ($result_email->num_rows > 0) {
        echo '<div class="error-messagephp">';
        echo "El correo electrónico ya está registrado. <br> Inicia Sesion si ya tienes una cuenta, espere 3s";
        echo '</div>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "../iniciarsesion.php";
        }, 5000); // 5000 milisegundos = 3 segundos
      </script>';
        $conn->close();
        exit(); // Detener la ejecución del script
    }


    // Verifica si el número de teléfono ya está registrado
    $telefono = $_POST["telefono"];
    $sql_check_phone = "SELECT * FROM Usuarios WHERE Telefono = '$telefono'";
    $result_phone = $conn->query($sql_check_phone);

    if ($result_phone->num_rows > 0) {
        echo '<div class="error-messagephp">';
        echo "El número de teléfono ya está registrado .<br> Inicia Sesion si ya tienes una cuenta, espere 3s";
        echo '</div>';
        echo '<script>
        setTimeout(function() {
            window.location.href = "../iniciarsesion.php";
        }, 5000); // 5000 milisegundos = 3 segundos
      </script>';
        $conn->close();
        exit(); // Detener la ejecución del script
    }

    
    // Prepara la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO usuarios (CorreoElectronico, Contrasena, Restaurante, Nombre, Apellidos, Cumpleanos, Sexo, Telefono) 
            VALUES ('$correo', '$contrasena', '$restaurante', '$nombre', '$apellidos', '$cumpleanos', '$sexo', '$telefono')";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo '<div class="error-messagephp">';
        echo "Registro creado exitosamente. Espere 5s y inicie sesión";
        echo '</div>';
        echo '<script>
            setTimeout(function() {
                window.location.href = "../iniciarsesion.php";
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