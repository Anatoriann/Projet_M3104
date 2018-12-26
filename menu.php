			<nav>
				<div class=nav>
				<p>Dashboards</p>
				<a href="home.php">Home</a>
				<a href="joueurs.php">Gestion des joueurs</a>
				<a href="matchs.php">Gestion des matchs </a>
				<a href="statistiques.php">Statistiques	</a>
				<a href="deconnexion.php" class="deconnexion">Déconnexion</a>
				</div>
			</nav>

			<div class="date">
				<img src="icone/calendrier.svg">
				<p class="date-txt"><?php
					 $today = date("d.m.y");
					echo "$today";
				?></p>
			</div>
