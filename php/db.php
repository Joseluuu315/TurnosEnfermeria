<?php
$servername = "mysql-196f3b98-joselufupa2016-622b.e.aivencloud.com";
$username = "avnadmin";
$password = "AVNS_IEESW4ZtxnwykLGj0aO";
$dbname = "defaultdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
session_start();
?>