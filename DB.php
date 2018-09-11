<?php 

class DB{

    public static $instance = null;

    public function __construct(){
        
    }   

    public static function getInstance(){
        if(is_null(self::$instance) || self::$instance == null){
            try{
                $dsn = "mysql:dbname=9_33_pb;host=localhost";
                $dbUser = "root";
                $dbPass = "";
    
                self::$instance = new PDO($dsn,$dbUser,$dbPass);
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
}

 



// $test->fetchAll();
