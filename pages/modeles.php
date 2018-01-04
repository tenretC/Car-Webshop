<div id="fh5co-work" class="fh5co-light-grey">
    <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
            <h2>Modèles</h2>
            <p>Chaque Maserati est un véritable chef d’œuvre de design italien conçue avec le plus grand soin et une attention toute particulière aux détails.</p>
        </div>
    </div>
    <?php

//on récupère toutes les voitures
    $voiture = new VoitureDB($cnx);
    $liste = $voiture->getAllVoiture();
    $nbrVoitures = count($liste);
    for($i=0;$i<$nbrVoitures;$i++){
        if($i!=$nbrVoitures-1){
?>
    <div class="row">
        <div class="col-md-6 text-center animate-box">
            <a href="#" class="work"  style="background-image: url(images/<?php print $liste[$i]['image']; ?>);">
                <div class="desc">
                    <h3><?php
                        print utf8_decode($liste[$i]['modele']);
                        ?>
                    </h3>
                    <span><?php
                        print utf8_decode($liste[$i]['description']);
                        ?>
                    </span>
                </div>
            </a>
        </div>
        <div class="col-md-6 text-center animate-box">
            <a href="#" class="work"  style="background-image: url(images/<?php $i++; print $liste[$i]['image']; ?>);">
                <div class="desc">
                    <h3><?php
                        print utf8_decode($liste[$i]['modele']);
                        ?>
                    </h3>
                    <span><?php
                        print utf8_decode($liste[$i]['description']);
                        ?>
                    </span>
                </div>
            </a>
        </div>
    </div>
<?php
        }
        else{
    ?>
            <div class="row">
                <div class="col-md-6 text-center animate-box">
                    <a href="#" class="work"  style="background-image: url(images/<?php print $liste[$i]['image']; ?>);">
                        <div class="desc">
                            <h3><?php
                                print utf8_decode($liste[$i]['modele']);
                                ?>
                            </h3>
                            <span><?php
                                print utf8_decode($liste[$i]['description']);
                                ?>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
    }
?>
    <!--
    <div class="row">
        <div class="col-md-6 text-center animate-box">
            <a href="#" class="work"  style="background-image: url(images/Ghibli-side-18.jpg);">
                <div class="desc">
                    <h3>Ghibli</h3>
                    <span>TOUT SAUF ORDINAIRE</span>
                </div>
            </a>
        </div>
        <div class="col-md-6 text-center animate-box">
            <a href="work-single.html" class="work" style="background-image: url(images/Levante-S-18.jpg);">
                <div class="desc">
                    <h3>Levante</h3>
                    <span>THE MASERATI OF SUVs</span>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center animate-box">
            <a href="work-single.html" class="work"  style="background-image: url(images/QP-GranSport-Grigio-Metallo-Side-18.jpg);">
                <div class="desc">
                    <h3>Quattroporte</h3>
                    <span>PAR MASERATI</span>
                </div>
            </a>
        </div>
        <div class="col-md-6 text-center animate-box">
            <a href="work-single.html" class="work" style="background-image: url(images/GT-MC-side-new_MY18.jpg);">
                <div class="desc">
                    <h3>GranTurismo</h3>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center animate-box">
            <a href="work-single.html" class="work"  style="background-image: url(images/GC-MC-side-new_MY18.jpg);">
                <div class="desc">
                    <h3>GranCabrio</h3>
                </div>
            </a>
        </div>
    </div>-->
</div>