<link href="css/cadastro.css" rel="stylesheet">
<?php

if($logado){
	
	if(isset($_POST['textNome'])){
		
	}
	elseif($testLogin -> getTipo() == 0){
		
		$select = new DAOInstituicoes();
		$row = $select ->selectWithID($testLogin -> getId());			
		
		require "paginas/alterarinstituicao.php";	
		
	}
	elseif($testLogin -> getTipo() == 1){
		$select = new DAOColaboradores();
		$row = $select ->selectWithID($testLogin -> getId());
		
		require "paginas/alterarcolaborador.php";
	}
}else{
	echo "<script type='text/javascript'>window.location.href = 'index.php'</script>";
}


//ALTERAR

if($testLogin -> getTipo() == 0){
	if(isset($_POST['textNome'])){	
	
            $inst = new PojoInstituicoes();
            $inst ->setNome($_POST['textNome']) ;
            $inst ->setSenha($_POST['textSenha']);
            $inst ->setEmail($_POST['textEmail']);
            $inst ->setEndereco($_POST['textEndereco']);
            $inst ->setTelefone($_POST['textTel']);
            $inst ->setCnpj($_POST['textCNPJ']);
            $inst ->setSobre($_POST['textSobre']);             
            $inst ->setID($testLogin -> getId());           

            $alterar = new DAOInstituicoes();
            $a = $alterar ->update($inst);



            if($a){
                    echo"Alterado com sucesso";
            }else{
                    echo"Ocorreu algum erro na Alteração";
            }
	
	}
}
if($testLogin -> getTipo() == 1){
	if(isset($_POST['textNome'])){	
	
            $colab = new PojoColaboradores();
            $colab ->setNome($_POST['textNome']) ;
            $colab ->setSenha($_POST['textSenha']);
            $colab ->setEmail($_POST['textEmail']);
            $colab ->setEndereco($_POST['textEndereco']);
            $colab ->setTelefone($_POST['textTel']);
            $colab ->setCpf($_POST['textCPF']);                        
            $colab ->setID($testLogin -> getId());  
		
            $alterar = new DAOColaboradores();
            $a = $alterar -> update($colab);		

            if($a){
                    echo"Alterado com sucesso";
            }else{
                    echo"Ocorreu algum erro na Alteração";
            }
	
	}
}


?>


