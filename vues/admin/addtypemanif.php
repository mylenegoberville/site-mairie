<?php 
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=type-manif">Retour</a>';
$i=0;
$idtypemanif = $_GET["id-type-manif"];
	if(isset($_POST["LibelleT"]) && isset($_POST["Payant"])) {
		ModelPlanning::AddTypeManif($_POST["LibelleT"],$_POST["Payant"]);
		echo "<script>window.location.href='index.php?action=options&manage=type-manif'</script>";
	}
?>
<html>
	<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
	<body>
		<div class="titre">Ajouter un type de manifestion</div>
	    <div class="forms">
	      	<div class="container-form-asso">
		        <div class="form-ajout">
		          	<div class="blanc"></div>
		          	<div class="titre">Ajout</div>
		        	<form action="" method="POST">
			            <div class="blanc"></div>
			            Libelle Type Manifestation<br>
			            <input type="text" placeholder="Libelle Type Manifestation" name="LibelleT";"><br>
			            <div class"blanc"></div>
			            Payant ?<br>
			           <select name="Payant" size="1">
			            	<?php
			            	if(Modelplanning::GetAllInfoTypeManifByIdTypeManif($idtypemanif)[0]['Payant']==1) {
			            		echo '<option value=0>Non</option>';
			              		echo '<option value=1 selected>Oui</option>';
			            	}
			            	else {
			            		echo '<option value=0 selected>Non</option>';
			              		echo '<option value=1>Oui</option>';
			            	}
			              	?>
			            </select>
			            <input type="submit" name="Valider">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>