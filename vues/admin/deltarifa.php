<?php
	
	require_once './modele/ModelPlanning.php';

	ModelPlanning::DeltarifAbyIdA($_GET["idtarifa"]);
		echo "<script>window.location.href='index.php?action=options&manage=tarif'</script>";

?>