<?php

namespace App\Controlers\Database;

class Bdd 
{
  private $host = 'localhost';
  private $username = 'root';
  private $password = 'root';
  private $bdd = 'wifi';
  public $pdo = null;

  public function __construct()
  {
    try {
      $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

      // Gestion des accents utf-8
      $options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
      
      $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->bdd, $this->username, $this->password, $options);
    }
    catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}
?>