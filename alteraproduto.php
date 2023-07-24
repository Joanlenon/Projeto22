<?php











?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloadm.css">
    <title>Altera Produto</title>
</head>

<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrousuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastroproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="cadastroclientes.php">CADASTRA CLIENTES</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="./logout.php">SAIR</a></li>
            <?php
            #ABERTO PHP PARA VALIDAR SE A SESSÃO DO USSUARIO ESTÁ ABERTA SE NÃO FECHA O PHP PARA ELEMENTO HTML
            if ($nomeusuario != null) {
            ?>
                <!--USO DO ELEMENTO HTML COM PHP INTERNO-->
                <li class="profile">Olá <?= strtoupper($nomeusuario) ?></li>
            <?php
                #ABERTURA DE OUTRO PHP PARA CASO FALSO
            } else {
                echo "<script>window.alert('USUARIO NÃO AUTENTICADO');window.location.href='login.php';</script>";
            }
            #FIM DO USO DO PHP PARA CONTINUAR O HTML
            ?>
        </ul>
    </div>
</body>
<div class="visualizaproduto" action="alteraproduto.php" method="post" enctype="multipart/form-data">

    <form action="">
        <input type="hidden" name="id" id="nome" value="<?= $id ?>">
        <label for="nome"></label>
        <input type="text" name="nome" value="<?= $nome ?>">
        <label for="DESCRIÇÃO"></label>
        <input type="text" name="descricao" value="<?= $descricao ?>">
        <label for="QUANTIDADE"></label>
        <input type="number" name="quantidade" value="<?= $quantidade ?>">
        <label for="CUSTO"></label>
        <input type="decimal" name="custo" value="<?= $custo ?>">
        <label for="PREÇO"></label>
        <input type="decimal" name="preco" value="<?= $preco ?>">
        <label>STATUS: <?= $ativo == 's' ? "ATIVO" : "INATIVO" ?></label>
        <br>
        <input type="radio" id="ativo" name="ativo" value="s" <?= $ativo == "s" ? "checked" : "" ?>><label>ATIVO</label>
        <input type="radio" id="ativo" name="ativo" value="n" <?= $ativo == "s" ? "checked" : "" ?>><label>INATIVO</label>
        <input type="file" name="imagem" id="imagem">
        <br>

        <input type="submit" value="salvar">
    </form>
</div>

<div>
    <td><img name="image_atual" classe="imagem_atual" src="data:image/jpeg;base64,<?= $imagem_atual ?>"></td>
</div>

</html>