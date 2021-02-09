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
	require('function/conectar.php');

	$idUsuario = $_POST['idUsuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    var_dump($senha);

    try {
			$ins = $conx->prepare("UPDATE $db.$tbl SET nome = :nome, email = :email, senha = :senha WHERE idUsuario = :idUsuario");
			$ins->bindParam(':nome', $nome);
			$ins->bindParam(':email', $email); 
			$ins->bindParam(':senha', $senha);
			$ins->bindParam(':idUsuario', $idUsuario);
			$ins->execute();

			header("Location: home.php");
		}

		catch(PDOException $e) {
			echo "Erro na atualização: " . $e->getMessage();
		}
?>