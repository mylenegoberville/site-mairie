<?php
require_once './modele/ModelPlanning.php';

//echo '<br><a href="index.php?action=options&manage=part">Retour</a>';

$i=0;
$particulier=$_GET["Particulier"];
$liste_particulier = ModelPlanning::GetAllPart();
?>
<html>
	<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
    <link rel="stylesheet" type="text/css" href="assets/css/impression.css" media="print">
	<body>
		<div class="btns"><a href="index.php?action=addparticulier" class="btn green"><strong>+</strong> Ajout Particulier</a></div>
        <div class="img"><a href="javascript:window.print()"><img src="https://png.icons8.com/ios/30/000000/print-filled.png"></a></div>

		<br>
		<table class="table-fill">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Telephone</th>
					<th>Mail</th>
					<th>Code Postal</th>
					<th>Ville</th>
					<th>Adresse</th>
					<!--<th class="colonne"></th>-->
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php for($i = 0; $i < count($liste_particulier); $i++){?>
			    	<tr>
			    		<td><?php echo $liste_particulier[$i]['Nom']; ?></td>
			    		<td><?php echo $liste_particulier[$i]['Prenom'];?></td>
			    		<td><?php echo $liste_particulier[$i]['NumeroTelephone'];?>
                        <?php echo "<br>".$liste_particulier[$i]['DeuxiemeTel'];?>
                        <?php echo "<br>".$liste_particulier[$i]['TroisiemeTel'];?> </td>
			    		<td><?php echo $liste_particulier[$i]['Mail']; ?></p></td>
			    		<td><?php echo $liste_particulier[$i]['CodePostal'];?></td>
			    		<td><?php echo $liste_particulier[$i]['Ville']; ?></td>
			    		<td><?php echo $liste_particulier[$i]['Adresse']; ?></td>
			    		<?php echo "<td><a href='index.php?action=editparticulier&id-particulier=".$liste_particulier[$i][0]."'><i class='fa fa-pencil' aria-hidden='true'></i></a><br><a href='index.php?action=delparticulier&id-particulier=".$liste_particulier[$i][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>"; ?>
			    	</tr>
		    	<?php } ?>

		    </tbody>
		</table>
	</body>
</html>