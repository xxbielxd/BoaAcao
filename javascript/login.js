/**
 * 
 */

function login(tipo){
	document.getElementById("login").style.display = 'block'; 
	document.getElementById("buttonLogin").style.display = 'none'; 
	if(tipo == "inst"){
		document.getElementById("tipo").value = '0'; 
		
	
	}else{
		document.getElementById("tipo").value = '1'; 
	
	}
	
	
}