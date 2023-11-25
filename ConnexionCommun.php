<?php
session_start();
$PDO;

if (isset($_POST['password'])&& isset($_POST['login'])){
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['driver'] = "mysql:host=127.0.0.1;dbname=btsexamexemple";

    try{
        $PDO = new PDO($_SESSION['driver'],$_SESSION['login'],$_SESSION['password']);

        if ($PDO){
            header('Location: menu.php');
        }
    }

    catch(PDOException $e){
        $_SESSION['e'] = $e;
        session_destroy();
        echo '<center> <h1>Erreur ! </h1> <br> <a href="index.php"> <h3>Réessayer </h3> </center> ';
    }
}
?>