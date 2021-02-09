<?php 
session_start();

	if ((!isset($_SESSION['email']) == true) and
		(!isset($_SESSION['senha']) == true)) {

		unset($_SESSION['email']);
		unset($_SESSION['senha']);

    session_destroy();

		header('location:index.php');
	} else {
		$logado = $_SESSION['email'];
	}

require('conectar.php');

$btnCadastro = filter_input(INPUT_POST, 'btn', FILTER_SANITIZE_STRING);

	if ($btnCadastro){
		$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
		$senha = $_POST["senha"];

		$ins = $conx->prepare('SELECT email FROM projeto2.tbl_usuarios WHERE email = :email');
		$ins->bindParam(':email', $email);
		$ins->execute();

		$resultado = $ins->rowCount();
	}

	if ($resultado == 0) {
		try {
			$ins = $conx->prepare("INSERT INTO $db.$tbl (nome, email, senha)
				   VALUES (:nome, :email, :senha)");
			$ins->bindParam(':nome', $nome);
			$ins->bindParam(':email', $email); 
			$ins->bindParam(':senha', $senha);
			$ins->execute();

			header("Location: ../home.php");
		}

		catch(PDOException $e) {
			echo "Erro na inclusão: " . $e->getMessage();
		}
	}
	else {
		header("Location: ../cadastro.php?erro=1");
	}
?>