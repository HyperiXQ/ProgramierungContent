<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
    <title>MySQL 4</title>
</head>
<body>
<form method="POST" action="cw4.php">
	<center>
	<TABLE WIDTH="600" BORDER="0"><COL ALIGN="right"></COLL>
<tr>
 <td><p><b>Podaj nazwę bazy danych, z którą chcesz się połączyć&nbsp;&nbsp;&nbsp;</b><BR><BR></p></td>
 <td><input type="text" name="baza_danych" size="20"><BR><BR></td>
</tr>
<tr>
 <td><p><b>Podaj nazwę tabeli, do której chcesz dopisać rekordy&nbsp;&nbsp;&nbsp;<BR><BR></b></p></td>
 <td><input type="text" name="tabela" size="20"><BR><BR></td>
</tr>
<tr>
 <td><p><b>Podaj imię&nbsp;&nbsp;&nbsp;<BR><BR></b></p></td>
 <td><input type="text" name="imie" size="20"><BR><BR></td>
</tr>
<tr>
 <td><p><b>Podaj nazwisko&nbsp;&nbsp;&nbsp;<BR><BR></b></p></td>
 <td><input type="text" name="nazwisko" size="20"><BR><BR></td>
</tr>
<tr>
 <td><p><b>Podaj e-mail&nbsp;&nbsp;&nbsp;<BR><BR></b></p></td>
 <td><input type="text" name="email" size="20"><BR><BR></td>
</tr>
</table>
        <BR><BR>
  <input type="hidden" name="sprawdz" value="ok">
  <input type="submit" value="Uzupełnij dane w tabeli" name="B1">
  </center>
  </form>
	<?php
	
echo("<H3>Ćwiczenie 4 - dopisywanie rekordów</H3><BR><BR>");
if(isset($_POST["sprawdz"]) && isset($_POST["baza_danych"]) && isset($_POST["tabela"]) && isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["email"])){
if($_POST["sprawdz"]=="ok"){
	$url='localhost';
	$identyfikator='root';
	$haslo='';
	$baza_danych = $_POST["baza_danych"];
	$tabela = $_POST["tabela"];
	$imie = $_POST["imie"];
	$nazwisko = $_POST["nazwisko"];
	$email = $_POST["email"];
	$idp = mysqli_connect($url,$identyfikator,$haslo, $baza_danych);
	if(mysqli_connect($url,$identyfikator,$haslo, $baza_danych)==true){
		echo("Udało się połączyć z serwerem.");
	}else{
		echo("Nie udało się połączyć z serwerem.");
		}
	mysqli_select_db($idp, $baza_danych);
	$zapytanie="INSERT INTO $tabela SET imie='$imie', nazwisko='$nazwisko', email='$email'";
	if(mysqli_query($idp, $zapytanie)==true){
	echo("<br><br>Udało się połączyć z bazą danych o nazwie: $baza_danych<BR><BR>
	Udało się dopisać dane do tabeli: $tabela
	");
	}else{
	echo("<br><br>Nie udało się połączyć z bazą danych o nazwie: $baza_danych<BR><BR>
	Nie udało się dopisać danych do tabeli o nazwie: $tabela");
	}
}}else{
	echo("");
};
echo("<br><br><center><a href=mysql4.php>Powtórzenie ćwiczenia</a></center>");
?>

</body></html>
