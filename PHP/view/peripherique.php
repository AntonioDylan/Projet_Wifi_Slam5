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

			<?php
			if (isset($_SESSION['erreurMac']) && $_SESSION['erreurMac'] != null){
				?>
					<div class="alert alert-danger" style="margin:20px;margin-bottom:0px;"role="alert">

						 <center><i class="glyphicon glyphicon-lock"></i> <strong>Mauvaise adresse mac !</strong></center>
					</div>
					<?php
					unset($_SESSION['erreurMac']);
			}
			?>


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
						<th>Libellé</th>
						<th>Adresse MAC</th>
						<th>Statut</th>
						<th style="width:10%;">Supprimer</th>
					</tr>
				</thead>

				<tbody>
					<?php
					// Requête
					$db = new Bdd();
					$id = $_SESSION['ID'];
					$query = $db->pdo->prepare('select *
												from adresse_mac
												inner join port_etudiant on port_etudiant.num = adresse_mac.numEtudiant
												where adresse_mac.numEtudiant=:num');

					$query->bindParam(':num', $id, PDO::PARAM_INT);
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
								$etat['valeur'] = 'Inactif';
							}
							echo "<tr>";
							echo "<td id=". $id .">" . $row['libelle'] . "</td>";
							echo "<td id=". $id .">" . $row['addr'] . "</td>";
							echo "<td id=". $id ."><span class=\"label label-". $etat['label'] ."\">" . $etat['valeur'] . "</span></td>";
							echo "<td id=". $id ." class=\"text-center\"><a href=\"../controlers/removeMac.php?idMac=".$row['id']."\"><img src=\"../img/remove.png\" alt=\"Retirer périphérique\"></a></td>";
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
					<form id="addmacform" class="form-horizontal" role="form" method="post" action="../controlers/addmac.php">
						<label class="control-label" for="mac">Attention à ne pas se tromper !</label>
						<input id='txtmac' name="macAddr" type="text" class="form-control" placeholder="Adresse MAC">
						<label class="control-label" for="mac">Libellé:</label>
						<input id='txtlib' name="Libelle" type="text" class="form-control" placeholder="">
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
