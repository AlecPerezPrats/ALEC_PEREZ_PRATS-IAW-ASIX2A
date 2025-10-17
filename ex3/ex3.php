<?php
$hora = date("H");
$horas = date("H:i");
if ($hora >= 5 && $hora < 14) {
    echo "Bon dia, son les $horas";
} elseif ($hora >= 14 && $hora < 19) {
    echo "Bona tarda, son les $horas";
} else {
    echo "Bona nit, son les $horas";
}
?>
