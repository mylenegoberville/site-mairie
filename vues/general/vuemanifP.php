<?php

	require_once './modele/ModelPlanning.php';

    echo '<br><a href="./vues/admin/edittypemanif.php">Retour</a>';

	$idmanif = $_GET["id-manif"];

?>

<html>
	<body>
		<div class="titre">Information sur la manifestation : "<?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NomM'];?>"	</div>
	    <div class="forms">
	      	<div class="container-form-part">
	      		<p>Nom Manifestation : <strong><?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NomM'];?></strong></p><br>

	      		<p>Publique : <strong><?php if(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['Publique']==1){echo "oui";}else{echo "non";} ?></strong></p><br>

	      		<p>Nombre de personnes prévues : <strong><?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NombrePersonne'];?></strong></p><br>

	      		<p>Heure de début : <strong><?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['HeureDebut'];?></strong></p><br>

	      		<p>Heure de fin : <strong><?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['HeureFin'];?></strong></p><br>

	      		<p>Type de manifestation : <strong><?php echo ModelPlanning::GetNomTypeManifByIdTypeManif(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['IdT'])[0][0] ?></strong></p><br>

	      		<p>Nom du particulier en charge : <strong><?php echo ModelPlanning::GetNomPrenomParticulierByIdP(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['idP'])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['idP'])[0][0] ?></strong></p><br>

	      		<p>Nom de la salle : <strong><?php echo ModelPlanning::GetNomSalleByIdSalle(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['IdS'])[0][0] ?></strong></p><br>

	      		<p>Date : <strong><?php echo ModelPlanning::GetJourByIdDate(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['id2'])[0][0]."/".ModelPlanning::GetMoisByIdDate(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['id2'])[0][0]."/".ModelPlanning::GetAnneeByIdDate(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['id2'])[0][0]; ?></strong></p><br>
	      	</div>
	    </div>
	</body>
</html>