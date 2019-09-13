<?php

require_once "../QrCode/vendor/autoload.php";
use Endroid\QrCode\QrCode;

$qrCode = new QrCode($_GET['ticketID']);
$qrCode->setMargin(20);

header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();

?>