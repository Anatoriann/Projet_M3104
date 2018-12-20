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
		require('Classes/Joueur.php');
		$joueurs = Joueur::selectJoueurs();
	?>

<div class="content">
	<p class="affichage-titre">Liste des joueurs</p>


			<div class="affichage-joueurs">
					<div class="affichage-joueurs-colg">

							<div class="affichage-joueur">
											<button class="player-accordion">
														<div class="player-info">Jordan Clarkson</div>
														<div class="player-info">PG</div>
														<div class="player-info">Suspendu</div>
														<div class="player-info">28 ans</div>
														<div class="player-info">
																<a href="#" class="delete-btn"><i class="fa fa-trash"></i></a>
														</div>
														<div class="player-info">
																<a href="#" class="edit-btn"><i class="fa fa-edit"></i></a>
														</div>
											</button>
											<div class="player-panel">
														<p class="player-pinfo">Poids </p>
														<p class="player-pinfo">Taille </p>
														<p class="player-pinfo">Commentaire pas trop long stp</p>
											</div>
						</div>

						<div class="affichage-joueur">
										<button class="player-accordion">aaaaa
										</button>
										<div class="player-panel">aa
										</div>
									</div>
					</div>

						<div class="affichage-joueurs-cold">
							<div class="affichage-joueur">
											<button class="player-accordion">
														<div class="player-info">Jordan Clarkson</div>
														<div class="player-info">PG</div>
														<div class="player-info">Suspendu</div>
														<div class="player-info">28 ans</div>
														<div class="player-info">
																<a href="#" class="delete-btn"><i class="fa fa-trash"></i></a>
														</div>
														<div class="player-info">
																<a href="#" class="edit-btn"><i class="fa fa-edit"></i></a>
														</div>
											</button>
											<div class="player-panel">
														<p class="player-pinfo">Poids </p>
														<p class="player-pinfo">Taille </p>
														<p class="player-pinfo">Commentaire pas trop long stp</p>
											</div>
										</div>
						</div>



					</div>
			</div>

			<a href="creation_joueur.php" class="bouton_creation"> Nouveau joueur </a>
</div>

<script>

	var acc = document.getElementsByClassName("player-accordion");


	var i;

	for (i=0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
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
