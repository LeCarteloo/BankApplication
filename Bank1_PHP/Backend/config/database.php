<?php
class Database{
private $host = "localhost";
private $database_name = "bank1";
private $username = "root";
private $password = "";
public $connection;

public $bankNumberA = "12345678";
public $linkCheckNumber = "http://localhost/ProjectPAB/J_Rozliczajaca/BACKEND/readKonta.php";

  public function getConnection(){
    $this->connection = null;
    try{
      $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Błąd łączenia: " . $exception->getMessage();
        }
        return $this->connection;
  }
}
 ?>
