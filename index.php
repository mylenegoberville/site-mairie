<?php session_start(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php

include ("vues/base/header.php");

if(isset($_SESSION['login'])) {
	if (($_GET["maj"] != "ajout")&&($_GET["maj"] != "edit")&&($_GET["maj"]!="vue")){
		include ("vues/general/planning.php");
	}

	/*if ($_GET['typeP'] == "planningPartiel")
	{
		echo "COUKIIIIIIIIIII";
		//$planningPartiel = "planningPartiel";
		include("vues/general/planningPartiel.php");
	}*/

	if($_GET["action"] == "rendezvous") {
		include ("vues/general/rendezvous.php");
	}

	if($_GET["action"] == "vuemanifA") {
		include ("vues/general/vuemanifA.php");
	}

	if($_GET["action"] == "vuemanifP") {
		include ("vues/general/vuemanifP.php");
	}

	if($_GET["action"] == "editmanifA") {
		include ("vues/general/editmanifA.php");
	}

	if($_GET["action"] == "editmanifP") {
		include ("vues/general/editmanifP.php");
	}

	if($_GET["action"] == "delmanifA") {
		include ("vues/general/delmanifA.php");
	}

	if($_GET["action"] == "delmanifP") {
		include ("vues/general/delmanifP.php");
	}
	if($_GET["action"] == "options") {
		include ("vues/admin/options.php");
	}

	if($_GET["action"] == "deltypemanif") {
		include ("vues/admin/deltypemanif.php");
	}

	if($_GET["action"] == "delparticulier") {
		include ("vues/admin/delparticulier.php");
	}

	if($_GET["action"] == "delassociation") {
		include ("vues/admin/delassociation.php");
	}

	if($_GET["action"] == "modiftypemanif") {
		include ("vues/admin/modiftypemanif.php");
	}

	if($_GET["action"] == "editassociation") {
		include ("vues/admin/modifassociation.php");
	}

	if($_GET["action"] == "editparticulier") {
		include ("vues/admin/modifparticulier.php");
	}

	if ($_GET["action"] == "addtypemanif") {
		include ("vues/admin/addtypemanif.php");
	}

	if ($_GET["action"] == "addassociation") {
		include ("vues/admin/addassociation.php");
	}

	if ($_GET["action"] == "addparticulier") {
		include ("vues/admin/addparticulier.php");
	}

    if($_GET["action"] == "addvisiteur") {
		include ("vues/admin/addcomptevisiteur.php");
	}

    if($_GET["action"] == "addperiodescolaire") {
        include ("vues/admin/addperiodescolaire.php");
    }
	
    if($_GET["action"] == "editsalles") {
        include ("vues/admin/editsalles.php");
    }

	if($_GET["action"] == "delperiodescolaire") {
		include ("vues/admin/delperiodescolaire.php");
	}
    if($_GET["action"] == "delcomptevisiteur") {
        include ("vues/admin/delcomptevisiteur.php");
    }
	if($_GET["action"] == "delsalles") {
        include ("vues/admin/delsalles.php");
    }
	if($_GET["action"] == "deltarifp") {
        include ("vues/admin/deltarifp.php");
    }
	if($_GET["action"] == "deltarifa") {
        include ("vues/admin/deltarifa.php");
    }
	if($_GET["action"] == "facturation") {
        include ("vues/general/facturation.php");
	}
	
	if($_GET["action"] == "addtarifa") {
        include ("vues/admin/addtarifA.php");
	}
	
	if($_GET["action"] == "addtarifp") {
        include ("vues/admin/addtarifp.php");
	}
	
	if($_GET["action"] == "addsalles") {
        include ("vues/admin/addsalles.php");
	}
	
	if($_GET["action"] == "addbatiment") {
        include ("vues/admin/addbatiment.php");
	}
	
	if($_GET["action"] == "modiftarifa") {
        include ("vues/admin/edittarifa.php");
	}
	
	if($_GET["action"] == "modiftarifp") {
        include ("vues/admin/edittarifp.php");
	}
} 
else {
	include ("controleur/login.php");
}

include("vues/base/footer.html");

?>