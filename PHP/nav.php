<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Gestion Wifi</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Authentification</a></li>

        <?php
          if (isset($_SESSION['MAIL'])) { ?>
            <li class=""><a href="peripherique.php">Périphériques</a></li>
          <?php
          }
          ?>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Plus<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#about" data-toggle="modal" data-target=".about-modal"><i class="glyphicon glyphicon-plus"></i> A propos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="http://bit.ly/2nsIJ2P"><i class="glyphicon glyphicon-console"></i> Sources sur GitHub</a></li>
          </ul>
        </li>
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
        <h4 class="modal-title">A propos</h4>
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
