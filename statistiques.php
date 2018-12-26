<?php
require('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>

<body>
		<?php
		require('menu.php');
		 ?>


		<div class="content">
      <div class="tab">
        <button class="tablinks" onclick="ouvrirRubrique(event, 'Joueurs')">Joueurs</button>
        <button class="tablinks" onclick="ouvrirRubrique(event, 'Matchs')">Matchs</button>
      </div>

      <!-- Tab content -->
        <div id='Joueurs' class="tabcontent">
          <p class="tabtitle">Statistiques des joueurs</p>



					<div class="affichage-joueurs-colg">
							<div class="affichage-joueur">
											<button class="player-accordion">
														<div class="player-info">Jordan Clarkson</div>
														<div class="player-info">PG</div>
														<div class="player-info">Suspendu</div>
														<div class="player-info">28 ans</div>
											</button>
											<div class="player-panel">
														<p class="player-pinfo">Performance 1 </p>
														<p class="player-pinfo">Performance 2 </p>
														<p class="player-pinfo">Performance 3 </p>
											</div>
						</div>
				</div>

				<div class="affichage-joueurs-cold">
						<div class="affichage-joueur">
										<button class="player-accordion">
													<div class="player-info">Jordan Clarkson</div>
													<div class="player-info">PG</div>
													<div class="player-info">Suspendu</div>
													<div class="player-info">28 ans</div>
										</button>
										<div class="player-panel">
													<p class="player-pinfo">Performance 1 </p>
													<p class="player-pinfo">Performance 2 </p>
													<p class="player-pinfo">Performance 3 </p>
										</div>
					</div>
			</div>
        </div>

        <div id='Matchs' class="tabcontent">
          <p class="tabtitle">Statistiques des matchs</p>
          <p class="tabtext">Nombre de matchs gagnés : </p>
					<p class="tabtext">Nombre de matchs perdus : </p>
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

    function ouvrirRubrique(evt, nomRubrique) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(nomRubrique).style.display = "block";
    evt.currentTarget.className += " active";
    }

</script>


</body>
</html>
