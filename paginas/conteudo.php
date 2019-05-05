<?php

$inst = new DAOInstituicoes();
if(isset($_GET['page'])){
	$lines = $inst -> select(3,$_GET['page']);
}else{
	$lines = $inst -> select(3);
}



foreach($lines as $row){
	
	echo "<div class='instituicoes'>";
	
	echo "<h1>".$row['nome']."</h1>";
		
	echo "	<div class='imagem'>";	
	if($row['foto'] == 'semfoto'){
		echo "		<img src='imagens/sem-imagem.gif' >";
	}else{
		echo "		<img src='img/".$row['foto']."' >";
	}	
	echo "	</div>";	
	echo "<a class='pure-button pure-button-primary' href='index.php?pag=informacoes&id=".$row['id']."'>Mais Informações</a>";
 	echo "</div>";

}
echo "<div class='paginas'>";

if(($num = $inst -> getTotalPages()) > 1){
	$page = 0;	
	while($page < $num){
		$page++;
		echo"<a  href='index.php?page=$page'>$page </a>";
		
	}
}
echo "</div>";
/*
//PARAMETROS DE SEPARAÇAO DE PAGINAS
$a = new ParamsPage();
$a -> setNumResults(100);
$a -> setPerPage(10);
$a -> setPage(10);

echo $a -> getParams();
echo $a -> getNumPages();
*/


/*
$param[]="uva";
$con = new BaseDAO("delete from produtos where codigo = 10",null);
$con -> delete();
*/
/*
echo "<br>";
while($row = $con -> fetch_assoc()){
	echo $row["nome"];
	echo $row["preco"];
	ech
	echo "<br>";
}

echo mysql_error();
echo $con -> getAffectedRows();
echo $con -> getNumRows();
}
catch(Exception $e){
	echo $e -> getMessage();
}



$query = "select"; 
echo $n = strripos($query, "select");
if($n = strripos($query, "select") === 0 ){
	echo $n;	
}     // 0 == FALSE sao iguais  0 === False são diferentes 
*/
/*$con = new Consult("delete from produtos where nome='uva2'");


echo $con -> getAffectedRows();
echo (@$con -> getNumRows())?'ok':'coco';

*/
?>
