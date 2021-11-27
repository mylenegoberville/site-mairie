<?php

    require_once './modele/ModelPlanning.php';

    $idvisiteur = ModelPlanning::GetAllVist($_GET["id-visiteur"])[0]['id'];
    echo "<script>window.location.href='index.php?action=options&manage=compte'</script>";
    ModelPlanning::DelVisiteurById($_GET["id-visiteur"]);

?>