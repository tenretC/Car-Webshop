<?php
// TRAITEMENT DU FORMULAIRE
if (isset($_GET['ajouter'])) {
    //permet d'extraire les champs du tableau $_GET pour simplifier
    extract($_GET, EXTR_OVERWRITE);
    if (!((empty($modele) || empty($prix) || empty($desc) || empty($image) || empty($image2)))) {
        $voiture = new VoitureDB($cnx);
        $retour = $voiture->addVoiture($_GET);
        //var_dump($modele);
        //var_dump($retour[0]['id_client']);
        //var_dump($idclient);
        $url="index.php?page=accueil_admin";
        header("Location: $url");

    }
    else{
        $erreur = "Remplissez tous les champs";
    }
}
?>

<br>
<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
    <h2>Ajout d'un modèle</h2>
    <br>
    <?php
            if (isset($erreur)) {
                print $erreur;
            }
            ?>
</div>
<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="ajout_modele_form">
        <!-- Text input-->
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Modele&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input name="modele" id="modele" placeholder="Entrez le modèle" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Prix&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input  name="prix" id="prix" placeholder="Entrez le prix" class="form-control"  type="number">
                    </div>
                </div>
            </div>
        </div>
        <!-- Text input-->
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Description&nbsp;&nbsp;&nbsp;</span>
                        <input  name="desc" id="desc" placeholder="Description du modèle" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Image</span>
                        <input name="image" id="image" placeholder="chemin de l'image 1" class="form-control"  type="text">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Image2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input  name="image2" id="image2" placeholder="chemin de l'image 2" class="form-control"  type="text">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-5 col-md-offset-3 text-center inputGroupContainer">
                    <input type="submit" name="ajouter" class="btn btn-primary btn-demo" value="Ajouter" class="pull-right">
                    <input type="reset" id="reset" class="btn btn-primary btn-demo" value="Annuler"/>
                </div>
            </div>
        </div>
        <br>
    </form>
</div>