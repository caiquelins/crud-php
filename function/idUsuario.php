<?php

require_once('function/conectar.php');


$logado = $_SESSION['email'];
$email = $logado;

$ins = $conx->prepare('SELECT idUsuario FROM projeto2.tbl_usuarios WHERE email = :email');
$ins->bindParam(':email', $email);
$ins->execute();

$usuario = $ins->fetch(PDO::FETCH_OBJ);

$idUsuario = $usuario->idUsuario;
?>
