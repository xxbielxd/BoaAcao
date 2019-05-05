
<div class="pure-menu pure-menu-horizontal">
    <ul class="pure-menu-list">
        <li class="pure-menu-item pure-menu-selected"><a href="index.php" class="pure-menu-link">Home</a></li>
        <li class="pure-menu-item pure-menu-selected"><a href="index.php?pag=checklogin" class="pure-menu-link">Logar</a></li>
        <li class="pure-menu-item pure-menu-selected"><a href="index.php?pag=sobre" class="pure-menu-link">Sobre</a></li>
        <li class="pure-menu-item pure-menu-selected"><a href="index.php?pag=contato" class="pure-menu-link">Contato</a></li>
    </ul>

<?php 

if($logado){
	require 'paginas/menulogin.php';
	
}




?>
</div>