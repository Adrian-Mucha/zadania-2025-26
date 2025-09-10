<?php
$pol = mysqli_connect("localhost", "root", "", "obuwie");
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
    <main>
    <form method="post" action="zamow.php">
        <label for="model">Model:</label>
        <select name="model" id="model" class="kontrolka">
            <?php
            $res = mysqli_query($pol, "SELECT model FROM produkt");
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<option value='{$row['model']}'>{$row['model']}</option>";
            }
            ?>
        </select>

        <label for="rozmiar">Rozmiar:</label>
        <select name="rozmiar" id="rozmiar" class="kontrolka">
            <?php
            for ($i = 40; $i <= 43; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <label for="liczba">Liczba par:</label>
        <input type="number" name="liczba" id="liczba" class="kontrolka" min="1" value="1">

        <input type="submit" value="Zamów" class="kontrolka">
    </form>

    <hr>

    <?php
    $sql = "SELECT b.model, b.nazwa, b.cena, p.nazwa_pliku 
            FROM buty b 
            JOIN produkt p ON b.model = p.model";
    $res = mysqli_query($pol, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<div class='buty'>";
        echo "<img src='{$row['nazwa_pliku']}' alt='but'>";
        echo "<h2>{$row['nazwa']}</h2>";
        echo "<h5>Model: {$row['model']}</h5>";
        echo "<h4>Cena: {$row['cena']} zł</h4>";
        echo "</div>";
    }
    ?>
</main>
    <footer>
        <p>Autor strony: 0000000</p>
    </footer>
    <?php mysqli_close($pol); ?>
</body>
</html>


