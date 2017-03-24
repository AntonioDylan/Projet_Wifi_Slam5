<?php 
require('../controlers/Bdd.php');
session_start(); 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>

	<?php 
	include("nav.php");
	?>

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
				?>
			</div>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>Propriétaire</th>
						<th>Adresse MAC</th>
						<th>Statut</th>
						<th style="width:10%;">Supprimer</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
					// Requête
					$db = new Bdd();
					$query = $db->pdo->prepare('select * 
												from adresse_mac 
												inner join port_etudiant on port_etudiant.num = adresse_mac.numEtudiant 
												where adresse_mac.numEtudiant=:num');

					$query->bindParam(':num', $_SESSION['ID'], PDO::PARAM_INT);
					$query->execute();

					if($query->rowCount() > 0) {
						while($row = $query->fetch(PDO::FETCH_ASSOC)) {

							$etat = array();
							if ($row['etat'] == 1){
								$etat['label'] = 'success';
								$etat['valeur'] = 'Actif';
							}
							else{
								$etat['label'] = 'danger';
								$etat['valeur'] = 'Inatif';
							}
							
							echo "<tr>";
							echo "<td>" . $row['nom'].' '.$row['prenom'] . "</td>";
							echo "<td>" . $row['addr'] . "</td>";
							echo "<td><span class=\"label label-". $etat['label'] ."\">" . $etat['valeur'] . "</span></td>";
							echo "<td class=\"text-center\"><a href=\"#\"><img src=\"img/remove.png\" alt=\"Retirer périphérique\"></a></td>";
							echo "</tr>";
						}
					}
					?>
				</tbody>
			</table>
		</div>

		<!-- Ajouter Periph -->


		<div class="page-header">
			<h1>Ajouter périphérique</h1>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="well">
					<form class="form-horizontal">
						<label class="control-label" for="mac">Adresse MAC:</label>
						<input type="text" class="form-control" placeholder="Adresse MAC">
						<hr>
						<center><button type="submit" class="btn btn-default">Ajouter</button></center>
					</form>
				</div>
			</div>
		</div>

	</div>



	<!-- Footer -->
	<?php include("footer.php") ?>
</body>