<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style2.css">
    <title>Compra</title>
</head>
<body>
<?php
    if (isset($_GET['compra'])){
        setcookie('compra',true, time()+24*60*60);
        echo "<h2>Compra realitzada correctament</h2><br>";
    }
    echo "<div><a href=\"./comptador_visites.php\">Tornar a la pàgina d'inici</a></div>";
?>
</body>
</html>
