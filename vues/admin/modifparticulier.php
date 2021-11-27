<?php require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=part">Retour</a>';

	$idpart = $_GET["id-particulier"]; 
	if(isset($_POST["idP"]) && isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["NumeroTelephone"]) && isset($_POST["Mail"]) && isset($_POST["CodePostal"]) && isset($_POST["Ville"]) && isset($_POST["Adresse"])) {
		ModelPlanning::ModifParticulier($_POST["idP"],$_POST["Nom"],$_POST["Prenom"],$_POST["NumeroTelephone"],$_POST["DeuxiemeTel"],$_POST["TroisiemeTel"],$_POST["Mail"],$_POST["CodePostal"],$_POST["Ville"],$_POST["Adresse"]);
		echo "<script>window.location.href='index.php?action=options&manage=part'</script>";
	}
?>
<html>
	<body>
		<div class="titre">Editer le particulier</div>
	    <div class="forms">
	      	<div class="container-form-asso">
		        <div class="form-ajout">
		          	<div class="blanc"></div>
		          	<div class="titre">Edition</div>
		        	<form action="" method="POST">
			            <div class="blanc"></div>
			            Nom Particulier<br>
			            <input type="text" placeholder="Nom Particulier" name="Nom" value="<?php echo ModelPlanning::GetAllPartById($idpart)[0]['Nom']; ?>"><br>
			            <div class"blanc"></div>
			            Prenom Particulier<br>
			            <input type="text" placeholder="Prenom" name ="Prenom" value="<?php echo Modelplanning::GetAllPartById($idpart)[0]['Prenom']; ?>"><br>
			            Telephone Particulier<br>
			            <input type="text" placeholder="Telephone" name="NumeroTelephone" value="<?php echo Modelplanning::GetAllPartById($idpart)[0]['NumeroTelephone']; ?>"><br>
						Deuxième Numéro Téléphone<br>
						<input type="text" placeholder="Deuxième Téléphone" name="DeuxiemeTel" value="<?php echo Modelplanning::GetAllPartById($idpart)[0]['DeuxiemeTel']; ?>"><br>
						Troisième Numéro Téléphone<br>
						<input type="text" placeholder="Troisième Téléphone" name="TroisiemeTel" value="<?php echo Modelplanning::GetAllPartById($idpart)[0]['TroisiemeTel']; ?>"><br>
			            Mail Particulier<br>
			            <input type="text" placeholder="Mail" name="Mail" value="<?php echo Modelplanning::GetAllPartById($idpart)[0]['Mail']; ?>"><br>
			            Code Postal Particulier<br>
			            <input type="text" placeholder="CodePostal" name="CodePostal" value="<?php echo Modelplanning::GetAllPartById($idpart)[0]['CodePostal']; ?>"><br>
			            Ville Particulier<br>
			            <input type="text" placeholder="Ville" name="Ville" value="<?php echo Modelplanning::GetAllPartById($idpart)[0]['Ville']; ?>"><br>
			            Adresse<br>
			            <input type="text" placeholder="Adresse" name="Adresse" value="<?php echo Modelplanning::GetAllPartById($idpart)[0]['Adresse']; ?>"><br>
			            <?php echo '<input type="hidden" name="idP" value="'.$_GET['id-particulier'].'">'; ?>
			            <input type="submit">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>