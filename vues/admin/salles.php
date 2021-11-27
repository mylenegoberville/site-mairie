<?php

require_once './modele/ModelPlanning.php';

$i=0;
$liste_salles = ModelPlanning::GetAllSalles();

?>

<html>
	<link rel="stylesheet" href="assets/css/css-general.css">
	<link rel="stylesheet" href="assets/css/css-base.css">
    <link rel="stylesheet" type="text/css" href="assets/css/impression.css" media="print">
<body>
<!--TEST BOOTSTRAP-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
<div class="titre">Les Salles</div>
<div class="forms">
			<div class="btns"><a href="index.php?action=addsalles" class="btn green"><strong>+</strong> Ajouter une salle</a>
			<a href="index.php?action=addbatiment" class="btn green"><strong>+</strong> Ajouter un batiment</a></div>
         <table class="table-fill">
			<thead>
				<tr>
					<th>Villes</th>
					<th>Batiments </th>
					<th>Salles</th>
					<th>Adresses</th>
					<th>Capacité</th>
					<th>Editer/Supprimer</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php for($i = 0; $i < count($liste_salles); $i++){?>
			    	<tr>
			    		<td><?php echo $liste_salles[$i]['NomV']; ?></td>
			    		<td><?php echo $liste_salles[$i]['NomB']; ?></td>
			    		<td><?php echo $liste_salles[$i]['NomS']; ?></td>
			    		<td><?php echo $liste_salles[$i]['adresse']; ?></td>
			    		<td><?php echo $liste_salles[$i]['Capacite']; ?></td>
			    		<?php echo "<td><a href='index.php?action=editsalles&id-salles=".$liste_salles[$i][0]."&id-batiment=".$liste_salles[$i]['IdB']."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=delsalles&id-salles=".$liste_salles[$i][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>"; ?>
			    	</tr>
		    	<?php }  ?>

		    </tbody>
		</table>
   
</div>