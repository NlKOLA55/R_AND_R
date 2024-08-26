<?php
include '../db_config.php';

try {
    $stmt = $pdo->query("SELECT a.email, al.login_date, al.login_time
                        FROM admin_logins al
                        JOIN admins a ON al.admin_id = a.id;");

    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($admins);
} catch (PDOException $e) {
    echo json_encode("Error: " . $e->getMessage());
}  