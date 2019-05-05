<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Gabriel
 */


class Login {
	
	private $login;
	private $senha;
	private $id;
	private $nome;
	private $userType;
	private $autoLogin;

		
	function __construct(){
	
	}
	private function setAutoLogin($autoLogin = FALSE){
		if($autoLogin == 1){
			$this -> autoLogin = TRUE;
		}else{
			$this -> autoLogin = FALSE;
		}		
	}
	private function setUserType($userType){
		$this -> userType = $userType;
	}
	private function setLogin($login){
		$this -> login = $login;
	}
	private function setSenha($senha){
		$this -> senha = $senha;
	}
	public function getLogin(){
		return $this -> login;
	}
	public function checkLogin($login,$senha,$userType,$autoLogin = FALSE){
		
            $this -> setUserType($userType);		
            $this->setAutoLogin($autoLogin);
            $this -> setLogin($login);
            $this -> setSenha($senha);		
            $params[]=$this -> login;
            $params[]=$this -> senha;
            
            if($this -> userType == 0){
                $con = Connect::getLink() -> prepare("select nome,id from instituicoes where login=? and senha=?");
            }
            elseif($this -> userType == 1){
                $con = Connect::getLink() -> prepare("select nome,id from colaboradores where login=? and senha=?");
            }else {
                Error:setError("Tipo de usuário Incorreto");               
                return FALSE;
            }	

            $con -> execute($params);
            $result = $con -> rowCount();

            if($result == 1){			
                    $user = $con -> fetchAll();
                    $this -> id = $user[0]['id'];
                    $this -> nome = $user[0]['nome'];	
                    if($this -> createSession()){

                            return TRUE;
                    }
            }
            return FALSE;

    }
	private function createSession(){
		
		if($this->autoLogin){
		$sessao = md5(time());	
		$params[]= gethostbyaddr($_SERVER['REMOTE_ADDR']);
		$params[]= $this -> nome;
		$params[]= $sessao;	
		$params[]= $this -> id;	
		$params[]= $this -> userType;	
			
		$con = Connect::getLink()-> prepare("insert into login (nomepc,nome,session,id_user,tipo) values(?,?,?,?,?)");
		
		$con -> execute($params);
		if($con -> rowCount()){
			
			setcookie('saveloginboaacao', $sessao, (time() + (30 * 24 * 3600)));
			Session::openSession();
			$_SESSION['id'] = $this -> id;	
			$_SESSION['nome'] = $this -> nome;
			$_SESSION['tipo'] = $this -> userType;
			$_SESSION['nomepc'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			
			return TRUE;
		}
			
		return FALSE;
		
		
	 	}
	 	Session::openSession();
	 	$_SESSION['id'] = $this -> id;	
		$_SESSION['nome'] = $this -> nome;	
		$_SESSION['tipo'] = $this -> userType;
		return TRUE;
	}

}
class Session {
	
	public function getId(){
		$this -> openSession();
		return $_SESSION['id'];
	}	
	public function getNome(){
		$this -> openSession();
		return $_SESSION['nome'];
	}
	public function getTipo(){
		$this -> openSession();
		return $_SESSION['tipo'];
	}
	
	public function check(){
		$this -> openSession();
		if(isset($_SESSION['nome']) and isset($_SESSION['id']) and isset($_SESSION['tipo'])){
			return TRUE;
		}		
		
		if(isset($_COOKIE['saveloginboaacao'])){
			
			$params[]= $_COOKIE['saveloginboaacao'];
			$con = Connect::getLink()-> prepare("select nome,nomepc,id_user,tipo from login where session=?");
			 
			$con -> execute($params);			
			
			if($con-> rowCount()){		
				$session = $con -> fetchAll();
				$this-> createSession ($session);
				return TRUE;					
			}else{
				setcookie("saveloginboaacao" , "");	
				return FALSE;							
			}
		}
		return FALSE;
	}
	private function createSession($session){
			$this -> openSession();
		if(isset($_SESSION['id']) and isset($_SESSION['nome']) and isset($_SESSION['tipo'])){
			
		}else{
			
			$_SESSION['id_user'] = $session[0]['id_user'];	
			$_SESSION['nome'] = $session[0]['nome'];
			$_SESSION['nomepc'] = $session[0]['tipo'];
			$_SESSION['nomepc'] = $session[0]['nomepc'];
			
		}		
	}
	public static function openSession(){
		if(session_id() == ''){ //verifica se a session esta aberta
	           session_start();
		}
	}
	public function logof(){
		session_destroy();
		if(isset($_COOKIE['saveloginboaacao'])){			
			
			
			$params[]=$_COOKIE['saveloginboaacao'];
			$con = Connect::getLink()-> prepare("delete from login where session=?");
			$con ->execute($params);	
                        if ($con ->rowCount()){                            
                            setcookie("saveloginboaacao" , "");		
                            return TRUE;                            
                        }else{
                            return FALSE;                            
                        }
                        
					
		}
		return TRUE;
	}
	
}

