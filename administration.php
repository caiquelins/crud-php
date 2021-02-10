<?php
  $page = 'Administration';

  $sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;

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

	$sql = 'SELECT * FROM tbl_usuarios';

	$statement = $conx->prepare($sql);
	$statement->execute();
	$pessoas = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>
<!--Campo para inclusão das Informações -->
<div id="layoutSidenav_content">
  <main>
    <div class="container">
      <div class="card mt-5">
        <?php if($sucesso == 1) {                  
  echo '<div style="padding-left:40%; z-index: 10; position: absolute;"><button type="button" id="alert-sucesso-remover" class="btn btn-danger">Usuário Deletado com Sucesso !</button></div>';
  echo '<script>
        window.setTimeout(function() {
            $("#alert-sucesso-remover").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove(); 
            });
        },2000);
      </script>';}?>
        <div class="card-header">
          <h2>Usuários</h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>idUsuario</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Senha</th>
              <th>Ação</th>
            </tr>
            <?php foreach($pessoas as $pessoa): ?>
              <tr>
                <td><?= $pessoa->idUsuario; ?></td>
                <td><?= $pessoa->nome; ?></td>
                <td><?= $pessoa->email; ?></td>
                <td>*******</td>
                <td>
                  <a href="edit.php?idUsuario=<?= $pessoa->idUsuario ?>" class="btn btn-info">Editar</a>
                  <a onclick="return confirm('Você realmente deseja deletar este usuário ?')" href="delete.php?idUsuario=<?= $pessoa->idUsuario ?>" class='btn btn-danger'>Deletar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php
    if($page == 'Administration') {
          echo '<script>
                document.querySelector("#ativoAdministration").classList.add("active");
                document.querySelector("#menuAtivo").classList.remove("collapsed");
                document.querySelector("#menuAtivo").classList.add("active");
                document.querySelector("#ativoCollapsed").classList.add("show");
              </script>';
        }
  ?>
<?php require 'footer.php'; ?>
