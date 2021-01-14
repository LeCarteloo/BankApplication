<?php
 class Register{
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

   function checkInputs($name, $surname, $login, $password, $pesel, $telephoneNumber, $location, $street, $houseNumber, $postCode){
     $error = True;
     if(!ctype_alpha($name)){
       $_SESSION['bladImie'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Imie powinno zawierać tylko litery!</span>'; $error = False;}
     if(!ctype_alpha($surname)){
       $_SESSION['bladNazwisko'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Nazwisko powinno zawierać tylko litery!</span>'; $error = False;}
     if(strlen($login)<6){
       $_SESSION['bladLogin'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Login musi być dłuższy niż sześć znaków!</span>'; $error = False;}
     if(strlen($password)<6){
       $_SESSION['bladHaslo'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Hasło musi być dłuższe niż sześć znaków!</span>'; $error = False;}
     if((!is_numeric($pesel) && strlen($pesel)!=11)  || !is_numeric($pesel) ){
       $_SESSION['bladPesel'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">PESEL musi zawierać jedenaście cyfr!</span>'; $error = False;}
    if((!is_numeric($telephoneNumber) && strlen($telephoneNumber)!=9) || !is_numeric($telephoneNumber)){
       $_SESSION['bladTelefon'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Numer telefonu musi zawierać dziewięć cyfr!</span>'; $error = False;}
    if(!ctype_alpha($location)){
        $_SESSION['bladMiejscowosc'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Miejscowość powinna zawierać tylko litery!</span>'; $error = False;}
    if(!ctype_alpha($street)){
        $_SESSION['bladUlica'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Ulica powinna zawierać tylko litery!</span>'; $error = False;}
    if(!is_numeric($houseNumber)){
        $_SESSION['bladNumer'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Numer domu powinnien zawierać tylko cyfry!</span>'; $error = False;}
    if(!preg_match( '/^([0-9]{2})(-[0-9]{3})?$/i', $postCode )){
        $_SESSION['bladKod'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Kod powinien być podana w formacie 00-000</span>'; $error = False;}

        return $error;
   }

   //funkcja "register" zwraca - 1 jezeli udalo sie stworzyc uzytkownika, przeciwnie 0
   function registerUser($name, $surname, $login, $password, $pesel, $email, $telephoneNumber, $location, $street, $houseNumber, $postCode, $bankNumber){

     $db = mysqli_connect('localhost','root','','bank1');

     $userCheckQuery = "SELECT * FROM user WHERE login = '$login'";
     $result = mysqli_query($db,$userCheckQuery);
     $userExist = mysqli_fetch_assoc($result);

     if($userExist)
        return 0; // Taki uzytkownik juz istnieje
     else {
       do{
         $accountNumber = rand(1000000000000000,9999999999999999);
         $numberCheckQuery = "SELECT bankNumber FROM user WHERE bankNumber = '$accountNumber'";
         $result = mysqli_query($db,$numberCheckQuery);
         $numberExist = mysqli_fetch_assoc($result);
       }while($numberExist);
       $final = $this->generateBankNumber("PL",$bankNumber,$accountNumber);
      $addUserQuery = "INSERT INTO user (name,surname,login,password,bankNumber,pesel,email,telephoneNumber,location,street,houseNumber,postCode,balance)
      VALUES('$name','$surname','$login','$password','$final', '$pesel', '$email', '$telephoneNumber', '$location', '$street', '$houseNumber', '$postCode','0')";
      mysqli_query($db,$addUserQuery);
      return 1; // Udalo sie stworzyc uzytkownika
     }
   }
 }
 ?>
