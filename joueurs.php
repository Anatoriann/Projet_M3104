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

	<!--<?php
		require('menu.php');
	?>-->

	<div class="content">

		<p class="affichage-titre">Liste des joueurs</p>
			<div class="affichage_joueurs">
				<div class="affichage-joueurs-colg">
					<button class="player-accordion">
                        <?php
                            require('Classes/Joueur.php');
                            $joueurs = Joueur::selectJoueurs();
                        ?>
						<p class="player-name player-info">Jordan Clarkson</p>
						<p class="player-poste player-info">PG</p>
						<p class="player-state player-info">Suspendu</p>
						<a class="delete-btn " onclick="valider_suppression()"><i class="fa fa-trash"></i></a>
						<a class="edit-btn "><i class="fa fa-edit"></i></a>
					</button>
					<div class="player-details">
					  <img class="player-img">IMAGE</img>
					  <p class="player-detail">Taille</p>
					  <p class="player-detail">Poids</p>
					  <p class="player-detail">Age</p>
					</div>
				</div>
                <a href="creation_joueur.php" class="bouton_creation">Nouveau joueur</a>
			</div>
	</div>

<script>
	/* voir ce qu'il renvoie, s'il renvoie une liste omettre les a */
	var acc = document.getElementsByClassName("player-accordion");
	acc.classList.remove("delete-btn");
	acc.classList.remove("edit-btn");

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


	function valider_suppression() {
    var txt;
    var r = confirm("Voulez-vous supprimer ce joueur ?");
    if (r == true) {
        alert("Joueur supprimé !");
    }
}

</script>
</body>
</html>
