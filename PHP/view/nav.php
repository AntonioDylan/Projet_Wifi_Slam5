<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a id="nav_title" class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal" style="color: green;" aria-hidden="true"></span>  Gestion Wifi</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">


        <?php
          if (isset($_SESSION['MAIL'])) { ?>

            <li><a href="peripherique.php"><i class="glyphicon glyphicon-hdd"></i> Périphérique(s)</a></li>
            <?php
            if($_SESSION['ADMIN'] == "1"){?>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> Administration<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="admin_peripherique.php"><i class="glyphicon glyphicon-hdd"></i>  Périphérique(s)</a></li>
                <li><a href="#about"><i class="glyphicon glyphicon-user"></i>  Utilisateur(s)</a></li>
              </ul>
            </li>

              <?php
            }
            ?>
          <?php
          }
          else{
            ?>
            <li><a href="auth.php">Authentification</a></li>
            <?php
          }
          ?>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Plus<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#about" data-toggle="modal" data-target=".about-modal"><i class="glyphicon glyphicon-user"></i>  A propos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="http://bit.ly/2nsIJ2P"><i class="glyphicon glyphicon-console"></i> Sources sur GitHub</a></li>
          </ul>
        </li>
        <?php
          if (isset($_SESSION['MAIL'])) { ?>

          <li><a href="../controlers/logout.php"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
          <?php
          }
          ?>
      </ul>
    </div>

  </div>
</nav>

<!-- Appel modal -->
<div class="modal fade about-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> A propos</h4>
      </div>
      <div class="modal-body">
        <p>Aucune maltraitance n'a été effectué durant le projet. </br></br>Projet réalisé avec beaucoup <span class="glyphicon glyphicon-heart" style="color:red"></span> et de tendresse.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
