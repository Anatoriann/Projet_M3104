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
                        <td>Date</td>
                        <td>Heure</td>
                        <td>Adversaire</td>
                        <td>Lieu de rencontre</td>
                        <td>Résultat local</td>
                        <td>Résultat adversaire</td>
                        <td>Statut</td>
                        <td>Suppression</td>
                    </tr>
                    <?php
                    require('Classes/Matchs.php');
                    $matchs = Matchs::selectMatchs();
                    foreach ($matchs as $m) {
                        ?>
                        <tr class="tableau-affichage-match">
                            <td onclick="window.location='lol.html?idM=<?php echo $m['idMatch'];?>';"><?php echo $m['dateM']; ?></td>
                            <td onclick="window.location='lol.html?idM=<?php echo $m['idMatch'];?>';"><?php echo $m['heureM']; ?></td>
                            <td onclick="window.location='lol.html?idM=<?php echo $m['idMatch'];?>';"><?php echo $m['nomAdversaire']; ?></td>
                            <td onclick="window.location='lol.html?idM=<?php echo $m['idMatch'];?>';"><?php echo $m['lieuDeRencontre']; ?></td>
                            <td onclick="window.location='lol.html?idM=<?php echo $m['idMatch'];?>';"><?php echo $m['resLocal']; ?></td>
                            <td onclick="window.location='lol.html?idM=<?php echo $m['idMatch'];?>';"><?php echo $m['resAdv']; ?></td>
                            <td onclick="window.location='lol.html?idM=<?php echo $m['idMatch'];?>';"><?php echo $m['statut']; ?></td>
                            <td>
                                <div onclick="window.location='lol.html?idM=<?php echo $m['idMatch'];?>';"></div>
                                <a href="#">
                                    <button class="delete-btn" onclick="valider_suppression()"><i
                                                class="fa fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
				  
				  
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
