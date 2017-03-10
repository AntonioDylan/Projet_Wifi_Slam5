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
	      <div class="page-header">
	        <h1>Gestion des périphériques</h1>
	      </div>
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Inventaire des périphériques - <?php echo $_SESSION['username']; ?></div>

				  <!-- Table -->
					<table class="table table-striped">
					   <thead>
					      <tr>
					         <th>#</th>
					         <th>Propriétaire</th>
					         <th>Adresse MAC</th>
					         <th>Statut</th>
					      </tr>
					   </thead>
					   <tbody>
					      <tr>
					         <th scope="row"><img src="img/remove.png" alt="Retirer périphérique"></th>
					         <td>Rémy</td>
					         <td>ab:cd:ef:gf:ij</td>
					         <td><span class="label label-success">Actif</span></td>
					      </tr>
					      <tr>
									<th scope="row"><img src="img/remove.png" alt="Retirer périphérique"></th>
					         <td>Jacob</td>
					         <td>Thornton</td>
					         <td>@fat</td>
					      </tr>
					      <tr>
									<th scope="row"><a href="peripherique.php"><img src="img/remove.png" alt="Retirer périphérique"></a></th>
					         <td>Larry</td>
					         <td>the Bird</td>
					         <td>@twitter</td>
					      </tr>
					   </tbody>
					</table>
				</div>
			</div>

			<!-- Small modal -->


	    <footer class="footer">
	      <div class="container">
	        <p class="text-muted text-center">&copy; BTS SIO - Rémy, Dylan et Arthur - 2017</p>
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
