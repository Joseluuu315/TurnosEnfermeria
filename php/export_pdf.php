<?php
session_start();
require 'db.php';
require '../vendor/autoload.php';

use Dompdf\Dompdf;

$conn->set_charset("utf8");

$user_id = $_SESSION['user_id'];

$res = $conn->query("SELECT shift_date, shift_type FROM shifts WHERE user_id = $user_id ORDER BY shift_date");

$html = "
<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    color: #333;
    padding: 20px;
  }
  h1 {
    text-align: center;
    color: #d63384; /* Rosa fuerte */
    border-bottom: 2px solid #d63384;
    padding-bottom: 10px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
  }
  th {
    background-color: #f8d7da; /* Rosa clarito */
    color: #721c24; /* Contraste */
    padding: 12px;
    border: 1px solid #f5c6cb;
    font-size: 14px;
  }
  td {
    padding: 12px;
    border: 1px solid #f5c6cb;
    text-align: center;
    font-size: 12px;
  }
  tr:nth-child(even) {
    background-color: #fce8eb; /* Rayado suave */
  }
  .footer {
    margin-top: 50px;
    text-align: center;
    font-size: 10px;
    color: #888;
  }
</style>
</head>
<body>
<h1>Informe de Turnos</h1>
<table>
  <tr>
    <th>Fecha</th>
    <th>Turno</th>
  </tr>";

while ($row = $res->fetch_assoc()) {
  $html .= "<tr><td>{$row['shift_date']}</td><td>{$row['shift_type']}</td></tr>";
}

$html .= "
</table>
<div class='footer'>
  Generado por el sistema | " . date('d/m/Y H:i') . "
</div>
</body>
</html>
";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

ob_end_clean();
$dompdf->stream("informe_turnos.pdf");
