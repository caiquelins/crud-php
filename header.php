<?php
  
  if ((!isset($_SESSION['email']) == true) and
     (!isset($_SESSION['senha']) == true)) {

     unset($_SESSION['email']);
     unset($_SESSION['senha']);

     session_destroy();

     header('location:index.php');
  } else {
     $logado = $_SESSION['email'];
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Administração</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Início</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="create.php">Cadastrar</a>
      </li>
    </ul>
      <a href="deslogar.php"><button class="btn btn-danger">Deslogar</button></a>
  </div>
</nav>
