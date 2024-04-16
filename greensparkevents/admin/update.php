<header>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</header>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<?php

$servername = "localhost"; // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "spark_db"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $event_id = sanitize_input($_POST["event_id"]);
    $event_name = sanitize_input($_POST["event_name"]);
    $event_date = sanitize_input($_POST["event_date"]);
    $event_category = sanitize_input($_POST["event_category"]);
    $event_time = sanitize_input($_POST["event_time"]);
    $event_venue = sanitize_input($_POST["event_venue"]);
    $event_description = sanitize_input($_POST["event_desc"]);
    
    // Update the event details in the database
    $sql = "UPDATE events_list SET event_name=?, event_date=?, event_category=?, event_time=?, event_venue=?, event_desc=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $event_name, $event_date, $event_category, $event_time, $event_venue, $event_description, $event_id);
    
    if ($stmt->execute()) {
        echo "<script>
        // Show SweetAlert
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Event updated successfully.',
            showConfirmButton: false,
            timer: 2000 // Auto close after 2 seconds
        }).then(function() {
            // Redirect to another page
            window.location.href = 'update_event.php';
        });
     </script>";
    } else {
        echo "<script>
        // Show SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Event updated not successfully.',
            showConfirmButton: false,
            timer: 2000 // Auto close after 2 seconds
        }).then(function() {
            // Redirect to another page
            window.location.href = 'update_event.php';
        });
     </script>";
    }
}

// Close the database connection
$conn->close();
?>
