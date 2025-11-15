<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Informació de la bodega</title>
</head>
<body>

<h1>Informació de la bodega</h1>

<?php
if (!isset($_COOKIE['majoredat']) || !isset($_COOKIE['idioma']) || !isset($_COOKIE['moneda'])) {
    echo "<p>Primer has d'omplir les teves dades a <a href='bodega.php'>la bodega</a>.</p>";
    exit();
}

$majoredat = $_COOKIE['majoredat'];
$idioma = $_COOKIE['idioma'];
$moneda = $_COOKIE['moneda'];

if ($majoredat == "no") {
    if ($idioma == "cat") echo "<p>No et podem vendre alcohol si ets menor d'edat.</p>";
    elseif ($idioma == "esp") echo "<p>No podemos vender alcohol si eres menor de edad.</p>";
    elseif ($idioma == "eng") echo "<p>We cannot sell alcohol if you are underage.</p>";
    exit();
}

$productes = [
    ["Les Terrasses", 39],   
    ["Vi Negre", 25]
];

$canvi = [
    "eur" => 1,
    "gbp" => 0.87, 
    "usd" => 1.1   
];

$simbol = ["eur" => "€", "gbp" => "£", "usd" => "$"];

$traduccio_nom = [
    "Les Terrasses" => [
        "cat" => "Les Terrasses",
        "esp" => "Les Terrasses",
        "eng" => "Les Terrasses"
    ],
    "Vi Negre" => [
        "cat" => "Vi Negre",
        "esp" => "Vino Tinto",
        "eng" => "Red Wine"
    ]
];

echo "<ul>";
foreach ($productes as $p) {
    $nom = $traduccio_nom[$p[0]][$idioma];
    $preu = $p[1] * $canvi[$moneda];
    echo "<li>$nom: " . round($preu, 2) . " " . $simbol[$moneda] . "</li>";
}
echo "</ul>";
?>

</body>
</html>
