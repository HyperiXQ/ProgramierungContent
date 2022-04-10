<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
</head>
<body>
    <?php 
    echo("<h3>Ćwiczenie 1 - połączenie z serwerem MySQL na localhoście</h3>");
    $url = "localhost";
    $identyfikator = "root";
    $haslo = "";
    $nazwa = "ksiegarnia";
    
    if (mysqli_connect($url, $identyfikator, $haslo, $nazwa) == true) {
        echo("Udało się połączyć z serwerem");
    }
    
    ?>
    
</body>
</html>