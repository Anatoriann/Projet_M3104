<?php
require('session.php');
require('Classes/Match.php');

if (!empty($_GET['suppr'])) {
    $res = Match::supprMatch($_GET['suppr']);
    header("Location: traitement.php?error=$res");
}
?>
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
                    $matchs = Match::selectMatchs();
                    foreach ($matchs as $m) {
                        if ($m['resLocal']== null){
                            $resLocal = 'Indisponible';
                            $resAdv = 'Indisponible';
                        }
                        else{
                            $resLocal = $m['resLocal'];
                            $resAdv = $m['resAdv'];
                        }

                        switch($m['statut']){
                            case 0 :
                                $statut = 'Match en préparation';
                                $lien = 'assigner_joueurs.php';
                                break;
                            case 1 :
                                $statut = 'Match prêt à être joué';
                                $lien = 'ajout_score.php';
                                break;
                            case 2:
                                $statut = 'Match fini, score renseigné';
                                $lien = 'ajout_notation.php';
                                break;
                        }

                        if($m[('lieuDeRencontre')]==1){
                            $lieuDeRencontre = 'Domicile';
                        }
                        else {
                            $lieuDeRencontre = 'Exterieur';
                        }

                        $dateM = date('d/m/Y',strtotime($m['dateM']));
                        $heureM = date('H:i', strtotime($m['heureM']));
                        ?>
                        <tr class="tableau-affichage-match">
                            <td onclick="window.location='<?php echo $lien;?>?idM=<?php echo $m['idMatch'];?>';"><?php echo $dateM; ?></td>
                            <td onclick="window.location='<?php echo $lien;?>?idM=<?php echo $m['idMatch'];?>';"><?php echo $heureM; ?></td>
                            <td onclick="window.location='<?php echo $lien;?>?idM=<?php echo $m['idMatch'];?>';"><?php echo $m['nomAdversaire']; ?></td>
                            <td onclick="window.location='<?php echo $lien;?>?idM=<?php echo $m['idMatch'];?>';"><?php echo $lieuDeRencontre; ?></td>
                            <td onclick="window.location='<?php echo $lien;?>?idM=<?php echo $m['idMatch'];?>';"><?php echo $resLocal; ?></td>
                            <td onclick="window.location='<?php echo $lien;?>?idM=<?php echo $m['idMatch'];?>';"><?php echo $resAdv; ?></td>
                            <td onclick="window.location='<?php echo $lien;?>?idM=<?php echo $m['idMatch'];?>';"><?php echo $statut; ?></td>
                            <td>
                                <div onclick="window.location='<?php echo $lien;?>?idM=<?php echo $m['idMatch'];?>';"></div>
                                <a href="#">
                                    <button class="delete-btn" onclick="valider_suppression(<?php echo $m['idMatch'];?>)"><i
                                                class="fa fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>


				</table>


			</div>

            <a href="creation_match.php" class="bouton_creation"> Nouveau match </a>
		</div>

	</div>


<script>
function valider_suppression(idM) {
    var txt;
    var r = confirm("Voulez-vous supprimer ce match ?");
    // A la place de l'alerte, appeler une fonction ou un bail sombre comme ça
    if (r == true) {
        document.location.href="matchs.php?suppr="+idM;
    }
}

</script>

</body>
