<?php
require_once('session.php');
require_once('Classes/Joueur.php');
require_once('Classes/participerRemplacant.php');
require_once('Classes/participerTitulaire.php');
if(!empty($_POST['joueur0'])&&!empty($_POST['joueur1'])&&!empty($_POST['joueur2'])&&!empty($_POST['joueur3'])&&!empty($_POST['joueur4'])&& !empty($_POST['remplacant1'])&& !empty($_POST['remplacant2'])&& !empty($_POST['remplacant3'])&& !empty($_POST['remplacant4'])&& !empty($_POST['remplacant5'])){
    $joueur0 =$_POST['joueur0'];
    $joueur1 =$_POST['joueur1'];
    $joueur2 =$_POST['joueur2'];
    $joueur3 =$_POST['joueur3'];
    $joueur4 =$_POST['joueur4'];

    $remplacant0 = $_POST['remplacant1'];
    $remplacant1 = $_POST['remplacant2'];
    $remplacant2 = $_POST['remplacant3'];
    $remplacant3 = $_POST['remplacant4'];
    $remplacant4 = $_POST['remplacant5'];

    if (Joueur::sontDifferent($joueur0,$joueur1,$joueur2,$joueur3, $joueur4, $remplacant0,$remplacant1,$remplacant2,$remplacant3,$remplacant4)){

        $j1 = participerTitulaire::ajouterTitulaire($joueur0, $_POST['idM'],1);
        $j2 = participerTitulaire::ajouterTitulaire($joueur1, $_POST['idM'],2);
        $j3 = participerTitulaire::ajouterTitulaire($joueur2, $_POST['idM'],3);
        $j4 = participerTitulaire::ajouterTitulaire($joueur3, $_POST['idM'],4);
        $j5 = participerTitulaire::ajouterTitulaire($joueur4, $_POST['idM'],5);
        if (($j1 == 0) && ($j2 == 0) && ($j3 == 0) && ($j4 == 0) && ($j5 == 0)){
            $ret = participerRemplacant::ajouterRemplacant($_POST['remplacant1'], $_POST['remplacant2'], $_POST['remplacant3'], $_POST['remplacant4'], $_POST['remplacant5'], $_POST['idM']);
            Match::modifierStatut($_POST['idM'],1);
            header("Location: traitement.php?error=$ret");
        }
        else {
            header("Location: traitement.php?error=17");
        }

    }
}
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
		require('menu.php');
        $joueurs = Joueur::selectJoueursActif();
        $nbjoueurs = $joueurs->rowCount();
	?>

	<div class="content">

        <div class="formulaire">
            <p>Sélectionnez les joueurs que vous voulez assigner à ce match.</p>

            <form action="" method="post">
                <input name="idM" type="hidden"  value="<?php echo $_GET['idM'];?>">
                <div class="affichage-joueurs-colg">
                    <?php
                    $poste = ["Meneur&nbsp;&nbsp;", "Arrière&emsp;", "Ailier&ensp;&ensp;&ensp;&nbsp;", "Ailier fort", "Pivot&emsp;&ensp;&nbsp;" ];
                    for ($i=0 ; $i < 5 ; $i++){
                        echo "$poste[$i] <select name = \"joueur$i\">";
                        $joueurs = Joueur::selectJoueursActif();
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
                        $joueurs = Joueur::selectJoueursActif();
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
        <?php Joueur::affichageSansModif();?>
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
