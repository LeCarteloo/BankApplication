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
            <h1>Przelewy</h1>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bankowe ID</th>
                        <th scope="col">Z konta</th>
                        <th scope="col">Na konto</th>
                        <th scope="col">Tytuł</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Kwota</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                                    
                    <?php
                        $json = file_get_contents("przelewy.json");
                        $json = json_decode($json);

                        $kwota_checkPowtorka = 0;
                        $data_checkPowtorka = '';
                        $numerZlecajacego_checkPowtorka = '';
                        $numerOdbiorcy_checkPowtorka = '';

                        $iterator_tabeli = 0;
                        foreach ($json->Przelewy as $key => $val) {
                            if($kwota_checkPowtorka == $val->kwota && $data_checkPowtorka == $val->data && $numerZlecajacego_checkPowtorka == $val->numerZlecajacego && $numerOdbiorcy_checkPowtorka == $val->numerOdbiorcy){
                                echo "Powtórka";
                                $przelewy->registerPrzelewDoWeryfikacji($val->id, $val->numerZlecajacego, $val->numerOdbiorcy, $val->tytul, $val->nazwa, $val->kwota, $val->data);
                                continue;
                            }else{
                                $kwota_checkPowtorka = $val->kwota;
                                $data_checkPowtorka = $val->data;
                                $numerZlecajacego_checkPowtorka = $val->numerZlecajacego;
                                $numerOdbiorcy_checkPowtorka = $val->numerOdbiorcy;
                            }
                            $result = $przelewy->readPoNumerzeZrealizowanych($val->numerZlecajacego);
                            $num = $result->rowCount();
                            if($num > 0){
                                if($val->kwota > 1000){
                                    if($num >= 5){

                                        $przelewy_arr = array();
                                        $przelewy_arr['data'] = array();
                                        $suma_przelewow = 0;
                                        $licznik = 0;
                                        $najwiekszy_przelew = 0;
                                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                            extract($row);
                                            if($kwota>$najwiekszy_przelew){
                                                $najwiekszy_przelew=$kwota;
                                            }
                                            $licznik++;
                                            $suma_przelewow = $suma_przelewow + $kwota;
                                        }
                                        $srednia = $suma_przelewow / $licznik;
                                        $kwota_graniczna = $srednia + $najwiekszy_przelew;
                                        if($kwota_graniczna < 1000){
                                            $kwota_graniczna = 1000;
                                        }
                                        echo "Suma: " . $suma_przelewow . "<br>";
                                        echo "Srednia: " . $srednia . "<br>";
                                        echo "Najwiekszy przelew: " . $najwiekszy_przelew . "<br>";
                                        echo "Kwota graniczna: " . $kwota_graniczna . "<br>";
                                        echo "Kwota: " . $val->kwota . "<br>";
                                        if($kwota_graniczna < $val->kwota){
                                            $przelewy->registerPrzelewDoWeryfikacji($val->id, $val->numerZlecajacego, $val->numerOdbiorcy, $val->tytul, $val->nazwa, $val->kwota, $val->data);
                                            echo "Wyląduje ze statusem 4 do weryfikacji ręcznej bo kwota przekracza algorytm<br>";
                                            continue;
                                        }else{
                                            $przelewy->registerPrzelew($val->id, $val->numerZlecajacego, $val->numerOdbiorcy, $val->tytul, $val->nazwa, $val->kwota, $val->data);
                                            echo "Przejdzie<br>";
                                            //==================================================
                                            //TUTAJ PODAC API DO ZMIANY STATUSU BANKU PIERWSZEGO
                                            //==================================================
                                        }
                                        
                                    }else{
                                        $przelewy->registerPrzelewDoWeryfikacji($val->id, $val->numerZlecajacego, $val->numerOdbiorcy, $val->tytul, $val->nazwa, $val->kwota, $val->data);
                                        echo "Wyląduje ze statusem 4 do weryfikacji ręcznej bo za mała historia<br>";
                                        continue;
                                    }
                                }else{
                                    $przelewy->registerPrzelew($val->id, $val->numerZlecajacego, $val->numerOdbiorcy, $val->tytul, $val->nazwa, $val->kwota, $val->data);
                                    echo "Przejdzie<br>";
                                    //==================================================
                                    //TUTAJ PODAC API DO ZMIANY STATUSU BANKU PIERWSZEGO
                                    //==================================================
                                }

                            }else{
                                if($val->kwota > 1000){
                                    $przelewy->registerPrzelewDoWeryfikacji($val->id, $val->numerZlecajacego, $val->numerOdbiorcy, $val->tytul, $val->nazwa, $val->kwota, $val->data);
                                    echo "Wyląduje ze statusem 4 do weryfikacji ręcznej bo brak historii<br>";
                                    continue;
                                }else{
                                    $przelewy->registerPrzelew($val->id, $val->numerZlecajacego, $val->numerOdbiorcy, $val->tytul, $val->nazwa, $val->kwota, $val->data);
                                    echo "Przejdzie<br>";
                                    //==================================================
                                    //TUTAJ PODAC API DO ZMIANY STATUSU BANKU PIERWSZEGO
                                    //==================================================
                                }
                            }
                            $iterator_tabeli++;
                                ?>
                                    <tr>
                                        <td><?php echo $iterator_tabeli; ?></td>
                                        <td><?php echo $val->id; ?></td>
                                        <td><?php echo $val->numerZlecajacego; ?></td>
                                        <td><?php echo $val->numerOdbiorcy; ?></td>
                                        <td><?php echo $val->tytul; ?></td>
                                        <td><?php echo $val->nazwa; ?></td>
                                        <td><?php echo $val->kwota; ?></td>
                                        <td><?php echo $val->data; ?></td>
                                    </tr>
                                <?php
                            
                        }
                    ?>
                                    
                </tbody>
            </table>
                            


            <form method="post" action="index.php?page=przelewy">
                <input type="submit" name="sesja" value="Odpal sesje">
            </form>
            <h3>
                <?php
                    if (isset($_POST['sesja'])) {
                        echo "Poszła sesja";


                    }
                ?>
            </h3>
        </div>
    </div>
</div>
