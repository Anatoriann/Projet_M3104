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
			<p> Matchs à venir </p>	

			<a href="creation_match.php" class="bouton_creation"> Nouveau match </a>

			<div class="tableau_affichage">
				<table>
				  <tr>
				    <td>Alfreds Futterkiste</td>
				    <td>Maria Anders</td>
				    <td>Germany</td>
				  </tr>
				  <tr>
				    <td>Centro comercial Moctezuma</td>
				    <td>Francisco Chang</td>
				    <td>Mexico</td>
				<td> <i class="material-icons" onclick="valider_suppression()">delete	</i> </td>
				  </tr>
				  <tr>
				    <td>Ernst Handel</td>
				    <td>Roland Mendel</td>
				    <td>Austria</td>
				  </tr>
				  <tr>
				    <td>Island Trading</td>
				    <td>Helen Bennett</td>
				    <td>UK</td>
				  </tr>
				  <tr>
				    <td>Laughing Bacchus Winecellars</td>
				    <td>Yoshi Tannamuri</td>
				    <td>Canada</td>
				  </tr>
				  <tr>
				    <td>Magazzini Alimentari Riuniti</td>
				    <td>Giovanni Rovelli</td>
				    <td>Italy</td>
				  </tr>
				<tr>
				    <td>Magazzini Alimentari Riuniti</td>
				    <td>Giovanni Rovelli</td>
				    <td>Italy</td>
				  </tr><tr>
				    <td>Magazzini Alimentari Riuniti</td>
				    <td>Giovanni Rovelli</td>
				    <td>Italy</td>
				  </tr><tr>
				    <td>Magazzini Alimentari Riuniti</td>
				    <td>Giovanni Rovelli</td>
				    <td>Italy</td>
				  </tr><tr>
				    <td>Magazzini Alimentari Riuniti</td>
				    <td>Giovanni Rovelli</td>
				    <td>Italy</td>
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
