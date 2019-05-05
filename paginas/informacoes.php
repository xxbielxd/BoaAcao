<?php 

if(isset($_GET['id'])){
	$con = new DAOInstituicoes();
	if(!$row = $con -> selectWithID($_GET['id'])){
		
            Error::setError(404);
            echo "	<div class='erro404'>	<img  src='imagens/erro404.jpg'> </div>";
            exit;
	}
}


?>
<link href="css/informacoes.css" rel="stylesheet">
<div class='instituicao'>
	<h1><?php echo $row[0]['nome']?></h1>
	<div class='imagem'>
	<?php 
	
	if($row[0]['foto'] == 'semfoto'){
		echo "		<img src='imagens/sem-imagem.gif' >";
	}else{
		echo "		<img src='img/".$row[0]['foto']."' >";
	}
		
	?>
	
		
	</div>

	<div class='informacoes'>
		<p> Sobre a Instuição:<?php echo $row[0]['descricao'];?> </p>
		<p> Endereço:<?php echo $row[0]['endereco'];?> </p>
		<p> Email:<?php echo $row[0]['email'];?> </p>
	
	</div>



</div>

