 <?php

 class usuario
 {
 	private $pdo;
 	public $msgErro =  "";
 	public function conectar($nome, $host, $usuario, $senha)
 	{
 		global $pdo;
 		global $msgErro;
 		try 
 		{
 			$pdo = new PDO("mysql:dbname={$nome};host=".$host,$usuario,$senha);
 		} catch (PDOException $e) {
 			$msgErro = $e->getMessage();
 		}
 		
 	}

 	public function cadastrar($nome, $email, $senha)
 	{
 		global $pdo;
 		//verificação se já esta cadastrado
 		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
 		$sql->bindValue(":e",$email);
 		$sql->execute();
 		if($sql->rowCount() > 0)
 		{
 			return false;
 		}
 		else
 		{
 			$sql = $pdo->prepare("INSERT INTO usuarios (nome,email,senha)  VALUES (:n, :e, :s)");
 			$sql->bindValue(":n",$nome);
 			$sql->bindValue(":e",$email);
 			$sql->bindValue(":s",md5($senha));
 			$sql->execute();
 			return true;
 		
 		 }
 	}

 	public function logar($email, $senha)
 	{
 		global $pdo;
 		//verificar se esta cadastrado
 		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
 		$sql->bindValue(":e",$email);
 		$sql->bindValue(":s",md5($senha));
 		$sql->execute();
 		if($sql->rowCount() > 0)
 		{
 			//entra na sessao
 			session_start();
 			$_SESSION["email"] = $email;
 			$_SESSION["senha"] = md5($senha);
 			return true;
 		}
 		else
 		{
 			return false;
 		}
 	}
 }