<?php

class VoitureDB {

    private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

//liste des voitures correspondant à l'id sélectionné
    function getVoiture($id) {
        try {
            $query = "SELECT * FROM voiture where id_voiture=:id_voiture";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_voiture', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
//var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }

    function getAllVoiture() {
        try {
            $query = "SELECT * FROM voiture order by id_voiture";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
//var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    
    public function addVoiture(array $data) {
        $query = "insert into voiture (modele,prix,description,image,image2)"
                . " values (:modele,:prix,:desc,:image,:image2)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':modele', $data['modele'], PDO::PARAM_STR);
            $resultset->bindValue(':prix', $data['prix'], PDO::PARAM_STR);
            $resultset->bindValue(':desc', $data['desc'], PDO::PARAM_STR);
            $resultset->bindValue(':image', $data['image'], PDO::PARAM_STR);
            $resultset->bindValue(':image2', $data['image2'], PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
    
    public function delVoiture($id) {
        $query = "insert into voiture (modele,prix,description,image,image2)"
                . " values (:modele,:prix,:desc,:image,:image2)";

        try {
             $query = "DELETE FROM voiture where id_voiture=:idvoiture";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idvoiture', $id);
            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
}