<?php
include("conectadb.php");
session_start();
$nomeusuario = $_SESSION['nomeusuario'];
if (!$nomeusuario) {
    echo "<script>window.alert('USUARIO NÃO AUTENTICADO');window.location.href='login.php';</script>";
    exit();
}

$ativo = isset($_POST['ativo']) ? $_POST['ativo'] : 's';

if ($ativo === 's') {
    $sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";
} else {
    $sql = "SELECT * FROM clientes WHERE cli_ativo = 'n'";
}

$retorno = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>Lista Cliente</title>
</head>

<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrousuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="./logout.php">SAIR</a></li>
            <li class="profile">Olá <?= strtoupper($nomeusuario) ?></li>
        </ul>
    </div>

    <div id="background">
        <form action="listacliente.php" method="post">
            <input type="radio" name="ativo" class="radio" value="s" required onchange="this.form.submit()" <?= $ativo === 's' ? 'checked' : '' ?>>ATIVOS
            <input type="radio" name="ativo" class="radio" value="n" required onchange="this.form.submit()" <?= $ativo === 'n' ? 'checked' : '' ?>>INATIVOS
        </form>

        <div class="container">
            <table border="1">
                <tr>
                    <th>NOME</th>
                    <th>ALTERAR DADOS</th>
                    <th>ATIVO?</th>
                </tr>
                <?php while ($tbl = mysqli_fetch_array($retorno)) { ?>
                    <tr>
                        <td><?= $tbl[1] ?></td>
                        <td><a href="alteracliente.php?id=<?= $tbl[0] ?>"><input type="button" value="ALTERAR DADOS"></a></td>
                        <td><?= $tbl[3] === 's' ? 'SIM' : 'NÃO' ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>
