<?php 
require "./conexion.php";//ocupamos importar este archivos para acceder a
//las varibles para la conxion

//nos aseguramos de que lleguen los datos por la ruta 
if(!isset($_GET['id']))
{
    header("Location: http://localhost/ProyectoKVPHP/CRUD/blog.php?error= No se pudo eliminar el archivo");
    return;

}


//ya que se corroboró la llegada de los datos se realiza la sentencia sql para 
//eliminar

$id=$_GET['id'];//lo guardamos en una variable


$delet="DELETE FROM notas WHERE id="."'$id'";//generamos la sentencia

//corroboramos la sentencia

echo $delet;

//ahora volvemos a usar el try catch para manejar un flujo de datos correcto

$resultado = mysqli_query($conexion, $delet);

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