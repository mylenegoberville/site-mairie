<?php

require_once './modele/ModelPlanning.php';

echo "<br>";
$ville=$_GET["ville"];
//$planningPartiel = "planningPartiel";


//Récupère l'ID du batiment après que l'utilisateur est cliqué sur une case pour ajouter une manifestation (sera utile pour directement rediriger la personne sur le bâtiment qu'elle a modifié)
if(isset($_GET['batiment']))
{
    $_SESSION['idBat'.$liste_batiment[$i]["IdB"]] = $_GET['batiment'];
    $idBatS = $_SESSION['idBat'.$liste_batiment[$i]["IdB"]];
    echo "idBatS : ".$idBatS;
}

/*if(isset($planningPartiel))
{
    $_SESSION['planningPartiel'] = $planningPartiel;
    $planningPartiel = $_SESSION['planningPartiel'];
    echo "planning : ".$planningPartiel;
}*/
echo "<br><a href='index.php?ville=".$ville."&batiment=".$idBatS."'>Retour</a>";

$salle = isset($_GET["salle"]) ? $_GET['salle'] : NULL;

$salle = !empty($_GET['salle']) ? $_GET['salle'] : NULL;

$jour = isset($_GET["jour"]) ? $_GET['jour'] : NULL;

$jour = !empty($_GET['jour']) ? $_GET['jour'] : NULL;

$liste_asso = ModelPlanning::GetIdAsso();
$liste_type_manif = ModelPlanning::GetIdTypeManif();
$liste_part = ModelPlanning::GetIdParticulier();
$liste_heure = array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23");
$liste_minute = array("00","05","10","15","20","25","30","35","40","45","50","55");
$liste_jour2 = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);

$jour2 = $jour - 7;
$liste_jour = array();
for($i = 0; $i < 101; $i++) {
    $jour2 = $jour2 + 7;
    array_push($liste_jour, $jour2);
}
$liste_an=array();
for($i = 2019; $i != 2201; $i++) {
	array_push($liste_an, $i);
}

if(isset($_POST["HeureDebut"]) && isset($_POST["MinuteDebut"])) {
    $HeureDebut = $_POST["HeureDebut"].":".$_POST["MinuteDebut"];
}

if(isset($_POST["HeureFin"]) && isset($_POST["MinuteFin"])) {
    $HeureFin = $_POST["HeureFin"].":".$_POST["MinuteFin"];
}

//On compte le nombre de salles de la ville pour pouvoir afficher le bon nombre de checkbox
$nbrSalle = ModelPlanning::countSalleVille($ville);
echo "nbrSalle : ".$nbrSalle[0];

//Va être utilisé pour afficher le nom des salles au dessus des checkbox
$nomSalle = ModelPlanning::getAllNomSalle($ville);
//print_r($nomSalle);

