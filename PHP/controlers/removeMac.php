<?php
require('./Bdd.php');
session_start();

$idMac = $_GET["idMac"];

$bd = new Bdd();
$bd->removeMac($idMac);

if(isset($_GET['a'])){
    if($_GET['a'] == '1'){
        header('location:../view/admin_utilisateur.php');
    }
}else{
header('location:../view/peripherique.php');
}

?>
