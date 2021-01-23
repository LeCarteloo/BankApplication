<?php
class User{

  private $connection;
  private $tableUser = "user";


  public function __construct($db){
    $this->connection = $db;
  }

  function readUsers(){
    $query = "SELECT bankNumber FROM " . $this->tableUser;

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
  }

  function sumBalance(){
    $query = "SELECT sum(balance) as sumBalance FROM " . $this->tableUser;

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
  }
}
 ?>
