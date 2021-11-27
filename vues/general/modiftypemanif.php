<html>
<?php require_once './modele/ModelPlanning.php'; ?>

<br><a href="./vues/admin/edittypemanif.php">Retour</a>

	<body>
		<div class="titre">Editer le type de manifesttion</div>
	    <div class="forms">
	      	<div class="container-form-asso">
		        <div class="form-ajout">
		          	<div class="blanc"></div>
		          	<div class="titre">Edition</div>
		        	<form action="" method="POST">
			            <div class="blanc"></div>
			            Nom manifestation<br>
			            <input type="text" placeholder="Nom Manifestation" name="NomM" value="<?php echo ModelPlanning::GetAllInfoManifByIdManif($idmanif)[0]['NomM']; ?>"><br>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>