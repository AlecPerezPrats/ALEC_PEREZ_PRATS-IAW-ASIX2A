<?php
    $dolars = $_GET['ValorDolar'];
    $euros = $_GET['ValorEuro'];
    $dolars_a_euros = $dolars * 0.86;
    $euros_a_dolars = $euros * 1.16;
    echo "$euros euros son $euros_a_dolars dolas <br>";
    echo "$dolars dolars son $dolars_a_euros euros"
?>