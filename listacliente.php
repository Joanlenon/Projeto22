<?php
<<<<<<< HEAD
    include("conectadb.php");

    session_start();
    $nomeusuario = $_SESSION['nomeusuario'];

    #JÁ LISTA OS USUÁRIOS DO MEU BANCO
    $sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";
    $retorno = mysqli_query($link,$sql);

    #JÁ FORÇA TRAZER O s ATIVO
    $ativo = 's';

    #COLETA BOTÃO   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $ativo = $_POST['ativo'];

        #VERIFICA SE CLIENTE ESTÁ ATIVO PARA LISTAR
        if($ativo == 's'){
            $sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";
            $retorno = mysqli_query($link,$sql);
        }
        else{
            $sql = "SELECT * FROM clientes WHERE cli_ativo = 'n'";
            $retorno = mysqli_query($link,$sql);
        }
    }
=======
include("conectadb.php");
    session_start();
    $nomeusuario = $_SESSION['nomeusuario'];

#JÁ LISTA OS USUÁRIOS DO MEU BANCO

$sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";
$retorno = mysqli_query($link, $sql);

#JÁ FORÇA TRAZER NA VARIÁVEL ATIVO
$ativo = 's';

# COLETA O BOTÃO DE POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ativo = $_POST['ativo'];

    #VERIFICA SE USUÁRIO ESTÁ ATIVO PARA A LISTA
    if ($ativo == 's') {
        $sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";
        $retorno = mysqli_query($link, $sql);
    } else {
        $sql = "SELECT * FROM clientes WHERE cli_ativo = 'n'";
        $retorno = mysqli_query($link, $sql);
    }
}
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
<<<<<<< HEAD
    <title>LISTA CLIENTE</title>
=======
    <title>Lista USUÁRIOS</title>

>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
</head>
<body>
<div>
    <!-- MENU -->
        <ul class="menu">
<<<<<<< HEAD
            <li><a href="cadastrausuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
=======
        <li><a href="cadastrausuario.php">CADASTRA USUÁRIO</a></li>
            
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="cadastracliente.php">CADASTRA CLIENTES</a></li>
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
<<<<<<< HEAD
            <li class="menuloja"><a href="logout.php">SAIR</a></li>
            <?php
            #ABERTO O PHP PARA VERIFICAR SE A SESSÃO DO USUÁRIO ESTÁ ABERTA
            #SE SESSÃO ABERTA, FECHA O PHP PARA USAR ELEMENTO HTML
                if($nomeusuario != null){
                    ?>
                    <!-- USO DO ELEMENTO HTML COM PHP INTERNO -->
                    <li class="profile">OLÁ, <?=strtoupper($nomeusuario)?></li>
                    <?php
                    #ABERTURA DE OUTRO PHP PARA CASO FALSE
                }
                else{
                    echo"<script>window.alert('CLIENTE NÃO AUTENTICADO');window.location.href='login.php';</script>";
                }
                #FIM DO PHP PARA CONTINUAR MEU HTML
                ?>
        </ul>
    </div>

    <!-- AQUI LISTA OS CLIENTES DO BANCO!!! -->
    <div id="background">
        <form action="listacliente.php" method="post">
            <input type="radio" name="ativo" class="radio" value="s" required onclick="submit()" <?=$ativo == 's'?"checked":""?>>ATIVOS

            <input type="radio" name="ativo" class="radio" value="n" required onclick="submit()" <?=$ativo == 'n'?"checked":""?>>INATIVOS
=======
            <li class="menuloja"><a href="./logout.php">SAIR</a></li>
            <li class="profile">Olá <?= strtoupper($nomeusuario) ?></li>
            <?php
            #ABERTO O PHP PARA VALIDAR SE A SESSÃO DO USUARIO ESTÁ ABERTA
            # SE SESSÃO ABERTA, FECHA O PHP PARA USAR ELEMENTOS HTML
            if ($nomeusuario != null) {
                ?>
                <!--USO DE ELEMENTO HTML COM PHP INTERNO-->
                <li class="profile">Olá
                    <?= strtoupper($nomeusuario) ?>
                </li>
                <?php
                # ABERTURA DE OUTRO PHP PARA CASO FALSE
            } else {
                echo "<script>window.alert('USUARIO NÃO AUTENTICADO'); window.location.href='login.php';</script>";
            }
            # FIM DO PHP PARA CONTINUAR MEU HTML
            ?>
        </ul>
    </div>
    
    <!--AQUI LISTA OS USUÁRIOS DO BANCO-->
    <div id="background">
        <form action="listacliente.php" method="post">
            <input type="radio" name="ativo" class="radio" value="s" required onclick="submit()" 
            <?=$ativo == 's'? "checked":""?>>ATIVOS

            <input type="radio" name="ativo" class="radio" value="n" required onclick="submit()" 
            <?=$ativo == 'n'? "checked":""?>>INATIVOS

>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
        </form>

        <div class="container">
            <table border="1">
                <tr>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>TELEFONE</th>
                    <th>LOGRADOURO</th>
                    <th>NÚMERO</th>
                    <th>CIDADE</th>
                    <th>ALTERAR DADOS</th>
                    <th>ATIVO?</th>
                </tr>
<<<<<<< HEAD
                <!-- BRUXARIA EM PHP -->
=======

                <!--BRUXARIA EM PHP-->
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
                <?php
                    while($tbl = mysqli_fetch_array($retorno)){
                ?>
                    <tr>
<<<<<<< HEAD
                        <td><?= $tbl[1]?></td> <!-- TRAZ SOMENTE A COLUNA 2 DO BANCO [NOME] -->
                        <td><?= $tbl[2]?></td> <!-- TRAZ SOMENTE A COLUNA 1 DO BANCO [CPF] -->
=======
                        <td><?= $tbl[1]?></td> <!--TRAZ SOMENTE A COLUNA 1 DO BANCO [NOME]-->
                        <td><?= $tbl[2]?></td>
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
                        <td><?= $tbl[4]?></td>
                        <td><?= $tbl[5]?></td>
                        <td><?= $tbl[6]?></td>
                        <td><?= $tbl[7]?></td>
                        <td><?= $tbl[8]?></td>
<<<<<<< HEAD
                        <td><a href="alteracliente.php?id=<?=$tbl[0]?>">
                        <input type="button" value="ALTERAR DADOS"></a></td> <!-- CRIANDO UM BOTÃO ALTERAR PÁSSANDO O ID DO CLIENTE NA URL VIA GET -->
                        <td><?=$check =($tbl[9] == 's')?"SIM":"NÃO"?></td> <!-- VALIDA s OU n E ESCREVE "SIM" E "NÃO" --> 
                    </tr>
                    <?php
                    }
                    ?>
=======
                        <td><a href="alteracliente.php?id=<?=$tbl[0]?>"><input type="button" value="ALTERAR DADOS"></a></td> 
                        <td><?=$check = ($tbl[9] == 's')?"SIM":"NÃO"?></td><!--VALIDA S OU N E ESCREVE "SIM" E "NÃO"-->
                    </tr>
                    <?php 
                    }
                    ?>
                
            
>>>>>>> 7a3cacbb359a3b1907e4f95773fe7480d427361c
            </table>
        </div>
    </div>

</body>
</html>