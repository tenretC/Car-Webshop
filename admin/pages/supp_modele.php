<?php
$voiture = new VoitureDB($cnx);
    $liste = $voiture->getAllVoiture();
    $nbrVoitures = count($liste);
    
?>

<br>
<div id="fh5co-work" class="fh5co-light-grey">
    <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
    <h2>Supprimer un modèle</h2>
        </div>
    </div>
    <?php
            if (isset($erreur)) {
                print $erreur;
            }
    for($i=0;$i<$nbrVoitures;$i++){
            ?>
    <div class="row">
        <div class="col-md-6 col-md-push-3 text-center">
            <tr>
            <td><?php print $liste[$i]['id_voiture']; ?>  <?php print utf8_decode($liste[$i]['modele']);?>  <?php print utf8_decode($liste[$i]['prix']);?> €</td>
            <td><form action="index.php?page=conf_supp_modele" method="post">
					<input class="icones" type="image" src="./images/supp.jpg" alt="submit" name="supp"/>	
					<input type="hidden" name="idvoiture" value="<?php print utf8_decode($liste[$i]['id_voiture']);?>"/>
                </form> </td>
            </tr>
        </div>
    </div>
    <br>
<?php
    }
?>
</div>
