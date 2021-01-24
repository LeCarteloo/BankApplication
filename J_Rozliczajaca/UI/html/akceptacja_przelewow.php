<?php
    include_once '../../BACKEND/config/Database.php';
    include_once '../../BACKEND/objects/Przelewy.php';

    $database = new Database();
    $db = $database->getConnection();

    $przelewy = new Przelewy($db);
?>

<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="page_card" style="text-align:center; width:auto;">
            <h1>Akceptacja Przelewów</h1>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Z konta</th>
                        <th scope="col">Na konto</th>
                        <th scope="col">Tytuł</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Kwota</th>
                        <th scope="col">Data</th>
                        <th scope="col">Status</th>
                        <th scope="col">Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $przelewy->readWeryfikacja();
                        $num = $result->rowCount();
                        if($num > 0){
                            $przelewy_arr = array();
                            $przelewy_arr['data'] = array();
                            $licznik = 0;
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                                $licznik++;
                                ?>
                                    <tr>
                                        <td><?php echo $licznik; ?></td>
                                        <td><?php echo $numer_zlecajacego; ?></td>
                                        <td><?php echo $numer_odbiorcy; ?></td>
                                        <td><?php echo $tytul; ?></td>
                                        <td><?php echo $nazwa; ?></td>
                                        <td><?php echo $kwota; ?></td>
                                        <td><?php echo $data; ?></td>
                                        <td>
                                            <?php 
                                            if($status == 0){
                                                echo "Do weryfikacji"; 
                                            }else{
                                                echo "Błędny status"; 
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <form action="index.php?page=akceptacja_przelewow" method="post" class="form-inline">	
                                                <input type="hidden" name="id_bankowe" value="<?php echo $id_bankowe;?>"/>
                                                <input type="hidden" name="id_przelewu" value="<?php echo $id_przelewu;?>"/>
                                                <input type="hidden" name="nr_banku" value="<?php echo $numer_zlecajacego;?>"/>
                                                <button class="btn btn-outline-success my-2 my-sm-0" name="akceptuj_przelew" type="submit">Akceptuj</button>
                                                <button class="btn btn-outline-danger my-2 my-sm-0" name="odrzuc_przelew" type="submit">Odrzuć</button>
                                            </form>	
                                        </td>
                                    </tr>
                                <?php
                            }
                        }else{
                            ?> 
                                <td></td>
                                <td></td>
                                <td colspan="5">Brak przelewów do zaakceptowania</td>
                                <td></td>
                                <td></td>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['akceptuj_przelew'])) {
        $id_przelewu = $_POST['id_przelewu'];
        $id_bankowe = $_POST['id_bankowe'];
        $status = '1';
        $numer_banku = substr($_POST['nr_banku'],4, -16);
        if($numer_banku == '12345678'){ 
            //==================================================
            //TUTAJ PODAC API DO ZMIANY STATUSU BANKU PIERWSZEGO
            //==================================================
            $przelewy->changeStatusPrzelewu($id_przelewu, $id_bankowe, $status);
            echo "Ustaw status 1, dla id przelewu " . $id_przelewu . ",id bankowe " . $id_bankowe . ", w banku o numerze " . $numer_banku;
        }else if($numer_banku == '02042137'){
            //================================================
            //TUTAJ PODAC API DO ZMIANY STATUSU BANKU DRUGIEGO
            //================================================
            $przelewy->changeStatusPrzelewu($id_przelewu, $id_bankowe, $status);
            echo "Ustaw status 1, dla id przelewu " . $id_przelewu . ",id bankowe " . $id_bankowe . ", w banku o numerze " . $numer_banku;
        }else{
            echo "BRAK BANKU W BAZIE BANKÓW";
        }
        
    } else if(isset($_POST['odrzuc_przelew'])){
        $id_przelewu = $_POST['id_przelewu'];
        $id_bankowe = $_POST['id_bankowe'];
        $status = '3';
        $numer_banku = substr($_POST['nr_banku'],4, -16);
        if($numer_banku == '12345678'){ 
            //==================================================
            //TUTAJ PODAC API DO ZMIANY STATUSU BANKU PIERWSZEGO
            //==================================================
            $przelewy->changeStatusPrzelewu($id_przelewu, $id_bankowe, $status);
            echo "Ustaw status 1, dla id przelewu " . $id_przelewu . ",id bankowe " . $id_bankowe . ", w banku o numerze " . $numer_banku;
        }else if($numer_banku == '02042137'){
            //================================================
            //TUTAJ PODAC API DO ZMIANY STATUSU BANKU DRUGIEGO
            //================================================
            $przelewy->changeStatusPrzelewu($id_przelewu, $id_bankowe, $status);
            echo "Ustaw status 1, dla id przelewu " . $id_przelewu . ",id bankowe " . $id_bankowe . ", w banku o numerze " . $numer_banku;
        }else{
            echo "BRAK BANKU W BAZIE BANKÓW";
        }
    }
?>