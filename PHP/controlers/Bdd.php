<?php


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

  public function macCheck($mac){
      if (preg_match('/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/', $mac) || preg_match('/^([0-9A-Fa-f]{12})$/', $mac)) {
          try {
              return $this->macFormat($mac);
          }
          catch (Exception $e) {
              return 1;
          }
      }
      else {
        return 0;
      }
  }



  public function macFormat($mac){
      $macPur="";
      for($i = 0; $i<strlen($mac); $i++){
          $submac = substr($mac,$i,1);
          if(preg_match('/([a-fA-F0-9])/', $submac)){
              $macPur .= $submac;
          }
      }
      $macPur = strtolower($macPur);
      echo "<script>alert(\"la variable est nulle\")</script>"; 

      return $macPur;

  }

  public function removeMac($id){

    $query =  $this->pdo->prepare('DELETE FROM adresse_mac WHERE id=:num');

		$query->bindParam(':num', $id, PDO::PARAM_INT);
		$query->execute();
  }



  public function addMac($idEtu, $mac, $libelle){

    $check = $this->macCheck($mac);
    echo $check;
    if ($check == 0){
      echo 'L\'adresse Mac est pas valide !';
      return 1;
    }
    else{
      $mac = $check;
      $date = new DateTime();
      $query =  $this->pdo->prepare('INSERT INTO adresse_mac (id, numEtudiant, libelle, addr, date, etat) VALUES (null, :num, :libelle, :macAdd, :now, 0)');
      $query->bindParam(':num', $idEtu, PDO::PARAM_INT);
      $query->bindParam(':macAdd', $mac, PDO::PARAM_STR);
      $query->bindParam(':libelle', $libelle, PDO::PARAM_STR);
      $query->bindParam('now', date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR);

      $query->execute();
      return 0;
      
    }

  }
}
?>
