<?php
/*
 * To know the all errors, you need require the class 'Error'.
 * Para sabe todos os erros, você precisa require a classe 'Error'
 */


class Connect {
    
    static $con;
    
    public static function getLink() {       
        
        $link = 'http://localhost:8080/';
        $host = 'mysql.hostinger.com.br';
        $db = 'u385627788_geral';
        $user = 'u385627788_root';
        $pass = '789456123g';       
        
        try{
        
            self::$con = new PDO("mysql:host=$host;dbname=$db", "$user", "$pass",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con -> setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

            return self::$con;
            
        }catch (PDOException $e) {
            
            Error::setError($e->getMessage());
            die();
            
        }
        
    }
    
    
    
    
}

