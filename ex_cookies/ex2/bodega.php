<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Bodega</title>
</head>
<body>

<h1>Benvingut a la bodega</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    setcookie("majoredat", $_POST['majoredat'], time() + 365*24*60*60, "/");
    setcookie("idioma", $_POST['idioma'], time() + 365*24*60*60, "/");
    setcookie("moneda", $_POST['moneda'], time() + 365*24*60*60, "/");

    header("Location: info.php");
    exit();
}
?>

<form action="" method="POST">
    <label>Ets major d'edat?</label><br>
    <input type="radio" name="majoredat" value="sí" required> Sí
    <input type="radio" name="majoredat" value="no"> No
    <br><br>

    <label>Selecciona l'idioma:</label><br>
    <select name="idioma" required>
        <option value="cat">Català</option>
        <option value="esp">Español</option>
        <option value="eng">English</option>
    </select>
    <br><br>

    <label>Selecciona la moneda:</label><br>
    <select name="moneda" required>
        <option value="eur">€ Euros</option>
        <option value="gbp">£ Lliures</option>
        <option value="usd">$ Dòlars</option>
    </select>
    <br><br>

    <input type="submit" value="Guardar dades">
</form>

</body>
</html>
