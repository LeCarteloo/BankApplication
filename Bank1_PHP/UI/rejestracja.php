<?php
 session_start();
 include_once '../Backend/register.php';
 $register = new Register();
 //numer banku
 $bankNumber = 12345678;
 ?>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="rejestracja.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</head>
	<body>
	<div id="content">
    <form method="post">

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
							<div class="inputyy" for="login">
                <label for="login">
                <input type="text" id="login" name="login" minlength="6" required>
                <ul class ="input-requirements">
                  <li>Przynajmniej sześć znaków</li>
                  <li>Musi zawierać tylko litery oraz cyfry</li>
                </ul>
              </label>
              </div>
    					<!-- if(isset($_SESSION['bladLogin'])){
    						echo $_SESSION['bladLogin'];
    						unset($_SESSION['bladLogin']); //aby bład się niewyświetlał po odświeżeniu strony
    					} -->

						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Hasło</div>
							<div class="inputyy"><input type="password" name="haslo" minlength="6" required>
                <ul class ="input-requirements">
                  <li>Przynajmniej osiem znaków</li>
                  <li>Musi zawierać przynajmniej jedną cyfre</li>
                </ul>
              </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Powtórz hasło</div>
							<div class="inputyy"><input type="password" name="powtorzHaslo" required></div>
              <?php
    					if(isset($_SESSION['bladPowtorzHaslo'])){
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
						<input type="checkbox" name="check1">
						<span>Wyrażam zgodę na przetwarzanie przez Bank podanych przeze mnie danych kontaktowych</span>
						</label>
					</div>
					<div class="wybor">
						<label>
						<input type="checkbox" name="check2">
						<span>Jestem świadomy(-ma) odpowiedzialności karnej za złożenie fałszywego oświadczenia</span>
						</label>
					</div>
					<div class="wybor">
						<label>
						<input type="checkbox" name="check3">
						<span>Wyrażam zgodę na używanie przez Bank połączenia telefonicznego</span>
						</label>
					</div>
				</div>
			</div>
				<div id="przyciskrej">
					<div id="p1"><a href="index.php"><input type="button" value="Wróć"></a></div>
					<div id="p2"><a href=""><input type="submit" value="Załóż konto" name="zalozKonto" id="zalozKonto"></a></div>
				</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>

    <div class="center">
      <div class="content">
        <div class="header">
          <h2>Sukces</h2>
          <div class="close-icon"><label for="click" class="fas fa-times"></label></div>
        </div>
        <label for="click" class="fas fa-check-circle fa-4x"></label>
        <p class = "text">Udało Ci się pomyślnie zarejestrować!</p>
        <div class="line"></div>
        <label for="click" class="close-btn">Zamknij</label>
      </div>
    </div>


      <?php
      if(isset($_POST['zalozKonto'])){
        $_SESSION['modal'] = '<script>$(".content").toggleClass("show");
        $("#zalozKonto").addClass("disabled");</script>';
        echo $_SESSION['modal'];
        if($register->checkInputs($_POST['imie'],$_POST['nazwisko'],$_POST['login'],$_POST['haslo'],$_POST['powtorzHaslo'],$_POST['pesel'],$_POST['telefon'],$_POST['miejscowosc'],$_POST['ulica'],$_POST['numer_domu'],$_POST['kod'])==TRUE){
            if(isset($_POST['check1']) && isset($_POST['check2']) && isset($_POST['check3'])){
              $register->registerUser($_POST['imie'],$_POST['nazwisko'],$_POST['login'],$_POST['haslo'],$_POST['powtorzHaslo'],$_POST['pesel'],$_POST['email'],$_POST['telefon'],$_POST['miejscowosc'],$_POST['ulica'],$_POST['numer_domu'],$_POST['kod'],$bankNumber);
           }
        }
        else{
            echo("<meta http-equiv='refresh' content='1'>");
        }
      }
       ?>
      </form>
	</div>

  <script src="scipts.js"></script>
	</body>
</html>
