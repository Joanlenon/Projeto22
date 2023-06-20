<?php
##ARQUIVO DE ACESSO AO BANCO DE DADOS##
##ALERTA EM MODO PROFISSIONAL O ARQUIVO DEVE SER OCULTO E PROTEGIDO##

##LOCALIZA O PC COM O BANCO (NOME DO COMPUTADOR)

 $servidor = "localhost:3307";
 ##NOME DO BANCO
 $banco = "projeto22";
 ##USUARIO DE ACESSO
 $usuario = "administrador";
 ##SENHA PARA ACESSO NO BANCO
 $senha = "123";


 #LINK DE CONEXÃO
 $link = mysqli_connect($servidor, $usuario, $senha, $banco);



?>