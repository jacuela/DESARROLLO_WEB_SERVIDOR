<?php
session_start();
?>

<nav>
<ul>
  <li class="izda"><a class="menu" href="blog.php">Home</a></li>
  <li class="izda"><a class="menu" href="actividad_1.php" target="_blank">Act1</a></li>
  <li class="izda"><a class="menu" href="api/noticias/" target="_blank">API</a></li>
  <?php
      if (isset($_SESSION['user_id'])){
           echo "<li class='drcha'><a class='menu' href='logout.php'>Logout</a></li>";
           echo "<li class='drcha'><a class='menu' href='perfil.php'>Perfil</a></li>";
           echo " <li class='drcha'><a class='menu2'>Hola, {$_SESSION['user_id']}</a></li>";
      }
      else{
        echo "<li class='drcha'><a class='menu' href='login.php'>Login</a></li>";
      }
  ?>  
</ul>  
<br>
</nav>
