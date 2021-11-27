<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=tarif">Retour</a>';

$i=0;
$liste_ville = ModelPlanning::GetVille();
$liste_salle= ModelPlanning::GetSalles();
if(isset($_POST["ville"]) && isset($_POST["Salles"])&& isset($_POST['tarif'])) {
    ModelPlanning::AddTarifA($_POST["ville"],$_POST["Salles"],$_POST['tarif']);
	
    echo "<script>window.location.href='index.php?action=options&manage=tarif'</script>";
}
?>
<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<body>
<div class="titre">Ajouter un tarif pour les associations</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Ajout</div>
            <form action="" method="POST">
                <div class="blanc"></div>

                <div class="blanc"></div>
                Ville<br>
                <select name="ville" size="1">
                     <?php
                    for($i = 0; $i < count($liste_ville); $i++) {
                        echo "<option value='".$liste_ville[$i][0]."'>".$liste_ville[$i][0]."</option>";
                    }
                    ?>
                </select><br>
                Salles<br>
                 <select name="Salles" size="1">
                   <?php
                    for($i = 0; $i < count($liste_salle); $i++) {
                        echo "<option value='".$liste_salle[$i][0]."'>".$liste_salle[$i][0]."</option>";
                    }
                    ?>
                </select><br>
                Tarif <br>
                <input type="text" placeholder="Tarif" name="tarif"><br><br>
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>