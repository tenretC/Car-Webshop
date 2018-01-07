<?php

class ClientDB extends Client{

    private $_db;
    private $_clientArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getClient($email) {
        $query = "select * from client where email=:email_client";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email_client', $email, PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_clientArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_clientArray;
    }

    public function addClient(array $data) {
        $query = "insert into client (nom,prenom,email,telephone,adresse,localite,code_postal)"
                . " values (:nom_client,:prenom_client,:email_client,:telephone,:adresse_client,:localite,:codepostal)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom_client', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom_client', $data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':email_client', $data['email'], PDO::PARAM_STR);
            $resultset->bindValue(':telephone', $data['telephone'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse_client', $data['adresse'], PDO::PARAM_STR);
            $resultset->bindValue(':localite', $data['localite'], PDO::PARAM_STR);
            $resultset->bindValue(':codepostal', $data['cp'], PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }

}