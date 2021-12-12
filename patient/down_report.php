<?php
//Fadil Eldin
//8/16/2020
require 'vendor/autoload.php';

$rid = $_GET["rid"];

$mpdf = new \Mpdf\Mpdf();
$html = file_get_contents('http://localhost:8888/healthcare/patient/print_report.php?rid='.$rid);
$mpdf->WriteHTML("");
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->Output($file,'D');
?>