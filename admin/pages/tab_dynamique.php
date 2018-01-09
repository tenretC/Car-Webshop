<h2 id="titre">Tableau dynamique</h2>
<br/>
<?php
$obj = new VoitureDB($cnx);
$liste = $obj->getAllVoiture();
$nbrG = count($liste);
//var_dump($liste);
?>

<table class="table-responsive">
    <tr>
        <th class="ecart">Id </th>
        <th class="ecart">Modèle</th>
        <th class="ecart">Prix</th>
        <th class="ecart">Description</th>
        <th class="ecart">Image</th>
        <th class="ecart">Image2</th>
    </tr>
    <?php
    for ($i = 0; $i < $nbrG; $i++) {
        ?>
        <tr>
            <td class="ecart"><?php print $liste[$i]['id_voiture']; ?></td>
            <td>
                <span contenteditable="true" name="modele" class="ecart" id="<?php print $liste[$i]['id_voiture']; ?>">
                    <?php print utf8_encode($liste[$i]['modele']); ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="prix" class="ecart" id="<?php print $liste[$i]['id_voiture']; ?>">
                    <?php print utf8_encode($liste[$i]['prix']); ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="description" class="ecart" id="<?php print $liste[$i]['id_voiture']; ?>">
                    <?php print $liste[$i]['description']; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="image" class="ecart" id="<?php print $liste[$i]['id_voiture']; ?>">
                    <?php print $liste[$i]['image']; ?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="image2" class="ecart" id="<?php print $liste[$i]['id_voiture']; ?>">
                    <?php print $liste[$i]['image2']; ?>
                </span>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
