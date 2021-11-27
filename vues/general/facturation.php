<?php

	require_once './modele/ModelPlanning.php';

	$ville=$_GET['ville'];

	$idmanif = $_GET["id-manif"];
$ville=ModelPlanning::GetnomVille($idmanif)[0]['NomV'];
$IdS=ModelPlanning::GetnomVille($idmanif)[0]['IdS'];

$jour_an=ModelPlanning::GetPeriode($idmanif)['day_name'];
$mois_an=ModelPlanning::GetPeriode($idmanif)['month_name'];

$jour=ModelPlanning::TranslateDay($jour_an);
$mois=ModelPlanning::TranslateMonth($mois_an);

if (ModelPlanning::GetPayant($idmanif)==0){
	$prix=Gratuit;
}else{
	$prix=ModelPlanning::GetTarif($ville)['tarif'];
	}
setlocale (LC_TIME, 'fr_FR','fra');
$today = date("d/m/y");
?>

<html>
<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
	<body>
		<div class="titre">Acte d'engagement du locataire valant facturation</div>
		<center>
		    <div class="forms">
		      	<div class="container-form-asso">
					<p style="text-indent: 50%"><small><?php echo ModelPlanning::GetAdresseManif($idmanif)[0]['NomAs'];  ?><?php echo ModelPlanning::GetAdresseManif($idmanif)[0]['NomPre'];  ?>
					<?php echo ModelPlanning::GetAdresseManif($idmanif)[0]['PrenomPre'];  ?><?php echo ModelPlanning::GetAdresseManif($idmanif)[0]['AdrueSiegeAdmin'];  ?>
					<?php echo ModelPlanning::GetAdresseManif($idmanif)[0]['NomVSA'];  ?></small></p>
					<p style="text-align: left;">Je soussigné(e), sollicite de Monsieur le Maire délégué <?php echo ModelPlanning::GetnomVille($idmanif)[0]['NomV']; ?>, la réservation de la salle désignée ci-dessous:</p><p style="text-indent: -5%;"><b><?php echo ModelPlanning::GetSalle($idmanif)[0]['NomS'];  ?>
					, <?php echo ModelPlanning::GetSalle($idmanif)[0]['adresse'];  ?>, à <?php echo ModelPlanning::GetSalle($idmanif)[0]['NomV'];  ?></b></p>
					<p style="text-align: left;">Pour la période suivante : </p><p style="margin-right: 8em;">- <span translate="yes"><?php echo  $jour; ?></span> <?php echo ModelPlanning::GetPeriode($idmanif)['day']; ?> <?php echo $mois; ?>
					 <?php echo ModelPlanning::GetPeriode($idmanif)['year']; ?> <?php echo ModelPlanning::GetPeriode($idmanif)['HeureDebut']; ?> <?php echo ModelPlanning::GetPeriode($idmanif)['HeureFin']; ?></p>
					<p><?php echo ModelPlanning::GetRecup($ville)['recup'];  ?></P>
					<p style="margin-right: 8em;"><b> But de location : <?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NomM'];  ?></b></p>
					<p style="text-align: left;"> Au tarif suivant : <?php echo $prix; ?> Euros</p>
					<p style="text-align: left;"><b>Je m'engage :</b></p> <p style="text-align: left;"> 1/ A régler les prestations suivantes à la mairie d'Ecuelles, 45 rue Georges Villette, ECUELLES, 77250 MORET-LOING-ET-ORVANNE au 
					plus tard un mois avant la date de la réservation par chèque livellé à l'ordre du Trésor Public :</p>
					<p  style="margin-right: 15em;">- Coût de la location :<b><?php echo ModelPlanning::GetTarif($ville)['tarif'];?> €</b></p>
					<p style="text-align: left;">2/ A respecter la capacité <b>maximum </b>de cette salle qui est de<b> <?php echo ModelPlanning::Getpersonne($IdS)['capacite']; ?> personnes.</b><br><br>
					3/ A ranger et nettoyer la salle utilisée.<br><br>
					4/ Si la salle est laissée dans état de salissure important entraînant une augmentation du nombre d'heures de nettoyage, une facturation me sera adressée au prix
					de 36,40€ de l'heure.<br><br>
					5/ A respecter le règlement d'utilisation de la salle dont un exemplaire m'a été remis.</p><br>
					<p style="text-align: left;"><?php echo ModelPlanning::GetNote($ville)['note']; ?></p>
					<p  style="text-align: left;">Toute modification dans les prestations devra être signalée en Mairie d'ecuelles(salles, but de location,...), au 01.60.70.71.65</p>
					<p style="text-align: left;"> Acceptons la réservation ci-dessus sollicitée.</p>
					<p style="text-align: left;">Fait à ECUELLES, le <?php echo $today; ?></p><p style="text-align: left;"><b>Signature du locataire, </b></p>
					<p style="text-indent: 50%"> Le Maire délégué,</p>
					<br><br><br><br><br><br><br> 
					<p style="text-indent: 50%"><?php echo ModelPlanning::GetMaire($ville)['maire']; ?></p>
		      	</div>
		    </div>
		</center>
	</body>
</html>