<?php 

    if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
        header('Location: index.php');
        exit();
    }

    try {
        $PDO = new PDO($_SESSION['driver'], $_SESSION['login'], $_SESSION['password']);

        if (!$PDO) {
            header('Location: index.php');
            exit();
        }

    } catch (PDOException $e) {
        $_SESSION['e'] = $e;
        echo $e;
        session_destroy();
        header('Location: index.php');
        exit();
    }
?>