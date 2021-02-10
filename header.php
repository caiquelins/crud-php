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

  require_once('function/idUsuario.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <!-- Barra de Navegação Superior-->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">CRUD PHP</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
              <i class="fas fa-bars"></i>
            </button>
            <a style="padding-left: 80% " href="deslogar.php"><button class="btn btn-danger">Deslogar</button></a>
        </nav>

       <!-- Barra de Navegação Lateral--> 
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div style=" margin-top: -15px; " class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link active" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Conta
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                    <div class="collapse show" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a id="menuAtivo" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                Administração
                            </a>
                            <div id="ativoCollapsed" class="collapse show" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a id="ativoHome" class="nav-link" href="home.php">Home</a>
                                    <a id="ativoCreate" class="nav-link" href="create.php">Criar Usuário</a>
                                    <a id="ativoEdit" class="nav-link" href="edit.php?idUsuario=<?= $idUsuario ?>">Alterar Acesso</a>
                                    <a id="ativoAdministration" class="nav-link" href="administration.php">Usuários</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                </nav>
            </div>