<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  include_once 'config/database.php';
  include_once 'objects/transfer.php';

  // uzyskanie polaczenie z baza danych
  $database = new Database();
  $db       = $database->getConnection();

  // zainicjalizowanie obiektu transfer
  $transfer = new Transfer($db);

  $data = json_decode(file_get_contents("php://input"));

  // sprawdzanie czy dane nie sa puste
  foreach($data->Dodaj as $key => $value) {

    if (!empty($value->numerKonta)&&
    !empty($value->kwota)) {

    // ustawienie wartosci towaru
    $transfer->numerKonta           = $value->numerKonta;
    $transfer->kwota           = $value->kwota;

    // dodaj cash
    if ($transfer->addCash()) {

        // ustawienie kodu odpowiedzi na - 201 created
        http_response_code(201);


        echo json_encode(array(
            "Sukces" => "Przelew został utworzony."
        ));
    }

    // jezeli nie udalo sie stworzyc
    else {

        // ustawienie kodu odpowiedzi n - 503 service unavailable
        http_response_code(503);


        echo json_encode(array(
            "Błąd" => "Nie udało się stworzyć przelewu."
        ));
    }


}
// jezeli dane sa puste
else {

    // ustawienie kodu odpowiedzi na - 400 bad request
    http_response_code(400);

    // wyswietlenie wiadomosci ze dane sa nie kompletne
    echo json_encode(array(
        "Błąd" => "Nie udalo sie stworzyc przelewu, dane sa nie kompletne."
    ));
  }
}

 ?>
