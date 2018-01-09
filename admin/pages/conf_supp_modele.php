<?php
if(isset ($_POST['idvoiture'])){
    $_SESSION['voitureasupp']=$_POST['idvoiture'];
}
    if (isset($_GET['confirmer'])) {
    //permet d'extraire les champs du tableau $_GET pour simplifier
        $voiture = new VoitureDB($cnx);
        $retour = $voiture->delVoiture($_SESSION['voitureasupp']);
        $url="index.php?page=accueil_admin";
        header("Location: $url");

    }
?>
<br>
<div id="fh5co-work" class="fh5co-light-grey">
    <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
    <h2>Confirmer suppression</h2>
        </div>
    </div>
    <?php
            if (isset($erreur)) {
                print $erreur;
            }
    ?>
    <div row>
   <div class="col-md-6 col-md-offset-3 text-center">Etes-vous s&ucirc;r de vouloir supprimer ce mod&egrave;le ?</div>
        </div>
    <div row>
   <div class="col-md-6 col-md-offset-3 text-center">
		<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="conf_supp_form">
		<input type="submit" value="Oui" name="confirmer"/>
		</form>
        </div>
    </div>