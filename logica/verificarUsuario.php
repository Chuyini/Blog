<?php 

    require "./conexion.php";

    if(!isset($_POST['usuario']) || !isset($_POST['contraseña'])){
        header("Location: http://localhost/ProyectoJMPHP/CRUD/Login.php?error=Datos no agregados");
        return;
    }

    $usuario=$_POST['usuario'];
    $constraseña=$_POST['contraseña'];

    $consulta="SELECT COUNT(*) as login, usuario, rol FROM usuarios WHERE usuario='".$usuario."' and contraseña='".$constraseña."'";
    //que hayamos hecho la consulta para solo saber el cuantos, no elimina las demas
    //campos sino que agrega mas campos

  
    $query=mysqli_query($conexion,$consulta);

    $row=mysqli_fetch_array($query);

    if($row["login"]>0){

        session_start();
        
        $_SESSION["usuario"]=$usuario;
        $_SESSION["rol"]=$row["rol"];
        

       header("Location: http://localhost/ProyectoKVPHP/CRUD/blog.php?nombre=".$_SESSION["usuario"]);

    }else{

        header("Location: http://localhost/ProyectoKVPHP/CRUD/Login.php?error=datos incorrectos");        
    }

    
    
    echo $consulta;

?>