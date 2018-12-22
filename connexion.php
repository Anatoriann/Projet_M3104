<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title>Connexion</title>
</head>
<body>


<?php

	require('connectPDO.php');
	$linkpdo = connectPDO();

	if (!empty($_POST)) {
			$pseudo = $_POST['login'];
			$req = $linkpdo->prepare('SELECT id,mdp FROM user WHERE pseudo = :pseudo');
			$req->execute(array('pseudo' => $pseudo));
			$res = $req->fetch();

			$mdpcorrect = password_verify($_POST['password'], $res['mdp']);

			if (!$res) {
				$erreur = true;
			} else {
					 if ($mdpcorrect) {
						 	header('Location: home.php');
						 session_start();
						 $_SESSION['id'] = $res['id'];
						 $_SESSION['pseudo'] = $pseudo;
					 } else {
						 $erreur = true;
					 }
			}
		}

?>



<div class="connexion-container">
	<form action="" method="post" >
		Login  <input type="text" name="login" required class="connexion-form login">
		Mot de passe  <input type="password" name="password" required class="connexion-form mdp"> <br />
		<?php
			if (isset($erreur) and $erreur) {
				echo '<div class="erreur-connexion">Mauvais identifiant ou mot de passe</div>';
			}
		?>
		<br />
		<input type="submit" name="connexion" value="Connexion" class="connexion-form-btn">
	</form>
</div>




</body>
</html>
