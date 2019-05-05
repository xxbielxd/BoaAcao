<?php
class PojoColaboradores {
	
        private $ID;
        private $nome;
	private $login;
	private $senha;
	private $email;
	private $endereco;
	private $telefone;
	private $cpf;	
	protected $con;
	
	function setID($ID){
		$this -> ID = $ID;
	}
	function getID(){
		return $this -> ID;
	}
        function setNome($nome){
		$this -> nome = $nome;
	}
	function getNome(){
		return $this -> nome;
	}
	
	function setLogin($login){
		$this -> login = $login;
	}
	function getLogin(){
		return $this -> login;
	}
	
	function setSenha($senha){
		$this -> senha = $senha;
	}
	function getSenha(){
		return $this -> senha;
	}
	
	function setEmail($email){
		$this -> email = $email;
	}
	function getEmail(){
		return $this -> email;
	}
	
	function setEndereco($endereco){
		$this -> endereco = $endereco;
	}
	function getEndereco(){
		return $this -> endereco;
	}
	
	function setTelefone($telefone){
		$this -> telefone = $telefone;
	}
	function getTelefone(){
		return $this -> telefone;
	}
	
	function setCpf($cpf){
		$this -> cpf = $cpf;
	}
	function getCpf(){
		return $this -> cpf;
	}	
	
	
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

