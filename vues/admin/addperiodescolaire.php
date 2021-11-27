<?php
require_once './modele/ModelPlanning.php';

    echo '<br><a href="index.php?action=options&manage=persco">Retour</a>';
$i=0;
if(isset($_POST["JourDebut"]) && isset($_POST["MoisDebut"]) && isset($_POST["AnDebut"]) && isset($_POST["JourDebut1"]) && isset($_POST["MoisDebut1"]) && isset($_POST["AnDebut1"]) && isset($_POST["JourFin1"]) && isset($_POST["MoisFin1"]) && isset($_POST["AnFin1"]) && isset($_POST["JourDebut2"]) && isset($_POST["MoisDebut2"]) && isset($_POST["AnDebut2"]) && isset($_POST["JourFin2"]) && isset($_POST["MoisFin2"]) && isset($_POST["AnFin2"]) && isset($_POST["JourDebut3"]) && isset($_POST["MoisDebut3"]) && isset($_POST["AnDebut3"]) && isset($_POST["JourFin3"]) && isset($_POST["MoisFin3"]) && isset($_POST["AnFin3"]) && isset($_POST["JourDebut4"]) && isset($_POST["MoisDebut4"]) && isset($_POST["AnDebut4"]) && isset($_POST["JourFin4"]) && isset($_POST["MoisFin4"]) && isset($_POST["AnFin4"]) && isset($_POST["JourFinal"]) && isset($_POST["MoisFinal"]) && isset($_POST["AnFinal"])) {
    $date_debut=ModelPlanning::GetId2ByAllInfo($_POST["JourDebut"],$_POST["MoisDebut"],$_POST["AnDebut"])[0][0];
    $date_debut1=ModelPlanning::GetId2ByAllInfo($_POST["JourDebut1"],$_POST["MoisDebut1"],$_POST["AnDebut1"])[0][0];
    $date_fin1=ModelPlanning::GetId2ByAllInfo($_POST["JourFin1"],$_POST["MoisFin1"],$_POST["AnFin1"])[0][0];
    $date_debut2=ModelPlanning::GetId2ByAllInfo($_POST["JourDebut2"],$_POST["MoisDebut2"],$_POST["AnDebut2"])[0][0];
    $date_fin2=ModelPlanning::GetId2ByAllInfo($_POST["JourFin2"],$_POST["MoisFin2"],$_POST["AnFin2"])[0][0];
    $date_debut3=ModelPlanning::GetId2ByAllInfo($_POST["JourDebut3"],$_POST["MoisDebut3"],$_POST["AnDebut3"])[0][0];
    $date_fin3=ModelPlanning::GetId2ByAllInfo($_POST["JourFin3"],$_POST["MoisFin3"],$_POST["AnFin3"])[0][0];
    $date_debut4=ModelPlanning::GetId2ByAllInfo($_POST["JourDebut4"],$_POST["MoisDebut4"],$_POST["AnDebut4"])[0][0];
    $date_fin4=ModelPlanning::GetId2ByAllInfo($_POST["JourFin4"],$_POST["MoisFin4"],$_POST["AnFin4"])[0][0];
    $date_fin=ModelPlanning::GetId2ByAllInfo($_POST["JourFinal"],$_POST["MoisFinal"],$_POST["AnFinal"])[0][0];

    ModelPlanning::AddPeriodeScolaire($date_debut, $date_debut1, $date_fin1, $date_debut2, $date_fin2, $date_debut3, $date_fin3, $date_debut4, $date_fin4, $date_fin);
    echo "<script>window.location.href='index.php?action=options&manage=persco'</script>";
  }
$liste_jour2 = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
$liste_mois = array(1,2,3,4,5,6,7,8,9,10,11,12);
$liste_an = array(2018);
for($i = 2019; $i != 2201; $i++) {
  array_push($liste_an, $i);
}
?>    
    <div class="forms">
        <div class="container-form">
            <div class="form-ajout">
              <div class="blanc"></div>
              <div class="titre">Choix de la période</div>
              <form action="" method="POST">
                <div class="blanc"></div>
                <div class="titre2">Date Début Année Scolaire</div>
                Date début<br>
                <div class="date">
                  <select name="JourDebut" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisDebut" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnDebut" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      } 
                    ?>
                  </select>
                <div class="titre2"><br>Date vacances de la toussaint</div>
                Date début<br>
                <div class="date">
                  <select name="JourDebut1" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisDebut1" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnDebut1" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
                  <br>Date fin<br>
                  <select name="JourFin1" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisFin1" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnFin1" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="blanc"></div>
                <div class="titre2">Date vacances de noël</div>
                Date début<br>
                <div class="date">
                  <select name="JourDebut2" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisDebut2" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnDebut2" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
                  <br>Date fin<br>
                  <select name="JourFin2" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisFin2" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnFin2" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="blanc"></div>
                <div class="titre2">Date vacances d'hiver</div>
                Date début<br>
                <div class="date">
                  <select name="JourDebut3" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisDebut3" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnDebut3" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
                  <br>Date fin<br>
                  <select name="JourFin3" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisFin3" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnFin3" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="blanc"></div>
                <div class="titre2">Date vacances de printemps</div>
                Date début<br>
                <div class="date">
                  <select name="JourDebut4" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisDebut4" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnDebut4" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
                  <br>Date fin<br>
                  <select name="JourFin4" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisFin4" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnFin4" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="blanc"></div>
                <div class="titre2">Date fin année scolaire</div>
                <div class="date">
                  <select name="JourFinal" size="1">
                    <?php
                      for($i = 0; $i < count($liste_jour2); $i++) {
                        echo "<option value='".$liste_jour2[$i]."''>".$liste_jour2[$i]."</option>";
                      }
                    ?>
                  </select>
                  <select name="MoisFinal" size="1">
                    <?php
                      for($i = 0; $i < count($liste_mois); $i++) {
                        $valeur=$i+1;
                        echo "<option value='".$valeur."''>".$valeur."</option>";
                      }
                    ?>
                  </select>
                  <select name="AnFinal" size="1">
                    <?php
                      for($i = 0; $i < count($liste_an); $i++) {
                          echo "<option value='".$liste_an[$i]."''>".$liste_an[$i]."</option>";
                      }
                    ?>
                  </select>
              <button type="submit" name="action" value="validrecur">Valider la période</button>
            </div>
          </form>
        </div>
      </div>
    </div>