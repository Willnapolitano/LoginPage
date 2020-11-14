<?php
	session_start();
	if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
	{
  		unset($_SESSION['email']);
  		unset($_SESSION['senha']);
  		header('location: ../index.php');
  		exit();
  	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="../css/Home/home.css">
		<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
		<title>Home</title>
	</head>
	<body>
		<header>
			<div class="menu">
				<a href="./logout.php">Logout</a>
			</div>
		</header>
		<main>
			<section>
				<h1>Thanks for logging in!</h1>
				<div class="link">
				<h2><a href="https://github.com/Willnapolitano" target="blank">GitHub</a></h2>
				<h2><a href="https://www.99freelas.com.br/user/WilsonJuniorTI" target="blank">99Freelas</a></h2>
			</section>
		</main>
	</body>
</html>