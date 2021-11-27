<?php
$propose = false;
require_once './modele/ModelUser.php';
$error = "";

if(isset($_POST['login']) && isset($_POST['password']))
{
	$user = $_POST['login'];
	$pwd = $_POST['password'];

	$user = ModelUser::connectUser($user, $pwd);
	$user = $user[0];
	if(isset($user))
	{
		$_SESSION['iduser'] = $user[0];
		$_SESSION['login'] = $user[1];
		echo "<script>window.location.href='index.php'</script>";
	}
	else {
		$error = "Mauvais identifiants.";
		$propose = true;
	}
}


?>

<html>
	<body>
		<link rel="stylesheet" href="assets/css/css-general.css">

		<div class="logologin">
      		<div class="logo"><img src="assets/img/login-icon.png" width="130px"></div>
    	</div>
	    <div class="login">
	        <form action="" method="POST">
	          <input type="text" placeholder="username" name="login"><br>
	          <input type="password" placeholder="password" name="password"><br>
	          <input type="submit" value="Login">
	        </form>
	        <?php echo $error;
					if($propose)
					{
						?>
						<a href="index.php?motdepasse=oublie"> Mot de passe oublié ? </a>
						<?php
					}?>
	    </div>
	</body>
</html>
