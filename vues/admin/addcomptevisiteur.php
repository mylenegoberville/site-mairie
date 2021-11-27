<?php
require_once './modele/ModelPlanning.php';

echo '<br><a href="index.php?action=options&manage=compte">Retour</a>';

$i=0;
$idvisiteur = $_GET["id-visiteur"];
if(isset($_POST["login"]) && isset($_POST["password"])) {


    if  (empty($_POST['login']) OR empty($_POST['password'])) {
        echo '
        <p>Attention, vous avez oublié de remplir les champs suivants :</p>
        <ul>';}
    if(empty($_POST['login']))
    {
        echo '
            <li>Login</li>';
    }if(empty($_POST['password']))
    {
        echo '
            <li>password</li>';
    }
    else {
        ModelPlanning::AddCompteVisiteur($_POST["login"], $_POST["password"]);
        echo "<script>window.location.href='index.php?action=options&manage=compte'</script>";
    }
}

?>
<html>
<link rel="stylesheet" href="css-general2.css">
<link rel="stylesheet" href="css-base2.css">
<body>
<div class="titre">Ajouter un compte visiteur</div>
<div class="forms">
    <div class="container-form-asso">
        <div class="form-ajout">
            <div class="blanc"></div>
            <div class="titre">Ajout</div>
            <form action="" method="POST">
                <div class="blanc"></div>
                Login<br>
                <input type="text" placeholder="Login" name="login"><br>
                Password<br>
                <input type="password" placeholder="Password" name="password"><br>
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>
