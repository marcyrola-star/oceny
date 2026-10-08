<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
        <label>Wpisz imię i nazwisko: <input type="text" name="uczen"></label>
        <br>
        <label> Wpisz ocenę: <select name="ocena">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        </label>
        <br>
        <label>Wpisz przedmiot: <input type="text" name="przedmiot"></label>
        <br>
        <input type="submit" value="ZAPISZ OCENĘ" name="zapisz">
    <?php
        if (isset($_POST["zapisz"])) {
 
            $uczen = $_POST["uczen"];
            $przedmiot = $_POST["przedmiot"];
            $ocena = $_POST["ocena"];
 
            $plik = fopen("oceny.txt", "a");
 
            fwrite($plik, $uczen . ";" . $przedmiot . ";" . $ocena . "\n");
 
            fclose($plik);
        }

    ?>
<h2>Zapisane oceny</h2>
 
    <?php
  
        if (file_exists("oceny.txt")) {
            $plik = fopen("oceny.txt", "r");
         while (!feof($plik)) {
                $wiersz = fgets($plik);
                if ($wiersz != "") {
                    $dane = explode(";", $wiersz);
                    echo $dane[0] . " | " . $dane[1] . " | ocena: " . $dane[2] . "<br>";
                }
            }
            fclose($plik);
        }
  
    ?>
  

</body>
</html>