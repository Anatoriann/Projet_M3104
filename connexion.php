<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title>Écran de connexion</title>
</head>
<body>


<?php 
	$login = "lol";
	$mdp = "lol";

	if (!empty($_POST)) {
		$login = $_POST["login"];
		$mdp = $_POST["password"];

		if ($login == 'lol' && $mdp == 'lol') {
		$_SESSION["valid"] = true;
		$_SESSION["username"] = $login;
		header('Location: home.php');
		
		} else {
		echo "Vous avez entré des informations invalides";
		}
}

	

	
?>



<div class="connexion-container">
	<form action="" method="post" >
		Login  <input type="text" name="login" required class="connexion-form login">
		Mot de passe  <input type="password" name="password" required class="connexion-form mdp"> <br />
		<input type="submit" name="connexion" value="Connexion" class="connexion-form-btn">
	</form>
</div>




</body>
</html>
