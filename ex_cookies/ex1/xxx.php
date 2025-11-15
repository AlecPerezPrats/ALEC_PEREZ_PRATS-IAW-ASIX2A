<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Productes</h1>
<form action="./compra.php" method="GET">
    <input type="text" name="discount" id=""placeholder="Descompte">
    <input type="submit" value="Aplicar descompte">
</form>
<?php   
    switch($_COOKIE['visita']){
        case '4':
            echo "tens un 20% de descompte";
            break;
        case '9':
            if(! isset($_COOKIE['compra'])){
                echo "tens un 50% de descompte";
                break;
            }   
    }
?>

<hr>
<?php

if(isset($_COOKIE['visita'])){
    $visita = $_COOKIE['visita'];
    $visita_output = $visita+1;
    echo "Visita nº $visita_output";
    setcookie('visita', $visita+=1);
}
else{
    echo "Visita nº: 1";
    setcookie('visita',1);
}

?>
</body>
</html>
