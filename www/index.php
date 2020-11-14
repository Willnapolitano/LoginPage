<?php

  require_once './lib/usuarios.php';
  $u = new usuario;

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
    <link rel="shortcut icon" type="image/x-icon" href="./galeria/2431Logo.ico">
    <link rel="stylesheet" type="text/css" href="./css/body.css">
    <link rel="stylesheet" type="text/css" href="./css/card_login.css">
    <link rel="stylesheet" type="text/css" href="./css/menu.css">
    <link rel="stylesheet" type="text/css" href="./css/erroseconfirmacao.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap" rel="stylesheet">
    <script type="text/javascript" src="./javascript/menu.js" defer></script>
    <script type="text/javascript" src="./javascript/removetextnodes.js" defer></script>
  </head>
  <body>
    <header>
      <div class="menu-section">
        <div class="menu-toggle"> 
          <div class="one">
          </div>
          <div class="two">
          </div>
          <div class="three">
          </div>
        </div>
       
        <nav>
          <div class="menu">
              <ul>
                <li id="li1"><a href="./index.php">Home</a></li>
                <li id="li2"><a href="./index.php">About</a></li>
                <li id="li3"><a href="https://github.com/Willnapolitano" target="blank">Github</a></li>
                <li id="li4"><a href="https://www.instagram.com/_willdev/" target="blank">Contact</a></li>
              </ul>
          </div>
        </nav>
    </div>
    </header>
    <main>
      <section>
        <div class="card-login">
          <form method="POST">
            <h1>Login in</h1>
            <div id="email">
              <input type="email" id="f-email" name="email" placeholder="E-mail" maxlength="50"/>
            </div>
            <div id="password">
              <input type="password" id="f-password" name="senha" placeholder="password" maxlength="15"/>
            </div>
            <div id="btn">
              <input type="submit" id="f-submit" name="submit" value="Login">
            </div>
            <p>Not have an account yet?<a href="./php/cadastro.php">Create one!</a></p>
          </form>
        </div>
      </section>
    </main>
  <?php
      if(isset($_POST['email']))
      {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
      }

      if(!empty($email) && !empty($senha))
      {
        $u->conectar("login_page","localhost","root","");
        if($u->msgErro == "")
        {
          if($u->logar($email,$senha))
          {
            header("location: ./php/home.php");
          }
          else
          {
            echo "<div class='erro'>Wrong email or password!</div>";
          }
        }
      }
      else
      {
        echo "<div class='erroc'>Fill in all fields</div>";
      }
  ?>
  
  </body>
</html>
