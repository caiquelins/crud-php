<?php

  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/cadastro_style.css">
    <title>Faça seu Cadastro !</title>
  </head>
  <body>
    <div id="cadastro">
      <div id="cabecalho-cadastro">Cadastro</div>
      <form name="form-cadastro" action="function/cadastraUsuario.php" method="POST">
        <input type="text" placeholder="Nome" name="nome" autofocus required maxlength="50">
        <span class="fontawesome-font"></span>      
        <input type="email" id="user" placeholder="E-mail" name="email" required maxlength="50">
        <span class="fontawesome-user"></span>    
        <input type="password" placeholder="Senha" name="senha" required maxlength="50">
        <span class="fontawesome-lock"></span>  
        <input type="submit" name="btn" value="Registrar"></input>
        <a href="index.php" id="botao-voltar"><div id="avisoVoltar">Voltar</div></a>
         <?php 
          if($erro == 1) {                  
            echo '<p align="center" style="color:red">Usuário já existe, tente novamente.</p>';
          }
        ?>
      </form>
    </div>
  </body>
</html>