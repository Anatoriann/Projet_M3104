<!DOCTYPE html>
<html>
<head>
	<title>Redirection</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>

<body>

	<?php 
		require('menu.php');
	?>

	<div class="content">
		<div class ="message_etat">

			<?php
                // A reprendre en faisant une classe erreur ou un truc du style qui en fonction du numéro d'erreur affichera le bon message !
                if ($_GET['error'] == 0) {
                echo "<h3> L'opération a bien été prise en compte. </h3>";
                } else {
                echo "<p> L'opération n'a pas marché suite à une erreur. </p>";
                }
			?>
			
			<a href=<?php
				 echo $_SERVER['HTTP_REFERER']  ?>
			 class="bouton_retour">&laquo; Retour</a>
		</div>
	</div>

</body>
</html>
