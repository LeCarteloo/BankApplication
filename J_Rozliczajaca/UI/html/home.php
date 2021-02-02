<?php
    include_once '../../BACKEND/config/Database.php';
    include_once '../../BACKEND/objects/Bank.php';

    $database = new Database();
    $db = $database->getConnection();

    $bank = new Bank($db);
?>
<div class="container home-style">
    <div class="row">
        <div class="col-5">
            
        </div>
        <div class="col-2">
            <span class="my-page-title">Podsumowanie<span>
        </div>
        <div class="col-5">
            
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            
        </div>
        <div class="col-2" style="text-align:right;">
            Zalogowano jako: 
        </div>
        <div class="col-2">
            <?php echo $_SESSION["username"];?>
        </div>
        <div class="col-4">
            
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-4">
            
        </div>
        <div class="col-2" style="text-align:right;">
            Suma sald banku A: 
        </div>
        <div class="col-2">
            <?php
                $bank1_saldo_json = file_get_contents('http://localhost/Bank1_PHP/Backend/readSumBalance.php');
                $bank1_saldo_obj = json_decode($bank1_saldo_json);

                foreach($bank1_saldo_obj->Saldo as $key => $val){
                    echo $val->sumaSald;
                }
            ?>
        </div>
        <div class="col-4">
            
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            
        </div>
        <div class="col-2" style="text-align:right;">
            Suma sald banku B: 
        </div>
        <div class="col-2">
            <?php
            /*
                $bank1_saldo_json = file_get_contents('TUTAJ API DO SUMY SALD BANKU B');
                $bank1_saldo_obj = json_decode($bank1_saldo_json);
                
                foreach($bank1_saldo_obj->Saldo as $key => $val){
                    echo $val->sumaSald;
                }
            */
            ?>
        </div>
        <div class="col-4">
            
        </div>
    </div>
    
</div>
<?php

$bank->registerBank('test', '12345679', '0');

?>