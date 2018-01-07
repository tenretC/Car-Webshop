<?php

class ClientDB extends Client{

    private $_db;
    private $_commandeArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getAllCommande($email) {
        $query = "select * from commande";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_commandeArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_commandeArray;
    }

    public function addCommande(array $data) {
        $query = "insert into commande (id_voiture,id_motorisation,id_client,confirme)"
                . " values (:voiture,:motor,:client,:confirmer)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':voiture', $data['id_voiture'], PDO::PARAM_INT);
            $resultset->bindValue(':motor', $data['id_voiture'], PDO::PARAM_INT);
            $resultset->bindValue(':client', $data['id_client'], PDO::PARAM_INT);
            $resultset->bindValue(':confirmer', $data['confirme'], PDO::PARAM_BOOL);
            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }

}