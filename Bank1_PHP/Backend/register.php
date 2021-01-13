<?php
 class Register{

   function generateBankNumber($countryCode, $bankNumber, $accountNumber){
       if(!empty($countryCode) && !empty($bankNumber) && !empty($accountNumber)){
         $accountAndBankNumber = $bankNumber.str_pad($accountNumber,10,"0",STR_PAD_LEFT);
         $checkSum = str_pad(98 - bcmod($accountAndBankNumber, 97), 2, "0", STR_PAD_LEFT);
         $final = $countryCode.$checkSum.$accountAndBankNumber;
         return $final;
       }
       else
         return 0;
   }

   function register($name,$surname,$login,$password,$bankNumber){
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
       $final = $this->generateBankNumber("PL",$bankNumber,$accountNumber);
      $addUserQuery = "INSERT INTO user (name,surname,login,password,bankNumber)
      VALUES('$name','$surname','$login','$password','$final')";
      mysqli_query($db,$addUserQuery);
     }
   }
 }
 ?>
