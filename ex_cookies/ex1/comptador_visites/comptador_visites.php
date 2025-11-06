<?php
// ------------------ BLOC 1: COMPTADOR DE VISITES ------------------

// Si ja existeix la cookie 'visites', incrementem el comptador
if (isset($_COOKIE['visites'])) {
    $visites = intval($_COOKIE['visites']) + 1;
} else {
    $visites = 1;
}

// Guardem la cookie de visites (durada 1 any)
setcookie("visites", $visites, time() + 365*24*60*60, "/");

// ------------------ BLOC 2: COMPROVEM SI HA COMPRAT ------------------

// Cookie 'ha_comprat' indica si l’usuari ha fet una compra recent
$ha_comprat = isset($_COOKIE['ha_comprat']) && $_COOKIE['ha_comprat'] == "1";

// ------------------ BLOC 3: DETERMINAR MISSATGE D’OFERTA ------------------

$missatge_oferta = "";

if (!$ha_comprat) {
    // Només s’ofereix descompte si no ha comprat recentment
    if ($visites >= 10) {
        $missatge_oferta = "Oferta exclusiva sols per a tu! Utilitza el codi BOTIGA50 per obtenir un 50% de descompte en les teves primeres compres a la botiga.";
    } elseif ($visites >= 5) {
        $missatge_oferta = "Oferta exclusiva! Utilitza el codi BOTIGA20 per obtenir un 20% de descompte en les teves primeres compres a la botiga.";
    }
}

// ------------------ BLOC 4: TRACTAMENT DE LA COMPRA ------------------

$resultat = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $producte = trim($_POST['roba'] ?? "");
    $codi = strtoupper(trim($_POST['descompte'] ?? ""));

    if ($ha_comprat) {
        // Si té la cookie ha_comprat = 1, encara no ha passat el "reset" del comptador
        $resultat = "Ja has comprat recentment. Torna a visitar la web diverses vegades per rebre noves ofertes!";
    } else {
        // No ha comprat recentment, potser pot aplicar un descompte
        if ($codi === "BOTIGA20" && $visites >= 5 && $visites < 10) {
            $resultat = "Has aplicat correctament el descompte del 20%! Codi: BOTIGA20.";
        } elseif ($codi === "BOTIGA50" && $visites >= 10) {
            $resultat = "Has aplicat correctament el descompte del 50%! Codi: BOTIGA50.";
        } elseif ($codi === "") {
            $resultat = "Has comprat el producte <strong>" . htmlspecialchars($producte) . "</strong> sense descompte.";
        } else {
            $resultat = "Codi de descompte no vàlid o encara no tens dret a aplicar-lo.";
        }

        // Si la compra és vàlida (amb o sense descompte), es considera compra feta
        if (strpos($resultat, 'Has aplicat') !== false || strpos($resultat, 'sense descompte') !== false) {
            // Marquem que ha comprat
            setcookie("ha_comprat", "1", time() + 365*24*60*60, "/");
            // Reiniciem el comptador de visites (nova etapa)
            setcookie("visites", "0", time() + 365*24*60*60, "/");
            $visites = 0;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Comptador de visites</title>
</head>
<body>
    <div class="contenidor">
        <h1>Benvingut a la botiga!</h1>
        <p>Has visitat aquesta pàgina <strong><?= $visites ?></strong> vegada(es).</p>

        <?php if ($missatge_oferta && !$ha_comprat): ?>
            <div class="oferta"><?= $missatge_oferta ?></div>
        <?php elseif ($ha_comprat): ?>
            <p class="ok">Gràcies per la teva compra! Torna a visitar-nos per obtenir noves ofertes.</p>
        <?php endif; ?>

        <form method="post" action="comptador_visites.php">
            <label for="roba">Quin producte vols?</label><br>
            <input type="text" id="roba" name="roba"><br>
            <label for="descompte">Introdueix el teu codi de descompte:</label><br>
            <input type="text" id="descompte" name="descompte"><br>
            <input type="submit" value="Comprar">
        </form>

        <?php if ($resultat): ?>
            <p class="<?= strpos($resultat, 'correctament') !== false || strpos($resultat, 'sense descompte') !== false ? 'ok' : 'error' ?>">
                <?= $resultat ?>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
