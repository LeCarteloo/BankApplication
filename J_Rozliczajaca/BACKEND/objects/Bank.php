<?php

    class Bank{

        // polaczenie z baza i nazwa tabel w bazie
        private $connection;
        private $table = "banki";
        private $bankNumer = '10202498';

        public function __construct($db){
            $this->connection = $db;
        }


        function getBankBalance($numer_banku){

            $query = "SELECT saldo_banku FROM banki WHERE numer_banku = '$numer_banku'";

            $stmt = $this ->connection->prepare($query);

            $stmt->execute();

            return $stmt;

        }

        //funkcja "generateBankNumber" generuje numer bankowy, zwraca polaczony numer bankowy
        function generateBankNumber($countryCode, $bankNumber, $accountNumber){

            if(!empty($countryCode) && !empty($bankNumber) && !empty($accountNumber)){
                $accountAndBankNumber = $bankNumber.str_pad($accountNumber,10,"0",STR_PAD_LEFT);
                $checkSum = str_pad(98 - bcmod($accountAndBankNumber, 97), 2, "0", STR_PAD_LEFT);
                $final = $countryCode.$checkSum.$accountAndBankNumber;
                return $final;
            }else{
                return 0;
            }

        }

        function registerBank($nazwa_banku, $numer_banku, $saldo_banku){

            $bankCheckQuery = "SELECT * FROM banki WHERE numer_banku = '$numer_banku'";
            $stmtBank = $this->connection->prepare($bankCheckQuery);
            $stmtBank->execute();
            $bankExists = $stmtBank->rowCount();
       
            if($bankExists > 0)
                return 0; // Taki bank juz istnieje
            else {
                do{
                    $accountNumber = rand(1000000000000000,9999999999999999);
       
                    $numberCheckQuery = "SELECT numer_rachunku FROM banki WHERE numer_rachunku = '$accountNumber'";
       
                    $stmtNumber = $this->connection->prepare($numberCheckQuery);
                    $stmtNumber->execute();
                    $numberExist = $stmtNumber->rowCount();
       
                }while($numberExist > 0);
       
                $final = $this->generateBankNumber("PL", $this->bankNumer, $accountNumber);
                $addBankQuery = "INSERT INTO banki (rachunek_banku, nazwa_banku, numer_banku, numer_rachunku, saldo_banku) VALUES('$final','$nazwa_banku','$numer_banku','$accountNumber','$saldo_banku')";
                echo $addBankQuery;
                $stmtAdd = $this->connection->prepare($addBankQuery);
                $stmtAdd->execute();
       
                return 1; // Udalo sie stworzyc rachunek banku
            }

        }

        function updateBankBalance($numer_banku, $saldo_banku){

            $stmtChangeStatus = "UPDATE banki SET saldo_banku = '$saldo_banku' WHERE numer_banku = '$numer_banku'";
            
            $stmt = $this->connection->prepare($stmtChangeStatus);
            
            $stmt->execute();
            
            return $stmt;

        }

    }

?>