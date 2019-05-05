function validarColab() {
var nome = cadastroColab.textNome.value;
var email = cadastroColab.textEmail.value;
var cpf = cadastroColab.textCPF.value;
var endereco = cadastroColab.textEndereco.value;
var telefone = cadastroColab.textTel.value;
var senha = cadastroColab.textSenha.value;
var login = cadastroColab.textLogin.value;



 	//nome
	if (nome.value == "") {
		alert('Preencha o nome da Instituição');
		cadastroColab.nome.focus();
		return false;
	}
	if (nome.length < 2) {
		alert('Nome muito curto, não abrevie');
		cadastroColab.nome.focus();
		return false;
	}
    //Login
	if (login.value == "") {
		alert('Preencha o login da Instituição');
		cadastroColab.login.focus();
		return false;
	}
	if (login.length < 2) {
		alert('Login muito curto');
		cadastroColab.login.focus();
		return false;
	}
	//senha
	if (senha.value == "") {
		alert('Preencha sua senha');
		cadastroColab.senha.focus();
		return false;
	}
	if (senha.length < 3) {
		alert('Senha muito curta');
		cadastroColab.senha.focus();
		return false;
	}
	//email
	if (email == "") {
		alert('Preencha o campo Email');
		cadastroColab.email.focus();
		return false;
	}
	if (email.length < 5) {
		alert('Digite corretamente o campo Email');
		cadastroColab.email.focus();
		return false;
	}


	//cnpj
	if (cpf == "") {
		alert('Preencha o campo CPF');
		cadastroColab.cpf.focus();
		return false;
	}
	if (cpf.length < 5) {
		alert('Digite corretamente o campo CPF');
		cadastroColab.cpf.focus();
		return false;
	}
	//Endereco
	if (endereco == "") {
		alert('Preencha o campo endereço');
		cadastroColab.endereco.focus();
		return false;
	}
	if (endereco.length < 5) {
		alert('Digite o endereço completo');
		cadastroColab.endereco.focus();
		return false;
	}
	//telefone
	if (telefone == "") {
		alert('Preencha o campo telefone');
		cadastroColab.telefone.focus();
		return false;
	}
	if (telefone.length < 10) {
		alert('Digite o DD do telefone');
		cadastroColab.telefone.focus();
		return false;
	}

	document.cadastroColab.submit(); 
	return true;
}