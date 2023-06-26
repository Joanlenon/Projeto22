<?php
include("conectadb.php");

session_start();
$nomeusuario = $_SESSION['nomeusuario'];

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE usu_id = '$id'";
$retorno = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($retorno)) {
    $nome = $tbl['usu_nome'];
    $senha = $tbl['usu_senha'];
    $ativo = $tbl['usu_ativo'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $ativo = $_POST['ativo'];

    $sql = "UPDATE usuarios SET usu_nome = '$nome', usu_senha = '$senha', usu_ativo = '$ativo' WHERE usu_id = '$id'";
    mysqli_query($link, $sql);

    echo "<script>window.alert('USUÁRIO ALTERADO COM SUCESSO!');</script>";
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
    <title>Altera Usuários</title>
</head>

<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrousuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastroproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="./areacliente/loja.php">LOJA</a></li>
        </ul>
    </div>
    <div>
        <form action="alterausuario.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" name="nome" id="nome" value="<?= $nome ?>" required>
            <br>
            <input type="password" name="senha" id="senha" value="<?= $senha ?>" required>
            <input type="radio" name="ativo" value="s" <?= $ativo == "s" ? "checked" : "" ?>>ATIVO
            <input type="radio" name="ativo" value="n" <?= $ativo == "n" ? "checked" : "" ?>>INATIVO
            <br>
            <input type="submit" name="salvar" id="salvar" value="SALVAR">
        </form>
    </div>
</body>

</html>
