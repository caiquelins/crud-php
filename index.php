<?php 

  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <link rel="stylesheet" type="text/css" href="css/shaker.css">
    <title>Login</title>
  </head>
  <body>
    <div id="user">
      <div id="cabecalho-user">Login</div>
      <form name="form-user" action="validarAcesso.php" method="post">
        <input type="email" placeholder="E-mail" id="email" name="email" autofocus required maxlength="50">
        <span class="fontawesome-user"></span>    
        <input type="password" placeholder="Senha" id="senha" name="senha" required maxlength="50">
        <span class="fontawesome-lock"></span>  
        <input type="submit" name="btnLogar" id="btn_logar" value="Entrar"></input>
        <a href="cadastro.php" id="botao-registra"><div id="avisoRegistre">Registre-se</div></a>

        <?php 
          if($erro == 1) {                  
            echo '<p align="center" style="color:red">Usuário e ou senha inválido(s).</p>';
          }
        ?>
      </form>
    </div>
    <script src="js/script.js"></script>
  </body>
</html>