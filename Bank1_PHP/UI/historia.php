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
		<link rel="stylesheet" href="historia.css">
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
				<div id="trescc">
					<div id="odstepg"></div>
					
					
					<div id="inforekord">
						<div id="datar">Data przelewu</div>
						<div id="tytulr">Tytuł przelewu</div>
						<div id="nazwar">Odbiorca</div>
						<div id="nrr">Numer konta</div>
						<div id="kwotar">Kwota</div>
					</div>
					
					<div class="rekord">
						<div id="datarr">12.12.2020</div>
						<div id="tytulrr">Fajny przelew dla ciebie</div>
						<div id="nazwarr">Jan Kowalski</div>
						<div id="nrrr">12 1234 1234 1234 1234</div>
						<div id="kwotarr">-1000,00 zł</div>
					</div>
					
					<div class="rekord">
						<div id="datarr">14.01.2021</div>
						<div id="tytulrr">Za fanty</div>
						<div id="nazwarr">Kamil Komornik</div>
						<div id="nrrr">51 6574 2354 1234 5567</div>
						<div id="kwotarrd">+1500,00 zł</div>
					</div>
					
					
				<div class="odstep"></div>
				</div>
			</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>
	</div>
	</body>
</html>