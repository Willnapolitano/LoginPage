<?php

  require_once '../lib/usuarios.php';
  $u = new usuario;

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="../galeria/2431Logo.ico">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/card_cadastro.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/erroseconfirmacao.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../javascript/menu.js" defer></script>
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
                <li id="li1"><a href="../index.php">Home</a></li>
                <li id="li2"><a href="../index.php">About</a></li>
                <li id="li3"><a href="https://github.com/Willnapolitano" target="blank">Github</a></li>
                <li id="li4"><a href="https://www.instagram.com/_willdev/" target="blank">Contact</a></li>
              </ul>
          </div>
        </nav>
    </div>
    </header>
    <main>
    	<section>
    		<form method="POST">
    			<div class="card-cadastro">
    				<h1>Register</h1>
    				<div class="nome">
    					<input type="text" name="nome" id="nome" maxlength="50" placeholder="Name">
    				</div>
    				<div class="email">
    					<input type="email" name="email" id="email" maxlength="50" placeholder="E-mail">
    				</div>
    				<div class="senha">
    					<input type="text" name="senha" id="senha" maxlength="15" placeholder="Password"> 
    				</div>	
    				<div class="enviar">
    					<input type="submit" name="enviar" id="enviar" value="Register">
    				</div>
    			</div>
    		</form>
    	</section>
    </main>
    <?php
      if(isset($_POST['enviar']))
      {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
      }

      if(!empty($nome) && !empty($email) && !empty($senha))
      {
        $u->conectar("login_page","localhost","root","");
        if($u->msgErro === "")
        {
          if($u->cadastrar("$nome","$email","$senha"))
          {
            echo "<div class='acerto'>Registered successfully!<a href='../index.php'>login to enter</a></div>";
          }
          else
          {
            echo "<div class='erro'>E-mail already registered</div>";
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