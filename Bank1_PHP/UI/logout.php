<?php
	session_start();
	
	session_unset(); //usunięcie sesji
	
	header('Location:index.php');
?>