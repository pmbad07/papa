<?php

require_once 'config.php';
require_once 'database/db_connect.php';


session_start();


require_once 'controller/PatientController.php';
require_once 'controller/ConsultationController.php';
require_once 'controller/RendezVousController.php';


$patientController = new PatientController();
$consultationController = new ConsultationController();
$rendezVousController = new RendezVousController();


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listPatients'; 
}


switch ($action) {
    
    case 'listPatients':
        $patientController->listPatients();
        break;
    case 'addPatient':
        $patientController->addPatient();
        break;
    case 'editPatient':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $patientController->editPatient($id);
        } else {
            header('Location: index.php?action=listPatients');
        }
        break;
    case 'deletePatient':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $patientController->deletePatient($id);
        } else {
            header('Location: index.php?action=listPatients');
        }
        break;

    
    case 'listConsultations':
        $consultationController->listConsultations();
        break;
    case 'addConsultation':
        $consultationController->addConsultation();
        break;
    case 'editConsultation':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $consultationController->editConsultation($id);
        } else {
            header('Location: index.php?action=listConsultations');
        }
        break;
    case 'deleteConsultation':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $consultationController->deleteConsultation($id);
        } else {
            header('Location: index.php?action=listConsultations');
        }
        break;

    
    case 'listRendezVous':
        $rendezVousController->listRendezVous();
        break;
    case 'addRendezVous':
        $rendezVousController->addRendezVous();
        break;
    case 'editRendezVous':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $rendezVousController->editRendezVous($id);
        } else {
            header('Location: index.php?action=listRendezVous');
        }
        break;
    case 'deleteRendezVous':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $rendezVousController->deleteRendezVous($id);
        } else {
            header('Location: index.php?action=listRendezVous');
        }
        break;

    default:
        header('Location: index.php?action=listPatients');
        break;
}
?>
