<?php
//conexÃ£o com banco de dados
define("SERVIDOR","localhost");
define("USUARIO","rrimag18_adriel");
define("SENHA","Softgoku4");
define("BANCO","rrimag18_msms");


$conexao = mysqli_connect(SERVIDOR,USUARIO,SENHA,BANCO) or die("Erro na conex«ªo com o banco de dados" . mysqli_connect_error());
?>