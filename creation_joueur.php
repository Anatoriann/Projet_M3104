<!DOCTYPE html>
<html>
<head>
	<title>Création de joueur</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>

<body>

    <?php
    if (!isset($_POST)){
        echo 'lol';
    }
    ?>

	<?php 
		require('menu.php');
	?>

	<div class="content">
			<div class="formulaire">
				<p>Saisissez les informations relatives au nouveau joueur.</p>


				<form action="traitement.php" method="post">
					
					<div class="info-joueur">
			
						<div class="licence"> <input name="num_licence" type="text" placeholder="Numéro de licence" required > <br /> </div>

						<input name="nom" type="text" placeholder="Nom" required> <br />

						<input name="prenom" type="text" placeholder="Prénom" required> <br />
					</div>
 					
					<p>Date et heure du match</p>
					 <input name="date" type="date" placeholder="JJ/MM/AAAA" required>  <br />

					<p>Taille</p>
					 <input name="taille" type="number" placeholder="" required class="mensuration">m  <br />

					<p>Poids</p>
					 <input name="poids" type="number" placeholder="" required class="mensuration">Kg  <br />

					<p>Poste favori</p>
					 <select name ="postePrefere">
					<option value=1>Meneur</option>
					<option value=2>Arrière</option>
					<option value=3>Ailier</option>
					<option value=4>Ailier fort</option>
					<option value=5>Pivot</option>
					</select> <br />

					<p>Statut</p>
					 <select name = "statut">
						<option value=1>Actif</option>
						<option value=2>Suspendu</option>
						<option value=3>Blessé</option>
						<option value=4>Absent</option>
					</select> <br />
					
					<div class="photo_joueur">
						<p> Insérez la photo du nouveau joueur. </p>
						<input type="file" name="photo"
	       					accept="image/png, image/jpeg"> <br />
					</div>

					<a href="joueurs.php" class="bouton_retour">&laquo; Retour</a>

					<input type="submit" value="Valider">
				</form>

			</div>
	</div>

</body>
</html>
