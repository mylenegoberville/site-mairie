<?php
	
	require_once './modele/ModelPlanning.php';

	$periode_scolaire = ModelPlanning::GetAllPeriodeScolaire($_GET["id-periode"])[0]['IdPS'];
	echo "<script>window.location.href='index.php?action=options&manage=persco'</script>";
	ModelPlanning:: DelPeriodeScolaireById($_GET["id-periode"]);
	
?>