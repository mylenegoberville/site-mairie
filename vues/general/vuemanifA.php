<?php

	require_once './modele/ModelPlanning.php';

	$ville=$_GET['ville'];
    echo "<br><a href='index.php?ville=".$ville."'>Retour</a>";

	$idmanif = $_GET["id-manif"];

?>

<html>
<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
	<body>
		<div class="titre">Information sur la manifestation : "<?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NomM'];?>"	</div>
	    <div class="forms">
	      	<div class="container-form-asso">
	      		<p>Nom Manifestation : <strong><?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NomM'];?></strong></p><br>

	      		<p>Publique : <strong><?php if(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['Publique']==1){echo "oui";}else{echo "non";} ?></strong></p><br>

	      		<p>Nombre de personnes prévues : <strong><?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NombrePersonne'];?></strong></p><br>

	      		<p>Heure de début : <strong><?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['HeureDebut'];?></strong></p><br>

	      		<p>Heure de fin : <strong><?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['HeureFin'];?></strong></p><br>

	      		<p>Type de manifestation : <strong><?php echo ModelPlanning::GetNomTypeManifByIdTypeManif(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['IdT'])[0][0] ?></strong></p><br>

	      		<p>Nom de l'association en charge : <strong><?php echo ModelPlanning::GetNomAsByIdAs(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['IdAs'])[0][0] ?></strong></p><br>

	      		<p>Nom de la salle : <strong><?php echo ModelPlanning::GetNomSalleByIdSalle(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['IdS'])[0][0] ?></strong></p><br>

	      		<p>Date : <strong><?php echo ModelPlanning::GetJourByIdDate(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['id2'])[0][0]."/".ModelPlanning::GetMoisByIdDate(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['id2'])[0][0]."/".ModelPlanning::GetAnneeByIdDate(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['id2'])[0][0]; ?></strong></p><br>
	      	</div>
	    </div>
	</body>
</html>
		<?php echo '<a href="index.php?action=facturation&id-manif='.$idmanif.'">Facturation'; ?>