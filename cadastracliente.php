<?php
include("conectadb.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $cpf = $_POST['frmCpf'];
    $datansc = $_POST['data'];
    $telefone = $_POST['numero_telefone'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
   

    $sql = "SELECT COUNT(cli_id) AS count FROM clientes WHERE cli_nome = '$nome' AND cli_cpf = '$cpf'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $cont = $row['count'];

        if ($cont == 1) {
            echo "<script>alert('USUÁRIO JÁ EXISTE');</script>";
        } else {
            $insertQuery = "INSERT INTO clientes (cli_nome, cli_senha, cli_cpf, cli_datansc, cli_telefone, cli_logradouro, cli_numero, cli_cidade, cli_ativo)
                VALUES ('$nome', '$senha', '$cpf', '$datansc', '$telefone', '$logradouro', '$numero', '$cidade', 's')";
            $insertResult = mysqli_query($link, $insertQuery);

            if ($insertResult) {
                echo "<script>alert('CLIENTE CADASTRADO');</script>";
                echo "<script>window.location.href='listacliente.php';</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar cliente.');</script>";
            }
        }
    } else {
        echo "<script>alert('Erro ao consultar banco de dados.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>Cadastro de Cliente</title>
</head>

<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrousuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="cadastraclientes.php">CADASTRA CLIENTES</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="./areacliente/loja.php">LOJA</a></li>
        </ul>
    </div>
    <div>
        <form action="cadastracliente.php" method="post">
            <input type="text" name="nome" id="nome" placeholder="NOME USUÁRIO" required>
            <br>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <br>
            <input type="text" id="frmCpf" name="frmCpf" maxlength="11" size="11" placeholder="CPF" required>
            <br>
            <input type="date" name="data" id="data" placeholder="Data Nasc">
            <br>
            <input type="text" name="numero_telefone" id="numero_telefone" placeholder="Número telefone">
            <br>
            <input type="text" name="logradouro" id="logradouro" placeholder="Logradouro">
            <br>
            <input type="number" name="numero" id="numero" placeholder="Número">
            <br>
            <input type="text" name="cidade" id="cidade" placeholder="Cidade">
            <br>
            <input type="submit" name="cadastro" id="cadastrar" value="CADASTRAR">
        </form>
    </div>
</body>

</html>
