<?php

use controller\ClientController;
use controller\RendezVousController;
use models\Client;
use models\RendezVous;

require_once '../app/database.php';
require_once '../app/models/Client.php';
require_once '../app/models/RendezVous.php';
require_once '../app/controller/RendezVousController.php';
require_once '../app/controller/ClientController.php';

 $db = new Database();
 $clientModel = new Client($db->getConnexion());
 $clientController = new ClientController($clientModel);
 $rendezVousModel = new RendezVous($db->getConnexion());
 $rendezVousController = new RendezVousController($rendezVousModel, $clientModel);

 if(isset($_GET['action']) && !empty($_GET['action'])){
     if($_GET['action'] == 'ajouterClient'){
         $clientController->viewAddCli();
     }
     if($_GET['action'] == 'creerCli'){
         $clientController->addCli();
     }
     if($_GET['action'] == 'supprimerCli'){
        $clientController->removeCli();
     }
     if($_GET['action'] == 'voirClients'){
         $clientController->index();
     }
     if($_GET['action'] == 'ModifierCli'){
         $clientController->viewEditCli();
     }
     if($_GET['action'] == 'ValiderUpdateCli'){
            $clientController->editCli();
     }
     if($_GET['action'] == 'prendreRdv'){
         $rendezVousController->viewAjouterRendezVous();
     }
     if($_GET['action'] == 'creerRdv'){
         $rendezVousController->createRendezVous();
     }
     if($_GET['action'] == 'voirRdv'){
         $rendezVousController->indexRdv();
     }
     if ($_GET['action'] == 'ModifierRdv'){
         $rendezVousController->viewEditRendezVous();
     }
     if($_GET['action'] == 'updateRdv'){
         $rendezVousController->updateRendezVous();
     }

 }else{
     $clientController->index();
 }

