<?php 
if($logado){
	echo "<script type='text/javascript'>window.location.href = 'index.php?pag=checklogin'</script>";
}


?>


<script type="text/javascript" src="javascript/validacolaborador.js"></script>
<script type="text/javascript" src="javascript/validainstituicao.js"></script>
<link href="css/cadastro.css" rel="stylesheet">
<script type="text/javascript" src="javascript/cadastro.js"></script>
<div class='cadastro'>

	
	
	
	
	
	<div class='buttons'>
	
		<button onclick = 'cadastro()' class="pure-button pure-button-active" id='botaoColab'>  Sou um colaborador  </button> 
		<button onclick = "cadastro('inst')" class="pure-button pure-button-active" id='botaoInst'>  Sou uma instituição </button>
	</div>
	<div id='teste'></div>
	
	<div id='cadastrocolaborador' >
	
		
		
		<form name="cadastroColab" id="cadastroColab" class="pure-form pure-form-aligned" method='post' action='index.php?pag=cadastrocolaborador'>
	    	<fieldset>
		        <div class="pure-control-group">
		            <label for="textLogin">Login</label>
		            <input name='textLogin' id="textLogin" type="text" placeholder="Login">           
		        </div>
		
		        <div class="pure-control-group">
		            <label for="textSenha">Senha</label>
		            <input name='textSenha' id="textSenha" type="password" placeholder="Senha">
		        </div>
		        
		        <div class="pure-control-group">
		            <label for="textNome">Nome</label>
		            <input name='textNome' id="textNome" type="text" placeholder="Nome completo">           
		        </div>	
		        
		        
		
		        <div class="pure-control-group">
		            <label for="textEmail">E-mail</label>
		            <input name='textEmail' id="textEmail" type="email" placeholder="Endereço de e-mail">
		        </div>
		        
		        <div class="pure-control-group">
		            <label for="textEndereco">Endereço</label>
		            <input name='textEndereco' id="textEndereco" type="text" placeholder="Endereço Completo">           
		        </div>	
		        
		         <div class="pure-control-group">
		            <label for="textTel">Telefone/Celular</label>
		            <input name='textTel' id="textTel" type="text" placeholder="DD NUMBER">           
		        </div>	
		        
		         <div class="pure-control-group">
		            <label for="textCPF">CPF</label>
		            <input name='textCPF' id="textCPF" type="text" placeholder="CPF">           
		        </div>	     
		    	        
		
		        <div class="pure-controls">
		            <label for="cb" class="pure-checkbox">
		                <input id="cb" type="checkbox"> I've read the terms and conditions
		            </label>
					<input type="button" onclick="validarColab()" class="pure-button pure-button-primary" value="Enviar">
	        	</div>
	    	</fieldset>
		</form>		
		
		
	</div>



	
	<div id='cadastroinstituicao' style="display:none">
	
			
			
			<form  name='cadastroInst' id='cadastroInst' class="pure-form pure-form-aligned" method='post' action='index.php?pag=cadastroinstituicao' enctype="multipart/form-data">
		    	<fieldset>
			        <div class="pure-control-group">
			            <label for="textLogin">Login</label>
			            <input name='textLogin' id="textLogin" type="text" placeholder="Login">           
			        </div>
			
			        <div class="pure-control-group">
			            <label for="textSenha">Senha</label>
			            <input name='textSenha' id="textSenha" type="password" placeholder="Senha">
			        </div>
			        
			        <div class="pure-control-group">
			            <label for="textNome">Nome</label>
			            <input name='textNome' id="textNome" type="text" placeholder="Nome completo">           
			        </div>	
			       			
			        <div class="pure-control-group">
			            <label for="textEmail">E-mail</label>
			            <input name='textEmail' id="textEmail" type="email" placeholder="Endereço de e-mail">
			        </div>
			        
			        <div class="pure-control-group">
			            <label for="textEndereco">Endereço</label>
			            <input name='textEndereco' id="textEndereco" type="text" placeholder="Endereço Completo">           
			        </div>	
			        
			         <div class="pure-control-group">
			            <label for="textTel">Telefone/Celular</label>
			            <input name='textTel' id="textTel" type="text" placeholder="DD NUMBER">           
			        </div>	
			        
			         <div class="pure-control-group">
			            <label for="textCNPJ">CNPJ</label>
			            <input name='textCNPJ' id="textCNPJ" type="text" placeholder="CNPJ">           
			        </div>	     
			    	        
					<div class="pure-control-group">
						 <label for="textSobre">Sobre a Instituição</label>
						<textarea name='textSobre' id='textSobre' class="pure-input-1-2" placeholder="Descreva a Instituição"></textarea>
					</div>
					<label for="imagem">Imagem </label> <input name="img" type="file">
					 
			        <div class="pure-controls">
			            <label for="cb" class="pure-checkbox">
			                <input id="cb" type="checkbox"> I've read the terms and conditions
			            </label>
					
		            <input type="button" onclick="validar()" class="pure-button pure-button-primary" value="Enviar">
		        	</div>
		    	</fieldset>
			</form>					
	
		
	</div>








</div>