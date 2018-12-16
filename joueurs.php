<!DOCTYPE html>
<html>
<head>
	<title>Liste des joueurs</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
</head>

<body>

	<?php 
		require('menu.php');
	?>

	<div class="content">
			
		<p class="affichage-titre">Liste des joueurs</p>
			<div class="affichage_joueurs">
				<div class="affichage-joueurs-col">
					<button class="player-accordion">Section 1</button>
					<div class="player-details">
					  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
				</div>




				<a href="creation_joueur.php" class="bouton_creation">Nouveau joueur</a>
			</div>
	</div>

<script>
	var acc = document.getElementsByClassName("player-accordion");
	var i;

	for (i=0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			}
		});
	}
</script>
</body>
</html>
