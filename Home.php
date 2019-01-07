<?php
require('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>

<body>
		<?php
		require('menu.php');
		 ?>


		<div class="content">


			<div class="match-prevu" style="text-align: center;">
				<p> Bienvenue dans votre utilitaire de gestion d'équipe, <?php echo $_SESSION['pseudo'] ?> ! </p>
			</div>

			<div class="redirection-accueil">
				<a href="joueurs.php"><button class="boutton-accueil">Visualiser les joueurs</button></a>
				<a href="matchs.php"><button class="boutton-accueil">Visualiser les matchs</button></a>
				<a href="statistiques.php"><button class="boutton-accueil">Statistiques des joueurs</button></a>
			</div>
		</div>



</body>
</html>
