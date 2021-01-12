<?php
 include_once 'bankAccount.php';

 $bankAccount = new bankAccount();

 $name = "test";
 $surname = "test";
 $login = "test";
 $password = "test";
 // numer banku powinien byc zdefiniowany
 $bankNumber = 12345678;

 $db = mysqli_connect('localhost','root','','bank1');

 $userCheckQuery = "SELECT * FROM user WHERE login = '$login'";
 $result = mysqli_query($db,$userCheckQuery);
 $userExist = mysqli_fetch_assoc($result);

 if($userExist)
  echo "<script> console.log('Taki użytkownik już istnieje'); </script>";
 else {
   do{
     $accountNumber = rand(1000000000000000,9999999999999999);
     $numberCheckQuery = "SELECT bankNumber FROM user WHERE bankNumber = '$accountNumber'";
     $result = mysqli_query($db,$numberCheckQuery);
     $numberExist = mysqli_fetch_assoc($result);
   }while($numberExist);
   $final = $bankAccount->generateBankNumber("PL",$bankNumber,$accountNumber);
  $addUserQuery = "INSERT INTO user (name,surname,login,password,bankNumber)
  VALUES('$name','$surname','$login','$password','$final')";
  mysqli_query($db,$addUserQuery);
 }
 ?>
