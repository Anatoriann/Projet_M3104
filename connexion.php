<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Écran de connexion</title>
</head>
<body>


<form action="" method="post">
	Login : <input type="text" name="login" required>
	Mot de passe : <input type="password" name="password" required>
	<input type="submit" name="connexion" value="Connexion">
</form>


<?php 

	if (!empty($_POST)) {
		$login = $_POST["login"];
		$mdp = $_POST["password"];

		$_SESSION["login"] = $login;
		$_SESSION["mdp"] = $mdp;
	}

	
?>


</body>
</html>