<?php

namespace controller;

class RendezVousController
{
    private $rdvModel;
    private $clientModel;
    function __construct($rdvModel, $clientModel)
    {
        $this->rdvModel = $rdvModel;
        $this->clientModel = $clientModel;
    }
    function indexRdv(){
        $rdv = $this->rdvModel->getAllRdv();
        require_once '../app/views/rendezvous/show.php';
    }
    function viewAjouterRendezVous(){
        $client = $this->clientModel->getClientById($_GET['idCli']);
        require_once '../app/views/rendezvous/create.php';
    }
    function createRendezVous(){
        $this->rdvModel->createRdv($_POST);
        $this->indexRdv();
    }
    function viewEditRendezVous(){
        $rdv = $this->rdvModel->getRdvByIdRdv($_GET['idRdv']);
        $client = $this->clientModel->getClientById($_GET['idCli']);
        require_once '../app/views/rendezvous/edit.php';
    }
    function updateRendezVous(){
        $this->rdvModel->updateRdv($_POST);
        $this->indexRdv();
    }

}