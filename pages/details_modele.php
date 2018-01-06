<?php
$motorisation = new MotorisationDB($cnx);
$liste_m = $motorisation->getMotorisation();
$nbrM = count($liste_m);


if (!isset($_GET['id']) && !isset($_SESSION['id_voiture'])) {
    ?>
    <p>Pour voir le détail d'un modèle, cliquez <a href="index.php?page=modeles.php">ici</a></p>
    <?php
} else if (isset($_GET['id'])) {
    $_SESSION['id_voiture'] = $_GET['id'];
    $voiture = new VoitureDB($cnx);
    $voiture_select = $voiture->getVoiture($_SESSION['id_voiture']);
    $verif_nbr = count($voiture_select);
}
//traitement du formulaire de choix du type
if (isset($_GET['choix_motor'])) {
    $motorisation = $_GET['id_motorisation'];
    print $motorisation;
}
?>
<div id="fh5co-work" class="fh5co-light-grey">
    <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
            <h2><?php print utf8_decode($voiture_select[0]['modele']); ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center">
            <nav>
                <div class="container">
                    <br>
                    <div class="col-md-5">
                        Prix : à partir de <?php print utf8_decode($voiture_select[0]['prix']); ?> €
                    </div>
                    <form action="index.php?page=reserver.php" method="post" id="form_reserv">
                        <div class="form-group">
                            <div class="col-md-5 selectContainer">
                                <br>
                                <div class="input-group">
                                <span class="input-group-addon">Motorisation</span>
                                <select name="id_motorisation" id="id_motorisation" class="form-control selectpicker" >
                                <?php
                                for ($i = 0; $i < $nbrM; $i++) {
                                ?>
                                <option value="<?php print $liste_m[$i]->id_motorisation; ?>">
                                    <?php print utf8_decode($liste_m[$i]->nom); ?>
                                </option>
                                <?php
                                }
                                ?>
                                </select>
                                </div>
                                <br>
                                <br>
                                <input type="submit" class="btn btn-primary btn-demo" value="Réserver">
                            </div>      
                        </div>
                    </form>
                </div>
            </nav>
            <br><br>
            
        </div>
        <div class="col-md-6 text-center">
            <div class="work" id="details_modele_image" style="background-image: url(images/<?php print utf8_decode($voiture_select[0]['image2']); ?>);">
            </div>

        </div>
    </div>
</div>