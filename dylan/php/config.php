<?php
$dbh = null;

connection();
function connection(){

  $host = 'localhost';
  $username = 'root';
  $password = 'root';
  $bdd = 'client';

    try {
      $dbh = new PDO('mysql:host='.$host.';dbname='.$bdd, $username, $password);
      }
    catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
  }
}

 ?>
