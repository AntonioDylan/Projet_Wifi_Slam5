<!DOCTYPE html>
<html lang="fr">
   <head>
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <link rel="stylesheet" href="./css/styles.css">
   </head>
   <body>
      <?php include("nav.php") ?>
      <!-- Begin page content -->
      <div class="container">
         <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
               <div class="panel-heading">
                  <div class="panel-title">Connexion</div>
               </div>

               <div class="alert alert-success" style="margin:20px;margin-bottom:0px;"role="alert">
                  <center>Utilisez les identifiants du <strong>Livret de compétences SIO</strong>.</center>
               </div>

               <div style="padding-top:30px" class="panel-body" >
                  <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                  <form id="loginform" class="form-horizontal" role="form" method="post" action="session.php">
                     <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Adresse mail">
                     </div>
                     <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Mot de passe">
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
      <!-- Small modal -->
      <footer class="footer">
         <div class="container">
            <p class="text-muted text-center">&copy; BTS SIO - Rémy, Dylan et Arthur - 2017.</p>
         </div>
      </footer>
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
   </body>
