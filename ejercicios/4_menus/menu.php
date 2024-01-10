<header>
  <h1>ALTA Y LOGIN DE USUARIOS</h1>
</header>
<nav>
  <ul>
    <li class="izda"><a class="menu" href="index.php">Home</a></li>
    <li class="izda"><a class="menu" href="alta.php">Alta</a></li>
    <?php

    if (isset($_SESSION['usuarioObjeto'])) {

      $email_usuario = $_SESSION["usuarioObjeto"]->email;

      echo "<li class='drcha'><a class='menu' href='logout.php'>Logout</a></li>";
      echo "<li class='drcha'><a class='menu' href='perfil.php'>Perfil</a></li>";
      echo " <li class='drcha'><a class='menu2'>Hola, {$email_usuario}</a></li>";
    } else {
      echo "<li class='drcha'><a class='menu' href='login.php'>Login</a></li>";
    }
    ?>
  </ul>
  <br>
</nav>