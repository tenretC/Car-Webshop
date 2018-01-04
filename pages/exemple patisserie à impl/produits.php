<?php
//on a besoin des classe Type_gateauDB et Type_gateau
$types = new Type_gateauDB($cnx);
$tabTypes = $types->getType_gateau();
$nbrTypes = count($tabTypes);

//traitement du formulaire de choix du type
if (isset($_GET['choix_type'])) {
    $cake = new Vue_gateauxDB($cnx);
    $liste = $cake->getVue_gateauxType($_GET['id_gt_type_gateau']);
    $nbrCakes = count($liste);
}
?>
<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">  

        <div class="row">
            <div class="col-sm-1">
                <span class="txtGras">Theme:</span>
            </div>
            <div class="col-sm-3">
                <select name="id_gt_type_gateau" id="id_gt_type_gateau">
                    <option></option>
                    <?php
                    for ($i = 0; $i < $nbrTypes; $i++) {
                        ?>
                        <option value="<?php print $tabTypes[$i]->ID_GT_TYPE_GATEAU; ?>">
                            <?php print ($tabTypes[$i]->TYPE_GATEAU); ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-2">
                <input type="submit" name="choix_type" id="choix_type" value="Choisir"/>
            </div>

        </div>
    </form>
</div>
<br/>

<div class="container">
    <?php
    if (isset($liste)) {
        if ($nbrCakes > 0) {
            ?>
            <div class="row">
                <div class="col-sm-12 txtGras txt180">
                    <?php
                    print ($liste[0]['TYPE_GATEAU']);
                    ?>
                </div>                             
            </div>
            <?php
            for ($i = 0; $i < $nbrCakes; $i++) {
                ?>
                <div class="row">
                    <div class="col-sm-3">
                        <img src="images/<?php print $liste[$i]['IMAGE']; ?>" alt="Gateau"/>
                    </div>
                    <div class="col-sm-4 text-center">                        
                        <br/>
                        <div class="row">
                            <div class="col-sm-12 text-danger txtRouge">
                                <span class="txt150">
                                    <?php
                                    print utf8_decode($liste[$i]['NOM_GATEAU']);
                                    ?>
                                </span>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras">
                                <br/>
                                <?php
                                print utf8_decode($liste[$i]['PRIX_UNITAIRE']);
                                ?>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras">
                                <br/>
                                <a href="index.php?page=commander.php&id=<?php print $liste[$i]['ID_GT_GATEAU']; ?>">
                                    Commander
                                </a>
                                <br/>
                            </div>                             
                        </div>
                    </div>
                    <?php
                } //fin for $i
                ?>
            </div>

            <?php
        }//fin if nbrCakes > 0
        else {
            ?>
            <div class="col-sm-12">Aucun gâteau ne correspond à votre choix.</div>
            <?php
        }
    }//fin if isset $liste
    ?>
</div>

