<?php
require('session.php');
require('Classes/Joueur.php');
if (!empty($_POST['num_licence'])){
    $res = Joueur::updateJoueur($_POST['num_licence'],$_POST['nom'],$_POST['prenom'],$_POST['dateN'], $_POST['taille'],$_POST['poids'],$_POST['postePrefere'],$_POST['statut'],$_POST['commentaire']);
    header("Location: traitement.php?error=$res");
}
else if(!empty($_GET['numLicence'])){
    $joueur=Joueur::selectJoueur($_GET['numLicence']);
    if($joueur->rowCount()!=0) {
        $joueurEnCours = $joueur->fetch();
        $numLicence = $joueurEnCours['numLicence'];
        $nom = $joueurEnCours['nom'];
        $prenom = $joueurEnCours['prenom'];
        $dateN = $joueurEnCours['dateNaissance'];
        $taille = $joueurEnCours['taille'];
        $poids = $joueurEnCours['poids'];
        $commentaire = $joueurEnCours['commentaire'];
        $poste = $joueurEnCours['postePrefere'];
        $statut = $joueurEnCours['statut'];
    }
    else{
        header("Location: joueurs.php");
    }
}
else {
    header("Location: joueurs.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modification de joueur</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
</head>

<body>

<?php
require('menu.php');
?>

<div class="content">
    <div class="formulaire">
        <h1>Modification des informations du joueur.</h1>

        <form action="modif_joueur.php" method="post">
            <input name="num_licence" type="hidden"  value="<?php echo $numLicence ;?>">

            <div class="info-joueur">

                <input name="nom" type="text" placeholder="Nom" value="<?php echo $nom ;?>"required> <br />

                <input name="prenom" type="text" placeholder="Prénom" value="<?php echo $prenom ;?>" required> <br />
            </div>

            <p>Date de naissance</p>
            <input name="dateN" type="date" placeholder="JJ/MM/AAAA" value="<?php echo $dateN ;?>" required>  <br />

            <p>Taille</p>
            <input name="taille" type="number" placeholder="0.00" min=0 step=0.01 value="<?php echo $taille ;?>" required class="mensuration">m  <br />

            <p>Poids</p>
            <input name="poids" type="number" placeholder="0.00" min=0 step=0.01 value="<?php echo $poids ;?>" required class="mensuration">Kg  <br />

            <p>Poste favori</p>
            <select name ="postePrefere">
                <option value=1 <?php if ($poste==1) echo 'selected';?>>Meneur</option>
                <option value=2 <?php if ($poste==2) echo 'selected';?>>Arrière</option>
                <option value=3 <?php if ($poste==3) echo 'selected';?>>Ailier</option>
                <option value=4 <?php if ($poste==4) echo 'selected';?>>Ailier fort</option>
                <option value=5 <?php if ($poste==5) echo 'selected';?>>Pivot</option>
            </select> <br />

            <p>Statut</p>
            <select name = "statut">
                <option value=1 <?php if($statut==1) echo 'selected';?>>Actif</option>
                <option value=2 <?php if($statut==2) echo 'selected';?>>Suspendu</option>
                <option value=3 <?php if($statut==3) echo 'selected';?>>Blessé</option>
                <option value=4 <?php if($statut==4) echo 'selected';?>>Absent</option>
            </select> <br />

            <div class="commentaire">
                <p>Commentaire</p>
                <textarea placeholder="Insérer un commentaire" cols="30" rows="5" name="commentaire"><?php echo $commentaire ;?></textarea> <br />
            </div>

            <a href="joueurs.php" class="bouton_retour">&laquo; Retour</a>

            <input type="submit" value="Valider">
        </form>

    </div>
</div>

</body>
</html>
