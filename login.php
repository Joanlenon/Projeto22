<?php
session_start();
$nomeusuario;

include("conectadb.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha' AND usu_ativo = 's'";
    $retorno = mysqli_query($link, $sql);

    while ($tbl = mysqli_fetch_array($retorno)) {
        $cont = $tbl[0];
    }

    if ($cont == 1) {
        $sql = "SELECT * FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha' AND usu_ativo = 's'";
        $_SESSION['nomeusuario'] = $nome;
        echo "<script>window.location.href='admhome.php';</script>";
        exit();
    } else {
        echo "<script>window.alert('USUÁRIO OU SENHA INCORRETO');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>Login Usuario</title>
</head>
<body>
    <form action="login.php" method="post">
        <h1>LOGIN DE USUARIO</h1>
        <input type="text" name="nome" placeholder="NOME" required>
        <p></p>
        <input type="password" name="senha" placeholder="SENHA" required>
        <p><a href="./recuperarsenha.php">Esqueci minha senha!</a></p>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
