<?php
require('session.php');
require('Classes/Joueur.php');
if (!empty($_POST['num_licence'])){
    if(!empty($_FILES)) {
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        $_FILES['image']['name'] = $_POST['num_licence'];
        $path = 'photos_m3104/' . $_POST['num_licence'] . ".$file_ext";
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
    }
    else{
        $path='photos_m3104/default.jpg';
    }
	
    $res = Joueur::addJoueur($_POST['num_licence'],$_POST['nom'],$_POST['prenom'],$path,$_POST['dateN'], $_POST['taille'],$_POST['poids'],$_POST['postePrefere'],$_POST['statut'],$_POST['commentaire']);
    header("Location: traitement.php?error=$res");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Création de joueur</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>

<body>

	<?php
		require('menu.php');
	?>

	<div class="content">
			<div class="formulaire">
				<h1>Saisissez les informations relatives au nouveau joueur.</h1>


				<form action="" method="post" enctype="multipart/form-data">

					<div class="info-joueur">

						<div class="licence"> <input name="num_licence" type="text" placeholder="Numéro de licence" value ="" required > <br /> </div>

						<input name="nom" type="text" placeholder="Nom" required> <br />

						<input name="prenom" type="text" placeholder="Prénom" required> <br />
					</div>

					<p>Date de naissance</p>
					 <input name="dateN" type="date" placeholder="JJ/MM/AAAA" required>  <br />

					<p>Taille</p>
					 <input name="taille" type="number" placeholder="0.00" min=0 step=0.01 required class="mensuration">m  <br />

					<p>Poids</p>
					 <input name="poids" type="number" placeholder="0.00" min=0 step=0.01 required class="mensuration">Kg  <br />

					<p>Poste favori</p>
					 <select name ="postePrefere">
					<option value=1>Meneur</option>
					<option value=2>Arrière</option>
					<option value=3>Ailier</option>
					<option value=4>Ailier fort</option>
					<option value=5>Pivot</option>
					</select> <br />

					<p>Statut</p>
					 <select name = "statut">
						<option value=1>Actif</option>
						<option value=2>Suspendu</option>
						<option value=3>Blessé</option>
						<option value=4>Absent</option>
					</select> <br />

          <div class="commentaire">
            <p>Commentaire</p>
            <textarea placeholder="Insérer un commentaire" cols="30" rows="5" name="commentaire"></textarea> <br />
        </div>

					<div class="photo_joueur">
						<p> Insérez la photo du nouveau joueur. </p>
						<input type="file" name="image"
	       					> <br />
					</div>

					<a href="joueurs.php" class="bouton_retour">&laquo; Retour</a>

					<input type="submit" value="Valider">
				</form>

			</div>
	</div>

</body>
</html>
