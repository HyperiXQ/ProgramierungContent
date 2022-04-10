<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>MySQL 3</title>
</head>
<body>


<?php
		if(isset($_POST["nazwa"])){
        $nazwa = $_POST["nazwa"];}
		
		echo("<h3>Ćwiczenie 2 - zakładanie bazy MySQL</h3>");
		
		$url = "localhost";
		$identyfikator = "root";
		$haslo = "";
		$idp = mysqli_connect($url, $identyfikator, $haslo);
		
		if (mysqli_connect($url, $identyfikator, $haslo) == true) {
			echo("Udało się połączyć z serwerem");
		}
		else {
			echo("Nie udało się połączyć z serwerem");
		}
		if(isset($_POST["nazwa"])){
        $zapytanie = "CREATE DATABASE $nazwa";
    }
		
    if(isset($_POST["nazwa"])){
		if (mysqli_query($idp, $zapytanie) == true) {
			echo("<Udało się założyć bazę o nazwie: $nazwa<br>");
		}
		else {
			echo("Nie udało się założyć bazy o nazwie: $nazwa<br>");
		}}
		?>
</body>
</html>
