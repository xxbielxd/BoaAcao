<?php


$colab = new PojoColaboradores();

$colab ->setNome($_POST['textNome']);
$colab ->setLogin($_POST['textLogin']);
$colab ->setSenha($_POST['textSenha']);
$colab ->setEmail($_POST['textEmail']);
$colab ->setEndereco($_POST['textEndereco']);
$colab ->setTelefone($_POST['textTel']);
$colab ->setCpf($_POST['textCPF']);


$cadastrar = new DAOColaboradores();

if($cadastrar ->insert($colab)){
	echo"Cadastrado com sucesso";
}else{
	echo"Ocorreu algum erro no cadastro";
}







?>