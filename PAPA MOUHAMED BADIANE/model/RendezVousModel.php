<?php
// model/RendezVousModel.php

require_once 'database/db_connect.php';

class RendezVousModel {
    public static function getAllRendezVous() {
        $conn = connectDB();
        $sql = "SELECT * FROM RendezVous";
        $result = $conn->query($sql);
        $rendezVous = [];
        while ($row = $result->fetch_assoc()) {
            $rendezVous[] = $row;
        }
        $conn->close();
        return $rendezVous;
    }

    public static function addRendezVous($date, $etat) {
        $conn = connectDB();
        $sql = "INSERT INTO RendezVous (date, etat) VALUES ('$date', '$etat')";
        $conn->query($sql);
        $conn->close();
    }

    public static function getRendezVousById($id) {
        $conn = connectDB();
        $sql = "SELECT * FROM RendezVous WHERE id = '$id'";
        $result = $conn->query($sql);
        $rendezVous = $result->fetch_assoc();
        $conn->close();
        return $rendezVous;
    }

    public static function updateRendezVous($id, $date, $etat) {
        $conn = connectDB();
        $sql = "UPDATE RendezVous SET date='$date', etat='$etat' WHERE id='$id'";
        $conn->query($sql);
        $conn->close();
    }

    public static function deleteRendezVous($id) {
        $conn = connectDB();
        $sql = "DELETE FROM RendezVous WHERE id='$id'";
        $conn->query($sql);
        $conn->close();
    }
}
?>
