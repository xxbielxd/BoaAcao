
<?php
require_once "class/Connect.class.php";
require_once "class/PojoInstituicoes.class.php";
require_once "class/PojoColaboradores.class.php";
require_once "class/DAOInstituicoes.class.php";
require_once "class/DAOColaboradores.class.php";
require_once "class/ParamsPage.class.php";
require_once "class/Error.class.php";
require_once "class/Login.class.php";
require_once "class/Imagens.class.php";

require "strings/links.php";
require "strings/warnings.php";

$testLogin = new Session();
$logado = $testLogin -> check();
?>

<!DOCTYPE html>
<html>
	<meta charset="utf-8"/>
	<link href="css/pure-min.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	
	
	<head>  
		<title> Boa Ação</title>
	</head>
	
	<body>
	
	<div class="corpo">
	
		<div class="cabecario">
		
		
		</div>
		
		<div class="menu_horizontal">
		
			<?php require $links["menu"]; ?>		
		
		</div>
		
				
		<div class="conteudo">
		
		<?php 
			
			if(isset($_GET["pag"])){
				$pag=$_GET["pag"];
				
				if(isset($links[$pag])){
					require $links[$pag];
				}else{
					echo "	<div class='erro404'>	<img  src='imagens/erro404.jpg'> </div>";
				}				
				
			}else{
				require $links["conteudo"];
			}		
		
			
			
		
		
		
		
		
		
		
		
		
		
		
		?>		
		
		</div>
		
	
	
	
	</div>
	
	
	
	</body>



</html>




