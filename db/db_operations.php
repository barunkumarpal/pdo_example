<?php
require_once('config.php');

class db{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PWD;
    private $db_name = DB_NAME;

    public $link;
    public $error;

  
    public function connect(){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db_name;
        $pdo = new PDO($dsn, $this->user, $this->pwd);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    
    }
    function fetch($table_name, $select){ 
        $response['success'] = 0;
        
        $sql ="SELECT * FROM `$table_name` WHERE $select"; 

        $result = $this->connect()->prepare($sql);       

        $result->execute();

        $results = $result -> fetch();           

        $row_count = $result->rowCount();                      

        if($row_count > 0)
        {
            $results['success'] = 1;                

        }else{
            $results['success'] = 0;                
        }

        return $results;
    }
    function fetch_all($table_name, $where = 0){ 
        $response['success'] = 0;
        
        if(isset($where) && $where != 0 ){
            $sql ="SELECT * FROM `$table_name` WHERE $where"; 
            
        }else{
            $sql ="SELECT * FROM `$table_name`"; 
        }
        

        $result = $this->connect()->prepare($sql);       

        $result->execute();

        $results = $result -> fetchAll();           

        $row_count = $result->rowCount();                      

        if($row_count > 0)
        {
            $results['success'] = 1;                

        }else{
            $results['success'] = 0;                
        }

        return $results;
    }
    
    function insert($table_name, $select, $values){   

        $response = 0; 
    
        $sql ="INSERT INTO `$table_name`($select) VALUES ($values)";    

        // echo "<pre>";
        // print_r($sql);
        // echo "<pre>";
        // exit;
    
        $result = $this->connect()->prepare($sql);
        $execute = $result->execute();
    
        if($execute==0){            
              
            return $response = 0;           
        }else{
             
            return $response = 1;         
        }
    
        return $response;
    }    
      

    function update($table_name, $values, $where){
        $sql ="UPDATE `$table_name` SET $values WHERE $where";

                //         echo "<pre>";
                // print_r($sql);
                // echo "<pre>";
                // exit;

        $result = $this->connect()->prepare($sql);
        $execute = $result->execute();                                

            if($execute !== 0)
            {
                $response = 1;                

            }else{
                $response = 0;                
            }
            
            return $response;
            // return $sql;
    }
 
    function delete($table_name, $where){   
       

        $sql ="DELETE FROM `$table_name` WHERE $where";   

        $result = $this->connect()->prepare($sql);
        $execute = $result->execute();

        if($execute==0){         
            $response = 0;                          
        }else{   
           
            $response = 1;                      
        }
        return $response;
        
    }  

}