if(isset($_POST["NomM"]) && isset($_POST["Publique"]) && isset($_POST["NbrPublique"]) && isset($_POST["IdTypeManif"]) && isset($_POST["IdJour"]) && isset($_POST["IdSalle"]) && isset($_POST["action"]) && isset($_POST["Comment"])) {

    if($_POST["action"]=="recurvac") {
        $periodes = ModelPlanning::GetAllPeriodeScolaire();
        $lejour = $_POST["IdJour"];

        for($i = 0; $i < count($periodes); $i++) {
            if($lejour > $periodes[$i]["DateDebut"] && $lejour < $periodes[$i]["DateFin"]) {
                $Fin = $periodes[$i]["DateFin"];
            }
        }
        if(isset($_POST["IdAs"])) {
            for($i = $lejour; $i < $Fin; $i = $i + 7) {
                ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$i,$_POST["Comment"]);
                echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($_POST["IdSalle"])[0][0]."&id-jour=".$_POST["IdJour"]."'</script>";
            }
        }

        if(isset($_POST["IdP"])) {
            for($i = $lejour; $i < $Fin; $i = $i + 7) {
                ModelPlanning::AddManifP($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdP"],$_POST["IdSalle"],$i,$_POST["Comment"]);
                echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($_POST["IdSalle"])[0][0]."&id-jour=".$_POST["IdJour"]."'</script>";
            }
        }
        else {
            echo "Les dates pour cette période scolaire ne sont pas enregistrées.";
        }
    }

    if($_POST["action"]=="recur") {
        $periodes = ModelPlanning::GetAllPeriodeScolaire();
        $lejour = $_POST["IdJour"];

        for($i = 0; $i < count($periodes); $i++) {
            if($lejour > $periodes[$i]["DateDebut"] && $lejour < $periodes[$i]["DateFin"]) {

                $Vac1Debut = $periodes[$i]["Vac1Debut"];
                $Vac1Fin = $periodes[$i]["Vac1Fin"];

                $Vac2Debut = $periodes[$i]["Vac2Debut"];
                $Vac2Fin = $periodes[$i]["Vac2Fin"];

                $Vac3Debut = $periodes[$i]["Vac3Debut"];
                $Vac3Fin = $periodes[$i]["Vac3Fin"];

                $Vac4Debut = $periodes[$i]["Vac4Debut"];
                $Vac4Fin = $periodes[$i]["Vac4Fin"];

                $Fin = $periodes[$i]["DateFin"];

                $liste_vac = array();
            }
        }

        if(isset($Fin)) {
            for($i = $Vac1Debut; $i < $Vac1Fin; $i++) {
                array_push($liste_vac, $i);
            }

            for($i = $Vac2Debut; $i < $Vac2Fin; $i++) {
                array_push($liste_vac, $i);
            }

            for($i = $Vac3Debut; $i < $Vac3Fin; $i++) {
                array_push($liste_vac, $i);
            }

            for($i = $Vac4Debut; $i < $Vac4Fin; $i++) {
                array_push($liste_vac, $i);
            }

            if(isset($_POST["IdAs"])) {
                for($i = $lejour; $i < $Fin; $i = $i + 7) {
                    if(!in_array($i, $liste_vac)) {
                        ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$i,$_POST["Comment"]);
                        echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($_POST["IdSalle"])[0][0]."&id-jour=".$_POST["IdJour"]."'</script>";
                    }
                }
            }

            if(isset($_POST["IdP"])) {
                for($i = $lejour; $i < $Fin; $i = $i + 7) {
                    if(!in_array($i, $liste_vac)) {
                        ModelPlanning::AddManifP($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdP"],$_POST["IdSalle"],$i,$_POST["Comment"]);
                        echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($_POST["IdSalle"])[0][0]."&id-jour=".$_POST["IdJour"]."'</script>";
                    }
                }
            }
        }
        else {
            echo "Les dates pour cette période scolaire ne sont pas enregistrées.";
        }
    }

    if($_POST["action"]=="valid") {
        if(isset($_POST["IdAs"])) {
            if($_POST["Recurence"] == '0') {
				 $choix=$_POST['choixsalle'];
				 $choix[]=$_POST["IdSalle"];
				 for($i=0;$i<count($choix);$i++){
					 echo 'choix'.$choix[$i];
                ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$choix[$i],$_POST["IdJour"],$_POST["Comment"]);
				 }
			}
            if($_POST["Recurence"]=='jour') {
               // ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$_POST["IdJour"],$_POST["Comment"]);
                $lejour = $_POST["IdJour"];
				echo $lejour;
				if(isset($_POST["jour"])){
					$nb=$_POST["jour"];
					//echo $nb;
					for($i=0; $i<$nb;$i++){
						$id2=$lejour+$i;
						ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$id2);
					}
				}
				
                for($i = 0; $i < $_POST["Recurence"]; $i++) {
                    $lejour = $lejour + 7;
                    ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$lejour,$_POST["Comment"]);
                }
            }
			 if($_POST["Recurence"]=='parmois') {
               // ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$_POST["IdJour"],$_POST["Comment"]);
                $lemois = $_GET["mois"];
						$nb=$_POST['nbmois'];
					for ($i=0; $i<$nb;$i++){
						$r=$lemois+$i;
						$jour=$_GET['nbjour'];
						$lannee = $_GET["an"];
						$place=ModelPlanning::GetId2ByMois($r,$jour,$lannee);
						ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$place[0]);
					}
				}				
						 if($_POST["Recurence"]=='parans') {
               // ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$_POST["IdJour"],$_POST["Comment"]);
                $lannee = $_GET["an"];
				if(isset($_POST["typean"])){
					if($_POST['typean']=='tjs'){
					$jour=$_GET['nbjour'];
					$mois=$_GET['mois'];
					//echo $nb;
					$j=0;
					for($i=$lannee; $i<2022;$i++){
						$year=$lannee+$j;
						$j++;
						$place=ModelPlanning::GetId2ByMois($mois,$jour,$year);
						ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$place[0]);
					}
					}
					if($_POST['typean']=='date'){
					$jour=$_GET['nbjour'];
					$mois=$_GET['mois'];
					//echo $nb;
					$j=0;
//$datefin=$_POST['$liste_an[$i]'];
					$datefin=$_POST['choixdate'];
					for($i=$lannee; $i<=$datefin;$i++){
						$year=$lannee+$j;
						$j++;
						$place=ModelPlanning::GetId2ByMois($mois,$jour,$year);
						ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$place[0]);
					}
					}
				}
            }
			 }
		
        if(isset($_POST["IdP"])) {
                       if($_POST["Recurence"] == '0') {
						  
                ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$_POST["IdJour"],$_POST["Comment"]);
            }
            if($_POST["Recurence"]=='jour') {
               // ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$_POST["IdJour"],$_POST["Comment"]);
                $lejour = $_POST["IdJour"];
				echo $lejour;
				if(isset($_POST["jour"])){
					$nb=$_POST["jour"];
					//echo $nb;
					for($i=0; $i<$nb;$i++){
						$id2=$lejour+$i;
						ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$id2);
					}
				}
				
                for($i = 0; $i < $_POST["Recurence"]; $i++) {
                    $lejour = $lejour + 7;
                    ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$lejour,$_POST["Comment"]);
                }
            }
			 if($_POST["Recurence"]=='parmois') {
               // ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$_POST["IdJour"],$_POST["Comment"]);
                $lemois = $_GET["mois"];
						$nb=$_POST['nbmois'];
					for ($i=0; $i<$nb;$i++){
						$r=$lemois+$i;
						$jour=$_GET['nbjour'];
						$lannee = $_GET["an"];
						$place=ModelPlanning::GetId2ByMois($r,$jour,$lannee);
						ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$place[0]);
					}
				}				
						 if($_POST["Recurence"]=='parans') {
               // ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$_POST["IdJour"],$_POST["Comment"]);
                $lannee = $_GET["an"];
				if(isset($_POST["typean"])){
					if($_POST['typean']=='tjs'){
					$jour=$_GET['nbjour'];
					$mois=$_GET['mois'];
					//echo $nb;
					$j=0;
					for($i=$lannee; $i<2022;$i++){
						$year=$lannee+$j;
						$j++;
						$place=ModelPlanning::GetId2ByMois($mois,$jour,$year);
						ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$place[0]);
					}
					}
					if($_POST['typean']=='date'){
					$jour=$_GET['nbjour'];
					$mois=$_GET['mois'];
					//echo $nb;
					$j=0;
//$datefin=$_POST['$liste_an[$i]'];
					$datefin=$_POST['choixdate'];
					for($i=$lannee; $i<=$datefin;$i++){
						$year=$lannee+$j;
						$j++;
						$place=ModelPlanning::GetId2ByMois($mois,$jour,$year);
						ModelPlanning::AddManifA($_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$_POST["IdSalle"],$place[0]);
					}
					}
				}
            }
			 }
	}
      // echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($_POST["IdSalle"])[0][0]."&id-jour=".$jour."'</script>";
    
	}
