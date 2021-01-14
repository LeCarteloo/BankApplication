<?php
 include_once '../Backend/register.php';
 $register = new Register($test=0,$test=0,$test=0,$test=0,$test=0);
 $error = false;
 ?>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="rejestracja.css">
	</head>
	<body>
	<div id="content">
    <form action="rejestracja.php" method="post">

	<div id="odstpet"></div>
			<a href="index.php"><div id="logo">
				<div id="logo_text">
					BardzoDobry
				</div>
				<div id="logo_text2">
					Bank
				</div>
			</div></a>
			<div id="kreska"></div>
			<div class="boxetap">
				<div class="boxlewa">
					<i class="far fa-id-card"></i><div class="textboxa">Dane logowania</div>
				</div>
				<div class="boxprawa">
					<div id="odstepbox3"></div>
					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Login</div>
							<div class="inputyy"><input type="text" name="login" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Hasło</div>
							<div class="inputyy"><input type="password" name="haslo" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Powtórz hasło</div>
							<div class="inputyy"><input type="password" name="powtorzhaslo" required></div>
						</div>
					</div>
				</div>
			</div>
			<div class="boxetap">
				<div class="boxlewa">
					<i class="far fa-id-card"></i><div class="textboxa">Dane osobowe</div>
				</div>
				<div class="boxprawa">
					<div id="odstepbox"></div>
					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Imię</div>
							<div class="inputyy"><input type="text" name="imie" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Nazwisko</div>
							<div class="inputyy"><input type="text" name="nazwisko" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">PESEL</div>
							<div class="inputyy"><input type="text" name="pesel" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Adres e-mail</div>
							<div class="inputyy"><input type="email" name="email" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Telefon komórkowy</div>
							<div class="inputyy"><input type="text" name="telefon" required></div>
						</div>
					</div>
				</div>
			</div>
			<div class="boxetap">
				<div class="boxlewa">
					<i class="fas fa-city"></i><div class="textboxa">Adres zamieszkania</div>
				</div>
				<div class="boxprawa">
					<div id="odstepbox2"></div>
					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Miejscowość</div>
							<div class="inputyy"><input type="text" name="miejscowosc" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Ulica</div>
							<div class="inputyy"><input type="text" name="ulica" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Numer domu/Numer mieszkania</div>
							<div class="inputyy"><input type="text" name="numer_domu" required></div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Kod pocztowy</div>
							<div class="inputyy"><input type="text" name="kod" required></div>
						</div>
					</div>

				</div>
			</div>
			<div class="boxetap">
				<div class="boxlewa">
					<i class="fas fa-file-alt"></i><div class="textboxa">Oświadczenia</div>
				</div>
				<div class="boxprawa">
					<div id="odstepbox2"></div>
					<div class="wybor">
						<label>
						<input type="checkbox" name="">
						<span>Wyrażam zgodę na przetwarzanie przez Bank podanych przeze mnie danych kontaktowych</span>
						</label>
					</div>
					<div class="wybor">
						<label>
						<input type="checkbox" name="">
						<span>Jestem świadomy(-ma) odpowiedzialności karnej za złożenie fałszywego oświadczenia</span>
						</label>
					</div>
					<div class="wybor">
						<label>
						<input type="checkbox" name="">
						<span>Wyrażam zgodę na używanie przez Bank połączenia telefonicznego</span>
						</label>
					</div>
				</div>
			</div>
				<div id="przyciskrej">
					<div id="p1"><a href="index.php"><input type="button" value="Wróć"></a></div>
					<div id="p2"><a href=""><input type="submit" value="Załóż konto" name="zalozKonto"></a></div>
          <?php
          $bankNumber = 12345678;
          if(isset($_POST['zalozKonto'])){
            $register->register($_POST['imie'],$_POST['imie'],$_POST['imie'],$_POST['imie'],$bankNumber);
          }
           ?>
				</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>
      </form>
	</div>

<script>

</script>

	</body>
</html>
