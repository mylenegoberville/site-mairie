<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=salles">Retour</a>';

$i=0;
$unesalle=ModelPlanning::GetAllSallesByIdS($_GET['id-salles'],$_GET['id-batiment']);
if(isset($_POST["NomV"]) && isset($_POST["NomB"]) && isset($_POST["NomS"]) && isset($_POST["adresse"]) && isset($_POST["capacite"])) {
    ModelPlanning::ModifBatiment($_POST["IdB"], $_POST['NomB'], $_POST["adresse"]);
    ModelPlanning::ModifSalle( $_POST["IdS"],$_POST["capacite"]);
	
    echo "<script>window.location.href='index.php?action=options&manage=salles'</script>";
}
?>
<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<body>
<div class="titre">Modifier une salle</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Modifier</div>
            <form action="" method="POST">
                <div class="blanc"></div>
				Ville<br>
                <input type="text" placeholder="Ville" name="NomV" value="<?php echo $unesalle['NomV']; ?>"><br><br>
				<div class"blanc"></div>
				Nom du batiment
                <br>
                <input type="text" placeholder="Nom du batiment" name="NomB" value="<?php echo $unesalle['NomB']; ?>"><br><br>
				<div class"blanc"></div>
                adresse du batiment<br>
                <input type="text" placeholder="adresse du batiment" name="adresse" value="<?php echo $unesalle['adresse']; ?>"><br><br>
				<div class"blanc"></div>
                Nom de la salle<br>
                <input type="text" placeholder="Nom de la salle" name="NomS" value="<?php echo $unesalle['NomS']; ?>"><br><br>
				<div class"blanc"></div>
                Capacité de la salle <br>
                <input type="text" placeholder="Capacité" name ="capacite" value="<?php echo $unesalle['Capacite']; ?>"><br><br>
                <input type="hidden" placeholder="IdS" name="IdS" value="<?php echo $unesalle[0]; ?>"><br><br>
			   <input type="hidden" placeholder="Ville" name="IdB" value="<?php echo $unesalle['IdB']; ?>"><br><br>
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>