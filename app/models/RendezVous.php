<?php

namespace models;
use PDO;
class RendezVous
{
    private $idRdv;
    private $dateHeureRdv;
    private $Description;
    private $idClient;
    private $connexion;

    function __construct($connexion)
    {
        $this->connexion = $connexion;
    }
    //Methodes
    public function createRdv($RendezVous){
        $query = "insert into rdv(rdvDateHeure,rdvDescription,rdvIdCli) values(?,?,?)";
        $stmt = $this->connexion->prepare($query);
        return  $stmt->execute([$RendezVous['DateHeureRdv'],$RendezVous['descriptionRdv'],$RendezVous['idCli']]);
    }
    public function getAllRdv(){
        $query = "select * from rdv";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getRdvByIdRdv($idRdv){
        $query = "select * from rdv where idRdv=?";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([$idRdv]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateRdv($RendezVous){
        $query = "update rdv set rdvDateHeure = ? , rdvDescription = ? where idrdv = ?";
        $stmt = $this->connexion->prepare($query);
        return  $stmt->execute([$RendezVous['DateHeureRdv'],$RendezVous['descriptionRdv'],$RendezVous['rdvId']]);
    }
    //getters
    public function getIdRdv(){
        return $this->idRdv;
    }
    public function getDateHeureRdv(){
        return $this->dateHeureRdv;
    }
    public function  getDescription(){
        return $this->Description;
    }
    public function getIdClient(){
        return $this->idClient;
    }
    //setters
    public function setDateHeureRdv($dateHeureRdv)
    {
        $this->dateHeureRdv = $dateHeureRdv;
    }
    public function setDescription($description)
    {
        $this->Description = $description;
    }
    public function setIdClient($idClient){
        $this->idClient = $idClient;
    }
}