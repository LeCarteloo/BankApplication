<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  include_once 'objects/user.php';
  include_once 'config/database.php';

  $database = new Database();
  $db = $database->getConnection();

  $user = new User($db);

  $stmtUser = $user->sumBalance();

  $num = $stmtUser->rowCount();

  // sprawdzanie czy znaleziono wiecej niz 0 rekordow
  if ($num > 0) {

      $userArray           = array();
      $userArray["Saldo"] = array();

      while ($row = $stmtUser->fetch(PDO::FETCH_ASSOC)) {

          extract($row);

          $userItem = array(
              "sumaSald" => $sumBalance
          );

          array_push($userArray["Saldo"], $userItem);
      }

      // ustawienie kodu odpowiedzi na - 200 OK
      http_response_code(200);

      // pokazanie towarow w formacie JSON
      echo json_encode($userArray);
  } else {

      // ustawienie kodu odpowiedzi na - 404 Not found
      http_response_code(404);

      // wyswietlenie wiadomosci ze nie znaleziono towarow
      echo json_encode(array(
          "Błąd" => "Nie znaleziono przelewow."
      ));
  }

?>
