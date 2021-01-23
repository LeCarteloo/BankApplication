<?php
class Transfer{

  // polaczenie z baza i nazwa tabel w bazie
  private $connection;
  private $tableHistory = "historia";
  private $tableUser = "user";

  public $id;
  public $id_status;

  public function __construct($db){
          $this->connection = $db;
  }


 function readTransfers(){
        // zapytanie wyswietlajace wszystkie przelewy z typu zewnetrznego
        $query = "SELECT * FROM ". $this->tableHistory ." WHERE type = 'Zewnetrzny' AND data = CURDATE() AND id_status = '2'";

        // przygotowanie zapytania
        $stmt = $this->connection->prepare($query);

        // wykonanie zapytania
        $stmt->execute();

        return $stmt;
 }


 function bankTransfer($userAccount, $outAccount, $title, $amount, $balance,$name,$type){
 $outAccount = "PL".$outAccount;

 //sprawdz czy istnieje taki numer rachunku
 $numberCheckQuery = "SELECT balance FROM " . $this->tableUser . " WHERE bankNumber = '$outAccount'";

 $stmtNumber = $this->connection->prepare($numberCheckQuery);
 $stmtNumber->execute();
 $numberExist = $stmtNumber->rowCount();


 if($numberExist > 0){
   $resultNumber = $stmtNumber->fetchAll();
    if($balance >= $amount){

          $balanceUser = $balance - $amount;
          $balanceOut = $resultNumber[0]['balance'] + $amount;
          $date = date("Y-m-d");

          $makeTransferQuery = "UPDATE user SET balance ='$balanceUser' WHERE bankNumber='$userAccount';
          UPDATE user SET balance ='$balanceOut' WHERE bankNumber='$outAccount';
          INSERT INTO historia (numerPrzychodzacy, numerWychodzacy, tytul, nazwa, kwota, data, id_status, type) VALUES ('$userAccount', '$outAccount', '$title', '$name', '$amount', '$date',1,'$type');";

          $stmtTransfer = $this->connection->prepare($makeTransferQuery);
          $stmtTransfer->execute();

          return $balanceUser;
    }
 }
 else{

   $balanceUser = $balance - $amount;
   $date = date("Y-m-d");

   $makeExternalTransferQuery = "UPDATE user SET balance ='$balanceUser' WHERE bankNumber='$userAccount';
   INSERT INTO historia (numerPrzychodzacy, numerWychodzacy, tytul, nazwa, kwota, data, id_status, type) VALUES ('$userAccount', '$outAccount', '$title', '$name', '$amount', '$date',2,'$type');";

   $stmtExternalTransfer = $this->connection->prepare($makeExternalTransferQuery);
   $stmtExternalTransfer->execute();

   return $balanceUser;
 }

   }


   function update($id){

     // zapytanie do aktualizowania statusu faktury
        $query = "UPDATE " . $this->tableHistory . "
        SET
        id_status=:id_status
        WHERE id =" . $id;

        // przygotowanie zapytania
        $stmt = $this->connection->prepare($query);
        // zabezpieczenie
        $this->id_status = htmlspecialchars(strip_tags($this->id_status));

        // podłączenie wartości do zapytania
        $stmt->bindParam(":id_status", $this->id_status);

        // wykonanie zapytania
        if ($stmt->execute()) {
            return true;
        }

        return false;

   }


}
 ?>
