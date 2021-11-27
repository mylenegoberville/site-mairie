<html>
	<body>
		<link rel="stylesheet" href="assets/css/css-base.css">
		<link href="https://fonts.google.com/specimen/Raleway" rel="stylesheet">
		<header class="header-banner-options">
		  	<div class="main-navigation">
		    	<input type="checkbox" name="mobile-menu-toggle" id="mobile-menu-toggle" class="mobile-menu-box" />
		    	<nav class="horizontal-nav primary-wrapper" role='navigation'>
			      	<ul>
						<li><a href="index.php?action=options&manage=type-manif">Types Manifestations</a></li><div class="textblanc">|</div>
						<li><a href="index.php?action=options&manage=asso">Associations</a></li><div class="textblanc">|</div>
                        <li><a href="index.php?action=options&manage=liste">Liste Association par ville</a></li><div class="textblanc">|</div>
						<li><a href="index.php?action=options&manage=part">Particuliers</a></li><div class="textblanc">|</div>
						<li><a href="index.php?action=options&manage=persco">Periode Scolaire</a></li><div class="textblanc">|</div>
                        <li><a href="index.php?action=options&manage=compte">Compte Visiteur</a></li><div class="textblanc">|</div>
                        <li><a href="index.php?action=options&manage=tarif">Tarifs </a></li><div class="textblanc">|</div>
                        <li><a href="index.php?action=options&manage=salles">Les Salles </a></li><div class="textblanc"></div>

			      	</ul>
		    	</nav>

		    	<label for="mobile-menu-toggle" class="mobile-menu-label hidden"></label>
		  	</div>
		</header>
	</body>
</html>

<?php
	if($_GET["manage"] == "type-manif"){
		include ("vues/admin/edittypemanif.php");
	}

	if($_GET["manage"] == "tarif"){
		include ("vues/admin/tarif.php");
	}
	
		if($_GET["manage"] == "salles"){
		include ("vues/admin/salles.php");
	}
	
	if($_GET["manage"] == "asso"){
		include ("vues/admin/editassociation.php");
	}

	if($_GET["manage"] == "part"){
		include ("vues/admin/editparticulier.php");
	}

	if($_GET["manage"] == "persco"){
		include ("vues/admin/editperiodescolaire.php");
	}
	if ($_GET["manage"] == "compte") {
        ;
        include("vues/admin/editcomptevisiteur.php");
    }
    if($_GET["manage"] == "liste"){
        include ("vues/admin/listeasso.php");
    }
include("vues/base/footer.html");

?>
