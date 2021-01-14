<?php
	session_start();
	
	
	//sprawdzanie czy istnieje zmienna sesyjna zalogowany
	if(!isset($_SESSION['zalogowany']))
	{
		//jeśli nie istnieje to cofam do strony z logowaniem
		header("Location: index.php");
		exit();
	}
?>


<html lang="pl">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="przelewZewnetrzny.css">
	</head>
	<body>
	<div id="content">
	<div id="odstpet"></div>
			<div id="baner">
				<a href="index.php"><div id="logo">
					<div id="logo_text">
						BardzoDobry
					</div>
					<div id="logo_text2">
						Bank
					</div>
				</div></a>
				<a href="logout.php"><div id="wyloguj"> <i class="fas fa-power-off"></i>Wyloguj </div></a>
			</div>
			<div id="menu">
				<ul>
					<li><a href="zalogowany.php">Strona główna</a></li>
					<li><a href="przelewZewnetrzny.php">Przelewy</a></li>
					<li><a href="historia.php">Historia</a></li>
					<li style="float:right;">
						<div class="daned"><?php  echo $_SESSION['imie'];?></div>
						<div class="daned"><?php  echo $_SESSION['nazwisko'];?></div>
					</li>
				</ul>
			</div>
			<div id="tresc">
				<div id="rodzaj">Przelew zewnętrzny</div>
				<div id="ttresc">
					<form action="">
						<div class="etap">
							Z konta
						</div>
						<div id="moje_konto">
							<div id="mk_text">Visa konto (100,00 PLN) <br> <?php  echo $_SESSION['nr_konta'];?></div>
						</div>
						<div class="etap">
							Dane odbiorcy przelewu
						</div>
						<div id="docelowe_konto">
							<div id="odstep"></div>
							<div class="wejscie">
								<div class="textt">Nazwa odbiorcy</div>
								<div class="inputyy"><input type="text" name="nazwa" class="wersja1" required></div>
							</div>
							<div class="wejscie">
								<div class="textt">Numer konta</div>
								<div class="inputyy"><input type="text" name="numer" class="wersja1" required></div>
							</div>
						</div>
						<div class="etap">
							Szczegóły
						</div>
						<div id="informacje">
							<div id="odstep"></div>
							<div class="wejscie2">
								<div class="textt">Tytuł przelewu</div>
								<div class="inputyy"><input type="text" name="tytul" class="wersja1" required></div>
							</div>
							<div class="wejscie2">
								<div class="textt">Kwota</div>
								<div class="inputyy"><input type="text" name="kwota" class="wersja2" required></div>
								<div id="PLN"> PLN</div>
							</div>
							<div class="wejscie2">
								<div class="textt">Data wykonania</div>
								<div class="inputyy"><input type="date" name="data" id="datap" class="wersja3" required></div>
							</div>
						</div>
						<div class="etap"></div>
						<div id="przyciski">
							<div id="p1"><input type="reset" value="Wyczyść"></div>
							<div id="p2"><input type="submit" value="Wykonaj przelew"></div>
						</div>
					</form>
				</div>
			</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>
	</div>
	
	<script>
		document.getElementById('datap').valueAsDate = new Date();
	</script>
	</body>
</html>