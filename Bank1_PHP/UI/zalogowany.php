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
		<link rel="stylesheet" href="zalogowany.css">
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
				<div id="odstepgora"></div>
				<div id="tekstkonto">Konto osobiste</div>
				<div id="infokonto">
					<div id="sekcja1">
						<div id="nazwakonta">
							Visa Konto
						</div>
						<div id="numerkonta">
							<?php  echo $_SESSION['nr_konta'];?>
						</div>
					</div>
					
					<div id="sekcja2">
						<div class="srodki">
							Saldo bieżące
						</div>
						<div class="srodkiPLN">
							<?php  echo $_SESSION['saldo'];?> <span class="PLN">PLN</span>
						</div>
					</div>
					<div id="sekcja3">
						<div class="srodki">
							Dostępne środki
						</div>
						<div class="srodkiPLN">
							0,00 <span class="PLN">PLN</span>
						</div>
					</div>
					<div id="sekcja4">
						<div class="srodki">
							Zablokowane środki
						</div>
						<div class="srodkiPLN">
							0,00 <span class="PLN">PLN</span>
						</div>
					</div>
				</div>
			</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>
	</div>
	</body>
</html>