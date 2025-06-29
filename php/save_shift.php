<?php
require 'db.php';
$data = json_decode(file_get_contents("php://input"), true);
$date = $data['date'];
$shift = $data['shift'];
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("INSERT INTO shifts (user_id, shift_date, shift_type) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE shift_type = ?");
$stmt->bind_param("isss", $user_id, $date, $shift, $shift);
$stmt->execute();
echo "OK";
?>