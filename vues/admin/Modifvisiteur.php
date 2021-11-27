<?php require_once './modele/ModelPlanning.php';
$idtypevisiteur = $_GET["idvisiteur"];

if(isset($_POST["IdT"]) && isset($_POST["LibelleT"]) && isset($_POST["Payant"])) {
    ModelPlanning::ModifTypeManif($_POST["IdT"],$_POST["LibelleT"],$_POST["Payant"]);
    echo "<script>window.location.href='index.php?action=options&manage=type-visteur'</script>";
}
?>
<html>
<body>
<div class="titre">Editer le type de visite</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Edition</div>
            <form action="" method="POST">
                <div class="blanc"></div>
                Libelle Type Manifestation<br>
                <input type="text" placeholder="Libelle Type Manifestation" name="LibelleT" value="<?php echo ModelPlanning::GetAllInfoTypeManifByIdTypeManif($idtypemanif)[0]['LibelleT']; ?>"><br>
                <div class"blanc"></div>
        Payant ?<br>
        <select name="Payant" size="1">
            <?php
            if(Modelplanning::GetAllInfoTypeManifByIdTypeManif($idtypemanif)[0]['Payant']==1) {
                echo '<option value=0>Non</option>';
                echo '<option value=1 selected>Oui</option>';
            }
            else {
                echo '<option value=0 selected>Non</option>';
                echo '<option value=1>Oui</option>';
            }
            ?>
        </select>
        <br>
        <?php echo '<input type="hidden" name="IdT" value="'.$_GET['id-type-manif'].'">'; ?>
        <input type="submit">
        </form>
    </div>
</div>
</div>
</body>
</html>