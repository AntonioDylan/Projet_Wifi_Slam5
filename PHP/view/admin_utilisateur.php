<?php
require('../controlers/Bdd.php');
session_start();
if($_SESSION['ADMIN'] == '1'){
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

		$db = new Bdd();

		$queryEtudiant = $db->pdo->prepare('select *
			from adresse_mac
			inner join port_etudiant on idMel = mel
			where etat = 1
            ORDER BY nom ASC');

		$queryEtudiant->execute();

		$queryProfesseur = $db->pdo->prepare('select *
			from adresse_mac
			inner join port_professeur on idMel = mel
			where etat = 1
            ORDER BY nom ASC');

		$queryProfesseur->execute();
		?>
			<div class="page-header">
				<h1><i class="glyphicon glyphicon-list"></i> Périphériques validés <span class="badge"><?php echo $queryEtudiant->rowCount() ?></span></h1>
			</div>

			<div class="panel panel-info">
				<!-- Default panel contents -->
				<div class="panel-heading"><strong>	
                    Listes des utilisateurs
                </strong>
				</div>

				<table class="table table-striped">
					<thead>
						<tr>
						    <th>Utilisateur</th>
						    <th>Adresse MAC</th>
						    <th>Libelle</th>
						    <th>Date</th>
						    <th style="width:10%;">Supprimer</th>
						</tr>
					</thead>

					<tbody>
						<?php
            	if($queryEtudiant->rowCount() > 0) {
					while($row = $queryEtudiant->fetch(PDO::FETCH_ASSOC)) {

								echo "<tr>";
								echo "<td>". $row['nom'] . ' ' . $row['prenom'] . "</td>";
								echo "<td>" . $row['addr'] . "</td>";
								echo "<td>" . $row['libelle'] . "</td>";

								$date = $row['date'];
								$timestamp = strtotime($date);
								$date_formated = date('Y-m-d H:i:s', $timestamp);
								echo "<td>Le " . $row['date'] . "</td>";
								
								echo "<td class=\"text-center\"><a href=\"../controlers/removeMac.php?a=1&idMac=".$row['id']."\" alt=\"Retirer périphérique\"><i class=\"glyphicon glyphicon-remove\" style=\"color:red;font-size: 1.5em;\"></i></a></td>";
								echo "</tr>";

                    }
                }

                            	if($queryProfesseur->rowCount() > 0) {
					while($row = $queryProfesseur->fetch(PDO::FETCH_ASSOC)) {

								echo "<tr>";
								echo "<td>". $row['nom'] . ' ' . $row['prenom'] . "</td>";
								echo "<td>" . $row['addr'] . "</td>";
								echo "<td>" . $row['libelle'] . "</td>";

								$date = $row['date'];
								$timestamp = strtotime($date);
								$date_formated = date('Y-m-d H:i:s', $timestamp);
								echo "<td>Le " . $row['date'] . "</td>";
								
								echo "<td class=\"text-center\"><a href=\"../controlers/removeMac.php?a=1&idMac=".$row['id']."\" alt=\"Retirer périphérique\"><i class=\"glyphicon glyphicon-remove\" style=\"color:red;font-size: 1.5em;\"></i></a></td>";
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

<?php
}
else{
	header('location:../index.php');
}
?>
