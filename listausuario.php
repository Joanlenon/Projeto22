<?php
    include("conectadb.php");

    session_start();
    $nomeusuario = $_SESSION['nomeusuario'];

    #JÁ LISTA OS USUÁRIOS DO MEU BANCO
    $sql = "SELECT * FROM usuarios WHERE usu_ativo = 's'";
    $retorno = mysqli_query($link,$sql);

    #JÁ FORÇA TRAZER O s ATIVO
    $ativo = 's';

    #COLETA BOTÃO   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $ativo = $_POST['ativo'];

        #VERIFICA SE USUÁRIOESTÁ ATIVO PARA LISTAR
        if($ativo == 's'){
            $sql = "SELECT * FROM usuarios WHERE usu_ativo = 's'";
            $retorno = mysqli_query($link,$sql);
        }
        else{
            $sql = "SELECT * FROM usuarios WHERE usu_ativo = 'n'";
            $retorno = mysqli_query($link,$sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>LISTA USUÁRIO</title>
</head>
<body>
<div>
    <!-- MENU -->
        <ul class="menu">
            <li><a href="cadastrausuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
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
                    echo"<script>window.alert('USUÁRIO NÃO AUTENTICADO');window.location.href='login.php';</script>";
                }
                #FIM DO PHP PARA CONTINUAR MEU HTML
                ?>
        </ul>
    </div>

    <!-- AQUI LISTA OS USUÁRIOS DO BANCO!!! -->
    <div id="background">
        <form action="listausuario.php" method="post">
            <input type="radio" name="ativo" class="radio" value="s" required onclick="submit()" <?=$ativo == 's'?"checked":""?>>ATIVOS

            <input type="radio" name="ativo" class="radio" value="n" required onclick="submit()" <?=$ativo == 'n'?"checked":""?>>INATIVOS
        </form>

        <div class="container">
            <table border="1">
                <tr>
                    <th>NOME</th>
                    <th>ALTERAR DADOS</th>
                    <th>ATIVO?</th>
                </tr>
                <!-- BRUXARIA EM PHP -->
                <?php
                    while($tbl = mysqli_fetch_array($retorno)){
                ?>
                    <tr>
                        <td><?= $tbl[1]?></td> <!-- TRAZ SOMENTE A COLUNA 1 DO BANCO [NOME] -->
                        <td><a href="alterausuario.php?id=<?=$tbl[0]?>">
                        <input type="button" value="ALTERAR DADOS"></a></td> <!-- CRIANDO UM BOTÃO ALTERAR PÁSSANDO O ID DO USUÁRIO NA URL VIA GET -->
                        <td><?=$check =($tbl[3] == 's')?"SIM":"NÃO"?></td> <!-- VALIDA s OU n E ESCREVE "SIM" E "NÃO" --> 
                    </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>