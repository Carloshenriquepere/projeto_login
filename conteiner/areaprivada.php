<?php 
include_once("classes/usuario.php");

$u = new Usuario();

session_start();
if(!isset($_SESSION['id_usuario'])){
    header("location: index.php");
    exit;
}

?>
<?php
// Conecta ao banco de dados
$pdo = new PDO("mysql:host=localhost;dbname=projeto_login", "root", "");

// Executa a consulta SQL que retorna o nome do banco de dados
$query = $pdo->query("SELECT DATABASE() AS nome");

// Obtém o resultado da consulta
$resultado = $query->fetch(PDO::FETCH_ASSOC);

// Exibe o nome do banco de dados na saída HTML
echo "Nome do banco de dados: " . $resultado['nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a{
            color: black;
            text-decoration: none;
            text-align: center;
            display: block;
        }

        a:hover{
            text-decoration: underline;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>SEJA BEM VINDO(A) </h1>
    <a href="sair.php">Sair</a>
</body>
</html>