<?php

	session_start();

	//sprawdzam czy uzytkonik podał hasło i login
	if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location:../UI/index.php'); //jeśli nie to cofam do logowania
		exit();
	}

	$conn = @new mysqli('localhost','root','','bank1');   //@new  PHP w przypadku błędów nie będzie wywalać błędów na ekran

	if($conn->connect_errno)  //errno - kod błędu
	{
		echo "Błąd połączenia";
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		//zapytanie do bazy
		$sql = "SELECT * FROM user WHERE login='$login' AND password=PASSWORD('$haslo')";
		$result = $conn->query($sql);

		if($result->num_rows > 0) {
			$wiersz = $result->fetch_assoc();
		  //jesli takie konto istnieje
		  //----------------------------------Miejsce na zmienne sesyjne które przydadzą się w całej stronie-------------
		  //np. wyświetlanie imienia i nazwiska na każej stronie
		  //przyklad stworzenia zmiennej sesyjnej
		  //$_SESSION['nazwa_zmiennej'] = $wiersz['nazwa_kolumny_z_bazy'];
		  $_SESSION['imie'] = $wiersz['name'];
		  $_SESSION['nazwisko'] = $wiersz['surname'];
	      $_SESSION['nr_konta'] = $wiersz['bankNumber'];
		  $_SESSION['saldo'] = $wiersz['balance'];

		  //---------------------------------------------------------------------------------------------

		   $_SESSION['zalogowany'] = true; //ustawiam, że podane dane sa poprawne
		   header("Location: ../UI/zalogowany.php");
		}
		else
		{
		  //jesli takie konto nieistnieje to tworze zmienną sesyjną błąd i wracam do logowania
		$_SESSION['blad'] = '<span style="color:red; float:left; width:100%; height:10px; text-align:center;">Nieprawidłowy login lub haslo!</span>';
		header("Location: ../UI/index.php");

		}
		$conn->close();
	}
?>
