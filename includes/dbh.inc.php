<?php
 /*class  bh  {
    private $servername;
    private $username ;
    private $password ;
    private $dbname ;

    protected function connect() {
       $this->servername ="localhost";
       $this->username ="root";
       $this->password ="";
       $this->dbname ="phppractice";

       $conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
       return $conn;

       
    }
 } */

//PDO connection to the database


 class  Dbh  {
   private $servername;
   private $username ;
   private $password ;
   private $dbname ;
   private $charset ;


   public function connect() {
      $this->servername ="localhost";
      $this->username ="root";
      $this->password ="";
      $this->dbname ="hms2";
      $this->charset  ="utf8mb4";

      
      try {
         $dsn =  "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset ;    
         $pdo = new PDO($dsn,$this->username,$this->password);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $pdo;
      } catch (PDOExeption $e) {
        echo "Connection failed".$e->getMessage();
      }
      
   }
 } 



/*
 $servername ="localhost";
 $username ="root";
 $password ="";
 $dbname="hms2";
 $charset  ="utf8mb4";
//CREATE DNS
$dns =  "mysql:host=".$servername.";dbname=".$dbname.";charset=".$charset ; 

 

 try {
   $pdo = new PDO($dns,$username,$password);
   // set the PDO error mode to exception
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully"; 
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }
 
*/