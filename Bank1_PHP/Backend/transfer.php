<?php
class Transfer{

  public function __construct($db)
      {
          $this->connection = $db;
      }


 function readTransfers(){
        // zapytanie wyswietlajace wszystkie towary
        $query = "SELECT * FROM historia";

        // przygotowanie zapytania
        $stmt = $this->connection->prepare($query);

        // wykonanie zapytania
        $stmt->execute();

        return $stmt;

 }


 function bankTransfer($userAccount, $outAccount, $title, $amount, $balance,$name){
 $outAccount = "PL".$outAccount;
 $db = mysqli_connect('localhost','root','','bank1');
 //sprawdz czy istnieje taki numer rachunku
 $numberCheckQuery = "SELECT balance FROM user WHERE bankNumber = '$outAccount'";
 $result = mysqli_query($db,$numberCheckQuery);
 $numberExist = mysqli_fetch_assoc($result);

 if($numberExist){
    if($balance >= $amount){
          $balanceUser = $balance - $amount;
          $balanceOut = $numberExist['balance'] + $amount;
          $date = date("Y-m-d");

          $updateBalanceUser = "UPDATE user SET balance ='$balanceUser' WHERE bankNumber='$userAccount'";
          $updateBalanceOut = "UPDATE user SET balance ='$balanceOut' WHERE bankNumber='$outAccount'";
          $addTransferQuery = "INSERT INTO historia (numerPrzychodzacy, numerWychodzacy, tytul, nazwa, kwota, data, status) VALUES ('$userAccount', '$outAccount', '$title', '$name', '$amount', '$date',1)";

          mysqli_query($db,$updateBalanceUser);
          mysqli_query($db,$updateBalanceOut);
          mysqli_query($db,$addTransferQuery);

          return $balanceUser;
    }
 }
 else
   echo "<script> console.log('Nie ma takiego numeru konta');</script>";
   }
}
 ?>
