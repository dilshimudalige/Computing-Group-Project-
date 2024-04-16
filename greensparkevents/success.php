<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <!-- Include SweetAlert CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php
// Check if payment ID is set in the URL
if (isset($_GET['paymentId'])) {
    // Display success message using SweetAlert
    echo "<script>
            swal({
                title: 'Payment Successful!',
                text: 'Your transaction ID is: " . $_GET['paymentId'] . ". We will send you an email with the transaction details.',
                icon: 'success',
                timer: 5000, // 3 seconds
                buttons: false
            }).then(function() {
                // Redirect to another page after the message is closed
                window.location.href = 'index.php';
            });
          </script>";
} else {
    // If payment ID is not set, display an error message
    echo "<script>
            swal({
                title: 'Error!',
                text: 'Payment ID is missing.',
                icon: 'error',
                button: 'OK'
            }).then(function() {
                // Redirect to another page
                window.location.href = 'index.php';
            });
          </script>";
}
?>
</body>
</html>
