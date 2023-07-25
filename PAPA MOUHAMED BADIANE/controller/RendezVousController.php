<?php
// controller/RendezVousController.php

require_once 'model/RendezVousModel.php';

class RendezVousController {
    public function listRendezVous() {
        $rendezVous = RendezVousModel::getAllRendezVous();
        require 'view/rendezvous/list.php';
    }

    public function addRendezVous() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $date = $_POST['date'];
            $etat = $_POST['etat'];

            // Appeler la fonction du modèle pour ajouter le rendez-vous
            RendezVousModel::addRendezVous($date, $etat);
            // Rediriger vers la liste des rendez-vous
            header('Location: index.php?action=listRendezVous');
        } else {
            require 'view/rendezvous/add.php';
        }
    }

    public function editRendezVous($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $date = $_POST['date'];
            $etat = $_POST['etat'];

            // Appeler la fonction du modèle pour mettre à jour le rendez-vous
            RendezVousModel::updateRendezVous($id, $date, $etat);
            // Rediriger vers la liste des rendez-vous
            header('Location: index.php?action=listRendezVous');
        } else {
            $rendezVous = RendezVousModel::getRendezVousById($id);
            require 'view/rendezvous/edit.php';
        }
    }

    public function deleteRendezVous($id) {
        // Appeler la fonction du modèle pour supprimer le rendez-vous
        RendezVousModel::deleteRendezVous($id);
        // Rediriger vers la liste des rendez-vous
        header('Location: index.php?action=listRendezVous');
    }
}
?>
