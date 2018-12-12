<!DOCTYPE html>
<html>
<head>
	<title>Matchs à suivre</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<meta charset="utf-8">
</head>

<body>

	<?php 
		require('menu.php');
	?>

	<div class="content">
			
		<div class="affichage_matchs">
			<p> Liste des matchs </p>	

			<a href="creation_match.php" class="bouton_creation"> Nouveau match </a>

			<div class="tableau_affichage">
				<table>
				
				  <tr>
				   	 <td>17/07/2018</td>
				  	  <td>15:00</td>
				  	  <td>Golden States Warrior</td>
					<td> Domicile </td>
					<td> Attente de préparation </td>
					<td onclick="valider_suppression()"> <i class="material-icons" >delete</i> </td>
				  </tr>
				  
					<tr>
				    <td>17/07/2018</td>
				    <td>15:00</td>
				    <td>Golden States Warrior</td>
				<td> Domicile </td>
				<td> Attente de préparation </td>
				<td onclick="valider_suppression()"> <i class="material-icons" >delete</i> </td>
				
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
