<?php
session_start();
 include_once '../Backend/register.php';
 $register = new Register();
 $error = false;
 //numer banku
 $bankNumber = 12345678;
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
              <?php
    					if(isset($_SESSION['bladLogin'])){
                $error = true;
    						echo $_SESSION['bladLogin'];
    						unset($_SESSION['bladLogin']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Hasło</div>
							<div class="inputyy"><input type="password" name="haslo" required></div>
              <?php
    					if(isset($_SESSION['bladHaslo'])){
                $error = true;
    						echo $_SESSION['bladHaslo'];
    						unset($_SESSION['bladHaslo']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Powtórz hasło</div>
							<div class="inputyy"><input type="password" name="powtorzhaslo" required></div>
              <?php
    					if(isset($_SESSION['bladPowtorzHaslo'])){
                $error = true;
    						echo $_SESSION['bladPowtorzHaslo'];
    						unset($_SESSION['bladPowtorzHaslo']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
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
              <?php
    					if(isset($_SESSION['bladImie'])){
    						echo $_SESSION['bladImie'];
    						unset($_SESSION['bladImie']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Nazwisko</div>
							<div class="inputyy"><input type="text" name="nazwisko" required></div>
              <?php
    					if(isset($_SESSION['bladNazwisko'])){
    						echo $_SESSION['bladNazwisko'];
    						unset($_SESSION['bladNazwisko']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">PESEL</div>
							<div class="inputyy"><input type="text" name="pesel" required></div>
              <?php
    					if(isset($_SESSION['bladPesel'])){
    						echo $_SESSION['bladPesel'];
    						unset($_SESSION['bladPesel']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
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
              <?php
    					if(isset($_SESSION['bladTelefon'])){
    						echo $_SESSION['bladTelefon'];
    						unset($_SESSION['bladTelefon']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
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
              <?php
    					if(isset($_SESSION['bladMiejscowosc'])){
    						echo $_SESSION['bladMiejscowosc'];
    						unset($_SESSION['bladMiejscowosc']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Ulica</div>
							<div class="inputyy"><input type="text" name="ulica" required></div>
              <?php
    					if(isset($_SESSION['bladUlica'])){
    						echo $_SESSION['bladUlica'];
    						unset($_SESSION['bladUlica']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Numer domu/Numer mieszkania</div>
							<div class="inputyy"><input type="text" name="numer_domu" required></div>
              <?php
    					if(isset($_SESSION['bladNumer'])){
    						echo $_SESSION['bladNumer'];
    						unset($_SESSION['bladNumer']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Kod pocztowy</div>
							<div class="inputyy"><input type="text" name="kod" required></div>
              <?php
    					if(isset($_SESSION['bladKod'])){
    						echo $_SESSION['bladKod'];
    						unset($_SESSION['bladKod']); //aby bład się niewyświetlał po odświeżeniu strony
    					}
    					?>
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
          if(isset($_POST['zalozKonto']) && $register->checkInputs($_POST['imie'],$_POST['nazwisko'],$_POST['login'],$_POST['haslo'],$_POST['pesel'],$_POST['email'],$_POST['telefon'],$_POST['miejscowosc'],$_POST['ulica'],$_POST['numer_domu'],$_POST['kod'])==True){
            $register->registerUser($_POST['imie'],$_POST['nazwisko'],$_POST['login'],$_POST['haslo'],$_POST['pesel'],$_POST['email'],$_POST['telefon'],$_POST['miejscowosc'],$_POST['ulica'],$_POST['numer_domu'],$_POST['kod'],$bankNumber);
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
