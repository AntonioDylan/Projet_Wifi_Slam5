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
		$idMel = $_SESSION['MAIL'];
		$query = $db->pdo->prepare('select *
			from adresse_mac
			inner join '.$tableName.' on idMel = mel
			where idMel=:num');

		$query->bindParam(':num', $idMel, PDO::PARAM_STR);
		$query->execute();

			// Aucune adresse MAC
		if($query->rowCount() == 0){
			$_SESSION['noMacAddress'] = true;
		}
		else{
			$_SESSION['noMacAddress'] = false;
			
			?>
			<div class="page-header">
				<h1><i class="glyphicon glyphicon-list"></i> Gestion des périphériques <span class="badge"><?php echo $query->rowCount() ?></span></h1>
			</div>
			<div class="panel panel-info">
				<!-- Default panel contents -->
				<div class="panel-heading"><strong>
					<?php
					if(isset($_SESSION['NOM'])){
						echo $_SESSION['NOM'].' '.$_SESSION['PRENOM']. ' - '. (($_SESSION['ROLE'] == '0') ? "étudiant" : "professeur" );
					}
					?></strong>
				</div>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Libellé</th>
							<th>Adresse MAC</th>
							<th>Date</th>
							<th>Statut</th>
							<th style="width:10%;">Supprimer</th>
						</tr>
					</thead>

					<tbody>
						<?php


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
								echo "<td id=". $idMel .">" . $row['libelle'] . "</td>";
								echo "<td id=". $idMel .">" . $row['addr'] . "</td>";

								$date = $row['date'];
								$timestamp = strtotime($date);
								$date_formated = date('Y-m-d H:i:s', $timestamp);
								//echo $date_formated;
								echo "<td id=". $idMel .">Le " . $row['date'] . "</td>";
								
								echo "<td id=". $idMel ."><span class=\"label label-". $etat['label'] ."\">" . $etat['valeur'] . "</span></td>";
								echo "<td id=". $idMel ." class=\"text-center\"><a href=\"../controlers/removeMac.php?idMac=".$row['idMel']."\" alt=\"Retirer périphérique\"><i class=\"glyphicon glyphicon-remove\" style=\"color:red;font-size: 1.5em;\"></i></a></td>";
								echo "</tr>";
							}
						}
						?>
					</tbody>
				</table>
			</div>
			<?php 
		}
		?>

		<!-- Ajouter Periph -->
		<div class="page-header">
			<h1><i class="glyphicon glyphicon-check"></i> Ajouter périphérique</h1>
		</div>
		<div class="row">

			<?php
			if (isset($_SESSION['noMacAddress']) && $_SESSION['noMacAddress']){
				?>
				<div class="col-md-6 col-md-offset-3">
					<div class="bs-callout"> 
						<div class="col-md-2 col-xs-2 col-sm-1">
							<span class="glyphicon glyphicon-plus" style="color: #333;font-size: 2.2em;" aria-hidden="true"></span>
						</div>

						<h4>C'est ici que l'on ajoute de nouveau périphérique !</h4>
						<p>Entrez l'adresse MAC de votre périphérique pour l'enregistrer sur la borne.</p>
					</div>
				</div>
				<?php
			}
			?>

			<div class="col-md-4 col-md-offset-4">

				<div class="well">

					<form id="addmacform" class="form-horizontal" role="form" method="post" action="../controlers/addmac.php">
						<label class="control-label" for="macAddr">Attention à ne pas se tromper !</label>
						<input id='txtmac' name="macAddr" type="text" class="form-control" placeholder="Adresse MAC">
						<label class="control-label" for="Libelle">Libellé:</label>
						<input id='txtlib' name="Libelle" type="text" class="form-control" placeholder="">
						<label class="control-label" for="chkRep">Remplacer un existant ?</label>
						<input name="chkRep" type="checkbox" aria-label="...">
						<!-- A implémenter... -->
						<hr>
						<center><button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-phone" style="color: #333;" aria-hidden="true"></span>  Ajouter</button></center>
					</form>
				</div>
			</div>
		</div>

	</div>



	<!-- Footer -->
	<?php include("footer.php") ?>
</body>
