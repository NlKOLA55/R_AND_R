<?php
header('Content-Type: application/json');

include '../db_config.php';

session_start();

// Get the form data
$apointment_date =$_POST['apointment_date'];
$apointment_time = $_POST['apointment_time'];
$user_id = $_POST['user_id'];
$doctor_id = $_POST['doctor_id'];
$treatments = $_POST['treatments'];
$created_date = date('Y-m-d');
$created_time = date('H:i:s');
if (empty($apointment_time) || empty($user_id) || empty($doctor_id) || empty($treatments)){
    echo json_encode(['success' => false, 'message' => 'Not all requierd elements are filled in']);
    exit;
}
try{
    $stmt = $pdo->prepare('INSERT INTO Apointment 
    (apointment_date,apointment_time,created_date,created_time,user_id,doctor_id,treatments) 
    VALUES (:apointment_date,:apointment_time ,:created_date,:created_time,:user_id,:doctor_id,:treatments)');
    $stmt->bindParam(':apointment_date', $apointment_date);
    $stmt->bindParam(':apointment_time', $apointment_time);
    $stmt->bindParam(':created_date', $created_date);
    $stmt->bindParam(':created_time', $created_time);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':doctor_id', $doctor_id);
    $stmt->bindParam(':treatments', $treatments);
    $stmt->execute();
    echo json_encode(['success' => true, 'message' => 'Apointment recorded successfully.']);
}catch(PDOException $e){
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}   