<?php
session_start(); // Asegurarse de que se ha iniciado la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bh_db";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los datos enviados desde el formulario
    $newPassword = $_POST["password"];
    $newRestaurante = $_POST["restaurante"];
    $newNombre = $_POST["nombre"];
    $newApellidos = $_POST["apellidos"];
    $newTelefono = $_POST["telefono"];

    // Actualizar los datos en la base de datos
    $updateQuery = "UPDATE Usuarios SET Contrasena='$newPassword', Restaurante='$newRestaurante', Nombre='$newNombre', Apellidos='$newApellidos', Telefono='$newTelefono' WHERE CorreoElectronico = '" . $_SESSION['email'] . "'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
