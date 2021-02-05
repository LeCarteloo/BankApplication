<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  include_once 'config/database.php';
  include_once 'objects/transfer.php';

  $database = new Database();
  $db = $database->getConnection();

  $transfer = new Transfer($db);

  $data = json_decode(file_get_contents("php://input"));



  $transfer->id = $data->id;
  $transfer->id_status = $data->id_status;

  if($transfer->update($transfer->id)){

    // ustawienie kodu odpowiedzi na - 200 OK
    http_response_code(200);

    // wyswietlenie wiadomosci ze udalo sie zaktualizowac statusu
    echo json_encode(array(
        "Sukces" => "Status został zaktualizowany."
    ));
  }
  else{
    // ustawienie kodu odpowiedzi na - 503 service unavailable
    http_response_code(503);

    // wyswietlenie wiadomosci ze nie udalo sie zaktualizowac statusu
    echo json_encode(array(
        "Błąd" => "Nie udalo sie zaktualizowac statusu."
    ));
  }

 ?>
