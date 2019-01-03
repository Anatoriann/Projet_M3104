<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 02/01/2019
 * Time: 23:53
 */
require_once('Classes/participerTitulaire.php');
require_once('Classes/participerRemplacant.php');
require_once('Classes/Joueur.php');
if(empty($_GET['idM'])){
    header("Location: matchs.php");
}

if (!empty($_POST['joueur0'])){
    for($i = 0; $i<5; $i++){
        participerTitulaire::notation($_GET['idM'],$_POST['joueur'.$i],$_POST['notationJoueur'.$i],$_POST['commentaireJoueur'.$i]);
        participerRemplacant::notation($_GET['idM'],$_POST['remplacant'.$i],$_POST['notationRemplacant'.$i],$_POST['commentaireRemplacant'.$i]);
        header("Location: traitement.php?error=0");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Création de match</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
</head>

<body>
<?php
require('menu.php');
$joueurs = participerTitulaire::joueurDunMatch($_GET['idM']);
$remplacants = participerRemplacant::remplacantDunMatch($_GET['idM']);
?>

<div class="content">
    <div class="formulaire">

        <form action="ajout_notation.php?idM=<?php echo $_GET['idM'];?>" method="post">
            <?php
            for ($i = 0; $i<5; $i++){
                $joueurEnCours = $joueurs->fetch();
                echo "<input type=\"hidden\" name = \"joueur$i\" value=\"".$joueurEnCours['numLicence']."\"/>";
                $remplacantEnCours = $remplacants->fetch();
                echo "<input type=\"hidden\" name = \"remplacant$i\" value=\"".$remplacantEnCours['numLicence']."\"/>";
            }?>
            <div class="affichage-joueurs-colg">
            <p>Joueurs titulaires</p>
            <?php
            $joueurs = participerTitulaire::joueurDunMatch($_GET['idM']);
            for($i=0; $i < 5 ; $i++){
                $joueursEnCours=$joueurs->fetch();
                $joueurEnCours = Joueur::selectJoueur($joueursEnCours['numLicence']);
                $joueurEnCours = $joueurEnCours->fetch();
                echo $joueurEnCours['nom']." ".$joueurEnCours['prenom']."<br>Note <input type = \"number\" name = \"notationJoueur$i\" min =\"0\" max = \"5\" value=\"".$joueursEnCours['notation']."\"required><br>";
                echo "<textarea placeholder=\"Insérer un commentaire\" cols=\"30\" rows=\"5\" name=\"commentaireJoueur$i\" >".$joueursEnCours['commentaire']."</textarea><br><br> ";
            }
            ?>
            </div>
            <div class="affichage-joueurs-cold">
                <p>Joueurs remplaçants</p>
                <?php
                $remplacants = participerRemplacant::remplacantDunMatch($_GET['idM']);
                for($i=0; $i < 5 ; $i++){
                    $remplacantsEnCours=$remplacants->fetch();
                    $remplacantEnCours = Joueur::selectJoueur($remplacantsEnCours['numLicence']);
                    $remplacantEnCours = $remplacantEnCours->fetch();
                    echo $remplacantEnCours['nom']." ".$remplacantEnCours['prenom']."<br>Note <input type = \"number\" name = \"notationRemplacant$i\" min =\"0\" max = \"5\" value=\"".$remplacantsEnCours['notation']."\"required><br>";
                    echo "<textarea placeholder=\"Insérer un commentaire\" cols=\"30\" rows=\"5\" name=\"commentaireRemplacant$i\">".$remplacantsEnCours['commentaire']."</textarea><br><br> ";
                }
                ?>
            </div>
            <a href="matchs.php" class="bouton_retour">&laquo; Retour</a>

            <input type="submit" value="Valider">
        </form>
    </div>

</div>

</body>
</html>
