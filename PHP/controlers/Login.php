<?php

class Login
{
//ROLE : 0 = ETUDIANT, 1 = PROFESSEUR
//ADMIN : 0 = NON, 1 = OUI
  public function __construct($mail, $password, $cnx)
  {
    // Requête

    /*NOUVEAU*/
    $query = $this->loginAs("port_etudiant", $mail, $password, $cnx);
    if($query->rowCount() > 0){
      $result = $query->fetch(PDO::FETCH_ASSOC);
      $_SESSION['MAIL'] = $mail;
      $_SESSION['NOM'] = $result['nom'];
      $_SESSION['PRENOM'] = $result['prenom'];
      $_SESSION['ID'] = $result['num'];
      $_SESSION['ADMIN'] = $result['admin'];
      $_SESSION['USER_SESSION'] = hash('sha256', $mail, false);
      $_SESSION['ERREUR'] = 'F';
      $_SESSION['ROLE'] = '0';
      header('location:peripherique.php');
    }
    else{
      $query = $this->loginAs("port_professeur", $mail, $password, $cnx);
      if($query->rowCount() > 0){
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['MAIL'] = $mail;
        $_SESSION['NOM'] = $result['nom'];
        $_SESSION['PRENOM'] = $result['prenom'];
        $_SESSION['ID'] = $result['num'];
        $_SESSION['ADMIN'] = $result['admin'];
        $_SESSION['USER_SESSION'] = hash('sha256', $mail, false);
        $_SESSION['ERREUR'] = 'F';
        $_SESSION['ROLE'] = '1';
        header('location:peripherique.php');
      }
      else {
        $_SESSION['ERREUR'] = 'T';
        header('location:auth.php');
      } 
    }


  }

  public function EstConnecte(){
    if(isset($_SESSION['USER_SESSION'])){
      return true;
    }
  }

  public function Redirection($url){
    header("Location: ".$url);
  }

  public function Deconnexion(){
    session_destroy();
    //unset($_SESSION['USER_SESSION'] = hash('sha256', $mail, false);
    return true;
  }


  public function loginAs($tableName, $mail, $password, $cnx){
      $query = $cnx->prepare('select * from '.$tableName. ' where mel=:email and mdp=:password;');
      $query->bindParam(':email', $mail, PDO::PARAM_STR);
      $query->bindParam(':password', $password, PDO::PARAM_STR);
      $query->execute();

      //$query->fetch(PDO::FETCH_ASSOC);

      return $query;
  }
}
?>