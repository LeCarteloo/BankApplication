<?php
 class Register{

   // polaczenie z baza i nazwa tabel w bazie
   private $connection;
   private $tableUser = "user";

   public function __construct($db){
           $this->connection = $db;
   }

   //funkcja "generateBankNumber" generuje numer bankowy, zwraca polaczony numer bankowy
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

   //funkcja "register" zwraca - 1 jezeli udalo sie stworzyc uzytkownika, przeciwnie 0
   function registerUser($name, $surname, $login, $password, $againPassword, $pesel, $email, $telephoneNumber, $location, $street, $houseNumber, $postCode, $bankNumber){

     $userCheckQuery = "SELECT * FROM " . $this->tableUser . " WHERE login = '$login'";
     $stmtUser = $this->connection->prepare($userCheckQuery);
     $stmtUser->execute();
     $userExist = $stmtUser->rowCount();

     if($userExist > 0)
        return 0; // Taki uzytkownik juz istnieje
     else {
       do{
         $accountNumber = rand(1000000000000000,9999999999999999);

         $numberCheckQuery = "SELECT bankNumber FROM" . $this->tableUser . "WHERE bankNumber = '$accountNumber'";

         $stmtNumber = $this->connection->prepare($numberCheckQuery);
         $stmtNumber->execute();
         $numberExist = $stmtNumber->rowCount();

       }while($numberExist > 0);

      $final = $this->generateBankNumber("PL",$bankNumber,$accountNumber);
      $addUserQuery = "INSERT INTO " . $this->tableUser . " (name,surname,login,password,bankNumber,pesel,email,telephoneNumber,location,street,houseNumber,postCode,balance)
      VALUES('$name','$surname','$login','$password','$final', '$pesel', '$email', '$telephoneNumber', '$location', '$street', '$houseNumber', '$postCode','0')";

      $stmtAdd = $this->connection->prepare($addUserQuery);
      $stmtAdd->execute();

      return 1; // Udalo sie stworzyc uzytkownika
     }

   }
 }
 ?>
