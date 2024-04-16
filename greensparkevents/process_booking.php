<?php
require 'sendmail.php'; // Include your sendmail.php file
require 'vendor/autoload.php'; // Include Composer's autoloader for PayPal SDK

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "spark_db";

// PayPal configuration
$paypalClientID = 'AfPIRowPq7zRhNo_OPG_gm7umsd-OydpAwZwECou-WTeHypDfMcsvzLh9BMreq2pS688Pan3pKJmxyCw';
$paypalSecret = 'EGuuiEkO6wkPujmGkbD03BPsIo-h0NI9PNC3NTItmWGET4NBuGpKcI7-Bj2bTVlkpMfj_u-w6LyTmePw';
$paypalBaseUrl = 'https://api.sandbox.paypal.com'; // Use 'https://api.paypal.com' for live transactions

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  header("Location: error.php?message=Connection failed: " . $connection->connect_error);
  exit;
}

$apiContext = new ApiContext(new \PayPal\Auth\OAuthTokenCredential($paypalClientID, $paypalSecret));

// Retrieve form data

// Get form data
$username = $_POST['username'];
$usermail = $_POST['usermail'];
$eventName = $_POST['eventName'];
$eventDate = $_POST['eventDate'];
$ticketID = $_POST['ticketID'];
$ticketType = $_POST['ticketType'];

// Prepare SQL statement
$sql = "INSERT INTO bookings_list (username, usermail, eventName, eventDate, ticketID, ticketType) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $connection->prepare($sql);

if (!$stmt) {
  // Check for errors in preparing the SQL statement
  die("Prepare failed: " . $connection->error);
}

// Bind parameters
$stmt->bind_param("ssssss", $username, $usermail, $eventName, $eventDate, $ticketID, $ticketType);

// Execute SQL statement
if ($stmt->execute()) {
  // Data insertion successful
  echo "Data inserted successfully.";
} else {
  // Data insertion failed
  echo "Execute failed: " . $stmt->error;
}

// Close SQL statement after use
$stmt->close();

// Calculate total amount based on ticket type
$ticketPrice = 0;
if ($ticketType === '2000') {
  $ticketPrice = 10; // Set price for standard ticket
} elseif ($ticketType === '4000') {
  $ticketPrice = 20; // Set price for premium ticket
} elseif ($ticketType === '13000') {
  $ticketPrice = 30; // Set price for VIP ticket
}

// Set up payment
$payer = new Payer();
$payer->setPaymentMethod('paypal');

$amount = new Amount();
$amount->setCurrency('USD')
  ->setTotal($ticketPrice); // Set total amount dynamically based on ticket type

$transaction = new Transaction();
$transaction->setAmount($amount)
  ->setDescription('Ticket purchase'); // Set description as per your requirement

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://localhost/greensparkevents/success.php')
  ->setCancelUrl('http://localhost/greensparkevents/cancel.php');

$payment = new Payment();
$payment->setIntent('sale')
  ->setPayer($payer)
  ->setTransactions([$transaction])
  ->setRedirectUrls($redirectUrls);

try {
  $payment->create($apiContext);
  header("Location: " . $payment->getApprovalLink());
  exit;
} catch (Exception $e) {
  header("Location: index.php");
  exit;
}

// Close connection
$connection->close();
