<?php
class Error{
	public static function setError($error){
		 //throw new Exception($error);
		 echo$error;
	}
}

class Connect{
	
	private $link = 'http://localhost:8080/';
	private $host = 'mysql.hostinger.com.br';
	private $db = 'u384472573_bd';
	private $user = 'u384472573_root';
	private $pass = '789456123g';
	private $con;	

	public static function getLink() {
		if (!isset(self::$instance)) {
	    	self::$instance = new PDO("mysql:host={$this->host};dbname={$this->db}", "{$this->user}", "{$this->pass}",
	 		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
	   	}
	
	        return self::$instance;
	    }
	
		}
 

class Query extends Connect {
 
    private $check;
	private $param;
	private $result;
	private $sql;
	private $con;

   	function close (){
   		$this -> con -> close();
   	}
	function __construct($sql,$param = FALSE){
   		$this -> setSql($sql);
   		if($param){   // caso contenha parametros na consulta
   			$this -> setParam($param);
   		}   		
   		$this -> executar();
   	} 
  
   	private function executar(){
      	$link = $this -> getLink();
     	
      	if(!$this -> check == 0){
      		Error::setError("Parametros vazios, insuficientes ou demasiados");
      		return FALSE;
      	} // se conter parametos e não for preenchidos ele retornara erros
      	if(!$this -> sql){
      		Error::setError("Informe a sql antes de executa-lo");
      		return FALSE;
      	}
      	if ($this -> con = $link -> prepare($this->sql)){
      		if (isset($this -> param)){	      		
      			foreach($this -> param as $key => $value){       //da referencia a array pois sem, nao funciona o call_user_func_array
				$temp[$key] = &$this->param[$key];				
				}  				        			
      			call_user_func_array(array($this -> con, 'bind_param'), $temp);
      		}
      		
     		$this -> result = $this -> con -> execute();     		 
         		   				     		
     		
     	}
   	}
 
   	public function getResult(){     
      	
   		return $this -> result;//retorna a variavel caso seja um consulta para que possa ser tratada
      	
 	}
 	public function getNumRows(){
 		
 		return $this -> result -> num_rows;
 		
 	}
	public function getAffectedRows(){
 		
 		return $this -> con -> affected_rows;
 		 		
 	} 	
 
   	private function error($erro){
     
     	echo $erro;
     	exit;
   	}   	
	
   	public function setSql ($sql){
		
		if(strlen($sql) < 5){
			Error::setError("Sql incorreta ou vazia");
		}   		
   		$this -> sql = $sql;
		if($n = substr_count($sql,"?")){
			$this -> check = $n;
		}
		
	}
	
	public function setParam($param){
		
		if(!is_array($param)){   //verifica se a variavel é uma array
			Error::setError("Parametro apenas em forma de array"); 
			return FALSE;
		}
		
		$type[]=''; //transforma a variavel em array para poder junta-la futuramente
		foreach($param as $key => $value){
			if(gettype($value) == "string"){
				$type[0] .= "s";
			}
			elseif(gettype($value) == "integer"){
				$type[0] .= "i";
			}
			elseif(gettype($value) == "double"){
				$type[0] .= "d";
			}
			elseif(gettype($value) == "unknown type"){
				$type[0] .= "b";
			}else{
				Error::setError("Nao foi possivel identificar o tipo da variavel");
			}			
		}		
		$this ->check -= count($param);  //diminui o valor do check de acordo com a quantidade de parametros que chegou, afim de evitar erros
		$this -> param = array_merge($type,$param);  //adiciona no inicio os types dos parametros 	
		
	}

}

class Consult extends Query {
	
	public function fetch_assoc(){
		return $this -> getResult() -> fetch_assoc();
	}
}

class BaseDAO {
		
	private $params;
	private $query;
	private $type;
		
	function setQuery($query,$params=false){// 1 - insert 2 - select  3- update 4 - delete
	
		$this -> setParams($params);
		$this -> query = $query;
		
		if($n = strripos($query, "insert") === 0){
			$this -> type = 1;			
		}		
		elseif($n = strripos($query, "select") === 0){
			$this -> type = 2;			
		}		
		elseif($n = strripos($query, "update") === 0){
			$this -> type = 3;			
		}		
		elseif($n = strripos($query, "delete") === 0){
			$this -> type = 4;			
		}
		else{
			Error::setError("Query incorreta, so sera aceito Update,Insert,Delete e Select");
		}		
	}	

	public function close(){
		$this -> query -> close();
		$this -> params = NULL;
		$this -> query = NULL;
		$this -> type = NULL;
		
	}
	
	private function setLimit($limit){
		$this -> limit = $limit;
	}

	private function setParams($params){ //Condição where 
		$this -> params = $params;
	}
	
	public function getAffectedRows(){
		return $this -> query -> getAffectedRows();
	}
	
	public function getNumRows(){
		if ($this->type != 2){
			Error::setError("A query não é um select");
			return FALSE;
		}
		
		return $this -> query -> getNumRows();
	}
	
	public function select (){

		if($this -> type != 2){
			Error::setError("A query não é um select, cuidado para não fazer cagada ;)");	   // a Query não é um select 	
			return FALSE;
		}
				
		$this -> query = new Query($this -> query,$this -> params);			
		
	}
	public function delete (){			
	
		if($this -> type != 4){
			Error::setError("A query não é um delete, cuidado para não fazer cagada ;)");		   // a Query não é um select 	
			return FALSE;
		}
				
		$this -> query = new Query($this -> query,$this -> params);		
		
	}
	public function update (){
		
		if($this -> type != 3){
			Error::setError("A query não é um update, cuidado para não fazer cagada ;)");		   // a Query não é um select 	
			return FALSE;
		}
				
		$this -> query = new Query($this -> query,$this -> params);	
		
	}
	public function insert (){
		
		if($this -> type != 1){
			Error::setError("A query não é um insert, cuidado para não fazer cagada ;)");		   // a Query não é um select 	
			return FALSE;
		}
				
		$this -> query = new Query($this -> query,$this -> params);	
		
	}
	public function fetch_assoc(){
		if ($this->type != 2){
			Error::setError("A query não é um select, então não ha resultados");
			return FALSE;
		}
		return $this -> query -> getResult() -> fetch_assoc();
	}
	
	public function fetch_all(){
		if ($this->type != 2){
			Error::setError("A query não é um select, então não ha resultados");
			return FALSE;
		}
		return $this -> query -> fetchAll();
	}
	
}
	
class ParamsPage {
	
	private $numPages;
	private $numResults;
	private $page;
	private $perPage;
	
	public function setNumResults($numResults){
		
		$this -> numResults = $numResults;
				
	}
	
	public function getNumResults(){
		
		return $this -> numResults;
	}
	
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
	
	


?>