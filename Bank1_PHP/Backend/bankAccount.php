<?php

class bankAccount{
  //SK BBBB BBBB NNNN NNNN NNNN NNNN
//  $countryCode;
//  $controlSum; // (SK)Dwie pierwsze cyfry zawierają sumę kontrolną
//  $bankNumber; // (BBBB BBBB) osiem cyfr to numer banku --- ostatnia cyfra to cyfra kontrolna
//  $accountNumber; //Pozostałe to numer rachunku

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


  
}

 ?>
