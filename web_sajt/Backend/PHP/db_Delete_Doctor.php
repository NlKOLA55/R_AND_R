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
        $doctorId = (int) $data['id'];

        $stmt = $pdo->prepare("DELETE FROM doctor_logins WHERE doctor_id = :id");
        $stmt->bindParam(':id', $doctorId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $stmt = $pdo->prepare("DELETE FROM doctors WHERE id = :id");
            $stmt->bindParam(':id', $doctorId, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo json_encode(["success" => true, "message" => "Doctor deleted successfully."]);
            } else {
                http_response_code(500);
                echo json_encode(["success" => false, "message" => "Failed to delete doctor."]);
            }
        }else {
            http_response_code(500);
            echo json_encode(["success" => false, "message" => "Failed to delete doctor_logins."]);
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