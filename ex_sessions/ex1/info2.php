<?php
if (!isset($_COOKIE['usuari'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Pàgina d'informació 2</title>
</head>
<body>

<p>Benvingut/da, <strong><?php echo $_COOKIE['usuari']; ?></strong></p>

<h1>Informació 2</h1>
<p>Aquesta és la segona pàgina d'informació.</p>

<p><a href="info1.php">Tornar a la primera pàgina</a></p>

</body>
</html>
