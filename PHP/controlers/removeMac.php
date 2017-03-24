<?php
require('./Bdd.php');
session_start();

$idMac = $_GET["idMac"];

$bd = new Bdd();
$bd->removeMac($idMac);

header('location:../view/peripherique.php');

?>
