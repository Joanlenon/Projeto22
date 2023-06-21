<?php
session_start();
$nomeusuario =$_SESSION['nomeusuario']

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>MENU ADMINISTRATIVO</title>
</head>
<body>
   <div>
        <ul class="menu">
            <li><a href="cadastrousuario.php">CADASTRA USUÁRIO</a></li>
            <li><a href="listausuario.php">LISTA USUÁRIO</a></li>
            <li><a href="cadastroproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class = "menuloja"><a href="./logout.php">SAIR</a></li>
            <?php
            #ABERTO PHP PARA VALIDAR SE A SESSÃO DO USSUARIO ESTÁ ABERTA SE NÃO FECHA O PHP PARA ELEMENTO HTML
                if($nomeusuario != null){
            ?>
            <!--USO DO ELEMENTO HTML COM PHP INTERNO-->
            <li class ="profile">Olá <?=strtoupper($nomeusuario)?></li>
            <?php
            #ABERTURA DE OUTRO PHP PARA CASO FALSO
            }
            else{
                echo"<script>window.alert('USUARIO NÃO AUTENTICADO');window.location.href='login.php';</script>";
            }
            #FIM DO USO DO PHP PARA CONTINUAR O HTML
            ?>
        </ul>
    </div>
    
</body>
</html>