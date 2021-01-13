<?php

 //---------------------------TESTY---------------------------//

 $numerRachunkuUzyt = "65 1060 0076 0000 3200 0005 7153";
 $numerRachunku = "65 1060 0076 0000 3200 0005 7154";
 $nazwaiAdres = "nazwaiAdres";
 $kwotaPrzelewu = "120";
 $Tytul = "ZA COS";
 $typPrzelewu = "Wewnetrzny";

 $db = mysqli_connect('localhost','root','','bank1');
 //sprawdz czy istnieje taki numer rachunku
 $numberCheckQuery = "SELECT balance FROM user WHERE bankNumber = '$numerRachunku'";
 $result = mysqli_query($db,$numberCheckQuery);
 $numberExist = mysqli_fetch_assoc($result);

 //sprawdz czy uzytkownik ma wystarczajaco gotowki na koncie
 $balanceCheckQuery = "SELECT balance FROM user WHERE bankNumber = '$numerRachunkuUzyt'";
 $result = mysqli_query($db,$balanceCheckQuery);
 $balance = mysqli_fetch_assoc($result);


 if($numberExist){
    if($balance['balance'] >= $kwotaPrzelewu){

      $balanceUser = $balance['balance'] - $kwotaPrzelewu;
      $balanceOut = $numberExist['balance'] + $kwotaPrzelewu;
      $sql = "UPDATE user SET balance ='$balanceUser' WHERE bankNumber='$numerRachunkuUzyt'";
      $sql1 = "UPDATE user SET balance ='$balanceOut' WHERE bankNumber='$numerRachunku'";
      echo "<script> console.log('$balanceUser, $balanceOut');</script>";
      mysqli_query($db,$sql);
      mysqli_query($db,$sql1);
    }
 }
 else
   echo "<script> console.log('Nie ma takiego numeru konta');</script>";


 ?>
