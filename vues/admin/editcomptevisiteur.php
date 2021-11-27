<?php
require_once './modele/ModelPlanning.php';

$i=0;
$visiteur=$_GET["visiteur"];
$liste_visiteur = ModelPlanning::GetAllVist();
?>
<html>
    <link rel="stylesheet" href="assets/css/css-general.css">
    <link rel="stylesheet" href="assets/css/css-base.css">
    <body>
        <div class="btns"><a href="index.php?action=addvisiteur" class="btn green"><strong>+</strong> Ajout Compte Visiteur</a></div>

        <br>
        <table class="table-fill">
            <thead>
                <tr>
                    <th>login</th>
                    <th>password</th>
                    <th></th>
                </tr>
                </thead>
          <tbody>
                <?php for($i = 0; $i < count($liste_visiteur); $i++){?>
                    <tr>
                        <td><?php echo $liste_visiteur[$i]['login']; ?></td>
                        <td><?php echo $liste_visiteur[$i]['password'];?></td>

                        <?php echo "<td><a href='index.php?action=delcomptevisiteur&id-visiteur=".$liste_visiteur[$i][0]."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>"; ?>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </body>
</html>