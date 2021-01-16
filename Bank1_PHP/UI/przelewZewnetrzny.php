<?php
	session_start();
  include_once '../Backend/transfer.php';

	$transfer = new Transfer("0");
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
		<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
				<div id="rodzaj">Przelewy</div>
				<div id="ttresc">
					<form action="" method="POST" id="przelewForm">
						<div class="etap">
							Z konta
						</div>
						<div id="moje_konto">
							<div id="mk_text">Visa konto (<?php  echo $_SESSION['saldo'];?> PLN) <br> <?php  echo $_SESSION['nr_konta'];?></div>
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
								<div class="inputyy"><input type="date" name="data" id="datap" class="wersja3" disabled></div>
							</div>
						</div>
						<div class="etap"></div>
						<div id="przyciski">
							<div id="p1"><input type="reset" value="Wyczyść"></div>
							<div id="p2"><input type="submit" value="Wykonaj przelew" name="wykonajPrzelew" id="wykonajPrzelew"></div>
						</div>
						<?php
						if(isset($_POST['wykonajPrzelew'])){
								$_SESSION['saldo'] = $transfer->bankTransfer($_SESSION['nr_konta'],$_POST['numer'],$_POST['tytul'],$_POST['kwota'],$_SESSION['saldo'],$_POST['nazwa']);}
						 ?>
					</form>
				</div>
			</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>
	</div>

	<div class="center">
		<div class="content">
			<div class="header">
				<h2>Sukces</h2>
				<div class="close-icon"><label for="click" class="fas fa-times"></label></div>
			</div>
			<label for="click" class="fas fa-check-circle fa-4x"></label>
			<p class = "text">Przelew wykonany pomyślnie!</p>
			<div class="line"></div>
			<label for="click" class="close-btn">Zamknij</label>
		</div>
	</div>


	<script>
		document.getElementById('datap').valueAsDate = new Date();

    $("#przelewForm").submit(function(){
			   $('.content').toggleClass("show");
			   $('#zalozKonto').addClass("disabled");
			$('.close-icon').click(function(){
				$('.content').toggleClass("show");
			});
			$('.close-btn').click(function(){
				$('.content').toggleClass("show");
			});
		});

	</script>
	</body>
</html>
