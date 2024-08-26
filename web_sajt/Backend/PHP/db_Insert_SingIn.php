<?php
header('Content-Type: application/json');

include '../db_config.php';

// Get the form data
$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$phone = $_POST['phone'] ?? '';
$birthDate = $_POST['birthDate'] ?? '';
$gender = $_POST['gender'] ?? '';

if (empty($fname) || empty($lname) 
 || empty($email) || empty($password) 
 || empty($birthDate)) {
    echo json_encode(['success' => false, 'message' => 'Not all requierd elements are filled in']);
    exit;
}
//Enter default values
if (empty($gender)){
    $gender = 'Prefer not to say';
}
if (empty($phone)){
    $gender = 'Not provided';
}
//Hash the password
if (!empty($password)){
    $password = hash('sha256',$password);
}

try {
    //Check if email exists
    $stmt = $pdo->prepare('SELECT email FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode( "Email found: " . $result['email']);
    } else {
        //Store the information
        $stmt = $pdo->prepare('INSERT INTO 
                users (email, password, phone, fname, lname, gender, birthDate)
                VALUES (:email,:password,:phone,:fname,:lname,:gender,:birthDate)');

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birthDate', $birthDate);

        if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Data received and inserted successfully.']);
        } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert data.']);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}