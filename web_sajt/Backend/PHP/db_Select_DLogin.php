<?php
include '../db_config.php';

try {
    $stmt = $pdo->query("SELECT d.email, dl.login_date, dl.login_time
                        FROM doctor_logins dl
                        JOIN doctors d ON dl.doctor_id = d.id;");

    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($doctors);
} catch (PDOException $e) {
    echo json_encode("Error: " . $e->getMessage());
}  