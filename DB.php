<?php 

class DB{

    public static $instance = null;

    public function __construct(){
        
    }   

    public static function getInstance(){
        global $config;
        if(is_null(self::$instance) || self::$instance == null){
            try{
                
                $dsn = "mysql:dbname=penbros_coredb;host=108.167.142.45";
                $dbUser = "penbros_master";
                $dbPass = 'P3nBr0thers';
    
                self::$instance = new PDO($dsn,$dbUser,$dbPass);
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
}

 



// $test->fetchAll();
