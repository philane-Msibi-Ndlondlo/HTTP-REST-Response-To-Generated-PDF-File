<?php
session_start();

if (!isset($_SESSION['RESULTS'])) {
    header('location: index.php');
    die();
}

$results = '';

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$results .= '<pre>';
$results .= $_SESSION['RESULTS'];
$results .= '</pre>';

$mpdf->WriteHTML($results);

$mpdf->Output('RESTToPDF.pdf', 'D');

session_destroy();
header('location: index.php');

die();


?>