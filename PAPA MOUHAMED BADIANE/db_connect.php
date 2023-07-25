<?php
// db_connect.php

function connectDB() {
    require_once 'config.php';
    
    $conn = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }
    
    return $conn;
}
?>
