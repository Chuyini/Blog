<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background: #34495e;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box {
    width: 300px;
    padding: 40px;
    position: relative;
    background: #fff;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    animation: showUp 0.5s ease forwards;
}

@keyframes showUp {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.login-box h2 {
    margin: 0 0 30px;
    padding: 0;
    color: #333;
}

.user-box {
    position: relative;
    margin-bottom: 30px;
}

.user-box input {
    width: 100%;
    padding: 10px 0;
    margin-bottom: 10px;
    border: none;
    outline: none;
    background: none;
    color: #333;
    font-size: 18px;
    border-bottom: 1px solid #333;
    transition: border-color 0.3s ease;
}

.user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #333;
}

.user-box input:focus~label,
.user-box input:valid~label {
    top: -20px;
    left: 0;
    color: #3498db;
}

button {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.error{

    color:red;
}

button:hover {
    background-color: #2980b9;
}

    </style>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="./logica/verificarUsuario.php" method="post">
            <div class="user-box">
                <input type="text" name="usuario" required>
                <label>Usuario</label>
            </div>
            <div class="user-box">
                <input type="password" name="contraseña" required>
                <label>Contraseña</label>
            </div>
            <button type="submit">Aceptar</button>
            <?php 
                if(isset($_GET['error']))
                {
                    echo "<span class='error'>".$_GET['error']."</span>";
                }

            ?>
        </form>
    </div>
</body>

</html>