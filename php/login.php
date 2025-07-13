<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  session_start(); // <-- IMPORTANTE para usar $_SESSION

  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $hashed);
    $stmt->fetch();
    if (password_verify($password, $hashed)) {
      $_SESSION['user_id'] = $id;
      echo "OK";
    } else {
      http_response_code(401);
      echo "Contraseña incorrecta";
    }
  } else {
    http_response_code(401);
    echo "Usuario no encontrado";
  }

  $stmt->close();
  $conn->close();

} else {
  // Si NO es POST, devolver 405 y header correcto:
  header('HTTP/1.1 405 Method Not Allowed');
  header('Allow: POST');
  echo "Method Not Allowed";
  exit;
}
?>
