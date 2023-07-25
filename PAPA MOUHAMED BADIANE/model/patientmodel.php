<?php
// model/PatientModel.php

require_once 'database/db_connect.php';

class PatientModel {
    public static function getAllPatients() {
        $conn = connectDB();
        $sql = "SELECT * FROM Patient";
        $result = $conn->query($sql);
        $patients = [];
        while ($row = $result->fetch_assoc()) {
            $patients[] = $row;
        }
        $conn->close();
        return $patients;
    }

    public static function addPatient($nomComplet, $adresse, $numeroTelephone) {
        $conn = connectDB();
        $sql = "INSERT INTO Patient (nomComplet, adresse, numeroTelephone) VALUES ('$nomComplet', '$adresse', '$numeroTelephone')";
        $conn->query($sql);
        $conn->close();
    }

    public static function getPatientById($id) {
        $conn = connectDB();
        $sql = "SELECT * FROM Patient WHERE id = '$id'";
        $result = $conn->query($sql);
        $patient = $result->fetch_assoc();
        $conn->close();
        return $patient;
    }

    public static function updatePatient($id, $nomComplet, $adresse, $numeroTelephone) {
        $conn = connectDB();
        $sql = "UPDATE Patient SET nomComplet='$nomComplet', adresse='$adresse', numeroTelephone='$numeroTelephone' WHERE id='$id'";
        $conn->query($sql);
        $conn->close();
    }

    public static function deletePatient($id) {
        $conn = connectDB();
        $sql = "DELETE FROM Patient WHERE id='$id'";
        $conn->query($sql);
        $conn->close();
    }
}
?>
