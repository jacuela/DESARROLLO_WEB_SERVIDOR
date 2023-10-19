
<?php

session_start();

$jsonData = file_get_contents("./users.json", FILE_USE_INCLUDE_PATH); 
$credenciales = json_decode($jsonData);

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if (password_verify($password, $credenciales->Password)) {
     $_SESSION['user_id'] = $credenciales->Username;
     $_SESSION['user_password'] = $password;
     $okLogin=true;
     header("Location: ./blog.php");
     //echo '<p>Felicidades, has logeado con exito!</p>';
} else {
     $okLogin=false;
     //echo '<p>SOOORY, password erroneo</p>';
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>PEC3 - BLOG</title>
</head>

<body>
    
    <main>
      <form method="post" action="login.php">
          <div class="box">
              <h2>Login</h2>
              <label>Username</label>
              <input type="text" name="username" class="inputCampo" />
              <br><br>
              <label>Password</label>
              <input type="password" name="password" class="inputCampo" />
            
              <button class="btn" type="submit" name="login" value="login">Log In</button>
              <?php
                if (isset($_POST['login']) && $okLogin==false){
                  echo '<p class="error">ERROR, password incorrecto</p>';
                  echo '<p>Prueba con jcuelloa / jcuelloa</p>';
                }
              ?>

          </div>
      </form>
 
    </main>


</body>
</html>
