<?php
    $musica = $_GET['musica'];
    switch ($musica) {
        case 'rock':
            echo "<p>Algo relacionat amb el $musica</p>";
            break;
        case 'pop':
            echo "<p>Algo relacionat amb el $musica</p>";
            break;
        case 'jazz':
            echo "<p>Algo relacionat amb el $musica</p>";
            break;
        case 'electronica':
            echo "<p>Algo relacionat amb l'$musica</p>";
            break;
        default:
            echo "<p>Tens que seleccionar algun estil</p>";
        }
?>
