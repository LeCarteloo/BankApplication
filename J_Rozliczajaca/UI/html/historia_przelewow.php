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
            <h1>Historia Przelewów</h1>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $przelewy->readZrealizowane();
                        $num = $result->rowCount();
                        if($num > 0){
                            $przelewy_arr = array();
                            $przelewy_arr['data'] = array();
                            $licznik = 0;
                            $licznik_a = 0;
                            $licznik_b = 0;
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                                $licznik++;
                                $numer_banku = substr($numer_zlecajacego,4, -16);
                                if($numer_banku == '12345678'){
                                    $licznik_a++;
                                    if($licznik_a == 1){
                                        ?>
                                        <tr>
                                            <td colspan="8">BANK A</td>
                                        </tr>
                                        <?php
                                    }
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
                                                if($status == 1){
                                                    echo "Zrealizowany"; 
                                                }else{
                                                    echo "Niezrealizowany"; 
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                }else{
                                    $licznik_b++;
                                    if($licznik_b == 1){
                                        ?>
                                        <tr>
                                            <td colspan="8">BANK B</td>
                                        </tr>
                                        <?php
                                    }
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
                                                if($status == 1){
                                                    echo "Zrealizowany"; 
                                                }else{
                                                    echo "Niezrealizowany"; 
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>