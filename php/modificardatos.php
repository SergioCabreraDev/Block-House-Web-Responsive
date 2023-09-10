<?php
session_start(); // Asegurarse de que se ha iniciado la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conexion.php");

    // Obtener los datos enviados desde el formulario
    $newPassword = $_POST["password"];
    $newRestaurante = $_POST["restaurante"];
    $newNombre = $_POST["nombre"];
    $newApellidos = $_POST["apellidos"];
    $newTelefono = $_POST["telefono"];

    // Actualizar los datos en la base de datos
    $updateQuery = "UPDATE usuarios SET Contrasena='$newPassword', Restaurante='$newRestaurante', Nombre='$newNombre', Apellidos='$newApellidos', Telefono='$newTelefono' WHERE CorreoElectronico = '" . $_SESSION['email'] . "'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
