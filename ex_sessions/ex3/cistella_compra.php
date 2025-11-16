<?php

if (isset($_POST['pa']) && $_POST['pa'] > 0) {
    $q = intval($_POST['pa']);

    if (isset($_COOKIE['pa'])) {
        $q += intval($_COOKIE['pa']);
    }

    setcookie("pa", $q, time() + 3600, "/");
}

if (isset($_POST['llet']) && $_POST['llet'] > 0) {
    $q = intval($_POST['llet']);

    if (isset($_COOKIE['llet'])) {
        $q += intval($_COOKIE['llet']);
    }

    setcookie("llet", $q, time() + 3600, "/");
}

header("Location: index.html");
exit();
?>
