<?php
require('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Assigner les joueurs au match</title>
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


			<div class="formulaire">
				<p>Sélectionnez les joueurs que vous voulez assigner à ce match.</p>

				<div class="affichage-joueurs">
						<div class="affichage-joueurs-colg">

								<div class="affichage-joueur">
												<button class="player-accordion">
															<div class="player-info">Meneur</div>
															<div class="player-info">
																<select>
																	<option>Jordan Clarkson</option>
																</select>
															</div>
															<div class="player-info">Suspendu</div>
															<div class="player-info">28 ans</div>
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
											<div class="player-panel">
												<p class="player-pinfo">Poids </p>
												<p class="player-pinfo">Taille </p>
												<p class="player-pinfo">Commentaire pas trop long stp</p>
											</div>
										</div>
						</div>

							<div class="affichage-joueurs-cold">
								<div class="affichage-joueur">
												<button class="player-accordion">
															<div class="player-info">Remplaçant 1</div>
															<div class="player-info">
																<select>
																	<option>Jordan Clarkson</option>
																</select>
															</div>
															<div class="player-info">Suspendu</div>
															<div class="player-info">28 ans</div>
												</button>
												<div class="player-panel">
															<p class="player-pinfo">Poids </p>
															<p class="player-pinfo">Taille </p>
															<p class="player-pinfo">Commentaire pas trop long stp</p>
												</div>
							</div>
						</div>

				<form action="" method="post">



					<div class="boutons-assignation">
					<a href="matchs.php" class="bouton_retour">« Retour</a>
					<a href="modifier_match.php" class="bouton-modification"><i class="fa fa-edit"></i>Modifier match</a>
					<input type="submit" value="Valider &raquo;" class="valider-assignation-joueur">
				</div>
				</form>

			</div>
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
	</script>
</body>
</html>
