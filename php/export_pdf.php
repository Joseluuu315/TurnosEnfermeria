<?php
require 'db.php';
require '../vendor/autoload.php';
use Dompdf\Dompdf;
$user_id = $_SESSION['user_id'];
$res = $conn->query("SELECT shift_date, shift_type FROM shifts WHERE user_id = $user_id ORDER BY shift_date");
$html = "<h1>Informe de Turnos</h1><table border='1' cellpadding='5'><tr><th>Fecha</th><th>Turno</th></tr>";
while ($row = $res->fetch_assoc()) {
  $html .= "<tr><td>{$row['shift_date']}</td><td>{$row['shift_type']}</td></tr>";
}
$html .= "</table>";
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("informe_turnos.pdf");
?>