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
					<li><a href="link">Strona główna</a></li>
					<li><a href="link">Przelew wewnętrzny</a></li>
					<li><a href="link">Przelew zewnętrzny</a></li>
					<li><a href="link">Historia</a></li>
				</ul>
			</div>
			<div id="tresc">
				
			</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>
	</div>
	</body>
</html>