<html>
<link rel="stylesheet" href="assets/css/css-general.css">
<link rel="stylesheet" href="assets/css/css-base.css">
<link rel="stylesheet" type="text/css" href="assets/css/impression.css" media="print">
<body>
<div class="titre">Liste des Associations par Ville</div>

<?php
require_once './modele/ModelPlanning.php';

if(isset($_POST['ville'])&&isset($_POST['type']))
{
    $ville=$_POST['ville'];
	$tville=explode(';',$ville);
    $type=$_POST['type'];
    $liste_associations = ModelPlanning::GetAllAssoType($tville,$type);
    ?>
	<center><div class="img2"><a href="javascript:window.print()"><img src="https://png.icons8.com/ios/30/000000/print-filled.png"></a></div>
<div class="img2"><a href=""><img style="height:35px; width:50px;" src="assets/img/email.png"></a></div></center>
    <table class="table-fill">
        <thead>
        <tr>
			<th>Ville d'intervention</th>
            <th>Nom Association</th>
            <th>Adresse Siege Admin</th>
            <th>Adresse Siege social</th>
            <th>Activités de l'Asso</th>
            <th>Forum des Assos</th>
            <th>Invitation Réunion Salles</th>
            <th>Président</th>
            <th>Autre Personne</th>
            <th>Autre Personne</th>
            <th>Site</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($liste_associations); $i++){?>
            <tr>
				<td><?php if($liste_associations[$i]['Veneux-les-Sablons']=='1'){echo "Veneux-les-Sablons" ;}?>
						<?php if($liste_associations[$i]['Moret-sur-Loing']=='1'){echo "Moret-sur-Loing" ;}?> 
						<?php if($liste_associations[$i]['Ecuelles']=='1'){echo "Ecuelles" ;} ?>
						<?php if($liste_associations[$i]['Episy']=='1'){echo "Episy" ;} ?>
						<?php if($liste_associations[$i]['Montarlot']=='1'){echo "Montarlot";} ?></td>
                <td><?php echo $liste_associations[$i]['NomAs']; ?></td>

                <td><?php echo $liste_associations[$i]['AdrueSiegeAdmin'];?> <br>
                    <?php echo $liste_associations[$i]['NomVSA'];?> <br>
                    <?php echo $liste_associations[$i]['CodePostalVSA'];?> </td>

                <td><?php echo $liste_associations[$i]['AdrueSiegeSocial'];?> <br>
                    <?php echo $liste_associations[$i]['NomVSS'];?> <br>
                    <?php echo $liste_associations[$i]['CodePostalVSS'];?></td>



                <td><?php echo $liste_associations[$i]['Activite']; ?></td>

                <td><?php echo $liste_associations[$i]['forum']; ?></td>

                <td><?php echo $liste_associations[$i]['invit']; ?></td>

                <?php echo $liste_associations[$i]['Com'];?> </td>

                <td><?php echo $liste_associations[$i]['NomPre'];?>  <br>
                    <?php echo $liste_associations[$i]['PrenomPre'];?> <br>
                    <?php echo $liste_associations[$i]['NumPre'];?> <br>
                    <?php echo $liste_associations[$i]['MailPre'];?> </td>

                <td><?php echo $liste_associations[$i]['NomAutre'];?>  <br>
                    <?php echo $liste_associations[$i]['PrenomAutre'];?> <br>
                    <?php echo $liste_associations[$i]['NumAutre'];?> <br>
                    <?php echo $liste_associations[$i]['MailAutre'];?> </td>

                <td><?php echo $liste_associations[$i]['NomAutre1'];?>  <br>
                    <?php echo $liste_associations[$i]['PrenomAutre1'];?> <br>
                    <?php echo $liste_associations[$i]['NumAutre1'];?> <br>
                    <?php echo $liste_associations[$i]['MailAutre1'];?> </td>

                <td><?php echo $liste_associations[$i]['Site']; ?></td>
                <?php echo "<td><a href='index.php?action=editassociation&id-associations=".$liste_associations[$i][0]."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delassociation&id-associations=".$liste_associations[$i][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>"; ?>
            </tr>
        <?php } ?>

        </tbody>
    </table>
    <?php
}
else
{
$liste_ville = array('Moret-sur-Loing','Veneux-les-Sablons','Ecuelles','Montarlot','Episy','Moret-sur-Loing;Veneux-les-Sablons;Ecuelles','Moret-sur-Loing;Veneux-les-Sablons','Ecuelles;Veneux-les-Sablons','Moret-sur-Loing;Ecuelles');
$selec = array('Forum des Associations','Invitation Réunion Salles','aucune');
$champselec = array('forum','invit','aucune');

?>


<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <form action="" method="POST">
                Choix de la ville<br><br>
                <select name="ville" size="1">
                    <?php
                    for($i = 0; $i < count($liste_ville); $i++) {
                        echo "<option value='".$liste_ville[$i]."''>".$liste_ville[$i]."</option>";
                    }
                    ?>
                </select>

                <br><br>Selection<br><br>
                <select name="type" size="1">
                    <?php
                    for($i = 0; $i < count($selec); $i++) {
                        echo "<option value='".$champselec[$i]."'>".$selec[$i]."</option>";
                    }
                    ?>
                </select>

                <br><br><input type="submit">

            </form>
        </div>
    </div>
    <?php } ?>
</div>
</body>
</html>

