<?php

include './Bdd.php';

session_start();

$idEtu = $_SESSION['ID'];
$mac = $_POST['macAddr'];
$libelle = $_POST['Libelle'];

$db = new Bdd();

try {
  $db->addMac($idEtu, $mac, $libelle);
  $_SESSION['erreurMac'] = 'Mauvaise adresse MAC !';
  header('location:../view/peripherique.php');

}
catch (Exception $e) {
  echo 'Erreur dans l\'appele de la methode d\'ajout d\'adresse MAC: ' . $e->getMessage();
}

?>
