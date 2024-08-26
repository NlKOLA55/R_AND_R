<?php
header('Content-Type: application/json');

include '../Backend/db_config.php';

// Get the form data
$doctor_id = $_POST['doctor_id'] ?? '';
try {
    $stmt = $pdo->prepare("SELECT Apointment_date, Apointment_time,
                                 users.fname, users.lname, treatments 
                        FROM apointment 
                        JOIN users ON apointment.user_id = users.id 
                        WHERE apointment.doctor_id = :doctor_id;" );
    $stmt->bindparam(':doctor_id',$doctor_id);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} 