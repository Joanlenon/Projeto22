<?php
session_start();
include("../conectadb.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT COUNT(cli_id) FROM clientes WHERE cli_cpf = '$cpf' AND cli_senha = '$senha'";
    $retorno = mysqli_query($link, $sql);
    while($tbl = mysqli_fetch_array($retorno)){
        $cont = $tbl[0];
    }

    //VALIDA SE É REALMENTE O CLIENTE PARA LOGIN
    if($cont == 1){
        $sql = "SELECT * FROM clientes WHERE cli_cpf = '$cpf' AND cli_senha = '$senha' AND cli_ativo = 's'";
        $retorno = mysqli_query($link, $sql);
        while($tbl = mysqli_fetch_array($retorno)){
            $_SESSION['idcliente'] = $tbl[0];
            $_SESSION['nomecliente'] = $tbl[1];
        }
        echo"<script>window.alert.location.href='loja.php';</script>";
    }
    else{
        echo"<script>window.alert('USUÁRIO OU SENHA INCORRETOS');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estiloadm.css">
    <title>LOGIN CLIENTE</title>
</head>
<body>
    <form action="loja.php" method="post">
        <h1>LOGIN DE CLIENTES</h1>
        <input type="text" name="cpf" id="cpf" placeholder="CPF">
        <br>
        <input type="password" id="senha" name="senha" placeholder="SENHA">
        <br>
        <input type="submit" name="login" value="LOGIN">
    </form>
</body>
</html>