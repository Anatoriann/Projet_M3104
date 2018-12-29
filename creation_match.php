<?php
require('session.php');
require('Classes/Match.php');
if (!empty($_POST['equipe'])){
    $res = Match::addMatch($_POST['equipe'],$_POST['date'], $_POST['time'], $_POST['lieu']);
    header("Location: traitement.php?error=$res");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Création de match</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>

<body>
    <?php
		require('menu.php');
	?>

	<div class="content">


			<div class="formulaire">
				<p>Saisissez les informations relatives au nouveau match.</p>


				<form action="creation_match.php" method="post">
					<input name="equipe" type="text" placeholder="Nom de l'équipe adverse" required>  <br />

					<p>Date et heure du match</p>
					 <input name="date" type="date" placeholder="JJ/MM/AAAA" required>

					<input name="time" type="time" placeholder = "--:--" required class="heure"> <br />

					<p> Lieu de rencontre </p>
					<input type="radio" name="lieu" value=1 checked>
 					 <label>Domicile</label>  <br />
	 				<input type="radio" name="lieu" value=2>
	 				 <label>Extérieur</label>  <br />
					<!-- Si statut = terminé enlever le readonly -->

					<a href="matchs.php" class="bouton_retour">&laquo; Retour</a>
					<input type="submit" value="Valider &raquo;">
				</form>

			</div>
	</div>

</body>
</html>
