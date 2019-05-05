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
class DAOInstituicoes {   
   
    private $totalPages;
	
	
    function __construct(){
              
    }	
    
    public function getTotalPages(){
        
        return $this -> totalPages;
    }
    
    public function select($perPage,$page = 1){          
        
        try{
           
            $con =  Connect::getLink() -> query("select count(*) total from instituicoes");          
            $totalResults = $con -> fetchAll()[0]['total'];  
            $params = new ParamsPage();
            $params ->setPage($page);
            $params ->setPerPage($perPage);
            $params ->setNumResults($totalResults);            
            $param = $params ->getParams();
            $this -> totalPages = $params ->getNumPages();
            
            $consult = Connect::getLink() -> prepare("select * from instituicoes $param");      
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
           $con = Connect::getLink() -> prepare("select * from instituicoes where id=?");
           $param[]=$id;
           
           $con -> execute($param);
           
           return $con ->fetchAll();
            
            
        } catch (PDOException $e) {
            Error::setError($e->getMessage());
            die();
        }
    }
    
    private function createParams(PojoInstituicoes $inst){
        $params[":nome"] = $inst -> getNome();		
        $params[":senha"] = $inst -> getSenha();
        $params[":email"] = $inst -> getEmail();
        $params[":endereco"] = $inst -> getEndereco();
        $params[":telefone"] = $inst -> getTelefone();
        $params[":cnpj"] = $inst -> getCnpj();
        $params[":descricao"] = $inst -> getSobre();      
        
        return $params;       
        
    }
    
    public function update(PojoInstituicoes $inst){
        try{
            $params = $this ->createParams($inst); 
            $params[":id"] = $inst -> getID(); 
            $update = Connect::getLink()->prepare("update instituicoes set nome=:nome,senha=:senha,email=:email,endereco=:endereco,telefone=:telefone,cnpj=:cnpj,descricao=:descricao where id=:id");

            $update -> execute($params);

            if($update -> rowCount()){
                return TRUE;
            }else{
                return FALSE;
            } 
        }catch(PDOException $e){
            
             Error::catchError($e);
            
        }
    }
    public function insert(PojoInstituicoes $inst){
        
        try{
            
            $params = $this ->createParams($inst);
            $params[":login"] = $inst ->getLogin();            
            
            if(empty($inst->getImg()['name'])){
                $params[':foto'] = 'semfoto'; //SEM IMAGEM
                $imgOK = TRUE;
            }else{                    			
                $img = new Imagens();
                $img ->setImagem($inst ->getImg());
                $params[":foto"] = $img -> getNome();
                $imgOK = $img ->saveImage();               
            }

            
            if($imgOK){               
            
                $insert = Connect::getLink() -> prepare("insert into instituicoes (nome,login,senha,email,endereco,telefone,cnpj,descricao,foto) values (:nome,:login,:senha,:email,:endereco,:telefone,:cnpj,:descricao,:foto)");

                $insert -> execute($params);

                if($insert ->rowCount()){
                   return TRUE; 
                }
                Error::setError("Ocorreu algum erro no cadastro");
                return FALSE;
            }
            
            return FALSE;
        }catch(PDOException $e){
            $img ->cancel(); 
            Error::catchError($e);            
                       
        }catch(Exception $e){
            Error::catchError($e);
        }
        
    }
}
