<?php
  // Definition des constantes et variables
  $errorMessage = '';

// header('location:peripherique.php');
$username = 'benzema';
$password = 'abdel';
  // Test de l'envoi du formulaire
  if(!empty($_POST))
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
      // Sont-ils les mêmes que les constantes ?
      if($_POST['username'] !== $username)
      {
        $errorMessage = 'Mauvais username !';
      }
        elseif( $_POST['password'] !== $password)
      {
        $errorMessage = 'Mauvais password !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le username en session
        $_SESSION['username'] = $username;
        $_SESSION['count'] = 1;
        // On redirige vers le fichier admin.php
        header('location:peripherique.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }
  echo $errorMessage;



?>
