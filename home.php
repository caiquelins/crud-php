<?php
  $page = 'Home';
  $sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : 0;
  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

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
	require_once('function/nomeUsuario.php');

	$sql = 'SELECT * FROM tbl_usuarios';

	$statement = $conx->prepare($sql);
	$statement->execute();
	$pessoas = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require('header.php'); ?>
<!--Campo para inclusão das Informações -->
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<!--Título-->
			<h4 class="mt-4">Bem vindo, <?php print_r($nomeUsuario); ?> !</h4>
		</div>
		<?php 
          if($sucesso == 1) {                  
			echo '<div style="padding-left:40%;"><button type="button" id="alert-sucesso-remover" class="btn btn-success">Usuário cadastrado com Sucesso !</button></div>';
			echo '<script>
					  window.setTimeout(function() {
	    			  	$("#alert-sucesso-remover").fadeTo(500, 0).slideUp(500, function() {
	        		  		$(this).remove(); 
	    			  	});
					  },2000);
				  </script>';}
		  if($erro == 1) {                  
			echo '<div style="padding-left:40%;"><button type="button" id="alert-erro-remover" class="btn btn-danger">Erro ao Cadastrar o Usuário</button></div>';
			echo '<script>
					  window.setTimeout(function() {
	    			  	$("#alert-erro-remover").fadeTo(500, 0).slideUp(500, function() {
	        		  		$(this).remove(); 
	    			  	});
					  },2000);
				  </script>';
			}
			if($page == 'Home') {
				echo '<script>
						  document.querySelector("#ativoHome").classList.add("active");
						  document.querySelector("#menuAtivo").classList.remove("collapsed");
						  document.querySelector("#menuAtivo").classList.add("active");
						  document.querySelector("#ativoCollapsed").classList.add("show");
					  </script>';
			}
        ?>
	</main>
<?php require('footer.php'); ?>