<?php

/* 
 * This class recive all errors the classes,manage this error and send to the user
 * Essa classe recebe todos erros das classes,trata o erro e envia ao usuario
 * 
 * use "Error::setError" to set error 
 * use "Error::setError" para definir o erro
 */

class Error{
	public static function setError($error){
		 //throw new Exception($error);
		throw new Exception($error);
	}
        public static function catchError($e){
            
            echo $e -> getMessage();
            exit();
            
        }
        
}



?>