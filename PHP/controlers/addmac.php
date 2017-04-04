<?php


include './Bdd.php';
session_start();

// Récupération des variables POST
$idMel = $_SESSION['MAIL'];
$mac = $_POST['macAddr'];

$libelle = null;
if (empty($_POST['Libelle'])){
	 $libelle = 'Nouveau périphérique';
}
else{
	$libelle = $_POST['Libelle'];
}


$db = new Bdd();

if ($db->addMac($idMel, $mac, $libelle) != 0){
	$_SESSION['erreurMac'] = true;
}
else{
	// Ajout avec succès
	if (isset($_SESSION['erreurMac'])){
		unset($_SESSION['erreurMac']);
	}

	// Inclusion
	include './scriptPowerShell.php';
	reserveAdresseDHCP(111,534564156461,"test","test");
	supprimeAdresseDHCP("test",534564156461);
	reserveAdresseCisco(534564156461);
	supprimeAdresseCisco();

}


header('location:../view/peripherique.php');


?>
