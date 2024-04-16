<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <!-- Include necessary CSS and JavaScript libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-c7+0AAz7/n8mcJSXWO4JMqevgiMiCm+3sZLoflFOJSpBoys+Xky8n4HPQCw1XGoa9mrINvIzI7PrfXGxvH3hiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include your custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://i.ytimg.com/vi/h_wBRuneFxE/maxresdefault.jpg');
            background-size: cover;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: grid;
            gap: 20px;
        }
        input[type="text"],
        input[type="time"],
        input[type="date"],
        select,
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }
        input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }
        input[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include 'nav.php' ?>
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
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

// Initialize variables
$event_id = $event_name = $event_date = $event_category = $event_time = $event_venue = $event_description = $event_image_url = "";

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize event ID
    $event_id = sanitize_input($_POST["event_id"]);

    // Fetch event details from database based on event ID
    $sql = "SELECT * FROM events_list WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
        $event_id = $event["id"];
        $event_name = $event["event_name"];
        $event_date = $event["event_date"];
        $event_category = $event["event_category"];
        $event_time = $event["event_time"];
        $event_venue = $event["event_venue"];
        $event_description = $event["event_desc"];
        $event_image_url = $event["event_image_url"];
    } else {
        echo "<p>No event found with ID: $event_id</p>";
    }
}
?>
<div class="container">
    <h2>Update Event</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="event_id">Enter Event ID:</label>
        <input type="text" id="event_id" name="event_id" value="<?php echo $event_id; ?>" required>
        <input type="submit" value="Search Event">
    </form>

    <?php if($event_id !== "" && $event_name !== "") { ?>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <!-- Hidden field to store event ID -->
            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
            <!-- Other input fields for updating event details -->
            <label for="event_name">Event Name</label>
            <input type="text" id="event_name" name="event_name" value="<?php echo $event_name; ?>" required>

            <label for="event_date">Event Date</label>
            <input type="date" id="event_date" name="event_date" value="<?php echo $event_date; ?>" required>

            <label for="event_category">Event Category</label>
            <select id="event_category" name="event_category" required>
                <option value="Free to see" <?php if($event_category == 'Free to see') echo 'selected'; ?>>Free To See</option>
                <option value="Pay to play" <?php if($event_category == 'Pay to play') echo 'selected'; ?>>Pay To Play</option>
                <!-- Add more options if needed -->
            </select>

            <label for="event_time">Event Time</label>
            <input type="time" id="event_time" name="event_time" value="<?php echo $event_time; ?>" required>

            <label for="event_venue">Event Venue</label>
            <input type="text" id="event_venue" name="event_venue" value="<?php echo $event_venue; ?>" required>

            <label for="event_desc">Event Description</label>
            <textarea id="event_desc" name="event_desc" required><?php echo $event_description; ?></textarea>

            <label for="event_image">Event Image</label>
            <input type="file" id="event_image" name="event_image" accept="image/*">
            <img src="<?php echo $event_image_url; ?>" alt="Event Image Preview" style="max-width: 200px;">

            <input type="submit" value="Update Event">
        </form>
    <?php } ?>
</div>
</body>
</html>
