<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>

<body>
		<?php 
		include('menu.html');
		 ?>

		
		<div class="content">

			<div class="date"> 
				<img src="icone/calendrier">
				<p><?php 
					$today = date("d.m.y"); 
					echo "$today"; 
				?></p>
			</div>


			<div class="match-prevu">
				<p> Prochain match prévu </p>
			</div>

			<div class="redirection-accueil">
				<a href="joueurs.php"><button class="boutton-accueil">Visualiser les joueurs</button></a>
				<a href="matchs.php"><button class="boutton-accueil">Visualiser les matchs</button></a>
				<a href="statistiques.php"><button class="boutton-accueil">Statistiques des joueurs</button></a>
			</div>
		</div>



</body>
</html>