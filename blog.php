<?php 

require "./logica/conexion.php";

session_start();
$auto=0;
//si intentamos ingresar por la URL te regresa al login
if(isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){

    $user=$_SESSION["usuario"];
    $rol=$_SESSION["rol"];
    
}else{

$auto=1;
}

$consulta= "SELECT * FROM notas";

$query= mysqli_query($conexion, $consulta);

$consulta2= "SELECT * FROM comentarios";

$query2= mysqli_query($conexion, $consulta2);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historias y Comentarios</title>
    <style>
        /* Estilos para la página */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    color: #333;
}
a.regresar {
  display: inline-block;
  padding: 10px 20px;
  background-color: #3498db;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

a.regresar:hover {
  background-color: #2980b9;
}

header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

main {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

section {
    margin-bottom: 30px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
}

h2 {
    color: #333;
}
.imagen{

    max-width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover; 
            margin-bottom:10px;
            display: block;
            margin:auto;
            margin-bottom:20px;


}
a.eliminar {
  display: inline-block;
  padding: 10px 20px;
  background-color: #e74c3c;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

a.eliminar:hover {
  background-color: #c0392b;
}


button.boton-leer-mas {
    display: block;
    width: 100px;
    text-align: center;
    margin: 10px auto;
    padding: 8px 15px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

form button{
    display: block;
    width: 100px;
    text-align: center;
    margin: 10px auto;
    padding: 8px 15px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

a.boton-leer-mas:hover {
    background-color: #444;
}

.comentarios form {
    margin-top: 30px;
}

textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    resize: vertical;
}

.comentarios button {
    padding: 8px 15px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.comentarios button:hover {
    background-color: #444;
}

    </style>
</head>
<body>

    <header>
    <a href="./principal.php" class="regresar">Regresar</a>

        <h1>Historias Interesantes</h1>

    </header>

    <main>
        



        
    
        <!-- Más secciones de historias -->

      


            <?php 
        
        while ($row = mysqli_fetch_array($query)) { 
            
            $textoCorto = substr($row['descripcion'], 0, 100)
            
            ?>
            <section class="historia" id="<?php echo $row['id']; ?>">
                
                <h2><?php echo $row['titulo']; ?></h2>
                <p><?php echo $textoCorto; ?></p>
                	
                <img alt="imagen aleatoria" src="https://picsum.photos/700/400?random" class="imagen"> 
                <button onclick="desplegar(<?php echo $row['id']; ?>, '<?php echo $row['descripcion']; ?>')" type="button" class="boton-leer-mas">Leer más</button>

                <?php 
                
                if($auto!=1){
                
                
                    if($_SESSION["usuario"]=="Kevin"){ ?>

                    <a href="./logica/eliminarNota.php?id=<?php echo $row['id']; ?>" class= "eliminar">Eliminar</a>
                <?php  } } ?>

        
             </section>
        <?php } ?>


            <h2>COMENTARIOS</h2>

            <?php 
    while ($row2 = mysqli_fetch_array($query2)) { 
?>
    <section class="comentario" id="<?php echo $row2['id']; ?>">
        <h2><?php echo $row2['titulo']; ?></h2>
        <p><?php echo $row2['descripcion']; ?></p>

        <?php if ($auto != 1 && isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "Kevin") { ?>
            <a href="./logica/eliminarComentario.php?id=<?php echo $row2['id']; ?>" class="eliminar">Eliminar</a>
        <?php } ?>
    </section>
<?php } ?>


            <!-- Agregar más comentarios -->

            

            
            <?php if(isset($_SESSION["usuario"])){ ?>

            <form action="./logica/agregarComentario.php" method="post">
                <label for="titulo" >Titulo:</label>
                <input type="text" style="display:block;" id="titulo" name="titulo" >
                <textarea name="descripcion" placeholder="Escribe tu comentario..." required></textarea>
                <button type="submit">Publicar</button>
            </form>
            <?php } ?>
            


            <?php if(isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "Kevin"){ ?>

            <h2>Solo kevin</h2>
            <form action="./logica/agregarNota.php" method="post">
             <label for="titulo" >Titulo:</label>
             <input type="text" style="display:block;" id="titulo" name="titulo" >
            <textarea name="descripcion" placeholder="Escribe tu comentario..." required></textarea>
             <button type="submit">Publicar</button>
            </form>
            <?php } ?>



        </section>
        <a href="./principal.php" class="regresar">Regresar</a>
    </main>

    <footer>
        <p>&copy; 2023 Historias Inc.</p>
    </footer>

    <script>

    function desplegar(id, descripcion) {
        const seccion = document.getElementById(id);
        const parrafo = seccion.querySelector('p');
        parrafo.textContent = descripcion;
}



    </script>



</body>
</html>
