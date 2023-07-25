<?php
// controller/PatientController.php

require_once 'model/PatientModel.php';

class PatientController {
    public function listPatients() {
        $patients = PatientModel::getAllPatients();
        require 'view/patient/list.php';
    }

    public function addPatient() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nomComplet = $_POST['nomComplet'];
            $adresse = $_POST['adresse'];
            $numeroTelephone = $_POST['numeroTelephone'];

            // Appeler la fonction du modèle pour ajouter le patient
            PatientModel::addPatient($nomComplet, $adresse, $numeroTelephone);
            // Rediriger vers la liste des patients
            header('Location: index.php?action=listPatients');
        } else {
            require 'view/patient/add.php';
        }
    }

    public function editPatient($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nomComplet = $_POST['nomComplet'];
            $adresse = $_POST['adresse'];
            $numeroTelephone = $_POST['numeroTelephone'];

            // Appeler la fonction du modèle pour mettre à jour le patient
            PatientModel::updatePatient($id, $nomComplet, $adresse, $numeroTelephone);
            // Rediriger vers la liste des patients
            header('Location: index.php?action=listPatients');
        } else {
            $patient = PatientModel::getPatientById($id);
            require 'view/patient/edit.php';
        }
    }

    public function deletePatient($id) {
        // Appeler la fonction du modèle pour supprimer le patient
        PatientModel::deletePatient($id);
        // Rediriger vers la liste des patients
        header('Location: index.php?action=listPatients');
    }
}
?>
