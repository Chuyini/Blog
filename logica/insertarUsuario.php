<?php 

require "./conexion.php";

//si intenta ingresar por la url
if(!isset($_POST['usuario']) || !isset($_POST['contraseña'])){

    header("Location: http://localhost/ProyectoJMPHP/CRUD/registro.php?error= ingrese atravez del formulario");
    return;

}

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

//generamos consulta
$insert="INSERT INTO usuarios (usuario,contraseña) VALUES ('".$usuario."','".$contraseña."') ";

$resultado = mysqli_query($conexion, $insert);

if (!$resultado) {
    // Si hay un error en la consulta, maneja el error y redirige a la página de registro con el mensaje de error
    $error_message = mysqli_error($conexion); // Obtener el mensaje de error de MySQLi
    header("Location: http://localhost/ProyectoKVPHP/CRUD/registro.php?error=" . urlencode($error_message));
    exit(); // Asegúrate de que el script se detenga después de enviar la cabecera
} else {
    // Si la consulta se ejecuta correctamente, redirige a la página de inicio de sesión
    header("Location: http://localhost/ProyectoKVPHP/CRUD/Login.php");
    exit(); // Asegúrate de que el script se detenga después de enviar la cabecera
}
 


//regresamo a la pagina de login




?>