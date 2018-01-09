<div class="row">
	<div class="col-xs-2">
		<!--<div id="fh5co-logo"><a href="index.html">Maserati</a></div>-->
        <div><img id="maserati-logo" alt="Maserati" src="images/Maserati-logo-blue.png"></div>
	</div>
	<div class="col-xs-10 text-right menu-1">
		<ul>
			<?php
            if(!isset($_SESSION['admin'])){?>
            <li class="active"><a href="../index.php?page=accueil.php">Accueil</a></li>
			<li><a href="../index.php?page=marque.php">La marque</a></li>
			<li class="has-dropdown">
				<a href="../index.php?page=modeles.php">Modèles</a>
				<ul class="dropdown">
                <?php

                //on récupère toutes les voitures
                    $voiture = new VoitureDB($cnx);
                    $liste = $voiture->getAllVoiture();
                    $nbrVoitures = count($liste);
                    for($i=0;$i<$nbrVoitures;$i++){
                ?>
					<li><a href="../index.php?page=details_modele.php&id=<?php print $liste[$i]['id_voiture']; ?>"><?php print utf8_decode($liste[$i]['modele']);?></a></li>
					<!--<li><a href="#">Levante</a></li>
					<li><a href="#">Quattroporte</a></li>
					<li><a href="#">GranTurismo</a></li>
					<li><a href="#">GranCabrio</a></li>-->
                <?php
                    }
                ?>
				</ul>
			</li>
			<li><a href="../index.php?page=contacts.php">Contacts</a></li>
            <?php
            }
            else{?>
            <li><a href="index.php?page=supp_modele">Supprimer modèle</a></li>
            <li><a href="index.php?page=ajout_modele">Ajouter modèle</a></li>
            <li><a href="/tenretMaseratiShop/admin/pages/imprimer.php">PDF Modèles</a></li>
            <li><a href="index.php?page=disconnect" class="float-right">D&eacute;connexion</a></li>
            <?php
            }
            ?> 
			<!--<li><a href="connexion.html">Se connecter</a></li>-->
		</ul>
	</div>
</div>