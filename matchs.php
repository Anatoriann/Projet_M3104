<!DOCTYPE html>
<html>
<head>
	<title>Matchs à suivre</title>
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
			
		<div class="affichage_matchs">
			<p class="affichage-titre">Liste des matchs </p>	

			<a href="creation_match.php" class="bouton_creation"> Nouveau match </a>

			<div class="tableau_affichage">
				<table>
				
				  	<tr class="tableau-affichage-match">
					   	<td onclick="window.location='lol.html';">17/07/2018</td>
					  	<td onclick="window.location='lol.html';">15:00</td>
					  	<td onclick="window.location='lol.html';">Golden States Warrior</td>
						<td onclick="window.location='lol.html';"> Domicile </td>
						<td onclick="window.location='lol.html';"> Attente de préparation </td>
						<td>
							<div onclick="window.location='lol.html';"></div>
							<a href="#" >
								<button class="delete-btn"  onclick="valider_suppression()"><i class="fa fa-trash"></i></button>
							</a>
						</td>
				  	</tr>
				  
				  
				</table>
			</div>
		</div>
		
	</div>


<script>
function valider_suppression() {
    var txt;
    var r = confirm("Voulez-vous supprimer ce match ?");
    if (r == true) {
        alert("Match supprimé !");
    }
}

</script>

</body>
