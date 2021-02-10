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
$idUsuario = $_GET['idUsuario'];
$sql = 'DELETE FROM tbl_usuarios WHERE idUsuario=:idUsuario';
$statement = $conx->prepare($sql);
if ($statement->execute([':idUsuario' => $idUsuario])) {
  header("location:administration.php?sucesso=1");
}