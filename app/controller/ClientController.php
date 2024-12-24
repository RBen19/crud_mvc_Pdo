<?php

namespace controller;

class ClientController
{
    private $ClientModel;
    public function __construct($ClientModel){
        $this->ClientModel = $ClientModel;
    }
    public function index(){
        $clients = $this->ClientModel->getAllClient();
        require_once '../app/views/clients/show.php';
    }
    public function removeCli(){
        $this->ClientModel->deleteClient($_GET['idCli']);
        $this->index();
    }
    public function viewAddCli(){
        require_once '../app/views/clients/create.php';
    }
    public function viewEditCli(){
        $client = $this->ClientModel->getClientById($_GET['idCli']);
       // print_r($client);
        require_once '../app/views/clients/edit.php';
    }
    public  function addCli(){
        $this->ClientModel->createClient($_POST);
        $this->index();
    }
    public function editCli(){
        $this->ClientModel->updateClient($_POST);
        $this->index();
    }

}