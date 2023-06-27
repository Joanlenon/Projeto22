<?php
include("conectadb.php");

session_start();
$nomeusuario = $_SESSION['nomeusuario'];

$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE cli_id = '$id'";
$retorno = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($retorno)) {
    $nome = $tbl['cli_nome'];
    $senha = $tbl['cli_senha'];
    $cpf = $tbl['cli_cpf'];
    $datansc = $tbl['cli_datansc'];
    $telefone = $tbl['cli_telefone'];
    $logradouro = $tbl['cli_logradouro'];
    $numero = $tbl['cli_numero'];
    $cidade= $tbl['cli_cidade'];
    $ativo =$tbl['cli_ativo'];

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $cpf = $_POST['frmCpf'];
    $datansc = $_POST['data'];
    $telefone = $_POST['numero_telefone'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $ativo =$_POST['cli_ativo'];
    $sql = "UPDATE clientes SET cli_nome = '$nome', cli_senha = '$senha',cli_cpf ='$cpf',cli_datansc = '$datansc',cli_telefone = '$logradouro'
    ,cli_numero = '$numero',cli_cidade ='$cidade', cli_ativo = '$ativo' WHERE cli_id = '$id'";
    mysqli_query($link, $sql);

    echo "<script>window.alert('CLIENTE ALTERADO COM SUCESSO!');</script>";
    echo "<script>window.location.href='admhome.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>Altera Cliente</title>
</head>

<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrausuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="cadastracliente.php">CADASTRA CLIENTES</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="./areacliente/loja.php">LOJA</a></li>
        </ul>
    </div>
    <div>
        <form action="alteracliente.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" name="nome" id="nome" value="<?= $nome ?>" required>
            <br>
            <input type="password" name="senha" id="senha" value="<?= $senha ?>" required>
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
            <input type="radio" name="ativo" value="s" <?= $ativo == "s" ? "checked" : "" ?>>ATIVO
            <input type="radio" name="ativo" value="n" <?= $ativo == "n" ? "checked" : "" ?>>INATIVO
            <br>
            <input type="submit" name="salvar" id="salvar" value="SALVAR">
        </form>
    </div>
</body>

</html>
