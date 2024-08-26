<?php
header('Content-Type: application/json');

include '../db_config.php';

session_start();

// Get the form data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)){
    echo json_encode(['success' => false, 'message' => 'Not all requierd elements are filled in']);
    exit;
}
try {
    //Check if email exists
    $stmt = $pdo->prepare('SELECT id, password FROM admins WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if ($result['password'] === hash('sha256',$password)){
            $admin_id = $result['id'];
            $login_date = date('Y-m-d');
            $login_time = date('H:i:s');
            //Store the information
            $stmt = $pdo->prepare('INSERT INTO admin_logins (admin_id, login_date, login_time) VALUES (:admin_id, :login_date, :login_time)');
            $stmt->bindParam(':admin_id', $admin_id);
            $stmt->bindParam(':login_date', $login_date);
            $stmt->bindParam(':login_time', $login_time);
            $stmt->execute();

            $_SESSION['admin_loggedin'] = true;
            $_SESSION['admin_email'] = $email;

            echo json_encode(['success' => true, 'message' => 'Login recorded successfully.']);

        }else{
            echo json_encode(['success' => false, 'message' => 'Incorect password.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Admin not found.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}