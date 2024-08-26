<?php
include '../db_config.php';

try {
    $stmt = $pdo->query("SELECT u.email, ul.login_date, ul.login_time
                        FROM user_logins ul 
                        JOIN users u ON ul.user_id = u.id;");

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} 