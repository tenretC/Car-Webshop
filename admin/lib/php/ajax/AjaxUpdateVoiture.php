<?php

header('Content-type: application/json');
require '../dbConnectMysql.php';
require '../classes/Connexion.class.php';
require '../classes/Voiture.class.php';
require '../classes/VoitureDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

try {
    $update = new VoitureDB($cnx);
    extract($_GET, EXTR_OVERWRITE);
    $param = 'id=' . $id . '&champ=' . $champ . '&nouveau=' . $nouveau;
    $update->updateVoiture($champ, $nouveau, $id);
} catch (Exception $e) {
    print $e->getMessage();
}

