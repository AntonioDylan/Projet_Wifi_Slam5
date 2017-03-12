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
		include("config.php");
		?>
	    <!-- Begin page content -->
	    <div class="container">
	      <div class="page-header">
	        <h1>Gestion des périphériques</h1>
	      </div>
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Inventaire des périphériques - 
				  <?php 
				  if(isset($_SESSION['NOM'])){
				  	echo $_SESSION['NOM'].' '.$_SESSION['PRENOM'];
				  }
				  ?></div>

				<table class="table table-striped">
				   <thead>
				      <tr>
				         <th>Propriétaire</th>
				         <th>Adresse MAC</th>
				         <th>Statut</th>
				         <th style="width:10%;">Supprimer</th>
				      </tr>
				   </thead>
				  // Lister adresses MAC
				   <tbody>
				      <tr>
				  <?php 

				  

				  foreach ($array as $key) {
				  	
				  }



				  ?>

				  <!-- Table -->

					         <td>Rémy</td>
					         <td>5E:FF:56:A2:AF:15</td>
					         <td><span class="label label-success">Actif</span></td>
					         <th class="text-center" scope="row"><a href="#" onclick="JS"><img src="img/remove.png" alt="Retirer périphérique"></a></th>

					      </tr>
					      <tr>
					         <td>Jacob</td>
					         <td>Thornton</td>
					         <td><span class="label label-success">Actif</span></td>
					         <th class="text-center" scope="row"><a href="#" onclick="JS"><img src="img/remove.png" alt="Retirer périphérique"></a></th>
					      </tr>
					      <tr>
					         <td>Larry</td>
					         <td>the Bird</td>
					         <td><span class="label label-danger">Inactif</span></td>
					         <th class="text-center" scope="row"><a href="#" onclick="JS"><img src="img/remove.png" alt="Retirer périphérique"></a></th>
					      </tr>
					   </tbody>
					</table>
				</div>
			</div>
			
      <!-- Footer -->
      <?php include("footer.php") ?>
</body>
