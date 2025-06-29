<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$res = $conn->query("SELECT shift_type, COUNT(*) as count FROM shifts WHERE user_id = $user_id GROUP BY shift_type");
$stats = [];
while ($row = $res->fetch_assoc()) {
  $stats[$row['shift_type']] = $row['count'];
}
echo json_encode($stats);
?>