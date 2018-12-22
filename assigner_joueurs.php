<?php
require('session.php');
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
	?>

	<div class="content">


			<div class="formulaire">
				<p>Sélectionnez les joueurs que vous voulez assigner à ce match.</p>


				<form action="" method="post">


				<div class="affichage-joueurs-colg">

					<p>Meneur</p>
					 <select>
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>  <br>

					<p>Arrière</p>
					 <select>
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>  <br>

					<p>Ailier</p>
					 <select>
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>  <br>

					<p>Ailier fort</p>
					 <select>
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>  <br>

					<p>Pivot</p>
					 <select>
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>  <br>

				</div>


					<div class="affichage-joueurs-cold">

						<p>Remplaçant 1</p>
						 <select>
						  <option value="volvo">Volvo</option>
						  <option value="saab">Saab</option>
						  <option value="mercedes">Mercedes</option>
						  <option value="audi">Audi</option>
						</select>  <br>

						<p>Remplaçant 2</p>
						 <select>
						  <option value="volvo">Volvo</option>
						  <option value="saab">Saab</option>
						  <option value="mercedes">Mercedes</option>
						  <option value="audi">Audi</option>
						</select>  <br>

						<p>Remplaçant 3</p>
						 <select>
						  <option value="volvo">Volvo</option>
						  <option value="saab">Saab</option>
						  <option value="mercedes">Mercedes</option>
						  <option value="audi">Audi</option>
						</select>  <br>

						<p>Remplaçant 4</p>
						 <select>
						  <option value="volvo">Volvo</option>
						  <option value="saab">Saab</option>
						  <option value="mercedes">Mercedes</option>
						  <option value="audi">Audi</option>
						</select>  <br>

						<p>Remplaçant 5</p>
						 <select>
						  <option value="volvo">Volvo</option>
						  <option value="saab">Saab</option>
						  <option value="mercedes">Mercedes</option>
						  <option value="audi">Audi</option>
						</select>  <br>

						<p>Remplaçant 6</p>
						 <select>
						  <option value="volvo">Volvo</option>
						  <option value="saab">Saab</option>
						  <option value="mercedes">Mercedes</option>
						  <option value="audi">Audi</option>
						</select>  <br>


						<p>Remplaçant 7</p>
						 <select>
						  <option value="volvo">Volvo</option>
						  <option value="saab">Saab</option>
						  <option value="mercedes">Mercedes</option>
						  <option value="audi">Audi</option>
						</select>  <br>

					    </div>


					<a href="modifier_match.php" class="bouton-modification"><i class="fa fa-edit"></i>Modifier match</a>
					<input type="submit" value="Valider &raquo;" class="valider-assignation-joueur">
				</form>

			</div>
	</div>

</body>
</html>
