<?php
	
	require_once './modele/ModelPlanning.php';

	$particulier = ModelPlanning::GetAllPart($_GET["id-particulier"])[0]['IdP'];
	echo "<script>window.location.href='index.php?action=options&manage=part'</script>";
	ModelPlanning::DelParticulierById($_GET["id-particulier"]);
	
?>