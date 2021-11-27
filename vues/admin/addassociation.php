<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=asso">Retour</a>';

$i=0;
$idassociation = $_GET["id-association"];
$idassociation = $_GET["id-association"];
if(isset($_POST["NomAs"]) && isset($_POST["NomVSA"])
    && isset($_POST["AdrueSiegeAdmin"]) && isset($_POST["CodePostalVSA"])
    && isset($_POST["NomVSS"]) && isset($_POST["AdrueSiegeSocial"])
    && isset($_POST["CodePostalVSS"]) && isset($_POST["Site"])
    && isset($_POST["Activite"]) && isset($_POST["forum"])
    && isset($_POST["invit"]) && isset($_POST["Com"])
    && isset($_POST["NomPre"]) && isset($_POST["PrenomPre"])
    && isset($_POST["NumPre"]) && isset($_POST["MailPre"])
    && isset($_POST["NomAutre"]) && isset($_POST["PrenomAutre"])
    && isset($_POST["NumAutre"]) && isset($_POST["MailAutre"])
    && isset($_POST["NomAutre1"]) && isset($_POST["PrenomAutre1"])
    && isset($_POST["NumAutre1"]) && isset($_POST["MailAutre1"])) {
    ModelPlanning::AddAssociation($_POST["NomAs"],$_POST["AdrueSiegeAdmin"],
        $_POST["AdrueSiegeSocial"],$_POST["NomVSA"],
        $_POST["NomVSS"],$_POST["CodePostalVSA"],
        $_POST["CodePostalVSS"],$_POST["Site"],
        $_POST["Activite"],$_POST["forum"],
        $_POST["invit"],$_POST["Com"],
        $_POST["NomPre"],$_POST["PrenomPre"],
        $_POST["NumPre"],$_POST["MailPre"],
        $_POST["NomAutre"],$_POST["PrenomAutre"],
        $_POST["NumAutre"],$_POST["MailAutre"],
        $_POST["NomAutre1"],$_POST["PrenomAutre1"],
        $_POST["NumAutre1"],$_POST["MailAutre1"], 
        $_POST['nVilleIntervention1'], $_POST['nVilleIntervention2'], $_POST['nVilleIntervention3'], $_POST['nVilleIntervention4'], $_POST['nVilleIntervention5']);
    echo "<script>window.location.href='index.php?action=options&manage=asso'</script>";
}
?>
<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<body>
<div class="titre">Ajouter une association</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Ajout</div>
            <form action="" method="POST">
                <div class="blanc"></div>

                <div class="blanc"></div>
                Nom Association<br>
                <input type="text" placeholder="Nom Association" name="NomAs"><br><br>
                Ville Siège Administratif<br>
                <input type="text" placeholder="Nom Ville Siege Administratif" name="NomVSA"><br><br>
                Rue Siège Administratif<br>
                <input type="text" placeholder="Numéro et rue Siege Administratif" name="AdrueSiegeAdmin"><br><br>
                Code Postal Siège Administratif<br>
                <input type="text" placeholder="Code Postal Siege Administratif" name="CodePostalVSA"><br><br>
                Ville Siège Social <br>
                <input type="text" placeholder="Nom Ville Siege Social" name ="NomVSS"><br><br>
                Rue Siège Social <br>
                <input type="text" placeholder="Numéro et Rue Siege Social" name="AdrueSiegeSocial"><br><br>
                Code Postal Siège Social<br>
                <input type="text" placeholder="Code Postal Siege Social" name="CodePostalVSS"><br><br>
                Site Internet Association<br>
                <input type="text" placeholder="Site Internet Association" name="Site" ><br><br>
                Activités de l'Association<br>
                <input type="text" placeholder="Activités Association" name="Activite"><br><br>
                Forum des Associations<br>
                <select name="forum" size="1">
                    <?php
                    if(Modelplanning::GetAllInfoAssoByIdAsso($idasso)[0]['forum']==1) {
                        echo '<option value=0>Non</option>';
                        echo '<option value=1 selected>Oui</option>';
                    }
                    else {
                        echo '<option value=0 selected>Non</option>';
                        echo '<option value=1>Oui</option>';
                    }?>
                </select>
                <br><br>Invitation Réunion Salles<br>
                <select name="invit" size="1">
                    <?php
                    if(Modelplanning::GetAllInfoAssoByIdAsso($idasso)[0]['invit']==1) {
                        echo '<option value=0>Non</option>';
                        echo '<option value=1 selected>Oui</option>';
                    }
                    else {
                        echo '<option value=0 selected>Non</option>';
                        echo '<option value=1>Oui</option>';
                    }?>
                </select><br><br>
                Commentaire<br>
                <input type="text" placeholder="Commentaire" name="Com"><br><br>
                Nom Président<br>
                <input type="text" placeholder="Nom President" name="NomPre"><br><br>
                Prénom Président<br>
                <input type="text" placeholder="Prenom President" name="PrenomPre"><br><br>
                Numéro Téléphone Président<br>
                <input type="text" placeholder="Téléphone President" name="NumPre"><br><br>
                Mail Président<br>
                <input type="text" placeholder="Mail President" name="MailPre" ><br><br>

                <h3>Autres Personnes</h3>
                Nom Autre Personne<br>
                <input type="text" placeholder="Nom Autre" name="NomAutre"><br><br>
                Prénom Autre Personne<br>
                <input type="text" placeholder="Prenom Autre" name="PrenomAutre"><br><br>
                Numéro Téléphone Autre Personne<br>
                <input type="text" placeholder="Téléphone Autre" name="NumAutre"><br><br>
                Mail Autre Personne<br>
                <input type="text" placeholder="Mail Autre" name="MailAutre" ><br><br><br><br>


                Nom Autre Personne<br>
                <input type="text" placeholder="Nom Autre" name="NomAutre1"><br><br>
                Prénom Autre Personne<br>
                <input type="text" placeholder="Prenom Autre" name="PrenomAutre1"><br><br>
                Numéro Téléphone Autre Personne<br>
                <input type="text" placeholder="Téléphone Autre" name="NumAutre1"><br><br>
                Mail Autre Personne<br>
                <input type="text" placeholder="Mail Autre" name="MailAutre1" ><br><br>
                Intervention<br>
                <label>Veneux-les-Sablons</label>
                <input name="nVilleIntervention1" type="checkbox"  value="1">
                <br>
                <label>Moret-sur-Loing</label>
                <input name="nVilleIntervention2" type="checkbox"  value="1">
                <br>
                <label>Ecuelles</label>
                <input name="nVilleIntervention3" type="checkbox"  value="1">
                <br>
                <label>Episy</label>
                <input name="nVilleIntervention4" type="checkbox"  value="1">
                <br>
                <label>Montarlot</label>
                <input name="nVilleIntervention5" type="checkbox"  value="1">
                <br>
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>