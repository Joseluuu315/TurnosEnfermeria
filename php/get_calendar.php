<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$res = $conn->query("SELECT id, shift_date as start, shift_type as title FROM shifts WHERE user_id = $user_id");
$events = [];
while ($row = $res->fetch_assoc()) $events[] = $row;
echo json_encode($events);
?>