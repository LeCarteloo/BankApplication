<?php
class Konta{

    private $connection;
    private $tableUser = "konta";


    public function __construct($db){
        $this->connection = $db;
    }

    public function readKonta(){
        $query = "SELECT numer_konta FROM " . $this->tableUser;

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function registerKonto($numer_konta){

        $numer_banku = substr($numer_konta,4, -16);

        if($numer_banku == '12345678'){
            $id_banku = 1;
        }elseif($numer_banku == '02042137'){
            $id_banku = 2;
        }elseif($numer_banku == '12345679'){
            $id_banku = 3;
        }
        
        $kontoCheckQuery = "SELECT * FROM konta WHERE numer_konta = '$numer_konta'";

        $stmtKonto = $this->connection->prepare($kontoCheckQuery);

        $stmtKonto->execute();

        $kontoExists = $stmtKonto->rowCount();

        if($kontoExists > 0){
            return 0;
        }else{
            $addKontoQuery = "INSERT INTO konta (numer_konta, id_banku) VALUES('$numer_konta','$id_banku')";
        
            $stmt = $this->connection->prepare($addKontoQuery);

            $stmt->execute();

            return $stmt;
        }
    }
}
?>
