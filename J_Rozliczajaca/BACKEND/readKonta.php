<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once 'config/Database.php';
    include_once 'objects/Konta.php';

    $database = new Database();
    $db = $database->getConnection();

    $konto = new Konta($db);

    $stmtKonto = $konto->readKonta(); // wyswietlamy wszystko

    $num = $stmtKonto->rowCount();

    // sprawdzanie czy znaleziono wiecej niz 0 rekordow
    if ($num > 0) {

        $kontaArray= array();
        $kontaArray["Konta"] = array();

        while ($row = $stmtKonto->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $kontaItem = array(
                "numer_konta" => $numer_konta
            );

            array_push($kontaArray["Konta"], $kontaItem);
        }

        // ustawienie kodu odpowiedzi na - 200 OK
        http_response_code(200);

        // pokazanie towarow w formacie JSON
        echo json_encode($kontaArray);
    } else {

        // ustawienie kodu odpowiedzi na - 404 Not found
        http_response_code(404);

        // wyswietlenie wiadomosci ze nie znaleziono towarow
        echo json_encode(array(
            "Błąd" => "Nie znaleziono kont."
        ));
    }
?>
