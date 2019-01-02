<?php
require('session.php');
require('Classes/Joueur.php');
if (!empty($_GET['suppr'])) {
    $res = Joueur::deleteJoueur($_GET['suppr']);
    header("Location: traitement.php?error=$res");
}
?>
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
    <?php Joueur::affichageAvecModif();?>
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


	function valider_suppression(numLicence) {
    var txt;
    var r = confirm("Voulez-vous supprimer ce joueur ?");
    if (r == true) {
        document.location.href="joueurs.php?suppr="+numLicence;
    }
}

</script>

</body>
</html>
