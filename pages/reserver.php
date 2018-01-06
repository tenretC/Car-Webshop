<?php
print $_SESSION['id_voiture'];
print $_POST['id_motorisation'];
?>

<br>
<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
    <h2>Formulaire de réservation</h2>
</div>
<div class="container">
    <form action=" " method="post"  id="contact_form">
        <!-- Text input-->
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Prénom&nbsp;</span>
                        <input  name="prenom" placeholder="Entrez votre prénom" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input name="nom" placeholder="Entrez votre nom" class="form-control"  type="text">
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
                        <input  name="email" placeholder="Entrez votre e-mail" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Téléphone</span>
                        <input name="telephone" placeholder="Entrez votre numéro" class="form-control"  type="text">
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
                        <input  name="adresse" placeholder="Entrez votre adresse" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Localité&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input name="localite" placeholder="Entrez votre localité" class="form-control"  type="text">
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
                        <input  name="cp" placeholder="Entrez votre code postal" class="form-control"  type="text">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-5 col-md-offset-3 text-center inputGroupContainer">
                    <input type="submit" class="btn btn-primary btn-demo" value="Réserver">
                </div>
            </div>
        </div>
        <br>
    </form>
</div>