<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Gestion Wifi</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Accueil</a></li>

        <?php
          if (!isset($_SESSION['count']) || $_SESSION['count'] != 0) {
            $_SESSION['count'] = 0;
          }
          else {
            ?>
            <li class=""><a href="peripherique.php">Périphériques</a></li>
            <?php
          }
        ?>
        <li><a href="#about" data-toggle="modal" data-target=".about-modal">A propos</a></li>
      </ul>
    </div>

  </div>
</nav>

<!-- Appel modal -->
<div class="modal fade about-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">A propos</h4>
      </div>
      <div class="modal-body">
        <p>Ce qu'il faut retenir est le suivant: </br>aucune maltraitance n'a été effectué durant le projet. </br></br>Tout a été réalisé avec <span class="glyphicon glyphicon-heart" style="color:red"></span>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
