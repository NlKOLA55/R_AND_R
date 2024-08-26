<?php
include '../db_config.php';

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        parse_str(file_get_contents("php://input"), $data);
        
        if (!isset($data['id']) || !is_numeric($data['id'])) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Invalid ID."]);
            exit();
        }
        $userId = (int) $data['id'];

        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "User deleted successfully."]);
        } else {
            http_response_code(500);
            echo json_encode(["success" => false, "message" => "Failed to delete user."]);
        }
    } else {
        http_response_code(405);
        echo json_encode(["success" => false, "message" => "Method not allowed."]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "General error: " . $e->getMessage()]);
}
