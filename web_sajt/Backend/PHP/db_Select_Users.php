<?php
include '../db_config.php';

try {
    $stmt = $pdo->query("SELECT id,fname,lname,email,phone,gender,birthDate FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} 