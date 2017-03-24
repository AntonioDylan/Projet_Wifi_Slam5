<?php



class Login
{
  public function __construct($mail, $password, $cnx)
  {
    // Requête
    $query = $cnx->prepare('select * from port_etudiant where mel=:email and mdp=:password;');
    $query->bindParam(':email', $mail, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount() > 0) {
      $_SESSION['MAIL'] = $mail;
      $_SESSION['NOM'] = $result['nom'];
      $_SESSION['PRENOM'] = $result['prenom'];
      $_SESSION['ID'] = $result['num'];
      $_SESSION['USER_SESSION'] = hash('sha256', $mail, false);
      $_SESSION['ERREUR'] = 'F';
      header('location:peripherique.php');
    }
    else {
      $_SESSION['ERREUR'] = 'T';
      header('location:auth.php');
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
}
?>