<?php
header('Content-Type: application/json');

include '../Backend/db_config.php';
try {
    $stmt = $pdo->prepare("SELECT Apointment_date, Apointment_time,
                            apointment.treatments, 
                            users.email AS user_email, 
                            doctors.email AS doctor_email
                        FROM apointment 
                        JOIN users ON apointment.user_id = users.id 
                        JOIN doctors ON apointment.doctor_id = doctors.id");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} 