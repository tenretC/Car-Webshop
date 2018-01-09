<?php
if(isset($_POST['id_motorisation'])){
    $_SESSION['id_motorisation']=$_POST['id_motorisation'];
}
//print $_SESSION['id_voiture'];
//print $_SESSION['id_motorisation'];

// TRAITEMENT DU FORMULAIRE
if (isset($_GET['reserver'])) {
    //permet d'extraire les champs du tableau $_GET pour simplifier
    extract($_GET, EXTR_OVERWRITE);
    if (!((empty($email) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse) || empty($cp) || empty($localite)))) {
        $client = new ClientDB($cnx);
        $retour = $client->addClient($_GET);
        $retour = $client->getClient($email);
        //var_dump($retour[0]['id_client']);
        $idclient = (int)$retour[0]['id_client'];
        //var_dump($idclient);
        $commande = new CommandeDB($cnx);
        $commande->addCommande($_SESSION['id_voiture'], $_SESSION['id_motorisation'], $idclient, false);
        $url="index.php?page=accueil.php";
        //header("Location: $url");

    }
}
?>

<br>
<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
    <h2>Formulaire de réservation</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-5 col-md-offset-3 erreur">
            <?php
            if (isset($erreur)) {
                print $erreur;
            }
            ?>
        </div>
        <br>
    </div>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="reservation_form">
        <!-- Text input-->
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input name="nom" id="nom" placeholder="Entrez votre nom" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Prénom&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input  name="prenom" id="prenom" placeholder="Entrez votre prénom" class="form-control"  type="text">
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
                        <span class="input-group-addon">E-Mail&nbsp;&nbsp;&nbsp;</span>
                        <input  name="email" id="email" placeholder="abc@def.com" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Téléphone</span>
                        <input name="telephone" id="telephone" placeholder="xxx/xx.xx.xx" class="form-control"  type="text">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Adresse</span>
                        <input  name="adresse" id="adresse" placeholder="Entrez votre adresse" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Localité&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input name="localite" id="localite" placeholder="Entrez votre localité" class="form-control"  type="text">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">CP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input  name="cp" id="cp" placeholder="Entrez votre code postal" class="form-control"  type="text">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-5 col-md-offset-3 text-center inputGroupContainer">
                    <input type="submit" name="reserver" class="btn btn-primary btn-demo" value="Réserver" class="pull-right">
                    <input type="reset" id="reset" class="btn btn-primary btn-demo" value="Annuler"/>
                </div>
            </div>
        </div>
        <br>
    </form>
</div>