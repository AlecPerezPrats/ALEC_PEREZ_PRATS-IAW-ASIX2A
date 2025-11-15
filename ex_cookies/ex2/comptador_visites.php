<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botiga</title>
    <link rel="stylesheet" href="./CSS/style.css">

</head>
<body>
    <h2>Botiga online</h2>
    <section id="productes">
        <section>
            <img src="./IMG/pedro.jpeg" alt="">
            <p>Producte 1</p>
        </section>
        <section>
            <img src="./IMG/gato.jpeg" alt="">
            <p>Producte 2</p>
        </section>
    </section>
    <section id="missatge">
        <?php
        
            if(isset($_COOKIE['comptador'])){
                switch ($_COOKIE['comptador']) {
                    case 5:
                        echo "Descompte 1";
                        break;
                    case 10:
                        if(! isset($_COOKIE['compra'])){
                            echo "Descompte 2";
                        }
                        break;
                    
                    default:
                        echo "";
                        break;
                }
            }
        ?>
    </section>
    <section id="comptador">
        <?php 
            if(isset($_COOKIE['comptador'])){
                $visites = $_COOKIE['comptador'];
                echo "<p>Número de visites: $visites </p>";
                setcookie('comptador',$_COOKIE['comptador']+1);
            }
            else{
                echo "<p>Número de visites: 1</p>";
                setcookie('comptador',2);
            }
        ?>
    </section>
    <form action="./compra.php" method="get">
        <input type="text" placeholder="Codi de descompte" name="" id="">
        <button type="submit" name="compra">Comprar</button>
    </form>
</body>
</html>

