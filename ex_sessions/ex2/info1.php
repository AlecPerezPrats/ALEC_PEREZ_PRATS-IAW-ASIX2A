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
    <title>Pàgina d'informació 1</title>
</head>
<body>

<p>Benvingut/da, <strong><?php echo $_COOKIE['usuari']; ?></strong>&nbsp;<a href="index.html">Tancar sessió</a></p>

<h1>Informació 1</h1>
<p>Aquesta és la primera pàgina d'informació.</p>

<p><a href="info2.php">Anar a la segona pàgina</a></p>

</body>
</html>