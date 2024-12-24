<?php

namespace models;

use PDO;

class Client
{
    private $idClient;
    private $nomClient;
    private $prenomClient;
    private $emailClient;
    private $telephoneClient;

    private $connexion;

    function __construct($connexion)
    {
        $this->connexion = $connexion;
    }
    //Methodes
    public function createClient($client){
        $query = 'INSERT INTO client (nomClient, prenomClient, emailClient, telephoneClient) values (?, ?, ?, ?)';
        $stmt=$this->connexion->prepare($query);
        return $stmt->execute([$client['nomCli'], $client['pnomCli'], $client['emailCli'], $client['telCli']]);
    }
    public function getClientById($idClient){
        $query = 'SELECT * FROM client WHERE idclient = ?';
        $stmt=$this->connexion->prepare($query);
        $stmt->execute([$idClient]);
        //var_dump($stmt->fetch());
        return $stmt->fetch();
    }
    public function getAllClient(){
        $query = 'SELECT * FROM client';
        $stmt=$this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateClient($client){
        $query = 'UPDATE client SET nomClient = ?, prenomClient = ?, emailClient = ?, telephoneClient = ? WHERE idclient = ?';
        $stmt=$this->connexion->prepare($query);
        return $stmt->execute([$client['nomCli'], $client['pnomCli'], $client['emailCli'], $client['telCli'], $client['idclient']]);
    }
    public function deleteClient($id){
        $query = 'DELETE FROM client WHERE idClient = ?';
        $stmt=$this->connexion->prepare($query);
        $stmt->execute([$id]);
    }
    // getters
    public function getIdClient(){
        return $this->idClient;
    }
    public function getNomClient(){
        return $this->nomClient;
    }
    public function getPrenomClient(){
        return $this->prenomClient;
    }
    public function getEmailClient(){
        return $this->emailClient;
    }
    public function getTelephoneClient(){
        return $this->telephoneClient;
    }
    //setters
    public function setNomClient($nomClient){
        $this->nomClient = $nomClient;
    }
    public function setPrenomClient($prenomClient){
        $this->prenomClient = $prenomClient;
    }
    public function setEmailClient($emailClient){
        $this->emailClient = $emailClient;
    }
    public function setTelephoneClient($telephoneClient){
        $this->telephoneClient = $telephoneClient;
    }

}
