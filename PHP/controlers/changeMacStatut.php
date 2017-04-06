<?php
require('./Bdd.php');
session_start();
if($_SESSION['ADMIN'] == '1'){
        $idMac = $_GET["idMac"];
    if($_GET['ac'] == '1'){
        $bd = new Bdd();
        $bd->removeMac($idMac);
    }
    else if($_GET['ac'] == '0'){
        $bd = new Bdd();
        $bd->setActifMac($idMac);
    }
}
header('location:../view/admin_peripherique.php');


?>
