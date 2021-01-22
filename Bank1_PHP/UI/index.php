<?php
	session_start();

	//sprawdzam czy istnieje zmienna sesyjna zalgowany i czy zwrócono poprawny wynik z bazy
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: zalogowany.php');   //header wykonuje wszystko co jest w tym pliku
		exit();
	}
?>

<html lang="pl">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
	<div id="content">
	<div id="odstpet"></div>
			<a href="index.php"><div id="logo">
				<div id="logo_text">
					BardzoDobry
				</div>
				<div id="logo_text2">
					Bank
				</div>
			</div></a>
			<div id="logowanie">
				<div id="tekst_login">
					Logowanie do banku
				</div>
				<form action="../Backend/logowanie.php" method="post">
				<div id="dane_login">
					<div id="llogin">
						<div id="logintext">Login</div>
						<input type="text" class="dane" name="login">
					</div>
					<div id="haslo">
						<div id="haslotext">Hasło</div>
						<input type="password" class="dane" name="haslo">
					</div>
					<?php
					if(isset($_SESSION['blad'])){
						echo $_SESSION['blad'];
						unset($_SESSION['blad']); //aby bład się niewyświetlał po odświeżeniu strony
					}
					?>
				</div>
				<div id="przycisk">
					<input type="submit" value="Zaloguj">
				</div>
				</form>
			</div>
						<div id="przyciskrej">
					<a href="rejestracja.php"><input type="button" value="Załóż darmowe konto"></a>
				</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>
	</div>
	</body>
</html>
