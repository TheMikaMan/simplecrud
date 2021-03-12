<?php

class Database {

  // properties
  protected $host       = "localhost";
  protected $username   = "root";
  protected $password   = "";
  protected $dbname     = "affiliate";
  protected $options    = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

  public function getData($sql, $dataSet){
    try  {
      $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password, $this->options);
      $statement = $connection->prepare($sql);  
      $statement->execute($dataSet);           
      $result = $statement->fetchAll();         
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
        return null;
    } 
    return $result;                             
  } 

    
}