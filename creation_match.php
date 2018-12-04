<!DOCTYPE html>
<html>
<head>
	<title>Création de match</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>

<body>

	<?php 
		include('menu.html');
	?>

	<div class="content">
			
			<div class="date"> 
				<img src="icone/calendrier.svg">
				<p><?php
					 $today = date("d.m.y"); 
					echo "$today"; 
				?></p>
			</div>

			<div class="formulaire">
				<p>Saisissez les informations relatives au nouveau match.</p>


				<form action="matchs.php" method="post">
					<input name="equipe" type="text" placeholder="Nom de l'équipe adverse" required> <br />

					<p>Date et heure du match</p>
					 <input name="date" type="date" placeholder="JJ/MM/AAAA" required> 

					<input name="time" type="time" required> <br />

					<p> Lieu de rencontre </p>
					<input type="radio" name="domicile" value=1 checked>
 					 <label>Domicile</label>  <br />				
	 				<input type="radio" name="extérieur" value=2> 
	 				 <label>Extérieur</label>  <br />
 					

					<input type="submit" value="Valider">
				</form>

			</div>
	</div>

</body>
</html>
