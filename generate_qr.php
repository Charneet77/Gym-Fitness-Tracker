<?php
session_start();

header('Content-Type: image/svg+xml');
require 'vendor/autoload.php';  // Ensure Composer's autoload is included

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die('User not logged in.');
}

$userId = $_SESSION['user_id'];
$data = "https://localhost/gym-management/checkin.php?user_id=" . urlencode($userId); // URL to check-in script

// QR Code options
$options = new QROptions([
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,  // Use SVG output (modern alternative)
    'eccLevel' => QRCode::ECC_M,           // Error correction level
]);

// Set header for SVG image output
header('Content-Type: image/svg+xml');

// Generate and output the QR code
try {
    echo (new QRCode($options))->render($data);
} catch (Exception $e) {
    die('QR Code generation failed: ' . $e->getMessage());
}
?>
