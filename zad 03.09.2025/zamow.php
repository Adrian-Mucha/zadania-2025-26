<?php
$pol = mysqli_connect("localhost", "root", "", "obuwie");
mysqli_set_charset($pol, "utf8");

$model = $_POST['model'];
$rozmiar = $_POST['rozmiar'];
$liczba = (int)$_POST['liczba'];

$sql = "SELECT b.nazwa, b.cena, p.kolor, p.material, p.nazwa_pliku 
        FROM buty b 
        JOIN produkt p ON b.model = p.model 
        WHERE b.model = '$model' LIMIT 1";
$res = mysqli_query($pol, $sql);
$dane = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <main>
        <h2>Zamówienie</h2>
        <?php
    if ($dane) {
        $calkowita = $dane['cena'] * $liczba;
        echo "<img src='{$dane['nazwa_pliku']}' alt='but'>";
        echo "<h2>{$dane['nazwa']}</h2>";
        echo "<p>Cena za $liczba par: $calkowita zł</p>";
        echo "<p>Szczegóły produktu: {$dane['kolor']}, {$dane['material']}</p>";
        echo "<p>Rozmiar: $rozmiar</p>";
    } else {
        echo "<p>Nie znaleziono modelu.</p>";
    }
    ?>
    <p><a href="index.php">Strona główna</a></p>
    <footer>
        <p>Autor strony: 0000000</p>
    </footer>
    
<?php mysqli_close($pol); ?>
</body>
</html>