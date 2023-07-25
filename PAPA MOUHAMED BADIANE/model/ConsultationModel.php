<?php
// model/ConsultationModel.php

require_once 'database/db_connect.php';

class ConsultationModel {
    public static function getAllConsultations() {
        $conn = connectDB();
        $sql = "SELECT * FROM Consultation";
        $result = $conn->query($sql);
        $consultations = [];
        while ($row = $result->fetch_assoc()) {
            $consultations[] = $row;
        }
        $conn->close();
        return $consultations;
    }

    public static function addConsultation($medecin, $medicaments) {
        $conn = connectDB();
        // Convertir le tableau des médicaments en chaîne de caractères séparée par des virgules
        $medicamentsStr = implode(', ', $medicaments);
        $sql = "INSERT INTO Consultation (medecin, medicament) VALUES ('$medecin', '$medicamentsStr')";
        $conn->query($sql);
        $conn->close();
    }

    public static function getConsultationById($id) {
        $conn = connectDB();
        $sql = "SELECT * FROM Consultation WHERE id = '$id'";
        $result = $conn->query($sql);
        $consultation = $result->fetch_assoc();
        $conn->close();
        return $consultation;
    }

    public static function updateConsultation($id, $medecin, $medicaments) {
        $conn = connectDB();
        // Convertir le tableau des médicaments en chaîne de caractères séparée par des virgules
        $medicamentsStr = implode(', ', $medicaments);
        $sql = "UPDATE Consultation SET medecin='$medecin', medicament='$medicamentsStr' WHERE id='$id'";
        $conn->query($sql);
        $conn->close();
    }

    public static function deleteConsultation($id) {
        $conn = connectDB();
        $sql = "DELETE FROM Consultation WHERE id='$id'";
        $conn->query($sql);
        $conn->close();
    }
}
?>
