<?php
	session_start();

	// dodanie polaczenia z database.php i dodanie obiektu cargo.php
  include_once '../Backend/objects/transfer.php';
	include_once '../Backend/config/database.php';
  $database = new Database();
	$db = $database->getConnection();
	$transfer = new Transfer($db);

	//sprawdzanie czy istnieje zmienna sesyjna zalogowany
	if(!isset($_SESSION['zalogowany']))
	{
		//jeśli nie istnieje to cofam do strony z logowaniem
		header("Location: index.php");
		exit();
	}

 $stmtCash =	$transfer->updateCash($_SESSION['nr_konta']);

 while ($row = $stmtCash->fetch(PDO::FETCH_ASSOC)) {

		 $_SESSION['saldo']=$row['balance'];
 }

?>

<html lang="pl">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/przelew.css">
		<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<link rel="stylesheet" href="css/dark.css">

	</head>
	<body>
<?php
			if(isset($_SESSION['success']))
				{
					 echo '<script>Swal.fire({
  					title: "Sukces",
  					text: "Przelew wykonany pomyślnie!",
					icon: "success",
  					confirmButtonText: "Zamknij",
					});</script>';
					unset($_SESSION['success']);
				}
				if(isset($_SESSION['error']))
					{
						 echo '<script>Swal.fire({
	  					title: "Błąd",
	  					text: "Nie istnieje taki numer banku!",
						icon: "error",
	  					confirmButtonText: "Zamknij",
						});</script>';
						unset($_SESSION['error']);
					}
?>
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
					<li><a href="przelew.php">Przelewy</a></li>
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
					<form action="" method="POST" id="przelewForm" name="przelewForm" autocomplete="off">
						<div class="etap">
							Z konta
						</div>
						<div id="moje_konto">
							<input type="hidden" id="balance" value="<?php  echo $_SESSION['saldo'];?>">
							<input type="hidden" id="numBank" value="<?php  echo substr($_SESSION['nr_konta'],2);?>">
							<div id="mk_text">Visa konto (<?php  echo $_SESSION['saldo'];?> PLN) <br> <?php  echo substr($_SESSION['nr_konta'],2);?></div>
						</div>
						<div class="etap">
							Dane odbiorcy przelewu
						</div>
						<div id="docelowe_konto">
							<div id="odstep"></div>
							<div class="wejscie">
								<div class="textt">Nazwa odbiorcy</div>
								<div class="inputyy">
									<input type="text" name="nazwa" class="wersja1" placeholder="Nazwa odbiorcy" required>
									</div>
							</div>
							<div class="wejscie">
								<div class="textt">Numer konta</div>
								<div class="inputyy">
									<label for="number">
									<input type="text" name="numer" class="wersja1" id="numer" placeholder="Numer konta" required>
									<ul class ="input-requirements">
	                  <li>Musi zawierać tylko cyfry</li>
	                  <li>Musi zawierać dwadzieścia sześć cyfr</li>
										<li>Musisz podać numer różny od swojego</li>
	                </ul>
									</label>
								</div>
							</div>
						</div>
						<div class="etap">
							Szczegóły
						</div>
						<div id="informacje">
							<div id="odstep"></div>
							<div class="wejscie2">
								<div class="textt">Tytuł przelewu</div>
								<div class="inputyy">
									<input type="text" name="tytul" class="wersja1" placeholder="Tytuł przelewu" required>
								</div>
							</div>
							<div class="wejscie2">
								<div class="textt">Kwota</div>
								<div class="inputyy">
									<label for="amount">
									<input type="text" name="kwota" class="wersja2" id="kwota" placeholder="Kwota" required>
									<ul class ="input-requirements">
	                  <li>Musi zawierać tylko cyfry</li>
	                  <li>Musisz mieć taką kwote na koncie</li>
										<li>Musisz podać więcej niż zero</li>
	                </ul>
									</label>
								</div>
								<div id="PLN"> PLN</div>
							</div>
							<div class="wejscie2">
								<div class="textt">Data wykonania</div>
								<div class="inputyy">
									<input type="date" name="data" id="datap" class="wersja3" disabled><div id="datad" onClick="datad()">+</div>
								</div>
							</div>
						</div>
						<div class="etap"></div>
						<div id="przyciski">
							<div id="p1"><input type="reset" value="Wyczyść"></div>
							<div id="p2"><input type="submit" value="Wykonaj przelew" name="wykonajPrzelew" id="wykonajPrzelew"></div>
						</div>
						<?php
						if(isset($_POST['wykonajPrzelew'])){
							$isValid = FALSE;
							$json = @file_get_contents($database->linkCheckNumber);
							 if(@$json){
								 $arr = json_decode($json);
								foreach($arr->Konta as $key => $value){
									if($_POST['numer']==substr($value->numer_konta,2))
										$isValid = TRUE;
								}
								if($isValid == TRUE){
								$_SESSION['success'] = 1;
							  if(substr($_POST['numer'],2,-16)==$database->bankNumberA)
									$_SESSION['saldo'] = $transfer->bankTransfer($_SESSION['nr_konta'],$_POST['numer'],$_POST['tytul'],$_POST['kwota'],$_SESSION['saldo'],$_POST['nazwa'],"Wewnetrzny");
							  else
							 		$_SESSION['saldo'] = $transfer->bankTransfer($_SESSION['nr_konta'],$_POST['numer'],$_POST['tytul'],$_POST['kwota'],$_SESSION['saldo'],$_POST['nazwa'],"Zewnetrzny");
								}
								else {
									$_SESSION['error'] = 1;
								}
								}
								header("Refresh:0");
							}
						 ?>
					</form>
				</div>
			</div>
			<div id="stopka">
				STOPKA COPYRAJT @ MOJE
			</div>
	</div>

	<script src="scripts/transferScript.js"></script>
	<script>
		document.getElementById('datap').valueAsDate = new Date();
		function datad(){
			document.getElementById('datap').valueAsDate = new Date();

		}
	</script>
	</body>
</html>
