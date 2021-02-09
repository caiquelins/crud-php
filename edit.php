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

  require_once('function/conectar.php');

  $idUsuario = $_GET['idUsuario'];

  $sql = 'SELECT * FROM tbl_usuarios WHERE idUsuario =:idUsuario';
  $statement = $conx->prepare($sql);
  $statement->execute([':idUsuario' => $idUsuario ]);
  $pessoas = $statement->fetch(PDO::FETCH_OBJ);

  if (isset ($_POST['nome'])  && isset($_POST['email']) ) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sql = 'UPDATE tbl_usuarios SET nome=:nome, email=:email WHERE idUsuario=:idUsuario';
    $statement = $conx->prepare($sql);
    if ($statement->execute([':nome' => $nome, ':email' => $email, ':idUsuario' => $idUsuario])) {
      header("Location: /");
    }
  }
 ?>
 
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update pessoas</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post" action="edita.php">
        <div class="form-group">
          <label hidden="true" for="idUsuario">idUsuario</label>
          <input hidden="true" value="<?= $pessoas->idUsuario; ?>" type="number" name="idUsuario" id="idUsuario" class="form-control">
        </div>
        <div class="form-group">
          <label for="nome">Nome</label>
          <input value="<?= $pessoas->nome; ?>" type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $pessoas->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="text" value="<?= $pessoas->senha; ?>" name="senha" id="senha" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update pessoas</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
