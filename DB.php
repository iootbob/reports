<?php 

class DB{

    public static $instance = null;

    public function __construct(){
        
    }   

    public static function getInstance(){
        if(is_null(self::$instance) || self::$instance == null){
            try{
                $dsn = "mysql:dbname=philipoh_pb;host=198.57.247.220";
                $dbUser = "philipoh_user";
                $dbPass = "letmein7";
    
                self::$instance = new PDO($dsn,$dbUser,$dbPass);
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
}

 



// $test->fetchAll();
