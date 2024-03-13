<?php 


require "./conexion.php";//necesitamos la conexion de ester archivo
//entonces las varibales necesarias como "conexion" están ahí.



//ese if verifica que le lleguen los datos por post, si no es asi los mas seguro es
//que está intentando entrar por la url, este archivo o no mando nada
if( !isset($_POST['titulo']) || !isset($_POST['descripcion']) ) {

    header("Location: http://localhost/ProyectoKVPHP/CRUD/blog.php?error=".$_POST['descripcion']);
    //simplemente lo bota la pagina que está
  return;//y detiene todo lo que hace esta parte del progrma

}



//solictamos la informacion que nos llega por POST
$nombre= $_POST['titulo'];
$descripcion= $_POST['descripcion'];



$insert = "INSERT INTO comentarios (titulo, descripcion) VALUES ('$nombre',  '$descripcion')";
//generamos el código SQL

$resultado = mysqli_query($conexion, $insert);

if (!$resultado) {
    // Si hay un error en la consulta, maneja el error y redirige a la página de registro con el mensaje de error
    $error_message = mysqli_error($conexion); // Obtener el mensaje de error de MySQLi
    header("Location: http://localhost/ProyectoKVPHP/CRUD/blog.php?error=" . urlencode($error_message));
    exit(); // Asegúrate de que el script se detenga después de enviar la cabecera
} else {
    // Si la consulta se ejecuta correctamente, redirige a la página de inicio de sesión
    header("Location: http://localhost/ProyectoKVPHP/CRUD/blog.php");
    exit(); // Asegúrate de que el script se detenga después de enviar la cabecera
}
 


//regresamo a la pagina de login




?>