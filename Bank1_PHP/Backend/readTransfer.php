<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'config/database.php';
include_once 'objects/transfer.php';

// uzyskanie polaczenie z baza danych
$database = new Database();
$db       = $database->getConnection();

// zainicjalizowanie obiektu cargo
$transfer = new Transfer($db);

$stmtTransfer = $transfer->readTransfers(); // wyswietlamy wszystko

$num = $stmtTransfer->rowCount();

// sprawdzanie czy znaleziono wiecej niz 0 rekordow
if ($num > 0) {

    $transferArray           = array();
    $transferArray["Przelewy"] = array();

    while ($row = $stmtTransfer->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $transferItem = array(
            "id" => $id,
            "numerPrzychodzacy" => $numerPrzychodzacy,
            "numerWychodzacy" => $numerWychodzacy,
            "tytul" => $tytul,
            "nazwa" => $nazwa,
            "kwota" => $kwota,
            "data" => $data,
            "id_status" => $id_status
        );

        array_push($transferArray["Przelewy"], $transferItem);
    }

    // ustawienie kodu odpowiedzi na - 200 OK
    http_response_code(200);

    // pokazanie towarow w formacie JSON
    echo json_encode($transferArray);
} else {

    // ustawienie kodu odpowiedzi na - 404 Not found
    http_response_code(404);

    // wyswietlenie wiadomosci ze nie znaleziono towarow
    echo json_encode(array(
        "Błąd" => "Nie znaleziono przelewow."
    ));
}

?>
