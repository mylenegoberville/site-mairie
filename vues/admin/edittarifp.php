<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=salles">Retour</a>';

$i=0;
$tarifp=ModelPlanning::GetTarifByidTp($_GET['idtarifp']);
if(isset($_POST["ville"]) && isset($_POST["salle"]) && isset($_POST["tarif"])) {
    ModelPlanning::Modiftarifp($_POST['idTp'],$_POST["ville"],$_POST["salle"], $_POST["tarif"]);
	
    echo "<script>window.location.href='index.php?action=options&manage=tarif'</script>";
}
?>
<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<body>
<div class="titre">Modifier le Tarif pour les particuliers</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Modifier</div>
            <form action="" method="POST">
                <div class="blanc"></div>
				Ville<br>
                <input type="text"  name="ville" value="<?php echo $tarifp['ville']; ?>"><br><br>
				<div class"blanc"></div>
                Salle<br>
                <input type="text" placeholder="Nom de la salle" name="salle" value="<?php echo $tarifp['salle']; ?>"><br><br>
				<div class"blanc"></div>
                Tarif<br>
                <input type="text" placeholder="Capacité" name ="tarif" value="<?php echo $tarifp['tarif']; ?>"><br><br>
               <input type="hidden" placeholder="IdTp" name="IdTp" value="<?php echo $tarifp[0]; ?>"><br><br>
			  
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>