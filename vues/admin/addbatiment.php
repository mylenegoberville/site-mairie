<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=salles">Retour</a>';

$i=0;
$idassociation = $_GET["id-association"];
$idassociation = $_GET["id-association"];
echo $_POST['NomB'];
if(isset($_POST["NomV"]) && isset($_POST["NomB"]) &&  isset($_POST["adresse"])) {
    ModelPlanning::AddBatiment($_POST["NomB"],$_POST["NomV"], $_POST['adresse']);
	
   echo "<script>window.location.href='index.php?action=options&manage=salles'</script>";
}else{
?>
<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<body>
<div class="titre">Ajouter un batiment </div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Ajout</div>
            <form action="" method="POST">
                <div class="blanc"></div>

                <div class="blanc"></div>
				Ville<br>
                <input type="text" placeholder="Ville" name="NomV"><br><br>
				Nom du batiment
                <br>
                <input type="text" placeholder="Nom du batiment" name="NomB"><br><br>
                adresse du batiment<br>
                <input type="text" placeholder="adresse du batiment" name="adresse"><br><br>
			  
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