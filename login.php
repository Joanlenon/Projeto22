<?php
  ## ABRE UMA VARIAVEL DE SESSÃO
  session_start();
  $nomeusuario;

  # SOLICITA O ARQUIVO CONECTADB
  include("conectadb.php");
  # EVENTO  APÓS O CLICK NO BOTÃO LOGAR
  if($_SERVER ['REQUEST_METHOD'] == 'POST')
  {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    
    #QUERY DE BANCO DE DADOS 
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha'";

        $retorno = mysqli_query($link, $sql);

    #RETORNO DE BANCO É RETORNADO EM ARRAY EM PHP
    while($tbl = mysqli_fetch_array($retorno))
    {
        $cont = $tbl[0];
    }
    #  VEREFICA A EXISTENCIA DO USUARIO 
    # SE CONT == 1 EXISTE E ENTRA
    # SE CONT == 0 NÃO EXISTE E VAZA

    if($cont == 1)
    {
        
        $sql = " SELECT *FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha' AND usu_ativo = 's' ";

        $_SESSION['$nomeusuario'] = $nome;

        echo"<script>window.location.href='admhome.php';</script>";
    
    }
    else{
        echo"<script>window.alert('USUARIO OU SENHA INCORRETO');</script>";
        
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
        <input type="text" name="nome" placeholder="NOME" required >
        <P></P>
        <input type="password" name="senha" placeholder="SENHA" required >
        <p><a href="./recuperarsenha.php">Esqueci minha senha!</a></p>
        <input type="submit" name = "login" value="Login">
    </form>
</body>
</html>