<?php
require('../controlers/Bdd.php');
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<?php 
include("header.php");
?>
<body>

	<?php
	include("nav.php");
	?>

	<div class="container">

		<?php
			// Check erreur mac
		if (isset($_SESSION['erreurMac'])){
			unset($_SESSION['erreurMac']);
			?>
			<div class="alert alert-danger alert-dismissable fade in" style="margin:20px;margin-bottom:0px;"role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<center><i class="glyphicon glyphicon-remove"></i> <strong>Mauvaise adresse mac !</strong></center>
			</div>
			<?php

		}

		// Requête

		if($_SESSION['ROLE'] == '0'){
			$tableName = "port_etudiant";
		}
		else{
			$tableName = "port_professeur";
		}

		$db = new Bdd();

		$queryEtudiant = $db->pdo->prepare('select *
			from adresse_mac
			inner join port_etudiant on idMel = mel
			where etat = 0');

		$queryEtudiant->execute();

		$queryProfesseur = $db->pdo->prepare('select *
			from adresse_mac
			inner join port_professeur on idMel = mel
			where etat = 0');

		$queryProfesseur->execute();
		?>
			<div class="page-header">
				<h1><i class="glyphicon glyphicon-list"></i> Périphériques en attente de validation <span class="badge"><?php echo $queryEtudiant->rowCount() ?></span></h1>
			</div>
			
			<div class="panel panel-info">
				<!-- Default panel contents -->
				<div class="panel-heading"><strong>Périphériques</strong>
				</div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Utilisateur</th>
							<th>Role</th>
							<th>Libelle</th>
							<th>Adresse Mac</th>
							<th>Date</th>
							<th>Statut</th>
						</tr>
					</thead>

					<tbody>
						<?php

						if($queryEtudiant->rowCount() > 0) {
							while($row = $queryEtudiant->fetch(PDO::FETCH_ASSOC)) {

																echo "<tr>";
								echo "<td>" . $row['nom']. ' '. $row['prenom'] . "</td>";
								echo "<td>" . "Etudiant" . "</td>";
								echo "<td>" . $row['libelle']. "</td>";								
								echo "<td>" . $row['addr']. "</td>";	
								
								$date = $row['date'];
								$timestamp = strtotime($date);
								$date_formated = date('Y-m-d H:i:s', $timestamp);							
								echo "<td>" . $row['date'] . "</td>";								
								echo "<td> Valider/Refuser </td>";								
								echo "</tr>";
							}
						}
						if($queryProfesseur->rowCount() > 0) {
							while($row = $queryProfesseur->fetch(PDO::FETCH_ASSOC)) {

																echo "<tr>";
								echo "<td>" . $row['nom']. ' '. $row['prenom'] . "</td>";
								echo "<td>" . "Professeur" . "</td>";
								echo "<td>" . $row['libelle']. "</td>";								
								echo "<td>" . $row['addr']. "</td>";	
								
								$date = $row['date'];
								$timestamp = strtotime($date);
								$date_formated = date('Y-m-d H:i:s', $timestamp);							
								echo "<td>" . $row['date'] . "</td>";								
								echo "<td> Valider/Refuser </td>";								
								echo "</tr>";
							}
						}
						

						?>
					</tbody>
				</table>
			</div>

		</div>

	</div>



	<!-- Footer -->
	<?php include("footer.php") ?>
</body>
