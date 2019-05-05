<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOColaboradores
 *
 * @author Gabriel
 */
class DAOColaboradores {
    private $totalPages;
	
	
    function __construct(){
              
    }	
    
    public function getTotalPages(){
        
        return $this -> totalPages;
    }
    
    public function select($perPage,$page = 1){          
        
        try{
           
            $con =  Connect::getLink() -> query("select count(*) total from colaboradores");          
            $totalResults = $con -> fetchAll()[0]['total'];  
            $params = new ParamsPage();
            $params ->setPage($page);
            $params ->setPerPage($perPage);
            $params ->setNumResults($totalResults);            
            $param = $params ->getParams();
            $this -> totalPages = $params ->getNumPages();
            
            $consult = Connect::getLink() -> prepare("select * from colaboradores $param");      
            $consult -> execute();
            
            return $consult -> fetchAll();           
            
        
        }catch(Exception $e){
            Error::catchError($e);
                       
        }catch(PDOException $e){
            Error::catchError($e);
        }
    }
    public function selectWithID($id){
        try{
           $con = Connect::getLink() -> prepare("select * from colaboradores where id=?");
           $param[]=$id;
           
           $con -> execute($param);
           
           return $con ->fetchAll();
            
            
        } catch (PDOException $e) {
            Error::setError($e->getMessage());
            die();
        }
    }
     private function createParams(PojoColaboradores $colab){
        $params[":nome"] = $colab ->getNome();		
        $params[":senha"] = $colab ->getSenha();
        $params[":email"] = $colab ->getEmail();
        $params[":endereco"] = $colab ->getEndereco();
        $params[":telefone"] = $colab ->getTelefone();
        $params[":cpf"] = $colab ->getCpf();        	
                
        return $params;       
        
    }
    public function update(PojoColaboradores $colab){
       
        $params = $this ->createParams($colab);
        
        $params[":id"] = $colab ->getID();        

        $update = Connect::getLink()->prepare("update colaboradores set nome=:nome,senha=:senha,email=:email,endereco=:endereco,telefone=:telefone,cpf=:cpf where id=:id");
        
        $update -> execute($params);

        if($update -> rowCount()){
            return TRUE;
        }else{
            return FALSE;
        } 
        
    }
    public function insert(PojoColaboradores $colab){
        
        try{
            
            $params = $this ->createParams($colab);
            $params[":login"]=$colab ->getLogin();
            $insert = Connect::getLink() -> prepare("insert into colaboradores (nome,login,senha,email,endereco,telefone,cpf) values (:nome,:login,:senha,:email,:endereco,:telefone,:cpf)");

            $insert -> execute($params);

            if($insert ->rowCount()){
               return TRUE; 
            }
            Error::setError("Ocorreu algum erro no cadastro");
            return FALSE;           
            
          
        }catch(PDOException $e){
           
            Error::catchError($e);            
                       
        }catch(Exception $e){
            Error::catchError($e);
        }
        
    }
}
