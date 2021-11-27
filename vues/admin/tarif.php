<?php

require_once './modele/ModelPlanning.php';


$liste_asso = ModelPlanning::GetIdTa();
$liste_part = ModelPlanning::GetIdTp();
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
<div class="titre">Ajouter un tarif</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
			<div class="btns"><a href="index.php?action=addtarifa" class="btn green"><strong>+</strong> Ajout tarif association</a></div>
            <div class="titre">Tarif pour association</div>
         <table class="table-fill">
			<thead>
				<tr>
					<th>Villes</th>
					<th>Salles </th>
					<th>Tarifs</th>
					<th></th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php for($i = 0; $i < count($liste_asso); $i++){?>
			    	<tr>
			    		<td><?php echo $liste_asso[$i]['ville']; ?></td>
			    		<td><?php echo $liste_asso[$i]['salle']; ?></td>
			    		<td><?php echo $liste_asso[$i]['tarif']; ?>€</td>
			    		<?php echo "<td><a href='index.php?action=modiftarifa&idtarifa=".$liste_asso[$i][0]."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=deltarifa&idtarifa=".$liste_asso[$i][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>"; ?>
			    	</tr>
		    	<?php }  ?>

		    </tbody>
		</table>
        </div>
    </div>

    <div class="container-form-part">
        <div class="form-ajout">
            <div class="blanc"></div>
			<div class="btns"><a href="index.php?action=addtarifp" class="btn green"><strong>+</strong> Ajout tarif particulier</a></div>
            <div class="titre">Tarif pour particulier</div>
            <table class="table-fill">
			<thead>
				<tr>
					<th>Villes</th>
					<th>Salles </th>
					<th>Tarifs</th>
					<th></th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php for($i = 0; $i < count($liste_part); $i++){?>
			    	<tr>
			    		<td><?php echo $liste_part[$i]['ville']; ?></td>
			    		<td><?php echo $liste_part[$i]['salle']; ?></td>
			    		<td><?php echo $liste_part[$i]['tarif']; ?>€</td>
			    		<?php echo "<td><a href='index.php?action=modiftarifp&idtarifp=".$liste_part[$i][0]."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='index.php?action=deltarifp&idtarifp=".$liste_part[$i][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>"; ?>
			    	</tr>
		    	<?php }  ?>

		    </tbody>
		</table>
        </div>
    </div>
</div>