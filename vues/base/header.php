<html>
	<body>
		<link rel="stylesheet" href="assets/css/css-base.css">
		<link href="https://fonts.google.com/specimen/Raleway" rel="stylesheet">
		<header class="header-banner-top">
			<a href="index.php"><img src="assets/img/MLO2.png" width="400px"></a>
			<?php if(isset($_SESSION['login'])) { echo '<a href=deconnexion.php><div class="pseudoheader"><p>Déconnexion</p></div></a>'; }?>
		  	<div class="main-navigation">
		    	<input type="checkbox" name="mobile-menu-toggle" id="mobile-menu-toggle" class="mobile-menu-box" />
		    	<nav class="horizontal-nav primary-wrapper" role='navigation'>
			      	<ul>
						<li<?php if($_GET["ville"] == "Ecuelles"){echo ' id="en-cours"';}?>><a href="index.php?ville=Ecuelles">Ecuelles</a></li><div class="textblanc">|</div>
						<li<?php if($_GET["ville"] == "Episy"){echo ' id="en-cours"';} ?>><a href="index.php?ville=Episy">Episy</a></li><div class="textblanc">|</div>
						<li<?php if($_GET["ville"] == "Montarlot"){echo ' id="en-cours"';} ?>><a href="index.php?ville=Montarlot">Montarlot</a></li><div class="textblanc">|</div>
						<li<?php if($_GET["ville"] == "Moret-Sur-Loing"){echo ' id="en-cours"';}?>><a href="index.php?ville=Moret-Sur-Loing">Moret-sur-Loing</a></li><div class="textblanc">|</div>
						<li<?php if($_GET["ville"] == "Veneux-Les-Sablons"){echo ' id="en-cours"';} ?>><a href="index.php?ville=Veneux-Les-Sablons">Veneux-Les-Sablons</a></li><div class="textblanc"></div>
						<li><a href="index.php?action=options"><i class="fa fa-cog" style="font-size:18px;" aria-hidden="true"></i></a></li>
			      	</ul>
		    	</nav>

		    	<label for="mobile-menu-toggle" class="mobile-menu-label hidden"></label>
		  	</div>
		</header>
	</body>
</html>
