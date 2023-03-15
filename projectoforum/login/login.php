<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Página de login</title>
    <link rel="stylesheet" href="logines.css">
  </head>
  <body>
    <div class="login-box">
      <h2>Login</h2>
      <form action="processa_login.php" method="post">
        <div class="user-box">
          <input type="text" name="username" value="" required="">
          <label>email</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" value="" required="">
          <label>Senha</label>
        </div>
        <?php
            if(isset($_SESSION['msg'])){
                echo ($_SESSION['msg']);
                unset ($_SESSION['msg']);
            }
        ?>
        <button type="submit" name="login" value="submit">Entrar</button>
      </form>
    </div>
  </body>
</html>
