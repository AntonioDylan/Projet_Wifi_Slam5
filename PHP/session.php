<?php 
/*
 * Démarrage de la session sécurisé
*/
session_start();
include("config.php");

$db = new Bdd();
$mel = filter_var($_POST["adressemel"], FILTER_SANITIZE_EMAIL);
$pass = $_POST["mdp"];

/*
 * Démarrage de la session sécurisé
*/
//sec_session_start();

/*
 * Connexion
*/
include('login.php')
$login = new Login();


?>
