
<script type="text/javascript" src="javascript/login.js"></script>



<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" rel="stylesheet" type="text/css">



		
		<div class='buttonLogin' id="buttonLogin">
			<button onclick = 'login()' class="pure-button pure-button-active" id='botaoColab'>  Sou um colaborador  </button> 
			<button onclick = "login('inst')" class="pure-button pure-button-active" id='botaoInst'>  Sou uma instituição </button>
			<a  href="index.php?pag=cadastro">Cadastrar</a>
	  	 </div>		
	  	<div class='login' id='login' >  		
	 	<form method="post" class="pure-form" action="index.php?pag=checklogin">
      

	        <input type="text" name="textLogin" placeholder="Login">
	        <input type="password" name="textSenha" placeholder="Senha">
	
	        <label for="remember">
	            <input id="remember" name='autoLogin' type="checkbox" value='1'> Lembre-me
	        </label>
			<input type='hidden' name='tipo' id='tipo' value=''>
       		<button type="submit" class="pure-button pure-button-primary">Entrar</button>
 			<a class='pure-button' href="index.php?pag=cadastro">Cadastrar</a>
	 				
		</form>
</div>