else {

?>

<html>
	<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
    <link rel="stylesheet" type="text/css" href="assets/css/impression.css" media="print">
<body>
<!--TEST BOOTSTRAP-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
<div class="titre">Ajouter une manifestation</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Manifestation pour association</div>
            <form action="" method="POST">
                <div class="blanc"></div>
                Nom manifestation<br>
                <input type="text" placeholder="Nom Manifestation" name="NomM"><br>

                <div class="blanc"></div>
                Publique ?<br>
                <select name="Publique" size="1">
                    <option value=0>Oui</option>
                    <option value=1>Non</option>
                </select>

                <br>

                <div class="blanc"></div>
                Nombre de personnes prévues<br>
                <input type="text" placeholder="Personnes prévues" name="NbrPublique"><br>

                <div class="blanc"></div>
                Nom de l'association<br>
                <select name="IdAs" size="1">
                    <?php
                    for($i = 0; $i < count($liste_asso); $i++) {
                        echo "<option value='".$liste_asso[$i][0]."'>".ModelPlanning::GetNomAsByIdAs($liste_asso[$i][0])[0][0]."</option>";
                    }
                    ?>
                </select>

                <br>

                <div class="blanc"></div>
                Type de manifestation<br>
                <select name="IdTypeManif" size="1">
                    <?php
                    for($i = 0; $i < count($liste_type_manif); $i++) {
                        echo "<option value='".$liste_type_manif[$i][0]."'>".ModelPlanning::GetNomTypeManifByIdTypeManif($liste_type_manif[$i][0])[0][0]."</option>";
                    }
                    ?>
                </select>

                <br>

                <div class="blanc"></div>
                Heure debut<br>
                <div class="heure">
                    <select name="HeureDebut" size="1">
                        <?php
                        for($i = 0; $i < count($liste_heure); $i++) {
                            echo "<option value='".$i."'>".$liste_heure[$i]."</option>";
                        }
                        ?>
                    </select>
                    :
                    <select name="MinuteDebut" size="1">
                        <?php
                        for($i = 0; $i < count($liste_minute); $i++) {
                            echo "<option value='".$liste_minute[$i]."'>".$liste_minute[$i]."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="blanc"></div>
                Heure fin<br>
                <div class="heure">
                    <select name="HeureFin" size="1">
                        <?php
                        for($i = 0; $i < count($liste_heure); $i++) {
                            echo "<option value='".$i."'>".$liste_heure[$i]."</option>";
                        }
                        ?>
                    </select>
                    :
                    <select name="MinuteFin" size="1">
                        <?php
                        for($i = 0; $i < count($liste_minute); $i++) {
                            echo "<option value='".$liste_minute[$i]."'>".$liste_minute[$i]."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="blanc"></div>
                Récurence ?<br>
                <select name="Recurence" size="1" onchange="affichechoix(this.value)">
                    <?php
                    /*for($i = 0; $i < count($liste_jour); $i++) {
                        echo "<option value='".$i."'>".$i." semaine(s) - ".ModelPlanning::GetJourByIdDate($liste_jour[$i])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_jour[$i])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_jour[$i])[0][0]."</option>";
                    }*/
				    ?>	
					<option value="0"><label>aucune</label></option>
					<option value="jour"><label>par jour</label></option>
					<option value="parmois"><label>Par mois</label></option>
					<option value="parans"><label>Tous les ans</label></option>
					</select>
					<select name="jour" id="jour">
					<option value="1"><label>1 jour</label></option>
					<option value="2"><label>2 jours</label></option>
					<option value="3"><label>3 jours</label></option>
					<option value="4"><label>4 jours</label></option>
					<option value="5"><label>5 jours</label></option>				
					<option value="6"><label>6 jours</label></option>				
					<option value="7"><label>7 jours</label></option>				
                </select>	
				<select name="nbmois" id="nbmois">
					<option value="1"><label>1 mois</label></option>
					<option value="2"><label>2 mois</label></option>
					<option value="3"><label>3 mois</label></option>
					<option value="4"><label>4 mois</label></option>
					<option value="5"><label>5 mois</label></option>				
					<option value="6"><label>6 mois</label></option>				
					<option value="7"><label>7 mois</label></option>				
					<option value="8"><label>8 mois</label></option>				
					<option value="9"><label>9 mois</label></option>				
					<option value="10"><label>10 mois</label></option>				
					<option value="11"><label>11 mois</label></option>				
					<option value="12"><label>12 mois</label></option>				
                </select>
				<select name="typean" id="typean">
				<option value="tjs"><label>pour toujours</label></option>
				<option value="date"><label>jusqu'a une date</label></option>
			</select>
			<select name="choixdate" >
				<option><?php
				for($i = 0; $i < count($liste_an); $i++) {
								if($liste_an[$i]==ModelPlanning::GetAnneeByIdDate($id_jour_recherche)[0][0]){
									echo "<option value='".$liste_an[$i]."'' selected>".$liste_an[$i]."</option>";
								}
								else {
									echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
								}
							}
				?></option>
				</select>
			   <!-- <label>Toutes les semaines</label>
                <input name="nVilleIntervention2" type="checkbox"  value="1">
                <br>
                <label>Tous les mois</label>
                <input name="nVilleIntervention3" type="checkbox"  value="1">
                <br>
                <label>Tous les ans</label>
                <input name="nVilleIntervention4" type="checkbox"  value="1">
                <br>
                <label>Personnalisé</label>
                <input name="nVilleIntervention5" type="checkbox"  value="1">-->
                <!--</select>-->

                <?php
                echo '<input type="hidden" name="IdJour" value="'.$jour.'">';
                echo '<input type="hidden" name="IdSalle" value="'.$salle.'">';
                ?>
                <br>Commentaire(s)<br>
                <input type="text" placeholder="Commentaires" name="Comment" ><br><br>
                <?php

                for($i=0; $i<$nbrSalle[0]; $i++)
                {
					if($salle!=$nomSalle[$i]['IdS']){
                    echo "<label>".$nomSalle[$i]['NomS']." : </label>";
                    echo "<input type='checkbox' name='choixsalle[]' value=".$nomSalle[$i]['IdS'].">";
                    echo "<br></br>";
					}
                }

                ?>
                <div class="blanc"></div>
                <button type="submit" name="action" value="valid">Valider</button>
                <button type="submit" name="action" value="recur">Ajouter période d'année scolaire</button>
                <button type="submit" name="action" value="recurvac">Ajouter période sans vacance</button>
            </form>
        </div>
    </div>

    <div class="container-form-part">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Manifestation pour particulier</div>
            <form action="" method="POST">
                <div class="blanc"></div>
                Nom manifestation<br>
                <input type="text" placeholder="Nom Manifestation" name="NomM"><br>

                <div class="blanc"></div>
                Publique ?<br>
                <select name="Publique" size="1">
                    <option value=1>Oui</option>
                    <option value=2>Non</option>
                </select>

                <br>

                <div class="blanc"></div>
                Nombre de personnes prévues<br>
                <input type="text" placeholder="Personnes prévues" name="NbrPublique"><br>


                <div class="blanc"></div>
                Nom du responsable<br>
                <select name="IdP" size="1">
                    <?php
                    for($i = 0; $i < count($liste_part); $i++) {
                        echo "<option value='".$liste_part[$i][0]."'>".ModelPlanning::GetNomPrenomParticulierByIdP($liste_part[$i][0])[0][1]." ".ModelPlanning::GetNomPrenomParticulierByIdP($liste_part[$i][0])[0][0]."</option>";
                    }
                    ?>
                </select>

                <br>

                <div class="blanc"></div>
                Type de manifestation<br>
                <select name="IdTypeManif" size="1">
                    <?php
                    for($i = 0; $i < count($liste_type_manif); $i++) {
                        echo "<option value='".$liste_type_manif[$i][0]."'>".ModelPlanning::GetNomTypeManifByIdTypeManif($liste_type_manif[$i][0])[0][0]."</option>";
                    }
                    ?>
                </select>

                <br>

                <div class="blanc"></div>
                Heure debut<br>
                <div class="heure">
                    <select name="HeureDebut" size="1">
                        <?php
                        for($i = 0; $i < count($liste_heure); $i++) {
                            echo "<option value='".$i."'>".$liste_heure[$i]."</option>";
                        }
                        ?>
                    </select>
                    :
                    <select name="MinuteDebut" size="1">
                        <?php
                        for($i = 0; $i < count($liste_minute); $i++) {
                            echo "<option value='".$liste_minute[$i]."'>".$liste_minute[$i]."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="blanc"></div>
                Heure fin<br>
                <div class="heure">
                    <select name="HeureFin" size="1">
                        <?php
                        for($i = 0; $i < count($liste_heure); $i++) {
                            echo "<option value='".$i."'>".$liste_heure[$i]."</option>";
                        }
                        ?>
                    </select>
                    :
                    <select name="MinuteFin" size="1">
                        <?php
                        for($i = 0; $i < count($liste_minute); $i++) {
                            echo "<option value='".$liste_minute[$i]."'>".$liste_minute[$i]."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="blanc"></div>
                Récurence ?<br>
                 <select name="Recurence" size="1" onchange="affichechoix(this.value)">
                    <?php
                    /*for($i = 0; $i < count($liste_jour); $i++) {
                        echo "<option value='".$i."'>".$i." semaine(s) - ".ModelPlanning::GetJourByIdDate($liste_jour[$i])[0][0]."/".ModelPlanning::GetMoisByIdDate($liste_jour[$i])[0][0]."/".ModelPlanning::GetAnneeByIdDate($liste_jour[$i])[0][0]."</option>";
                    }*/
				    ?>	
					<option value="0"><label>aucune</label></option>
					<option value="jour"><label>par jour</label></option>
					<option value="parmois"><label>Par mois</label></option>
					<option value="parans"><label>Tous les ans</label></option>
					</select>
					<select name="jour">
					<option value="1"><label>1 jour</label></option>
					<option value="2"><label>2 jours</label></option>
					<option value="3"><label>3 jours</label></option>
					<option value="4"><label>4 jours</label></option>
					<option value="5"><label>5 jours</label></option>				
					<option value="6"><label>6 jours</label></option>				
					<option value="7"><label>7 jours</label></option>				
                </select>	
				<select name="nbmois">
					<option value="1"><label>1 mois</label></option>
					<option value="2"><label>2 mois</label></option>
					<option value="3"><label>3 mois</label></option>
					<option value="4"><label>4 mois</label></option>
					<option value="5"><label>5 mois</label></option>				
					<option value="6"><label>6 mois</label></option>				
					<option value="7"><label>7 mois</label></option>				
					<option value="8"><label>8 mois</label></option>				
					<option value="9"><label>9 mois</label></option>				
					<option value="10"><label>10 mois</label></option>				
					<option value="11"><label>11 mois</label></option>				
					<option value="12"><label>12 mois</label></option>				
                </select>
				<select name="typean">
				<option value="tjs"><label>pour toujours</label></option>
				<option value="date"><label>jusqu'a une date</label></option>
			</select>
			<select name="choixdate" >
				<option><?php
				for($i = 0; $i < count($liste_an); $i++) {
								if($liste_an[$i]==ModelPlanning::GetAnneeByIdDate($id_jour_recherche)[0][0]){
									echo "<option value='".$liste_an[$i]."'' selected>".$liste_an[$i]."</option>";
								}
								else {
									echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
								}
							}
				?></option>
				</select>
				<!--<div id="cacher" class="collapse">
					<br>
					<p>COUCOU</p>
				</div>-->
				
                <br>Commentaire(s)<br>
                <input type="text" placeholder="Commentaires" name="Comment" ><br><br>
                <?php
                echo '<input type="hidden" name="IdJour" value="'.$jour.'">';
                echo '<input type="hidden" name="IdSalle" value="'.$salle.'">';
                ?>

                <div class="blanc"></div>
                <button type="submit" name="action" value="valid">Valider</button>
                <button type="submit" name="action" value="recur">Ajouter période d'année scolaire</button>
                <button type="submit" name="action" value="recurvac">Ajouter période sans vacance</button>
            </form>
        </div>
    </div>
</div>
<?php
}
/*function affichechoix($value) 
   { 
    if (value=="jour") 
	{
    document.getElementById("jour").style.display:'block';
	}
    else {
    document.getElementById("jour").style.display:'none';
	}
    if (value=="parmois") {
    document.getElementById("nbmois").style.display:'block';
	}
    else {
    document.getElementById("nbmois").style.display:'none';
	} 
    if (value=="parans"){
    document.getElementById("typean").style.display:'none';
	}
   }*/
?>
</body>
</html>