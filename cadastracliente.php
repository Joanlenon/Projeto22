<?php
include("conectadb.php");
session_start();
$nomeusuario =$_SESSION['nomeusuario'];
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrousuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastroproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class = "menuloja"><a href="./areacliente/loja.php">LOJA</a></li>
        </ul>
    </div>
    <div>
        <form action="cadastracliente.php" method="post">
        <input type="text" name="nome" id="nome" placeholder="NOME USUARIO">
        <br>
        <input type="password" name="senha" id ="senha" placeholder="SENHA">
        <br>
        <input type="password" name="senha" id ="senha" placeholder="SENHA">
        <br>
        <input type="password" name="senha" id ="senha" placeholder="SENHA">
        <br>
        <input type="password" name="senha" id ="senha" placeholder="SENHA">
        <br>
<input type="submit" name="cadastro" id="cadastrar" value ="CADASTRAR">
        </form>
    </div>
</body>
</html>