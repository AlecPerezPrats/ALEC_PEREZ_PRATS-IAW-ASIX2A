<?php
$pa = isset($_COOKIE['pa']) ? intval($_COOKIE['pa']) : 0;
$llet = isset($_COOKIE['llet']) ? intval($_COOKIE['llet']) : 0;

$preu_pa = 2;
$preu_llet = 1;

$total = ($pa * $preu_pa) + ($llet * $preu_llet);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Finalitzar compra</title>
</head>
<body>

<h1>Resum de la compra</h1>

<?php
if ($pa == 0 && $llet == 0) {
    echo "<p>No has comprat res encara.</p>";
} else {
    if ($pa > 0) echo "<p>Pa: $pa unitats - " . ($pa * $preu_pa) . "€</p>";
    if ($llet > 0) echo "<p>Llet: $llet unitats - " . ($llet * $preu_llet) . "€</p>";

    echo "<h3>Total: $total €</h3>";
}
?>

<br><br>

<form action="comprar.php" method="POST">
    <input type="submit" name="confirmar" value="Confirmar compra">
</form>

<br>
<a href="index.html">Tornar a la botiga</a>

<?php 

if (isset($_POST['confirmar'])) {
    setcookie("pa", "", time() - 3600, "/");
    setcookie("llet", "", time() - 3600, "/");

    echo "<p>Compra confirmada! Les dades s'han eliminat.</p>";
}
?>

</body>
</html>
