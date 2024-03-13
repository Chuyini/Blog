<?php 
session_start();





?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Blog de Historias</title>
  <style>
     /* Estilos generales */
 body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5; /* Color de fondo */
  }

  header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
  }

  nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: center;
  }

  nav ul li {
    display: inline;
    margin-right: 20px;
  }

  nav ul li a {
    color: #fff;
    text-decoration: none;
  }

  main {
    padding: 20px;
  }

  section {
    background-color: #fff; /* Color de fondo de las secciones */
    padding: 20px;
    margin-bottom: 20px; /* Espacio entre secciones */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
  }

  footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  </style>
</head>
<body>
  <header>
    <h1>Mi Blog de Historias</h1>
    <nav>
      <ul>

      <?php if(isset($_SESSION["usuario"])) { ?>

        <li><a href="./blog.php">Publicaciones</a></li>
        <li><a href="./logica/logout.php">Salir</a></li>
        <?php } else { ?>

            <li><a href="./Login.php">Iniciar Sesión</a></li>
        
            <li><a href="./registrarse.php">Registrarse</a></li>

            <li><a href="./blog.php">Publicaciones</a></li>

       <?php } ?>

        
        
        <!-- Mostrar otras opciones según el rol del usuario -->
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <h2>Últimas Publicaciones</h2>
      <!-- Contenido de las publicaciones -->
    </section>

    <section>
      <h2>Comentarios</h2>
      <!-- Contenido de los comentarios -->
    </section>

    <section>
      <h2>Donaciones</h2>
      <!-- Contenido para donaciones -->
    </section>
  </main>

  <footer>
    <p>&copy; 2023 Mi Blog de Historias</p>
  </footer>
</body>
</html>
