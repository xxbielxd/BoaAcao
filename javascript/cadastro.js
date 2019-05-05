function cadastro(tipo){
	
	if(tipo == "inst"){
		document.getElementById("cadastrocolaborador").style.display = 'none'; 
		document.getElementById("cadastroinstituicao").style.display = 'block'; 
	
	}else{
		document.getElementById("cadastrocolaborador").style.display = 'block'; 
		document.getElementById("cadastroinstituicao").style.display = 'none'; 
	
	}
	
	
}
