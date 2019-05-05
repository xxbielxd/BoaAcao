<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ParamsPage {
	
	private $numPages;
	private $numResults;
	private $page;
	private $perPage;
	
	public function setNumResults($numResults){		
            $this -> numResults = $numResults;				
	}
	
	public function getNumResults(){		
            return $this -> numResults;	}
	
	public function setPage($page){		
            $this -> page = $page;				
	}
	
	public function getPage(){		
            return $this -> page;
        }
	
	public function setPerPage($perPage){		
		$this -> perPage = $perPage;				
	}	
	public function getNumPages(){
		return $this -> numPages;
	}
	
	public function getParams(){
		
            if($this -> perPage < 0){
                Error::setError("Informe a quantidade de resultados por página");
            }
            if($this -> numPages < 0){
                Error::setError("Informe a quantidade de resultados");
            }
            if($this -> page < 0){
                Error::setError("Informe a Página");
            }

            $this -> numPages = ceil($this -> numResults/$this -> perPage);		

            if($this -> page > $this -> numPages){
                Error::setError("Esta Pagina não existe");
                return FALSE;
            }	
		
            $limit = ($this -> page - 1) * $this -> perPage;			
            return $param = "LIMIT {$limit},{$this -> perPage} ";
		
	}
	
}	
