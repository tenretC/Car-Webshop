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
    
    public function updateVoiture($champ,$nouveau,$id){                
        try {
            $query="UPDATE voiture set ".$champ." = '".$nouveau."' where id_voiture ='".$id."'";            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
}