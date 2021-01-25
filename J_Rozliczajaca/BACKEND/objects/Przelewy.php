<?php
    class Przelewy{

        private $connection;
        private $table = "przelewy";

        public $id_przelewu;
        public $id_bankowe;
        public $numer_zlecajacego;
        public $numer_odbiorcy;
        public $tytul;
        public $nazwa;
        public $kwota;
        public $data;
        public $status;


        public function __construct($db){
            $this->connection = $db;
        }

        //Get Przelewy

        public function read(){

            $query = 'SELECT * FROM przelewy';

            $stmt = $this ->connection->prepare($query);

            $stmt->execute();

            return $stmt;
        }
        
        public function readZrealizowane(){

            $query = "SELECT * FROM przelewy WHERE status='1' OR status='3' ORDER BY numer_zlecajacego ASC";

            $stmt = $this ->connection->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function readWeryfikacja(){

            $query = "SELECT * FROM przelewy WHERE status='0'";

            $stmt = $this ->connection->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function readPoNumerzeZrealizowanych($numer_zlecajacego){

            $query = "SELECT * FROM przelewy WHERE numer_zlecajacego = '$numer_zlecajacego' AND status ='1'";

            $stmt = $this ->connection->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function changeStatusPrzelewu($id_przelewu, $id_bankowe, $status){
            
            $stmtChangeStatus = "UPDATE przelewy SET status = '$status' WHERE id_przelewu = '$id_przelewu' AND id_bankowe = '$id_bankowe'";
            
            $stmt = $this->connection->prepare($stmtChangeStatus);
            
            $stmt->execute();
            
            return $stmt;
        }

        public function registerPrzelew($id_bankowe, $numer_zlecajacego, $numer_odbiorcy, $tytul, $nazwa, $kwota, $data){
            
            $przelewCheckQuery = "SELECT * FROM przelewy WHERE id_bankowe = '$id_bankowe' AND numer_zlecajacego = '$numer_zlecajacego'";
            
            $stmtPrzelew = $this->connection->prepare($przelewCheckQuery);
            
            $stmtPrzelew->execute();
            
            $przelewExists = $stmtPrzelew->rowCount();

            if($przelewExists > 0){
                return 0;
            }else{
                $addPrzelewQuery = "INSERT INTO przelewy (id_bankowe, numer_zlecajacego, numer_odbiorcy, tytul, nazwa, kwota, data, status) VALUES('$id_bankowe','$numer_zlecajacego','$numer_odbiorcy','$tytul','$nazwa','$kwota','$data','1')";
                
                $stmt = $this ->connection->prepare($addPrzelewQuery);

                $stmt->execute();

                return $stmt;
            }
        }

        public function registerPrzelewDoWeryfikacji($id_bankowe, $numer_zlecajacego, $numer_odbiorcy, $tytul, $nazwa, $kwota, $data){
            
            $przelewCheckQuery = "SELECT * FROM przelewy WHERE id_bankowe = '$id_bankowe' AND numer_zlecajacego = '$numer_zlecajacego'";
            
            $stmtPrzelew = $this->connection->prepare($przelewCheckQuery);
            
            $stmtPrzelew->execute();
            
            $przelewExists = $stmtPrzelew->rowCount();

            if($przelewExists > 0){
                return 0;
            }else{
                $addPrzelewQuery = "INSERT INTO przelewy (id_bankowe, numer_zlecajacego, numer_odbiorcy, tytul, nazwa, kwota, data, status) VALUES('$id_bankowe','$numer_zlecajacego','$numer_odbiorcy','$tytul','$nazwa','$kwota','$data','0')";
                
                $stmt = $this ->connection->prepare($addPrzelewQuery);

                $stmt->execute();

                return $stmt;
            }
        }


    }
?>