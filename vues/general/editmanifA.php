<?php
	require_once './modele/ModelPlanning.php';
	
	$ville=$_GET['ville'];
	echo "<br><a href='index.php?ville=".$ville."'>Retour</a>";
	//Création d'une variable de session "idSalle" qui permet de faire fonctionner l'ancrage avec la page planning.php
	if(!empty($_GET['idSalle']))
	{
		$idSalle = $_GET['idSalle'];
		$_SESSION['idSalle'] = $idSalle;
	}
	if(isset($_SESSION['idSalle']))
	{
		$idSalleS = $_SESSION['idSalle'];
	}


	$idmanif = $_GET["id-manif"];
	$liste_asso = ModelPlanning::GetIdAsso();
	$liste_type_manif = ModelPlanning::GetIdTypeManif();
	$liste_heure = array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23");
	$liste_minute = array("00","05","10","15","20","25","30","35","40","45","50","55");

	$HeureDebut = explode(':',ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['HeureDebut']);
	$HeureFin = explode(':',ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['HeureFin']);

	if(isset($_POST["HeureDebut"]) && isset($_POST["MinuteDebut"])) {
  		$HeureDebut = $_POST["HeureDebut"].":".$_POST["MinuteDebut"];
	}

	if(isset($_POST["HeureFin"]) && isset($_POST["MinuteFin"])) {
  		$HeureFin = $_POST["HeureFin"].":".$_POST["MinuteFin"];
	}

	if(isset($_POST["IdManif"]) && isset($_POST["NomM"]) && isset($_POST["Publique"]) && isset($_POST["NbrPublique"]) && isset($HeureDebut) && isset($HeureFin) && isset($_POST["IdTypeManif"]) && isset($_POST["IdSalle"]) && isset($_POST["IdAs"])) {
		ModelPlanning::ModifManifA($_POST["IdManif"],$_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"]);
		echo "<script>window.location.href='index.php?ville=".ModelPlanning::GetNomVilleByIdS($_POST["IdSalle"])[0][0]."&id-jour=".ModelPlanning::GetAllInfoManifByIdManif($_GET["id-manif"])[0]['id2']."'</script>";
	}
	
        if(isset($_POST["IdAs"])) {
            if($_POST["Recurence"] == '0') {
               ModelPlanning::ModifManifA($_POST["IdManif"],$_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"]);
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
						ModelPlanning::ModifManifA($_POST["IdManif"],$_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$id2);
					}
				}
				
                for($i = 0; $i < $_POST["Recurence"]; $i++) {
                    $lejour = $lejour + 7;
                   ModelPlanning::ModifManifA($_POST["IdManif"],$_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$lejour,$_POST["Comment"]);
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
						ModelPlanning::ModifManifA($_POST["IdManif"],$_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"], $place[0]);
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
						ModelPlanning::ModifManifA($_POST["IdManif"],$_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$place[0]);
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
						ModelPlanning::ModifManifA($_POST["IdManif"],$_POST["NomM"],$_POST["Publique"],$_POST["NbrPublique"],$HeureDebut,$HeureFin,$_POST["IdTypeManif"],$_POST["IdAs"],$place[0]);
					}
					}
				}
            }
			 }
?>

