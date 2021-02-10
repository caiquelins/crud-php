<?php
  $page = 'Create';
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
<!--Campo para inclusão das Informações -->
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
          <!--Título-->
    <div class="container">
      <div class="card mt-5">
        <div class="card-header">
          <h2>Cadastre um Usuário</h2>
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
      </main>
      <?php
        if($page == 'Create') {
              echo '<script>
                    document.querySelector("#ativoCreate").classList.add("active");
                    document.querySelector("#menuAtivo").classList.remove("collapsed");
                    document.querySelector("#menuAtivo").classList.add("active");
                    document.querySelector("#ativoCollapsed").classList.add("show");
                  </script>';
            }
      ?>
    <?php require 'footer.php'; ?>
