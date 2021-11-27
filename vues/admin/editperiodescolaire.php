<?php
require_once './modele/ModelPlanning.php';

$i=0;
$periode_scolaire=$_GET["periode scolaire"];
$liste_periode_scolaire = ModelPlanning::GetAllPeriodeScolaire();
?>
<html>
	<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
	<body>
		<div class="btns"><a href="index.php?action=addperiodescolaire" class="btn green"><strong>+</strong> Ajout Periode Scolaire</a></div>
		<br>
		<table class="table-fill">
			<thead>
				<tr>
					<th>Début Année Scolaire</th>
					<th>Debut Vacances toussaint</th>
					<th>Fin Vacances toussaint</th>
					<th>Debut Vacances Noel</th>
					<th>Fin Vacances Noel</th>
					<th>Debut Vacances d'Hiver</th>
					<th>Fin Vacances d'Hiver</th>
					<th>Debut Vacances Printemps</th>
					<th>Fin Vacances Printemps</th>
					<th>Fin Année scolaire</th>
					<th>Supprimer</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php for($i = 0; $i < count($liste_periode_scolaire); $i++){?>
			    	<tr>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['DateDebut'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['DateDebut'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['DateDebut'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['Vac1Debut'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['Vac1Debut'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['Vac1Debut'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['Vac1Fin'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['Vac1Fin'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['Vac1Fin'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['Vac2Debut'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['Vac2Debut'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['Vac2Debut'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['Vac2Fin'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['Vac2Fin'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['Vac2Fin'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['Vac3Debut'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['Vac3Debut'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['Vac3Debut'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['Vac3Fin'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['Vac3Fin'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['Vac3Fin'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['Vac4Debut'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['Vac4Debut'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['Vac4Debut'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['Vac4Fin'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['Vac4Fin'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['Vac4Fin'])[0][0];?></td>
			    		<td><?php echo ModelPlanning::GetJourByIdDate($liste_periode_scolaire[$i]['DateFin'])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_periode_scolaire[$i]['DateFin'])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_periode_scolaire[$i]['DateFin'])[0][0];?></td>
			    		<?php echo "<td><a href='index.php?action=delperiodescolaire&id-periode=".$liste_periode_scolaire[$i][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>"; ?>
			    	</tr>
		    	<?php }  ?>

		    </tbody>
		</table>
	</body>
</html>