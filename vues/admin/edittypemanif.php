<?php
require_once './modele/ModelPlanning.php';

$i=0;
$type_manif=$_GET["types manifestation"];
$liste_type_manif = ModelPlanning::GetAllTypeManif();
?>
<html>
	<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
	<body>
		<div class="btns"><a href="index.php?action=addtypemanif" class="btn green"><strong>+</strong> Ajout type manif</a></div>
		<br>
		<table class="table-fill">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Payant ?</th>
					<th>Editer/Supprimer</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php for($i = 0; $i < count($liste_type_manif); $i++){?>
			    	<tr>
			    		<td><?php echo $liste_type_manif[$i]['LibelleT']; ?></td>
			    		<td>
			    			<?php 
			    				if($liste_type_manif[$i]['Payant'] == 1){
			    					echo "oui";
			    				}
			    				else {
			    					echo "non";
			    				}
			    			?>
			    		</td>
			    		<?php echo "<td><a href='index.php?action=modiftypemanif&id-type-manif=".$liste_type_manif[$i][0]."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=deltypemanif&id-type-manif=".$liste_type_manif[$i][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>"; ?>
			    	</tr>
		    	<?php }  ?>

		    </tbody>
		</table>
	</body>
</html>