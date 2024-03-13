<?php 

session_start();


session_destroy();

header("Location: http://localhost/ProyectoKVPHP/CRUD/Principal.php");

?>