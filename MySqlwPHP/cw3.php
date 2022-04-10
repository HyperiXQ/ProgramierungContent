<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>MySQL 3</title>
</head>
<body>
    <h3>Ćwiczenie 3 - tworzenie tabeli w MySQLu<<BR><BR></h3>
    <form method="POST" action="cw3.php">
	<center>
	<TABLE WIDTH="600" BORDER="0">
	<tr ALIGN="CENTER">
	<td><p><b>Podaj nazwę bazy danych, z którą chcesz się połączyć:</b><BR><BR></p></td>
	</tr>
	<TR ALIGN="CENTER">
	<td><input type="text" name="baza_danych" size="15"><BR><BR>
	</td>
	</tr>
	<tr ALIGN="CENTER">
	<td><p><b>Podaj nazwę tabeli, którą chcesz utworzyć:<BR><BR>
(trzy pola: imię, nazwisko i e-mail)</b><BR><BR></p></td>
	</tr>
	<TR ALIGN="CENTER">
	<td><input type="text" name="tabela" size="15"><BR><BR></td>
	</tr>
	</table><BR><BR>
	<input type="hidden" name="sprawdz" value="ok">
	<input type="submit" value="Utwórz tabelę" name="B1">
	</center>
	</form>
    
	<?php
if(isset($_POST['tabela']) && isset($_POST['baza_danych']) && isset($_POST['sprawdz'])){
$tabela1=$_POST['tabela'];
$baza_danych1=$_POST['baza_danych'];
if($_POST['sprawdz']=="ok"){
	$url='localhost';
	$identyfikator='root';
	$haslo='';
	$idp = mysqli_connect($url,$identyfikator,$haslo, $baza_danych1);
	if(mysqli_connect($url,$identyfikator,$haslo, $baza_danych1)==true){
		echo("Udało się połączyć z serwerem.");
	}else{
		echo("Nie udało się połączyć z serwerem.");
		}
	mysqli_select_db($idp, $baza_danych1);
	
	$zapytanie = "CREATE TABLE $tabela1 ( 
id int(2) NOT NULL auto_increment, 
imie varchar(10) NOT NULL, 
nazwisko varchar(20) NOT NULL, 
email varchar(20) NOT NULL, 
PRIMARY KEY (id))";

	if(mysqli_query($idp, $zapytanie)==true){
echo("<br><br>Udało się utworzyć tabelę o nazwie: $tabela1");
} else {
echo("<br><br>Nie udało się utworzyć tabeli o nazwie: $tabela1");
}
}}else echo "";

echo("<br><br><center><a href= 2.php>Powtórzenie ćwiczenia</a></center></body></html>");
?>

</body>
</html>
