<div class="row">
	<div class="col-xs-2">
		<!--<div id="fh5co-logo"><a href="index.html">Maserati</a></div>-->
        <div><a href="index.php?page=accueil.php"><img id="maserati-logo" alt="Maserati" src="images/Maserati-logo-blue.png"></a> </div>
	</div>
	<div class="col-xs-10 text-right menu-1">
		<ul>
			<li class="active"><a href="index.php?page=accueil.php">Accueil</a></li>
			<li><a href="index.php?page=marque.php">La marque</a></li>
			<li class="has-dropdown">
				<a href="index.php?page=modeles.php">Modèles</a>
				<ul class="dropdown">
                <?php

                //on récupère toutes les voitures
                    $voiture = new VoitureDB($cnx);
                    $liste = $voiture->getAllVoiture();
                    $nbrVoitures = count($liste);
                    for($i=0;$i<$nbrVoitures;$i++){
                ?>
					<li><a href="index.php?page=details_modele.php&id=<?php print $liste[$i]['id_voiture']; ?>"><?php print utf8_decode($liste[$i]['modele']);?></a></li>
					<!--<li><a href="#">Levante</a></li>
					<li><a href="#">Quattroporte</a></li>
					<li><a href="#">GranTurismo</a></li>
					<li><a href="#">GranCabrio</a></li>-->
                <?php
                    }
                ?>
				</ul>
			</li>
			<li><a href="index.php?page=contacts.php">Contacts</a></li>
			<!--<li><a href="connexion.html">Se connecter</a></li>-->
		</ul>
	</div>
</div>