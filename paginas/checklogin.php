<link href="css/cadastro.css" rel="stylesheet">
<?php

if($logado){
	require 'paginas/logado.php';
}else{	
	require 'paginas/login.php';
}






if(isset($_POST['textLogin']) and isset($_POST['textSenha']) and isset($_POST['tipo'])){
	
	$autoLogin = (isset($_POST['autoLogin']))?TRUE:FALSE;	
	$login = new Login();
	
	if($login -> checkLogin($_POST['textLogin'], $_POST['textSenha'],$_POST['tipo'],$autoLogin)){
		echo "<script type='text/javascript'>window.location.href = 'index.php?pag=checklogin'</script>";
	}else{
		echo "<div class='incorreto'><p class='incorreto'>Login ou senha incorreta,tente novamente.</p></div>";
	}
		
}

?>