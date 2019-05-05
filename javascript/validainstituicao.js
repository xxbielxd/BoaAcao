function validar() {

var nome = cadastroInst.textNome.value;
var email = cadastroInst.textEmail.value;
var cnpj = cadastroInst.textCNPJ.value;
var endereco = cadastroInst.textEndereco.value;
var telefone = cadastroInst.textTel.value;
var sobre = cadastroInst.textSobre.value;
var senha = cadastroInst.textSenha.value;
var login = cadastroInst.textLogin.value;


 //nome
if (nome.value == "") {
	alert('Preencha o nome da Instituição');
	cadastroInst.nome.focus();
	return false;
}
if (nome.length < 2) {
	alert('Nome muito curto, não abrevie');
	cadastroInst.nome.focus();
	return false;
}//Login
if (login.value == "") {
	alert('Preencha o login da Instituição');
	cadastroInst.login.focus();
	return false;
}
if (login.length < 2) {
	alert('Login muito curto');
	cadastroInst.login.focus();
	return false;
}
//senha
if (senha.value == "") {
	alert('Preencha sua senha');
	cadastroInst.senha.focus();
	return false;
}
if (senha.length < 3) {
	alert('Senha muito curta');
	cadastroInst.senha.focus();
	return false;
}
//email
if (email == "") {
	alert('Preencha o campo Email');
	cadastroInst.email.focus();
	return false;
}
if (email.length < 5) {
	alert('Digite corretamente o campo Email');
	cadastroInst.email.focus();
	return false;
}


//cnpj
if (cnpj == "") {
	alert('Preencha o campo CNPJ');
	cadastroInst.cnpj.focus();
	return false;
}
if (cnpj.length < 5) {
	alert('Digite corretamente o campo CPNJ');
	cadastroInst.cnpj.focus();
	return false;
}
//Endereco
if (endereco == "") {
	alert('Preencha o campo endereço');
	cadastroInst.endereco.focus();
	return false;
}
if (endereco.length < 5) {
	alert('Digite o endereço completo');
	cadastroInst.endereco.focus();
	return false;
}
//telefone
if (telefone == "") {
	alert('Preencha o campo telefone');
	cadastroInst.telefone.focus();
	return false;
}
if (telefone.length < 10) {
	alert('Digite o DD do telefone');
	cadastroInst.telefone.focus();
	return false;
}
//Sobre
if (sobre == "") {
	alert('Fale Sobre a Instituição');
	cadastroInst.sobre.focus();
	return false;
}
if (sobre.length < 10) {
	alert('Pouco conteúdo, fale mais sobre a instituição');
	cadastroInst.sobre.focus();
	return false;
}
	document.cadastroInst.submit(); 
	return true;
}