<?php

require_once './modele/ModelPlanning.php';
/*if(isset($_SESSION['idSalle']))
{
	$idSalleS = $_SESSION['idSalle'];
}

$i=0;
$ville = $_GET["ville"];
$_SESSION['ville'] = $ville;
$liste_batiment = ModelPlanning::GetIdBatimentsByNomVille($ville);


if(isset($planningPartiel))
{
    $_SESSION['planningPartiel'] = $planningPartiel;
    $planningPartiel = $_SESSION['planningPartiel'];
    echo "planning : ".$planningPartiel;
}

if(!isset($_GET["id_jour_debut"])){
	if(isset($_POST["Jour"]) && isset($_POST["Mois"]) && isset($_POST["An"])) {
		$db_datejour = ModelPlanning::GetDbDateByAllInfo($_POST["Jour"],$_POST["Mois"],$_POST["An"]);
	}else {
		if(isset($_GET["id-jour"])) {
			$db_datejour = ModelPlanning::GetDbDateById2($_GET["id-jour"]);
		}
		else {
			$db_datejour = ModelPlanning::GetDbDateJour();
		}
	}
	$info_datejour = ModelPlanning::GetId2EtDayByDbDate($db_datejour[0][0]);
	$jour_semaine = $info_datejour[0][0];
	$id_jour_debut = $info_datejour[0][1];
	$id_jour_recherche = $id_jour_debut;

	if($jour_semaine==1){
		$id_jour_debut=$id_jour_debut-6;
	}
	else {
		while($jour_semaine!=2){
		$id_jour_debut = $id_jour_debut - 1;
		$jour_semaine = $jour_semaine - 1;
		}
	}

}
else {
	$id_jour_debut = $_GET["id_jour_debut"];
}

$id_jour2 = $id_jour_debut+1;
$id_jour3 = $id_jour_debut+2;
$id_jour4 = $id_jour_debut+3;
$id_jour5 = $id_jour_debut+4;
$id_jour6 = $id_jour_debut+5;
$id_jour7 = $id_jour_debut+6;

$id_semaine_prec = $id_jour_debut-7;
$id_semaine_suiv = $id_jour_debut+7;

$liste_jour = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
$liste_mois = array("Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");
$liste_an = array(2018);
for($i = 2019; $i != 2201; $i++) {
	array_push($liste_an, $i);
}

echo "COUCOUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU";
?>
<html>
	<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
    <link rel="stylesheet" type="text/css" href="assets/css/impression.css" media="print">
	<body>
		<?php if(isset($_GET["ville"])) { ?>
			<p class="semaines"><?php echo '<a href="index.php?ville='.$ville.'&id_jour_debut='.$id_semaine_prec.'"><- Semaine précédente</a> | Semaine n°'.ModelPlanning::GetSemaineByIdDate($id_jour_debut)[0][0].' du '.ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0].' au '.ModelPlanning::GetJourByIdDate($id_jour7)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour7)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour7)[0][0].' | <a href="index.php?ville='.$ville.'&id_jour_debut='.$id_semaine_suiv.'">Semaine suivante -></a>' ?></p>

			<div class="form-ajout">
				<?php echo '<form action="index.php?ville='.$ville.'" method="POST">'; ?>
					<select name="Jour" size="1">
						<?php
							for($i = 0; $i < count($liste_jour); $i++) {
								if($liste_jour[$i]==ModelPlanning::GetJourByIdDate($id_jour_recherche)[0][0]){
									echo "<option value='".$liste_jour[$i]."'' selected>".$liste_jour[$i]."</option>";
								}
								else {
									echo "<option value='".$liste_jour[$i]."''>".$liste_jour[$i]."</option>";
								}
							}
						?>
					</select>
					<select name="Mois" size="1">
						<?php
							for($i = 0; $i < count($liste_mois); $i++) {
								$valeur=$i+1;
								if($valeur==ModelPlanning::GetMoisByIdDate($id_jour_recherche)[0][0]){
									echo "<option value='".$valeur."'' selected>".$liste_mois[$i]."</option>";
								}
								else {
									echo "<option value='".$valeur."''>".$liste_mois[$i]."</option>";
								}
							}
						?>
					</select>
					<select name="An" size="1">
						<?php
							for($i = 0; $i < count($liste_an); $i++) {
								if($liste_an[$i]==ModelPlanning::GetAnneeByIdDate($id_jour_recherche)[0][0]){
									echo "<option value='".$liste_an[$i]."'' selected>".$liste_an[$i]."</option>";
								}
								else {
									echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
								}
							}
						?>
					</select>
					<input type="submit">
				</form>
			</div>
            <div class="img"><a href="javascript:window.print()"><img src="https://png.icons8.com/ios/30/000000/print-filled.png"></a></div>
			<?php //for($i = 0; $i < count($liste_batiment); $i++) { ?>
				<p class="nom-batiment"><?php echo ModelPlanning::GetNomBatimentByIdBatiment($liste_batiment["IdB"])[0][0]; ?></p>
				<?php 
					//$_SESSION['idBat'.$liste_batiment[$i]["IdB"]] = $liste_batiment[$i]["IdB"]; 
					echo "<div id=".$liste_batiment["IdB"]."></div> : ".$_SESSION['idBat'.$liste_batiment["IdB"]];
				?>
				<div id="<?php echo $idBatS; ?>" ></div>
				<table class="table-fill">
					<thead>
						<tr>
							<th>Salle \ Jour</th>
							<th>Lundi<br> <?php echo ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0]; ?> </th>
							<th>Mardi<br> <?php echo ModelPlanning::GetJourByIdDate($id_jour2)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour2)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour2)[0][0]; ?> </th>
							<th>Mercredi<br> <?php echo ModelPlanning::GetJourByIdDate($id_jour3)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour3)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour3)[0][0]; ?> </th>
							<th>Jeudi<br> <?php echo ModelPlanning::GetJourByIdDate($id_jour4)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour4)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour4)[0][0]; ?> </th>
							<th>Vendredi<br> <?php echo ModelPlanning::GetJourByIdDate($id_jour5)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour5)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour5)[0][0]; ?> </th>
							<th>Samedi<br> <?php echo ModelPlanning::GetJourByIdDate($id_jour6)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour6)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour6)[0][0]; ?> </th>
							<th>Dimanche<br> <?php echo ModelPlanning::GetJourByIdDate($id_jour7)[0][0]."/".ModelPlanning::GetMoisByIdDate($id_jour7)[0][0]."/".ModelPlanning::GetAnneeByIdDate($id_jour7)[0][0]; ?> </th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$liste_salle = ModelPlanning::GetIdSalleByIdBatiment($liste_batiment["IdB"]);
							for($e = 0; $e < count($liste_salle); $e++) {
						?>
								<tr>
									<th><?php echo ModelPlanning::GetNomSalleByIdSalle($liste_salle[$e]["IdS"])[0][0]; ?></th>
									<?php echo '<td onClick="'; echo "document.location.href='index.php?action=rendezvous&maj=ajout&salle=".$liste_salle[$e]["IdS"]."&batiment=".$_SESSION['idBat'.$liste_batiment["IdB"]]."&jour=".$id_jour_debut."&nbjour=".ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."&mois=".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."&an=".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0]."&ville=".$ville."'"; echo '"';?>
										<p> 
											<?php
												$liste_event=ModelPlanning::GetAllManifById2AndIdS($id_jour_debut,$liste_salle[$e]["IdS"]);
												for($u = 0; $u < count($liste_event); $u++) {
													if(is_null($liste_event[$u]["IdAs"])) {
														echo "<div class='event-part'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
													else {
														echo "<div class='event-asso'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomAsByIdAs($liste_event[$u]["IdAs"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifA&maj=vue&id-manif=".$liste_event[$u][0]."&ville=".$ville."';'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifA&maj=edit&id-manif=".$liste_event[$u][0]."&idSalle=".$liste_salle[$e]["IdS"]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifA&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
												}
											?>
										</p>
									</td>

									<?php echo '<td onClick="'; echo "document.location.href='index.php?action=rendezvous&maj=ajout&salle=".$liste_salle[$e]["IdS"]."&jour=".$id_jour2."&nbjour=".ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."&mois=".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."&an=".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0]."&ville=".$ville."'"; echo '"';?>
										<p>
											<?php
												$liste_event=ModelPlanning::GetAllManifById2AndIdS($id_jour2,$liste_salle[$e]["IdS"]);
												for($u = 0; $u < count($liste_event); $u++) {
													if(is_null($liste_event[$u]["IdAs"])) {
														echo "<div class='event-part'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
													else {
														echo "<div class='event-asso'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomAsByIdAs($liste_event[$u]["IdAs"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifA&maj=vue&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifA&maj=edit&id-manif=".$liste_event[$u][0]."&idSalle=".$liste_salle[$e]["IdS"]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifA&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
												}
											?>
										</p>
									</<td>

									<?php echo '<td onClick="'; echo "document.location.href='index.php?action=rendezvous&maj=ajout&salle=".$liste_salle[$e]["IdS"]."&jour=".$id_jour3."&nbjour=".ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."&mois=".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."&an=".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0]."&ville=".$ville."'"; echo '"';?>
										<p>
											<?php
												$liste_event=ModelPlanning::GetAllManifById2AndIdS($id_jour3,$liste_salle[$e]["IdS"]);
												for($u = 0; $u < count($liste_event); $u++) {
													if(is_null($liste_event[$u]["IdAs"])) {
														echo "<div class='event-part'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
													else {
														echo "<div class='event-asso'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomAsByIdAs($liste_event[$u]["IdAs"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifA&maj=vue&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifA&maj=edit&id-manif=".$liste_event[$u][0]."&idSalle=".$liste_salle[$e]["IdS"]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifA&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
												}
											?>
										</p>
									</td>

									<?php echo '<td onClick="'; echo "document.location.href='index.php?action=rendezvous&maj=ajout&salle=".$liste_salle[$e]["IdS"]."&jour=".$id_jour4."&nbjour=".ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."&mois=".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."&an=".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0]."&ville=".$ville."'"; echo '"';?>
										<p>
											<?php
												$liste_event=ModelPlanning::GetAllManifById2AndIdS($id_jour4,$liste_salle[$e]["IdS"]);
												for($u = 0; $u < count($liste_event); $u++) {
													if(is_null($liste_event[$u]["IdAs"])) {
														echo "<div class='event-part'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
													else {
														echo "<div class='event-asso'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomAsByIdAs($liste_event[$u]["IdAs"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifA&maj=vue&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifA&maj=edit&id-manif=".$liste_event[$u][0]."&idSalle=".$liste_salle[$e]["IdS"]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifA&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
												}
											?>
										</p>
									</td>

									<?php echo '<td onClick="'; echo "document.location.href='index.php?action=rendezvous&maj=ajout&salle=".$liste_salle[$e]["IdS"]."&jour=".$id_jour5."&nbjour=".ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."&mois=".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."&an=".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0]."&ville=".$ville."'"; echo '"';?>
										<p>
											<?php
												$liste_event=ModelPlanning::GetAllManifById2AndIdS($id_jour5,$liste_salle[$e]["IdS"]);
												for($u = 0; $u < count($liste_event); $u++) {
													if(is_null($liste_event[$u]["IdAs"])) {
														echo "<div class='event-part'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
													else {
														echo "<div class='event-asso'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomAsByIdAs($liste_event[$u]["IdAs"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifA&maj=vue&id-manif=".$liste_event[$u][0]."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifA&maj=edit&id-manif=".$liste_event[$u][0]."&idSalle=".$liste_salle[$e]["IdS"]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifA&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
												}
											?>
										</p>
									</td>

									<?php echo '<td onClick="'; echo "document.location.href='index.php?action=rendezvous&maj=ajout&salle=".$liste_salle[$e]["IdS"]."&jour=".$id_jour6."&nbjour=".ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."&mois=".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."&an=".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0]."&ville=".$ville."'"; echo '"';?>
										<p>
											<?php
												$liste_event=ModelPlanning::GetAllManifById2AndIdS($id_jour6,$liste_salle[$e]["IdS"]);
												for($u = 0; $u < count($liste_event); $u++) {
													if(is_null($liste_event[$u]["IdAs"])) {
														echo "<div class='event-part'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
													else {
														echo "<div class='event-asso'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomAsByIdAs($liste_event[$u]["IdAs"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifA&maj=vue&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifA&maj=edit&id-manif=".$liste_event[$u][0]."&idSalle=".$liste_salle[$e]["IdS"]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifA&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
												}
											?>
										</p>
									</td>

									<?php echo '<td onClick="'; echo "document.location.href='index.php?action=rendezvous&maj=ajout&salle=".$liste_salle[$e]["IdS"]."&jour=".$id_jour7."&nbjour=".ModelPlanning::GetJourByIdDate($id_jour_debut)[0][0]."&mois=".ModelPlanning::GetMoisByIdDate($id_jour_debut)[0][0]."&an=".ModelPlanning::GetAnneeByIdDate($id_jour_debut)[0][0]."&ville=".$ville."'"; echo '"';?>
										<p>
											<?php
												$liste_event=ModelPlanning::GetAllManifById2AndIdS($id_jour7,$liste_salle[$e]["IdS"]);
												for($u = 0; $u < count($liste_event); $u++) {
													if(is_null($liste_event[$u]["IdAs"])) {
														echo "<div class='event-part'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP($liste_event[$u]["idP"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifP&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifP&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
													else {
														echo "<div class='event-asso'><div class='event'><strong>".$liste_event[$u]["NomM"]."</strong><br>".ModelPlanning::GetNomAsByIdAs($liste_event[$u]["IdAs"])[0][0]."<br>".$liste_event[$u]["HeureDebut"]." - ".$liste_event[$u]["HeureFin"]."<br><a href='index.php?action=vuemanifA&maj=vue&id-manif=".$liste_event[$u][0]."&ville=".$ville."'><i class='fa fa-file-text-o' aria-hidden='true'></i></a><a href='index.php?action=editmanifA&maj=edit&id-manif=".$liste_event[$u][0]."&idSalle=".$liste_salle[$e]["IdS"]."&ville=".$ville."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delmanifA&id-manif=".$liste_event[$u][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></div></div>";
													}
												}
											?>
										</p>
									</td>
								</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } 
			//} 
		?>
	</body>
</html>*/

echo "BEEEEEEEEEN";
?>