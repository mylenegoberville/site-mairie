<?php
	
	require_once './modele/ModelPlanning.php';

	ModelPlanning::DelsallesByIdsalles($_GET["id-salles"]);
		echo "<script>window.location.href='index.php?action=options&manage=salles'</script>";

?>