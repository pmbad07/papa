<?php
// controller/ConsultationController.php

require_once 'model/ConsultationModel.php';

class ConsultationController {
    public function listConsultations() {
        $consultations = ConsultationModel::getAllConsultations();
        require 'view/consultation/list.php';
    }

    public function addConsultation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $medecin = $_POST['medecin'];
            $medicaments = $_POST['medicament'];

            // Appeler la fonction du modèle pour ajouter la consultation
            ConsultationModel::addConsultation($medecin, $medicaments);
            // Rediriger vers la liste des consultations
            header('Location: index.php?action=listConsultations');
        } else {
            require 'view/consultation/add.php';
        }
    }

    public function editConsultation($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $medecin = $_POST['medecin'];
            $medicaments = $_POST['medicament'];

            // Appeler la fonction du modèle pour mettre à jour la consultation
            ConsultationModel::updateConsultation($id, $medecin, $medicaments);
            // Rediriger vers la liste des consultations
            header('Location: index.php?action=listConsultations');
        } else {
            $consultation = ConsultationModel::getConsultationById($id);
            require 'view/consultation/edit.php';
        }
    }

    public function deleteConsultation($id) {
        // Appeler la fonction du modèle pour supprimer la consultation
        ConsultationModel::deleteConsultation($id);
        // Rediriger vers la liste des consultations
        header('Location: index.php?action=listConsultations');
    }
}
?>
