<?php
if (isset($_POST['submit_login'])) {
    $log = new AdminDB($cnx);
    //var_dump($_POST['login']);
    //var_dump(md5($_POST['password']));
    $admin = $log->isAdmin($_POST['login'], $_POST['password']);
    if (is_null($admin)) {
        $message = "<br/>Données incorrectes";
    } else {
        $_SESSION['admin'] = 1;
        $_message = "authentifié !";
        ?>
        <meta http-equiv = "refresh": content = "0;url=index.php?page=accueil_admin">
        <?php
    }
}
?>
<br>
<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
    <h2>Connexion en tant qu'admin</h2>
</div>
<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
    <h2><?php if (isset($message)) print $message; ?></h2>
</div>
<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post" id="form_auth_">
        <!-- Text input-->
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input name="login" id="login_" class="form-control"  type="text">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 text-center inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon">Prénom&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input  name="password" id="password_" class="form-control"  type="password">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <div class="col-md-5 col-md-offset-3 text-center inputGroupContainer">
                    <input type="submit" name="submit_login" id="submit_login_" class="btn btn-primary btn-demo" value="Login" class="pull-right">
                    <input type="reset" id="annuler" class="btn btn-primary btn-demo" value="Annuler"/>
                </div>
            </div>
        </div>
    </form>
</div>