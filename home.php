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

	$sql = 'SELECT * FROM tbl_usuarios';

	$statement = $conx->prepare($sql);
	$statement->execute();
	$pessoas = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
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
<?php require 'footer.php'; ?>