<?php

include("../conectadb.php");

session_start();



//COLETA DE DADOS DE CLIENTE NA SESSÃO

$idcliente = $_SESSION['idcliente'];




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    $nomeproduto = $_POST['nomeproduto'];

    $quantidade = intval($_POST['quantidade']);

    $preco = floatval($_POST['preco']);



    //TOTAL ITEM É A SOMA DO PREÇO UNITÁRIO * QUANTIDADE

    $totalitem = ($preco * $quantidade);



    //GERAR HASH PARA DEFINIR CARRINHO ÚNICO E EXCLUSIVO

    $numerocarrinho = MD5($_SESSION['idcliente'] . date('d-m-Y H-i-s')); //MD5 criptografia hash



    //VALIDA CLIENTE

    if ($idcliente <= 0) {

        echo "<script>window.alert('VOCÊ PRECISA LOGAR PARA ADICIONAR ITEM AO CARRINHO');</script>";

        echo "<script>window.location.href='loja.php';</script>";
    } else {

        //VERIFICA SE O CLIENTE TEM CARRINHO ABERTO

        $sql = "SELECT COUNT(car_numero_carrinho) FROM itens_carrinho INNER JOIN clientes ON fk_cli_id = cli_id WHERE cli_id = '$idcliente' AND car_finalizado = 'n'"; //verifica quantos carrinhos esse cliente tem e se tem finalizado

        $retorno = mysqli_query($link, $sql);



        while ($tbl = mysqli_fetch_array($retorno)) {

            $cont = $tbl[0];

            if ($cont == 0) {

                //SE O CARRINHO NÃO EXISTE NO BANCO, GERA UM NOVO MD5 E INSERE OS ITENS NA TABELA

                $sql = "INSERT INTO itens_carrinho (fk_pro_id, car_item_quantidade, fk_cli_id, car_total_carrinho, car_numero_carrinho, car_finalizado) VALUES($id, '$quantidade', '$idcliente', '$totalitem', '$numerocarrinho', 'n')";

                mysqli_query($link, $sql);



                $_SESSION['carrinhoid'] = $numerocarrinho;



                echo "<script>window.alert('PRODUTO ADICIONADO AO CARRINHO');</script>";

                echo "<script>window.location.href='loja.php';</script>";
            } else {

                //SE O CARRINHO EXISTE, CONSULTA O NÚMERO DO CARRINHO PARA ADICIONAR ITENS AO CARRINHO

                $sql = "SELECT DISTINCT(car_numero_carrinho) FROM itens_carrinho WHERE fk_cli_id ='$idcliente' AND car_finalizado = 'n'";

                $retorno = mysqli_query($link, $sql);



                while ($tbl = mysqli_fetch_array($retorno)) {

                    $numerocarrinhocliente = $tbl[0];

                    $_SESSION['carrinhoid'] = $numerocarrinhocliente;

                    $sql = "INSERT INTO itens_carrinho (fk_pro_id, car_item_quantidade, fk_cli_id, car_total_carrinho, car_numero_carrinho, car_finalizado) VALUES($id, '$quantidade', '$idcliente', '$totalitem', '$numerocarrinhocliente', 'n')";



                    mysqli_query($link, $sql);

                    echo "<script>window.alert('PRODUTO ADICIONADO AO CARRINHO $numerocarrinhocliente');</script>";

                    echo "<script>window.location.href='loja.php';</script>";
                }
            }
        }
    }
}
//TRAZENDO DADOS VIA URL(GET)

$id = isset($_POST['id']) ? $_POST['id'] : '';


$sql = "SELECT * FROM produtos WHERE pro_id = '$id'";



$retorno = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($retorno)) {

    $nomeproduto = $tbl[1];

    $descricao = $tbl[2];

    $preco = $tbl[5];

    $imagem_atual = $tbl[7];
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estiloadm.css">
    <title>VER PRODUTO</title>
</head>

<body>
    <!-- NOSSO MENU GLOBAL -->
    <!-- MENÚ DA LOJA -->
    <header>
        <nav>
            <ul class="menu">
                <li><a href="loja.php">HOME</a></li><!-- BOTÃO HOME -->
                <li><a href="#">PRODUTOS</a></li>

                <!-- VALIDA SE O CLIENTE LOGOU -->
                <?php
                if (isset($_SESSION['idcliente'])) {
                ?>
                    <form class="formmenu" action="logout.php" method="post">
                        <h3 class="menu-right2">Olá, <?= $_SESSION['nomecliente']; ?></h3>
                        <li class="menu-right"><a href="perfil.php?id=<?= $_SESSION['idcliente']; ?>">PERFIL</a></li>
                        <li class="menu-right"><a href="logout.php">LOGOUT</a></li>
                    </form>
                <?php
                } else {
                ?>
                    <form class="formmenu2">
                        <li class="menu-right"><a href="logincliente.php" style="float: right">ENTRAR</a></li>
                        <li class="menu-right"><a href="cadastracliente.php">CADASTRAR</a></li>
                    </form>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
    <!-- FIM MENU GLOBAL -->


    <div class="formulario">
        <form class="visualizaproduto" action="verproduto.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="nome" value="<?= isset($id) ? $id : '' ?>">
            <label>NOME</label>
            <input type="text" name="nomeproduto" id="nomeproduto" value="<?= isset($nomeproduto) ? $nomeproduto : '' ?>" readonly>

            <label>DESCRIÇÃO</label>
            <textarea name="descricao" readonly><?= isset($descricao) ? $descricao : '' ?></textarea>

            <label>QUANTIDADE</label>
            <input type="number" id="quantidade" name="quantidade" required>

            <label>PREÇO</label>
            <input type="text" id="preco" name="preco" value="<?= isset($preco) ? number_format($preco, 2, ',', '.') : '' ?>" readonly>

            <br>

            <input type="submit" value="ADICIONAR AO CARRINHO">
        </form>
    </div>

    <!-- PEÇA ESSENCIAL PARA COLETAR IMAGEM ATUAL -->
    <div>
        <img name="imagem_atual" class="imagem_atual" src="data:image/jpeg;base64,<?= isset($imagem_atual) ? $imagem_atual : '' ?>">
    </div>

</body>

</html>