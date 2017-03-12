<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <link rel="stylesheet" href="./css/styles.css">
   </head>
   <body>
      <?php 
         include("nav.php");
      ?>

      <!-- Conteneur -->
      <div class="container">

         <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
               <div class="panel-heading">
                  <div class="panel-title">Connexion</div>
               </div>
               <?php

               if (isset($_SESSION['ERREUR']) && $_SESSION['ERREUR'] == 'T'){ ?>
                  <div id="unknow" class="alert alert-danger" style="margin:20px;margin-bottom:0px;"role="alert">
                     <center>Compte inexistant !</center>
                  </div>

               <?php 
               unset($_SESSION['ERREUR']);
               }
               ?>
               <div class="alert alert-success" style="margin:20px;margin-bottom:0px;"role="alert">

                  <center><i class="glyphicon glyphicon-lock"></i> Utilisez les identifiants du <strong>Livret de compétences SIO</strong>.</center>
               </div>

               <div style="padding-top:30px" class="panel-body" >
                  <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                  <form id="loginform" class="form-horizontal" role="form" method="post" action="session.php">
                     <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                        <input id="login-username" type="text" class="form-control" name="adressemel" value="" placeholder="Adresse mail">
                     </div>
                     <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="mdp" placeholder="Mot de passe">
                     </div>
                     <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls text-center">
                           <input type="submit" id="btn-login" class="btn btn-success" value="Connexion">
                        </div>
                     </div>
                  </form>

               </div>
            </div>
         </div>

      </div>

      <!-- Footer -->
      <?php include("footer.php") ?>
   </body>
