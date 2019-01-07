<?php
require('session.php');
require('Classes/Match.php');
require('Classes/Joueur.php');

if (!empty($_GET['idM'])) {
    // Test du bouton retour du traitement qui marche plus ou moins
    $match = Match::selectMatch($_GET['idM']);
    //Remplissage des champs
    foreach ($match as $m) {
        $statut = $m['statut'];
        $adv = $m['nomAdversaire'];
        $dateM = $m['dateM'];
        $heureM = $m['heureM'];
    }
    if ($statut == 2){
        header("Location: matchs.php");
    }
    $idM=$_GET['idM'];
}
else{
    //Insertion du score en bdd
    if(!empty($_POST['idM'])){
        $res = Match::addResultat($_POST['resultat_equipe'],$_POST['resultat_adversaire'], $_POST['idM']);
        Match::modifierStatut($_POST['idM'],2);
        header("Location: traitement.php?error=$res");
    }
    $idM='0';
    $adv = ' ';
    $dateM = ' ';
    $heureM = ' ';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajout d'un score</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
</head>

<body>
<?php
require('menu.php');
?>

<div class="content">

    <div class="formulaire">
        <p>Composition de l'équipe pour le match</p>
        <?php Joueur::affichageMatch($_GET['idM']);?>

        <p>Saisissez le score relatif au match.</p>


        <form action="ajout_score.php" method="post">
            <input name="idM" type="hidden" value="<?php echo $idM;?>">

            <input name="equipe" type="text" placeholder="Nom de l'équipe adverse" value = "<?php echo $adv;?>" readonly>  <br />

            <p>Date et heure du match</p>
            <input name="date" type="date" placeholder="JJ/MM/AAAA" value="<?php echo $dateM;?>" readonly>

            <input name="time" type="time" placeholder = "--:--" required class="heure" value="<?php echo $heureM;?>" readonly> <br />

            <div class="match-resultats">
                <p> Résultats </p>
                <input type="number" name="resultat_equipe" placeholder="score de l'équipe" required> -
                <input type="number" name="resultat_adversaire" placeholder="score de l'adversaire" required>	<br/>
            </div>

            <a href="matchs.php" class="bouton_retour">&laquo; Retour</a>
            <input type="submit" value="Valider &raquo;">
        </form>

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
