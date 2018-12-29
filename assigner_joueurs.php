<?php
require('session.php');
require('Classes/Joueur.php');
echo var_dump($_POST);
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
		//require('menu.php');
        $joueurs = Joueur::selectJoueurs();
        $nbjoueurs = $joueurs->rowCount();
	?>

	<div class="content">

        <div class="formulaire">
            <p>Sélectionnez les joueurs que vous voulez assigner à ce match.</p>

            <form action="" method="post">
                <div class="affichage-joueurs-colg">
                    <?php
                    $poste = ["Meneur&nbsp;&nbsp;", "Arrière&emsp;", "Ailier&ensp;&ensp;&ensp;&nbsp;", "Ailier fort", "Pivot&emsp;&ensp;&nbsp;" ];
                    for ($i=0 ; $i < 5 ; $i++){
                        echo "$poste[$i] <select name = \"joueur$i\">";
                        $joueurs = Joueur::selectJoueurs();
                        for($j = 0; $j < $nbjoueurs; $j++){
                            $joueurEnCours = $joueurs->fetch();
                            $numL = $joueurEnCours['numLicence'];
                            $nom = $joueurEnCours['nom']." ".$joueurEnCours['prenom'];
                            echo "<option value=\"$numL\" >$nom</option>";
                        }
                        echo '</select> <br />';
                    }
                    ?>
                </div>
                <div class="affichage-joueurs-cold">
                    <?php
                    for ($i=1 ; $i <= 5 ; $i++){
                        echo "Remplaçant $i <select name = \"remplacant$i\">";
                        $joueurs = Joueur::selectJoueurs();
                        for($j = 0; $j < $nbjoueurs; $j++){
                            $joueurEnCours = $joueurs->fetch();
                            $numL = $joueurEnCours['numLicence'];
                            $nom = $joueurEnCours['nom']." ".$joueurEnCours['prenom'];
                            echo "<option value=\"$numL\" >$nom</option>";
                        }
                        echo '</select> <br />';
                    }
                    ?>
                    </select> <br />
                </div>
                <div class="boutons-assignation">
                <a href="matchs.php" class="bouton_retour">« Retour</a>
                <input type="submit" value="Valider &raquo;" class="valider-assignation-joueur">
                </div>
            </form>

        </div>
        <p class="affichage-titre">Liste des joueurs</p>
        <div class="affichage-joueurs">
            <div class="affichage-joueurs-colg">
                <?php
                $joueurs = Joueur::selectJoueurs();
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
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
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
