<?php
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
  http_response_code(400);
  echo "Campos vacíos";
  exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hash);

if ($stmt->execute()) {
  echo "Registrado";
} else {
  http_response_code(500);
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
