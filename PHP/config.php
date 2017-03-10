<?php
$dbh = null;

connection();
function connection(){

  $host = '10.30.3.4';
  $username = 'root';
  $password = '';
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
