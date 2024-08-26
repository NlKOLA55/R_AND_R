<?php
include '../db_config.php';

try {
    $stmt = $pdo->query("SELECT id,fname,lname,email FROM doctors");
    $doctor = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($doctor);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} 