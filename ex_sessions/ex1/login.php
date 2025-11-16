<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuari = $_POST['usuari'];
    $pwd = $_POST['pwd'];

    if ($usuari == $pwd && $usuari != "") {
        setcookie("usuari", $usuari, time() + 3600, "/");
        header("Location: info1.php");
        exit();
    } else {
        echo "<p>Usuari o contrasenya incorrectes.</p>";
        echo "<p><a href='index.html'>Torna al login</a></p>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>
