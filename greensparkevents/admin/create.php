<?php
// Step 1: Establishing a connection to the database
$servername = "localhost"; // Your MySQL server name
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "green_spark_db"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieving form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST["event_name"];
    $event_id = $_POST["event_id"];
    $event_time = $_POST["event_time"];
    $event_venue = $_POST["event_venue"];

    // Step 3: Sanitizing and validating form data (not shown in this example)

    // Step 4: Constructing SQL query
    $sql = "INSERT INTO events_list (event_name, event_id, event_time, event_venue)
            VALUES ('$event_name', '$event_id', '$event_time', '$event_venue')";

    // Step 5: Executing SQL query
    if ($conn->query($sql) === TRUE) {
        $response = "New record created successfully";
        echo "<script>
                window.onload = function() {
                    Swal.fire('Success!', '$response', 'success');
                };
              </script>";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
        echo "<script>
                window.onload = function() {
                    Swal.fire('Error!', '$error_message', 'error');
                };
              </script>";
    }
}

// Step 6: Closing the database connection
$conn->close();
?>
