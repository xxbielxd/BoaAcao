

<div class='cadastro'>
	<form class="pure-form pure-form-aligned" method='post' action='index.php?pag=alterar' enctype="multipart/form-data">
	    	<fieldset>
		        <input type="hidden" name='alterar' value='1'>	       
		
		        <div class="pure-control-group">
		            <label for="textSenha">Senha</label>
		            <input name='textSenha' id="textSenha" type="password" value='<?php echo $row[0]["senha"]; ?>'>
		        </div>
		        
		        <div class="pure-control-group">
		            <label for="textNome">Nome</label>
		            <input name='textNome' id="textNome" type="text" value='<?php echo $row[0]["nome"]; ?>'>           
		        </div>	 	       
		
		        <div class="pure-control-group">
		            <label for="textEmail">E-mail</label>
		            <input name='textEmail' id="textEmail" type="text" value='<?php echo $row[0]["email"]; ?>'>
		        </div>
		        
		        <div class="pure-control-group">
		            <label for="textEndereco">Endereço</label>
		            <input name='textEndereco' id="textEndereco" type="text" value='<?php echo $row[0]["endereco"]; ?>'>           
		        </div>	
		        
		         <div class="pure-control-group">
		            <label for="textTel">Telefone/Celular</label>
		            <input name='textTel' id="textTel" type="text" value='<?php echo $row[0]["telefone"]; ?>'>           
		        </div>	
		        
		         <div class="pure-control-group">
		            <label for="textCPF">CPF</label>
		            <input name='textCPF' id="textCPF" type="text" value='<?php echo $row[0]["cpf"]; ?>'>           
		        </div>	    	        
				
				<!--  <label for="imagem">Imagem </label> <input name="img" type="file">-->
				 
		        <div class="pure-controls">
		            <label for="cb" class="pure-checkbox">
		                <input id="cb" type="checkbox"> I've read the terms and conditions
		            </label>
				
	            <button type="submit" class="pure-button pure-button-primary">Alterar</button>
	        	</div>
	    	</fieldset>
	</form>
</div>		