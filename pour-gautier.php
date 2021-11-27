    <div class="forms">
        <div class="container-form">
            <div class="form-ajout">
              <div class="blanc"></div>
              <div class="titre">Choix de la période</div>
              <form action="" method="POST">
                <div class="blanc"></div>
                <div class="titre2">Date vacances de la toussaint</div>
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

              <?php
              echo '<input type="hidden" name="NomM" value="'.$_POST["NomM"].'">';
              echo '<input type="hidden" name="Publique" value="'.$_POST["Publique"].'">';
              echo '<input type="hidden" name="NbrPublique" value="'.$_POST["NbrPublique"].'">';
              echo '<input type="hidden" name="HeureDebut" value="'.$HeureDebut.'">';
              echo '<input type="hidden" name="HeureFin" value="'.$HeureFin.'">';
              echo '<input type="hidden" name="IdTypeManif" value="'.$_POST["IdTypeManif"].'">';
              echo '<input type="hidden" name="IdJour" value="'.$_POST["IdJour"].'">';
              echo '<input type="hidden" name="IdSalle" value="'.$_POST["IdSalle"].'">';

              if(isset($_POST["IdAs"])) {
                echo '<input type="hidden" name="IdAs" value="'.$_POST["IdAs"].'">';
              }

              if(isset($_POST["IdM"])) {
                echo '<input type="hidden" name="IdM" value="'.$_POST["IdM"].'">';
              }

              ?>

              <div class="blanc"></div>
              <button type="submit" name="action" value="validrecur">Valider la période</button>
            </div>
          </form>
        </div>
      </div>
    </div>