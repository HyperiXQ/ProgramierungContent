<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
    <title>MySQL 5</title>
</head>
<body>
<H3>Ćwiczenie 5 - wyświetlanie zawartości bazy</H3><BR><BR>;
<form method="POST" action="cw5.php">
	<center>
	<TABLE WIDTH="600" BORDER="0">
	<COL ALIGN="right"></COLL>
	<tr>
	<td><p><b>Podaj nazwę bazy danych, z której chcesz wyświetlić dane&nbsp;&nbsp;&nbsp;</b><BR><BR></p></td>
	<td><input type="text" name="baza_danych" size="20"><BR><BR></td>
	</tr>
	<tr><td><p><b>Podaj nazwę tabeli źródłowej&nbsp;&nbsp;&nbsp;<BR><BR></b></p></td>
	<td><input type="text" name="tabela" size="20"><BR><BR></td>
	</tr>
	</table><BR><BR>
	<input type="hidden" name="sprawdz" value="ok">
	<input type="submit" value="Wyświetl" name="B1">
	</center>
	</form>
	<?php

if(isset($_POST["sprawdz"]) && isset($_POST["baza_danych"]) && isset($_POST["tabela"]) ){
if($_POST["sprawdz"]=="ok"){
	$url='localhost';
	$identyfikator='root';
	$haslo='';
	$baza_danych = $_POST["baza_danych"];
	$tabela = $_POST["tabela"];
	$idp = mysqli_connect($url,$identyfikator,$haslo, $baza_danych);
	if(mysqli_connect($url,$identyfikator,$haslo, $baza_danych)==true){
		echo("Udało się połączyć z serwerem.<BR><BR>");
	}else{
		echo("Nie udało się połączyć z serwerem.<BR><BR>");
		}
	mysqli_select_db($idp, $baza_danych);
	$zapytanie = "SELECT * FROM $tabela";
	if(mysqli_query($idp, $zapytanie)==true){
		echo("Udało się połączyć z bazą danych: $baza_danych<BR><BR>
		Udało się odczytać dane z tabeli: $tabela<BR><BR>");
		$wynik=mysqli_query($idp, $zapytanie);
	while($row = mysqli_fetch_array($wynik))
	{
	echo ("<hr>");
	echo "<B>Nazwisko:</B> ".$row['imie']."<br><br>\n";
	echo "<B>Imię:</B> ".$row['nazwisko']."<br><br>\n";
	echo "<B>E-mail:</B> <A HREF=\"mailto: ".$row['email']."\">".$row['email']."</A><br><br>\n";
	}
	}else{
		echo("Nie udało się połączyć z bazą danych: $baza_danych<BR><BR>
		Nie udało się odczytać danych z tabeli: $tabela<BR><BR>");
	}
}}else{
	echo"";
};
echo("<br><br><center><a href=mysql5.php>Powtórzenie ćwiczenia</a></center></body></html>");
?>
</body>
</html>
