<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "projeto2";
$tbl = "tbl_usuarios";

try {
     $conx = new PDO("mysql:host=$host;dbname=$db",$user,$pass); 
     $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch(PDOException $e) {
     echo "Falha de conexão...<br />" . $e->getMessage();
} 

?>