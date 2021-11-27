<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=part">Retour</a>';

$i=0;
$idparticulier = $_GET["id-particulier"];

if(isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["NumeroTelephone"])&& isset($_POST["DeuxiemeTel"])&& isset($_POST["TroisiemeTel"]) && isset($_POST["Mail"]) && isset($_POST["CodePostal"]) && isset($_POST["Ville"]) && isset($_POST["Adresse"]) ) {
    ModelPlanning::AddParticulier($_POST["Nom"],$_POST["Prenom"],$_POST["NumeroTelephone"],$_POST["DeuxiemeTel"],$_POST["TroisiemeTel"],$_POST["Mail"],$_POST["CodePostal"],$_POST["Ville"],$_POST["Adresse"]);
    echo "<script>window.location.href='index.php?action=options&manage=part'</script>";
}
?>
<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<body>
<div class="titre">Ajouter un particulier</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Ajout</div>
            <form action="" method="POST">
                <div class="blanc"></div>
                Nom Particulier<br>
                <input type="text" placeholder="Nom Particulier" name="Nom"><br>
                Prenom Particulier<br>
                <input type="text" placeholder="Prenom Particulier" name="Prenom"><br>
                Numéro Téléphone Particulier<br>
                <input type="text" placeholder="Téléphone Particulier" name="NumeroTelephone"><br>
                Deuxième Numéro Téléphone<br>
                <input type="text" placeholder="Deuxième Téléphone" name="DeuxiemeTel"><br>
                Troisième Numéro Téléphone<br>
                <input type="text" placeholder="Troisième Téléphone" name="TroisiemeTel"><br>
                Mail Particulier<br>
                <input type="text" placeholder="Mail Particulier" name="Mail" ><br>
                Code Postal Particulier <br>
                <input type="text" placeholder="Code Postal" name ="CodePostal"><br>
                Ville Particulier <br>
                <input type="text" placeholder="Ville" name="Ville"><br>
                Adresse Particulier<br>
                <input type="text" placeholder="Adresse" name="Adresse"><br>
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>