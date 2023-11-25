<?php
    include "Classe-Commun.php";
    session_start();

    $commun = new Commun();
    $a = $_GET['ida'];
    $b = $_GET['B'];
    $c = $_GET['C'];
    $d = $_GET['D'];

    if (isset($_GET['create'])) {
        $commun->setA($a);
        $commun->setB($b);
        $commun->setC($c);
        $commun->setD($d);
        $commun->create();

        header("Location: menu.php");
        exit();

    } elseif (isset($_GET['retrieve'])) {
        $commun = new Commun();

        $r = $_GET['idar'];

        $result = $commun->retrieve($r);
        echo "l'id est ".$result['ida']. " avec ".$result['b'].' '. $result['c']. ' '. $result['d'];
    
    } elseif (isset($_GET['update'])) {
        $commun->retrieve($a);
        $commun->setA($a);
        $commun->setB($b);
        $commun->setC($c);
        $commun->setD($d);

        $commun->update();
    }   elseif (isset($_GET['delete'])) {
        $r = $_GET['idar'];
        $commun->setA($r);
        $commun->delete();
    }
    
?>