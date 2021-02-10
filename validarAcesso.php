<?php

    session_start();

	require_once('function/conectar.php');

	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	$ins = $conx->prepare('SELECT nome, email, senha FROM db_crudphp.tbl_usuarios WHERE email = :email AND senha = :senha');
	$ins->bindParam(':email', $email);
	$ins->bindParam(':senha', $senha);
	$ins->execute();
	
	
	$resultado = $ins->rowCount();

	if ($resultado == 1) {
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		header('location:home.php');
	} else {
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header('Location: index.php?erro=1');
	}

?>