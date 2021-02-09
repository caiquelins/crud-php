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

?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Cadastre uma pessoa</h2>
    </div>
    <div class="card-body">
      <form method="post" action="function/cadastraUsuario.php">
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Senha</label>
          <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="btn" class="btn btn-info"></input>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
