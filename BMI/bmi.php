<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <?php
    $db = new mysqli('localhost', 'root', '', 'egzamin');
    ?>
    <div id="wrapper">
        <div id="obraz"><img src="wzor.png" class="wzor" alt="wzór BMI"></div>
        <div id="baner"><h1 class="baner">Oblicz swoje BMI</h1></div>
        <div id="corebar">
        <table class="table">
            <tr class="hover">
                <th>Interpretacja BMI</th>
                <th>Wartość minimalna</th>
                <th>Wartośc maksymalna</th>
            </tr>
            <?php
                $query = $db->prepare("SELECT informacja, wart_min, wart_max FROM bmi");
                $query->execute();
                $result = $query->get_result();
                while($row = $result->fetch_assoc()) {
                    echo '<tr class="hover">';
                    echo '<td>'.$row['informacja'].'</td>';
                    echo '<td>'.$row['wart_min'].'</td>';
                    echo '<td>'.$row['wart_max'].'</td>';
                    echo '</tr>';
                }
            ?>
            </table>
        </div>
        <div id="leftbar"><h1>Podaj wagę i wzrost</h1><br><br>
            <form method="POST" action="bmi.php">
                Waga:<input type="number" name="waga" min="1" required id="waga"><br>
                Wzrost w cm:<input type="number" name="wzrost" min="1" required id="wzrost"><br>
                <button type="submit" name="wynik" value="Wyślij dane">Oblicz i zapamiętaj wynik</button><br>
            </form>
             <?php
                if(isset($_POST['waga']) && isset($_POST['wzrost'])) {
                    $waga = $_POST['waga'];
                    $wzrost = $_POST['wzrost'];
                    $bmi = $waga / ($wzrost * $wzrost);
                    $bmi *= 10000;
                    echo "Twoja waga: $waga; Twój wzrost: $wzrost <br> BMI wynosi: $bmi";
                    $bmi_id = 0;
                    if($bmi <= 18) $bmi_id = 1;
                    if($bmi > 19 && $bmi <= 25) $bmi_id = 2;
                    if($bmi > 26 && $bmi <= 30) $bmi_id = 3;
                    if($bmi > 31 && $bmi <= 100) $bmi_id = 4;

                    $dataPomiaru = date("Y-m-d");

                    $query = $db->prepare("INSERT INTO wynik (id, bmi_id, data_pomiaru, wynik) 
                                            VALUES (NULL, ?, ?, ?)");
                    $query->bind_param("isi", $bmi_id, $dataPomiaru, $bmi);
                    $query->execute();
                }
                ?>
        </div>
        <div id="rightBar"><img src="rys1.png" alt="ćwiczenia" id="rys"></div>
        <div id="footer">Autor: 000000000000000 <a href="kwerendy.txt">Zobacz kwerendy</a></div>
    </div>
   
</body>
</html>