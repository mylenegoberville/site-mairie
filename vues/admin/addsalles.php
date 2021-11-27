<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=salles">Retour</a>';

$i=0;
$liste_batiment= ModelPlanning::GetBatiment();
if( isset($_POST["NomS"]) && isset($_POST["capacite"])) {
    ModelPlanning::AddSalle( $_POST["NomS"],$_POST["capacite"],$_POST["NomB"]);
	
    echo "<script>window.location.href='index.php?action=options&manage=salles'</script>";
}else{
?>
<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<body>
<div class="titre">Ajouter une salle</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Ajout</div>
            <form action="" method="POST">
                <div class="blanc"></div>
				Nom du batiment<br>
				<select name="NomB" size="1">
                   <?php
                    for($i = 0; $i < count($liste_batiment); $i++) {
                        echo "<option value='".$liste_batiment[$i][0]."'>".$liste_batiment[$i][1]."</option>";
                    }
                    ?>
                </select><br>
                Nom de la salle<br>
                <input type="text" placeholder="Nom de la salle" name="NomS"><br><br>
                Capacité de la salle <br>
                <input type="text" placeholder="Capacité" name ="capacite"><br><br>
               
			  
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
}
?>