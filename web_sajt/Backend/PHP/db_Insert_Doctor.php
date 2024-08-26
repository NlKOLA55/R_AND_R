<?php
header('Content-Type: application/json');

include '../db_config.php';

// Get the form data
$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($fname) || empty($lname) 
 || empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Not all requierd elements are filled in']);
    exit;
}

//Hash the password
if (!empty($password)){
    $password = hash('sha256',$password);
}

try {
    //Check if email exists
    $stmt = $pdo->prepare('SELECT email FROM doctors WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode( "Email found: " . $result['email']);
        exit;
    } else {
        //Store the information
        $stmt = $pdo->prepare('INSERT INTO 
                doctors (email, password, fname, lname)
                VALUES (:email,:password,:fname,:lname)');

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password); 
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);

        if ($stmt->execute()) {

            $stmt = $pdo->prepare('SELECT id FROM doctors WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

            $list = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday',);
            foreach ($list as $day){
                $stmt = $pdo->prepare('INSERT INTO workinfo (doctor_id, day)
                                     VALUES (:doctor_id, :day)');
                
                $stmt->bindParam(':doctor_id', $doctor['id']);
                $stmt->bindParam(':day', $day);
                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Data received and inserted successfully.']);
                } else{
                    echo json_encode(['success' => true, 'message' => 'Failed to insert work data.']);
                }
            }
        } else {
        echo json_encode(['success' => true, 'message' => 'Failed to insert data.']);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['success' => true, 'message' => 'Database error: ' . $e->getMessage()]);
}