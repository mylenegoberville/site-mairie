<?php
	
	require_once './modele/ModelPlanning.php';

	ModelPlanning::DeltarifPbyIdP($_GET["idtarifp"]);
		echo "<script>window.location.href='index.php?action=options&manage=tarif'</script>";

?>