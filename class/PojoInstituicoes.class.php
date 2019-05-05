<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PojoInstituicoes {
	private $ID;
        private $nome;
	private $login;
	private $senha;
	private $email;
	private $endereco;
	private $telefone;
	private $cnpj;	
	private $sobre;	
	private $img;
	private $imgObject;
	protected $con;
	
	public function setImg($img){
		$this -> img = $img;
	}
	public function getImg(){
		return $this -> img;
	}        
        public function setID($ID){
		$this -> ID = $ID;
	}
	public function getID(){
		return $this -> ID;
	}
        public function setNome($nome){
		$this -> nome = $nome;
	}
	public function getNome(){
		return $this -> nome;
	}
	
	public function setLogin($login){
		$this -> login = $login;
	}
	public function getLogin(){
		return $this -> login;
	}
	
	public function setSenha($senha){
		$this -> senha = $senha;
	}
		
	public function getSenha(){
		return $this -> senha;
	}
	
	public function setEmail($email){
		$this -> email = $email;
	}
	public function getEmail(){
		return $this -> email;
	}
	
	public function setEndereco($endereco){
		$this -> endereco = $endereco;
	}
	public function getEndereco(){
		return $this -> endereco;
	}
	
	public function setTelefone($telefone){
		$this -> telefone = $telefone;
	}
	public function getTelefone(){
		return $this -> telefone;
	}
	
	public function setCnpj($cnpj){
		$this -> cnpj = $cnpj;
	}
	public function getCnpj(){
		return $this -> cnpj;
	}	
	public function setSobre($sobre){
		$this -> sobre = $sobre;
	}
	public function getSobre(){
		return $this -> sobre;
	}
}