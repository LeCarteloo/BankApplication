<!DOCTYPE HTML>
<html lang="pl">
<head>
 	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<!----------------------WLASNY_CSS--------------------->
    <link rel="stylesheet" href="../css/style.css">

	<title>Jednosta Rozliczająca</title>
</head>

<body>
	<?php 
		session_start();

		if(isset($_SESSION["zalogowany"])==true){
			if($_SESSION["zalogowany"]==true){
				$current_page = 'main';
			}
		}else{
			$current_page = isset($_GET['page']) ? $_GET['page'] : null;
		}

		switch ($current_page) 
			{
				case 'login':
					default:
                	include 'login.php';
                	break;

				case 'logowanie':
					include 'logowanie.php';
					break;
					
				case 'main':
					include 'main.php';
					break;
        	}

	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>