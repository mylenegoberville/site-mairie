<?php
	
	require_once './modele/ModelPlanning.php';

	$typemanif = ModelPlanning::GetAllTypeManif($_GET["id-type-manif"])[0]['IdT'];
	echo "<script>window.location.href='index.php?action=options&manage=type-manif'</script>";
	ModelPlanning::DelTypeManifByIdTypeManif($_GET["id-type-manif"]);

?>