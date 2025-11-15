<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productes</title>
</head>
<body>

<h1>Productes</h1>
<form action="" method="GET">
    <input type="text">
    <input type="submit" value="Comprar">
</form>

<?php
if(isset($_COOKIE['visita'])){
    $visita = intval($_COOKIE['visita']) + 1;
} else {
    $visita = 1;
}

setcookie('visita', $visita, time() + 365*24*60*60, "/");

echo "<p>Visita nº $visita</p>";

if($visita >= 5 && $visita < 10){
    echo "<p>Tens un 20% de descompte</p>";
} elseif($visita >= 10 && !isset($_COOKIE['compra'])){
    echo "<p>Tens un 50% de descompte</p>";
}
?>

</body>
</html>
