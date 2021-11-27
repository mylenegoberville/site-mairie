<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=tarif">Retour</a>';

$i=0;
$tarifa=ModelPlanning::GetTarifByidTa($_GET['idtarifa']);
if(isset($_POST["ville"]) && isset($_POST["salle"]) && isset($_POST["tarif"])) {
    ModelPlanning::Modiftarifa($_POST["IdTa"],$_POST["ville"],$_POST["salle"], $_POST["tarif"]);
	
   echo "<script>window.location.href='index.php?action=options&manage=tarif'</script>";
}
?>
<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<body>
<div class="titre">Modifier le Tarif pour les associations</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Modifier</div>
            <form action="" method="POST">
                <div class="blanc"></div>
				Ville<br>
                <input type="text"  placeholder="ville" name="ville" value="<?php echo $tarifa['ville']; ?>"><br><br>
				<div class"blanc"></div>
                Salle<br>
                <input type="text" placeholder="Nom de la salle" name="salle" value="<?php echo $tarifa['salle']; ?>"><br><br>
				<div class"blanc"></div>
                Tarif<br>
                <input type="text" placeholder="tarif" name ="tarif" value="<?php echo $tarifa['tarif']; ?>"><br><br>
               <input type="text" placeholder="IdTa" name="IdTa" value="<?php echo $tarifa[0]; ?>"><br><br>
			  
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>