<html>
<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
    <link rel="stylesheet" type="text/css" href="assets/css/impression.css" media="print">
	<body>
		<div class="titre">Editer la manifestation</div>
	    <div class="forms">
	      	<div class="container-form-asso">
		        <div class="form-ajout">
		          	<div class="blanc"></div>
		          	<div class="titre">Edition</div>
		        	<form action="" method="POST">
			            <div class="blanc"></div>
			            Nom manifestation<br>
			            <input type="text" placeholder="Nom Manifestation" name="NomM" value="<?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NomM']; ?>"><br>

			            <div class="blanc"></div>
			            Publique ?<br>
			            <select name="Publique" size="1">
			            	<?php
				            	if(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['Publique']==0) {
				            		echo "<option selected value=0>Oui</option>";
				            		echo "<option value=1>Non</option>";
				            	}
				              	else {
				              		echo "<option value=0>Oui</option>";
				              		echo "<option selected value=1>Non</option>";
				              	}
			              	?>
			            </select>

			            <br>

			            <div class="blanc"></div>
			            Nombre de personnes prévues<br>
			            <input type="text" placeholder="Personnes prévues" name="NbrPublique" value="<?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NombrePersonne'] ?>"><br>

			            <div class="blanc"></div>
			            Nom de l'association<br>
			          	<select name="IdAs" size="1">
			              <?php
			                for($i = 0; $i < count($liste_asso); $i++) {
			                	if(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['IdAs']==$liste_asso[$i][0]) {
			                		echo "<option selected value='".$liste_asso[$i][0]."'>".ModelPlanning::GetNomAsByIdAs($liste_asso[$i][0])[0][0]."</option>";
			                	}
			                	else {
			                		echo "<option value='".$liste_asso[$i][0]."'>".ModelPlanning::GetNomAsByIdAs($liste_asso[$i][0])[0][0]."</option>";
			                	}
			                }
			              ?>
			            </select>

			            <br>

			            <div class="blanc"></div>
			            Type de manifestation<br>
			            <select name="IdTypeManif" size="1">
			              <?php
			                for($i = 0; $i < count($liste_type_manif); $i++) {
			                	if(ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['IdT']==$liste_type_manif[$i][0]) {
			                		echo "<option selected value='".$liste_type_manif[$i][0]."'>".ModelPlanning::GetNomTypeManifByIdTypeManif($liste_type_manif[$i][0])[0][0]."</option>";
			                	}
			    				else {
			    					echo "<option value='".$liste_type_manif[$i][0]."'>".ModelPlanning::GetNomTypeManifByIdTypeManif($liste_type_manif[$i][0])[0][0]."</option>";
			    				}
			                }
			              ?>
			            </select>

			            <br>
                        <div class="blanc"></div>
                        Changer la récurence<br>
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

                        <br>

			            <div class="blanc"></div>
			            Heure debut<br>
			            <div class="heure">
			              <select name="HeureDebut" size="1">
			                <?php
			                  for($i = 0; $i < count($liste_heure); $i++) {
			                  	if($liste_heure[$i]==$HeureDebut[0]) {
			                  		echo "<option selected value='".$i."'>".$liste_heure[$i]."</option>";
			                  	}
			                    else {
			                    	echo "<option value='".$i."'>".$liste_heure[$i]."</option>";
			                    }
			                  }
			                ?>
			              </select>
			              :
			              <select name="MinuteDebut" size="1">
			                <?php
			                  for($i = 0; $i < count($liste_minute); $i++) {
			                  	if($liste_minute[$i]==$HeureDebut[1]) {
			                  		echo "<option selected value='".$liste_minute[$i]."'>".$liste_minute[$i]."</option>";
			                  	}
			                  	else {
			                  		echo "<option value='".$liste_minute[$i]."'>".$liste_minute[$i]."</option>";
			                  	}
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
			                  	if($liste_heure[$i]==$HeureFin[0]) {
			                  		echo "<option selected value='".$i."'>".$liste_heure[$i]."</option>";
			                  	}
			                    else {
			                    	echo "<option value='".$i."'>".$liste_heure[$i]."</option>";
			                    }
			                  }
			                ?>
			              </select>
			              :
			              <select name="MinuteFin" size="1">
			                <?php
			                  for($i = 0; $i < count($liste_minute); $i++) {
			                  	if($liste_minute[$i]==$HeureFin[1]) {
			                  		echo "<option selected value='".$liste_minute[$i]."'>".$liste_minute[$i]."</option>";
			                  	}
			                    else {
			                    	echo "<option value='".$liste_minute[$i]."'>".$liste_minute[$i]."</option>";
			                    }
			                  }
			                ?>
			              </select>
			            </div>
			            <?php 
			            	echo '<input type="hidden" name="IdManif" value="'.$idmanif.'">';
			            	echo '<input type="hidden" name="IdSalle" value="'.ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['IdS'].'">';
			            ?>
			            <div class="blanc"></div>
			            <input type="submit">
			        </form>
		   		</div>
	    	</div>
	    </div>
	</body>
</html>