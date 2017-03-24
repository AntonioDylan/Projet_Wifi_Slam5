<?php
require('../controlers/Bdd.php');
session_start(); 

$idMac = $_GET["idMac"];

$bd = new Bdd();
$bd->removeMac($idMac);

header('location:peripherique.php');

?>