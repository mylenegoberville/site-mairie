<?php
	
	require_once './modele/ModelPlanning.php';

	$associations = ModelPlanning::GetAllAsso($_GET["id-associations"])[0]['idAs'];
	echo "<script>window.location.href='index.php?action=options&manage=asso'</script>";
	ModelPlanning::DelAssociationById($_GET["id-associations"]);
	
?>