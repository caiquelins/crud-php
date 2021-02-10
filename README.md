# CRUD-php

Sistema CRUD feito com a linguagem PHP, estilização do front-end utilizando o framework Bootstrap 4. Desenvolvido sem o padrão de arquitetura MVC.

# Funcionalidades

- Login;
- Logout;
- Criação/Edição/Consulta/Deleção (CRUD) de Usuários;

## Instalação

Crie um banco de dados com o nome <b>db_crudphp</b> e utilize o arquivo abaixo (ou baixe o arquivo db_crudphp.sql), para importar a tabela utilizada:

```bash
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Fev-2021 às 22:39
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_crudphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`idUsuario`, `nome`, `email`, `senha`, `data_cadastro`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '2021-02-10 21:34:05');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```

## Login

Para logar, basta acessar localhost/CRUD-PHP/index.php


Utilize os acessos:<br>
**E-mail:** admin@admin.com<br>
**Senha:**</b> admin<br>

**Tela - Login:**<br>
<img src="https://raw.githubusercontent.com/caiquelins/crud-php/master/demo/telaLogin.PNG"></img>
