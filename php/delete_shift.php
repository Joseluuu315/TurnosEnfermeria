<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$stmt = $conn->prepare("DELETE FROM shifts WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $_SESSION['user_id']);
$stmt->execute();
echo "Deleted";
?>