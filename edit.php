<?php
  $page = 'Edit';

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
  require_once('function/idUsuario.php');

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
<!--Campo para inclusão das Informações -->
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid">
            <!--Título-->
      <div class="container">
        <div class="card mt-5">
          <div class="card-header">
            <h2>Alterar Usuário</h2>
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
                  <label for="name">Nome</label>
                  <input value="<?= $pessoas->nome; ?>" type="text" name="nome" id="nome" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input value="<?= $pessoas->email; ?>" type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Senha</label>
                  <input value="<?= $pessoas->senha; ?>" type="password" name="senha" id="senha" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-info">Alterar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
<?php
    if($page == 'Edit') {
          echo '<script>
                document.querySelector("#ativoEdit").classList.add("active");
                document.querySelector("#menuAtivo").classList.remove("collapsed");
                document.querySelector("#menuAtivo").classList.add("active");
                document.querySelector("#ativoCollapsed").classList.add("show");
              </script>';
        }
  ?>
<?php require 'footer.php'; ?>
