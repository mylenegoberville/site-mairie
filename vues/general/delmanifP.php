<?php
	require_once './modele/ModelPlanning.php';

	if(isset($_POST['action'])) {

		if($_POST['action']=="delonce") {
			echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($_POST['IdS'])[0][0]."&id-jour=".ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['id2']."'</script>";
			ModelPlanning::DelManifestationByIdManif($_POST["IdManif"]);
		}

		if($_POST['action']=="delall") {
                $NomM = ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['NomM'];
			$HeureDebut = ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['HeureDebut'];
			$HeureFin = ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['HeureFin'];
			$Publique = ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['Publique'];
			$NombrePersonne = ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['NombrePersonne'];
			$IdT = ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['IdT'];
			$IdP = ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['idP'];
			$IdS = ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['IdS'];

			$lesmanifs = ModelPlanning::GetAllManifByAllInfoP($NomM,$HeureDebut,$HeureFin,$Publique,$NombrePersonne,$IdT,$IdP,$IdS);

			echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($_POST['IdS'])[0][0]."&id-jour=".ModelPlanning::GetAllInfoManifByIdManif($_POST["IdManif"])[0]['id2']."'</script>";

			for($i = 0; $i < count($lesmanifs); $i++) {
				$lid = $lesmanifs[$i]['IdM'];
				echo $lid."<br>";
				ModelPlanning::DelManifestationByIdManif($lid);
			}
		}
	}


	else {

	?>
	<html>
		<body>
			<?php

				$NomM = ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['NomM'];
				$HeureDebut = ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['HeureDebut'];
				$HeureFin = ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['HeureFin'];
				$Publique = ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['Publique'];
				$NombrePersonne = ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['NombrePersonne'];
				$IdT = ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['IdT'];
				$IdP = ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['idP'];
				$IdS = ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['IdS'];

				$lesmanifs = ModelPlanning::GetAllManifByAllInfoP($NomM,$HeureDebut,$HeureFin,$Publique,$NombrePersonne,$IdT,$IdP,$IdS);

				if( count($lesmanifs) > 1) {
			?>
	    			<div class="titre">Nous avons remarqué qu'il existe plusieurs entité de cette manifestation. Que voulez-vous faire ?</div>
	    			<div class="forms">
	      				<div class="container-form">
	        				<div class="form-delete">
	          					<div class="blanc"></div>
	          					<form action="" method="POST">
	          						<?php 
						              	echo '<input type="hidden" name="IdManif" value="'.$_GET["id-manif"].'">';
						              	echo '<input type="hidden" name="IdS" value="'.$IdS.'">';
	            					?>
	          						<button type="submit" name="action" value="delall">Supprimer toutes les entités</button>
	            					<button type="submit" name="action" value="delonce">Supprimer uniquement cette manifestation</button>
	          					</form>
	          				</div>
	          			</div>
	          		</div>
	        <?php
				}

				else {
					echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($IdS)[0][0]."&id-jour=".ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['id2']."'</script>";
					ModelPlanning::DelManifestationByIdManif($_GET["id-manif"]);
				}
	}
?>
		</body>
	</html>