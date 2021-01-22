<?php
 session_start();
 include_once '../Backend/config/database.php';
 include_once '../Backend/objects/register.php';

 $database = new Database();
 $db = $database->getConnection();

 $register = new Register($db);

 //numer banku
 $bankNumber = 12345678;
 ?>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/rejestracja.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</head>
	<body>
	<div id="content">
    <form method="post" class="rejestracja" autocomplete="off">

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
                <input type="text" id="login" name="login" minlength="6" placeholder="Login" required>
                <ul class ="input-requirements">
                  <li>Przynajmniej sześć znaków</li>
                  <li>Musi zawierać tylko litery oraz cyfry</li>
                </ul>
                <br>
              </label>
              </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Hasło</div>
							<div class="inputyy">
                <label for="password">
                <input type="password" id="haslo" name="haslo" minlength="8" placeholder="Hasło" required>
                <ul class ="input-requirements">
                  <li>Przynajmniej osiem znaków</li>
                  <li>Musi zawierać symbol specjalny</li>
                </ul>
                </label>
              </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Powtórz hasło</div>
							<div class="inputyy">
                <label for="password_repeat">
                <input type="password" id="powtorzHaslo" name="powtorzHaslo" placeholder="Powtórz hasło" required>
                <ul class ="input-requirements">
                  <li>Hasła muszą być takie same</li>
                </ul>
              </label>
              </div>
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
							<div class="inputyy">
                <label for="name">
                <input type="text" name="imie" id="imie" placeholder="Imie" required>
                <ul class ="input-requirements">
                  <li>Musi zawierać tylko litery</li>
                </ul>
              </label>
              </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Nazwisko</div>
							<div class="inputyy">
                <label for="surname">
                <input type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko" required>
                <ul class ="input-requirements">
                  <li>Musi zawierać tylko litery</li>
                </ul>
                </label>
                </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">PESEL</div>
							<div class="inputyy">
              <label for="pesel">
              <input type="text" name="pesel" id="pesel" placeholder="PESEL" required>
              <ul class ="input-requirements">
                <li>Musi zawierać tylko cyfry</li>
                <li>Musi zawierać jedenaście cyfr</li>
              </ul>
              </label>
              </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Adres e-mail</div>
							<div class="inputyy">
                <label for="email">
                <input type="email" name="email" id="email" placeholder="E-mail" required>
                <ul class ="input-requirements">
                  <li>Musi mieć prawidłowy format e-mailu</li>
                </ul>
                </label>
                </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Telefon komórkowy</div>
							<div class="inputyy">
                <label for="telephone">
                <input type="text" name="telefon" minlength="9" maxlength="9" id="telefon" placeholder="Telefon" required>
                <ul class ="input-requirements">
                <li>Musi zawierać tylko cyfry</li>
                <li>Musi zawierać dziewięć cyfr</li>
              </ul>
              </label>
              </div>
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
							<div class="inputyy">
                <label for="city">
                <input type="text" name="miejscowosc" id="miejscowosc" placeholder="Miejscowość" required>
              <ul class ="input-requirements">
              <li>Musi zawierać tylko litery</li>
            </ul>
            </label>
            </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Ulica</div>
							<div class="inputyy">
                <label for="street">
                <input type="text" name="ulica" id="ulica" placeholder="Ulica" required>
                <ul class ="input-requirements">
                <li>Musi zawierać tylko litery</li>
              </ul>
              </label>
              </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Numer domu</div>
							<div class="inputyy">
                <label for="number">
                <input type="text" name="numer_domu" id="numer_domu" placeholder="Numer domu" required>
              <ul class ="input-requirements">
              <li>Musi zawierać tylko cyfry</li>
            </ul>
            </label>
            </div>
						</div>
					</div>

					<div id="wejscierowne">
						<div class="wejscie">
							<div class="textt">Kod pocztowy</div>
							<div class="inputyy">
                <label for="code">
                <input type="text" name="kod" id="kod" placeholder="Kod pocztowy" required>
              <ul class ="input-requirements">
              <li>Musi mieć format 00-000</li>
            </ul>
            </label>
            </div>
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
        if(isset($_POST['check1']) && isset($_POST['check2']) && isset($_POST['check3'])){
          $register->registerUser($_POST['imie'],$_POST['nazwisko'],$_POST['login'],$_POST['haslo'],$_POST['powtorzHaslo'],$_POST['pesel'],$_POST['email'],$_POST['telefon'],$_POST['miejscowosc'],$_POST['ulica'],$_POST['numer_domu'],$_POST['kod'],$bankNumber);
        }
      }
       ?>
      </form>
	</div>

  <script src="scripts/registerScript.js"></script>
  <script>
  $("#zalozKonto").click(function(){
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
