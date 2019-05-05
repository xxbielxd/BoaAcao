<?php

$inst = new PojoInstituicoes();

$inst ->setNome($_POST['textNome']);
$inst ->setLogin($_POST['textLogin']);
$inst ->setSenha($_POST['textSenha']);
$inst ->setEmail($_POST['textEmail']);
$inst ->setEndereco($_POST['textEndereco']);
$inst ->setTelefone($_POST['textTel']);
$inst ->setCnpj($_POST['textCNPJ']);
$inst ->setSobre($_POST['textSobre']);
$inst ->setImg($_FILES['img']);

$cadastrar = new DAOInstituicoes();

if($cadastrar ->insert($inst)){
	echo"Cadastrado com sucesso";
}else{
	echo"Ocorreu algum erro no cadastro";
}



?>