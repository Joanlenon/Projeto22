<?php
include("conectadb.php");

session_start();
$nomeusuario = $_SESSION['nomeusuario'];

#TRAZ DADOS DO BANCO PARA COMPLETAR OS CAMPOS
$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE cli_id= '$id'";
$retorno = mysqli_query($link, $sql);

<<<<<<< HEAD
#PREENCHA O ARRAY SEMPRE. enquanto tiver dados ele busca e joga nos campos precisos
while ($tbl = mysqli_fetch_array($retorno)) {
    $nome = $tbl[1]; #CAMPO NOME DA TABELA DO BANCO
    $cpf = $tbl[2]; #CAMPO CPF DA TABELA DO BANCO
    $senha = $tbl[3]; #CAMPO SENHA DA TABELA DO BANCO
    $datanasc = $tbl[4]; #CAMPO DATANASC DA TABELA DO BANCO
    $telefone = $tbl[5]; #CAMPO TELEFONE DA TABELA DO BANCO
    $logradouro = $tbl[6]; #CAMPO LOGRADOURO DA TABELA DO BANCO
    $numero = $tbl[7]; #CAMPO NUMERO DA TABELA DO BANCO
    $cidade = $tbl[8]; #CAMPO CIDADE DA TABELA DO BANCO
    $ativo = $tbl[9]; #CAMPO ATIVO DA TABELA DO BANCO
}

#USUÁRIO CLICA NO BOTÃO SALVAR 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
=======
#PREENCHA O ARRAY SEMPRE
while ($tbl = mysqli_fetch_array($retorno)) {
    $cpf = $tbl[1];
    $nome = $tbl[2]; # CAMPO NOME DA TABELA DO BANCO
    $senha = $tbl[3]; #CAMPO SENHA DA TABELA DO BANCO
    $datanasc = $tbl[4]; #CAMPO ATIVO DA TABELA DO BANCO
    $telefone = $tbl[5];
    $logradouro = $tbl[6];
    $numero = $tbl[7];
    $cidade = $tbl[8];
    $ativo = $tbl[9];

}

# USUÁRIO CLICA NO BOTÃO SALVAR
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
<<<<<<< HEAD
    $datansc = $_POST['datansc'];
=======
    $datanasc = $_POST['datanasc'];
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
    $telefone = $_POST['telefone'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $ativo = $_POST['ativo'];

<<<<<<< HEAD
    $sql = "UPDATE clientes SET cli_nome = '$nome', cli_cpf = '$cpf', cli_senha = '$senha', cli_datansc = STR_TO_DATE('$datansc','%Y-%m-%d'), cli_telefone = '$telefone', cli_logradouro = '$logradouro', cli_numero = '$numero', cli_cidade = '$cidade', cli_ativo = '$ativo' WHERE cli_id = $id";

    mysqli_query($link,$sql);
=======
    $sql = "UPDATE clientes SET cli_cpf='$cpf', cli_nome = '$nome', cli_senha= '$senha', cli_datanasc='$datanasc', cli_telefone='$telefone', cli_logradouro='$logradouro', cli_numero= '$numero', cli_cidade='$cidade', cli_ativo= '$ativo' WHERE cli_id= $id";

    mysqli_query($link, $sql);
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c

    echo "<script>window.alert('CLIENTE ALTERADO COM SUCESSO!');</script>";
    echo "<script>window.location.href='admhome.php';</script>";
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
<<<<<<< HEAD
    <title>ALTERA CLIENTES</title>
=======
    <title>ALTERA CLIENTE</title>
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
</head>
<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrausuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
<<<<<<< HEAD
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
=======
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
            <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="logout.php">SAIR</a></li>
        </ul>
    </div>

    <div>
        <form action="alteracliente.php" method="post">

<<<<<<< HEAD
            <!--placeholder é o nome que vai aparecer dentro do text do input-->

            <input type="hidden" name="id" value="<?=$id?>">
            <input type="text" name="nome" id="nome" value="<?=$nome ?>"required> <!-- dentro do php ele vai puxar a informação do banco -->
            <br>
            <input type="number" name="cpf" id="cpf" value="<?=$cpf ?>" required>
            <br>
            <input type="password" name="senha" id="senha" value="<?=$senha?>" required>
            <br>
            <input type="date" name="datanasc" id="datanasc" value="<?=$datanasc ?>" required>
            <br>
            <input type="number" name="telefone" id="telefone" value="<?=$telefone ?>" required>
            <br>
            <input type="text" name="logradouro" id="logradouro" value="<?=$logradouro ?>" required>
            <br>
            <input type="number" name="numero" id="numero" value="<?=$numero ?>" required>
            <br>
            <input type="text" name="cidade" id="cidade" value="<?=$cidade ?>" required>
            <br>
            <input type="radio" name="ativo" value="s" <?=$ativo=="s"?"checked":""?>>ATIVO
            <br>
            <input type="radio" name="ativo" value="n" <?=$ativo=="n"?"checked":""?>>INATIVO
            <p></p>
=======
            <input type="hidden" name="id" value="<?= $id ?>">

            <br>

            <input type="number" name="cpf" id="cpf" value="<?= $cpf ?>" required>

            <br>

            <input type="text" name="nome" id="nome" value="<?= $nome ?>" required>

            <br>

            <input type="password" name="senha" id="senha" value="<?= $senha ?>" required>

            <br>

            <input type="date" name="datanasc" id="datanasc" value="<?= $datanasc ?>" required>

            <br>

            <input type="number" name="telefone" id="telefone" value="<?= $telefone ?>" required>

            <br>

            <input type="text" name="logradouro" id="logradouro" value="<?= $logradouro ?>" required>

            <br>

            <input type="text" name="numero" id="numero" value="<?= $numero ?>" required>

            <br>

            <input type="text" name="cidade" id="cidade" value="<?= $cidade ?>" required>

            <br>

            <input type="radio" name="ativo" value="s" <?= $ativo == "s" ? "checked" : "" ?>>ATIVO

            <input type="radio" name="ativo" value="n" <?= $ativo == "n" ? "checked" : "" ?>>INATIVO
            <p></P>
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
            <input type="submit" name="salvar" id="salvar" value="SALVAR">

        </form>
    </div>

</body>
</html>