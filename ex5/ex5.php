<?php
    $preu = $_GET['preu'];
    $iva = $_GET['iva'];
    $preu_iva = $preu * (1 + $iva / 100);
    
    echo "<p>Preu amb IVA: $preu_iva euros</p>";
?>

