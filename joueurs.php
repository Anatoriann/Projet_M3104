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
		$joueurs = Joueur::selectJoueurs();
		$nbjoueurs = $joueurs->rowCount();
	?>

<div class="content">
	<p class="affichage-titre">Liste des joueurs</p>
        <div class="affichage-joueurs">
            <div class="affichage-joueurs-colg">
                <?php
                for($i=0; $i < $nbjoueurs/2; $i++) {
                    $joueurEnCours = $joueurs->fetch();
                    switch($joueurEnCours['statut']){
                        case 1 :
                            $statut = 'Actif';
                            break;
                        case 2:
                            $statut = 'Suspendu';
                            break;
                        case 3 :
                            $statut = 'Blessé';
                            break;
                        case 4:
                            $statut = 'Absent';
                            break;
                    }

                    switch ($joueurEnCours['postePrefere']){
                        case 1 :
                            $postePrefere = 'Meneur';
                            break;
                        case 2:
                            $postePrefere = 'Arrière';
                            break;
                        case 3 :
                            $postePrefere = 'Ailier';
                            break;
                        case 4:
                            $postePrefere = 'Ailier fort';
                            break;
                        case 5:
                            $postePrefere = 'Pivot';
                            break;
                    }
                    $age = round((time()-strtotime($joueurEnCours['dateNaissance']))/(3600*24*365));
                    ?>
                    <div class="affichage-joueur">
                        <button class="player-accordion">
                            <div class="player-info"><?php echo $joueurEnCours['prenom']." ".$joueurEnCours['nom'];?></div>
                            <div class="player-info"><?php echo $postePrefere;?></div>
                            <div class="player-info"><?php echo $statut;?></div>
                            <div class="player-info"><?php echo $age." ans";?></div>
                        </button>
                        <div class="player-panel">
                            <p class="player-pinfo"><?php echo $joueurEnCours['poids'].' kg';?></p>
                            <p class="player-pinfo"><?php echo $joueurEnCours['taille'].' m';?></p>
                            <p class="player-pinfo"><?php echo $joueurEnCours['commentaire'];?></p>
                            <div class="player-contentbutton">
                                <div class="player-pinfobutton">
                                    <a href="modif_joueur.php?numLicence=<?php echo $joueurEnCours['numLicence'];?>" class="edit-btn"><i class="fa fa-edit"></i></a>
                                </div>
                                <div class="player-pinfobutton">
                                    <a href="#" class="delete-btn" onclick="valider_suppression(<?php echo $joueurEnCours['numLicence'];?>)">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="affichage-joueurs-cold">
                <?php
                for($i=$nbjoueurs/2; $i < $nbjoueurs; $i++) {
                    $joueurEnCours = $joueurs->fetch();
                    if($joueurEnCours!=false) {
                        switch ($joueurEnCours['statut']) {
                            case 1 :
                                $statut = 'Actif';
                                break;
                            case 2:
                                $statut = 'Suspendu';
                                break;
                            case 3 :
                                $statut = 'Blessé';
                                break;
                            case 4:
                                $statut = 'Absent';
                                break;
                        }

                        switch ($joueurEnCours['postePrefere']) {
                            case 1 :
                                $postePrefere = 'Meneur';
                                break;
                            case 2:
                                $postePrefere = 'Arrière';
                                break;
                            case 3 :
                                $postePrefere = 'Ailier';
                                break;
                            case 4:
                                $postePrefere = 'Ailier fort';
                                break;
                            case 5:
                                $postePrefere = 'Pivot';
                                break;
                        }
                        $age = round((time() - strtotime($joueurEnCours['dateNaissance'])) / (3600 * 24 * 365));
                        ?>
                        <div class="affichage-joueur">
                            <button class="player-accordion">
                                <div class="player-info"><?php echo $joueurEnCours['prenom'] . " " . $joueurEnCours['nom']; ?></div>
                                <div class="player-info"><?php echo $postePrefere; ?></div>
                                <div class="player-info"><?php echo $statut; ?></div>
                                <div class="player-info"><?php echo $age . " ans"; ?></div>
                            </button>
                            <div class="player-panel">
                                <p class="player-pinfo"><?php echo $joueurEnCours['poids'] . ' kg'; ?></p>
                                <p class="player-pinfo"><?php echo $joueurEnCours['taille'] . ' m'; ?></p>
                                <p class="player-pinfo"><?php echo $joueurEnCours['commentaire']; ?></p>
                                <div class="player-contentbutton">
                                    <div class="player-pinfobutton">
                                        <a href="modif_joueur.php?numLicence=<?php echo $joueurEnCours['numLicence'];?>" class="edit-btn"><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="player-pinfobutton">
                                        <a href="#" class="delete-btn" onclick="valider_suppression(<?php echo $joueurEnCours['numLicence'];?>)">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
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
