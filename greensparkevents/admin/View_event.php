<?php
// Function to connect to the database
function connectToDatabase() {
    $servername = "localhost"; // Change this to your MySQL server hostname
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $database = "spark_db"; // Change this to your MySQL database name

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Check if the event ID is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $event_id = intval($_GET['id']);

    // Connect to MySQL database
    $conn = connectToDatabase();

    // Prepare and execute SQL statement to delete the event from both tables
    $sql_event = "DELETE FROM events_list WHERE id = ?";
    $sql_image = "DELETE FROM images_list WHERE id = ?";
    
    // Prepare statement for event deletion
    $stmt_event = $conn->prepare($sql_event);
    $stmt_event->bind_param("i", $event_id);

    // Prepare statement for image deletion
    $stmt_image = $conn->prepare($sql_image);
    $stmt_image->bind_param("i", $event_id);

    // Execute statements
    if ($stmt_event->execute() && $stmt_image->execute()) {
        echo "Event and Image deleted successfully";
    } else {
        echo "Error deleting event or image: " . $conn->error;
    }

    // Close statements and connection
    $stmt_event->close();
    $stmt_image->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.1/dist/alpine.min.js" defer></script>
   
</head>
<body>
<?php include 'nav.php' ?>
<div class="overflow-x-auto shadow-md sm:rounded-lg fade-in">
        <!-- Gallery Details Table -->
        <div class="p-2">
            <div class="relative mt-1">
                <div class="flex items-center">
                    <div class="w-5 h-5 text-gray-500 dark:text-gray-400">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z"/>
                        </svg>
                    </div>
                    <h3 class="ml-2 text-xl font-semibold text-gray-800 dark:text-gray-200">Events Details</h3>
                </div>
            </div>
        </div>
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Event ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Event Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Event Time</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Event Venue</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Event Desc</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Event Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            <?php
            // Connect to MySQL database
            $conn = connectToDatabase();

            // Query the database to retrieve event details
            $sql = "SELECT * FROM events_list";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>";
                    echo "<td class='py-2 px-6 border'>" . $row["id"] . "</td>";
                    echo "<td class='py-2 px-6 border'>" . $row["event_name"] . "</td>";
                    echo "<td class='py-2 px-6 border'>" . $row["event_category"] . "</td>";
                    echo "<td class='py-2 px-6 border'>" . $row["event_time"] . "</td>";
                    echo "<td class='py-2 px-6 border'>" . $row["event_venue"] . "</td>";
                    echo "<td class='py-2 px-6 max-w-xs truncate border'>" . $row["event_desc"] . "</td>";
                    echo "<td class='py-2 px-6 border'><img src='" . $row["event_image_url"] . "' style='max-width: 100px; max-height: 100px;' /></td>";
                    echo "<td class='py-2 px-6 border'>
                                    <button onclick='deleteEvent(" . $row['id'] . ")' class='bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-full'>Delete</button>
                                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='py-4 px-6 text-center border'>No events found</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="overflow-x-auto shadow-md sm:rounded-lg fade-in">
        <!-- Gallery Details Table -->
        <div class="p-2">
            <div class="relative mt-1">
                <div class="flex items-center">
                    <div class="w-5 h-5 text-gray-500 dark:text-gray-400">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z"/>
                        </svg>
                    </div>
                    <h3 class="ml-2 text-xl font-semibold text-gray-800 dark:text-gray-200">Gallery Details</h3>
                </div>
            </div>
        </div>
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Image ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Image Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Uploaded Time</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            <?php
            // Connect to MySQL database
            $conn = connectToDatabase();

            // Query the database to retrieve image details
            $sql = "SELECT * FROM images_list";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>";
                    echo "<td class='py-2 px-6 border'>" . $row["id"] . "</td>";
                    echo "<td class='py-2 px-6 border'>" . $row["f_name"] . "</td>";
                    echo "<td class='py-2 px-6 border'>" . $row["upload_time"] . "</td>";
                    echo "<td class='py-2 px-6 border'><img src='uploads/" . $row["f_name"] . "' style='max-width: 100px; max-height: 100px;' /></td>";
                    echo "<td class='py-2 px-6 border'>
                                    <button onclick='deleteImage(" . $row['id'] . ")' class='bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-full'>Delete</button>
                                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='py-4 px-6 text-center border'>No Images found</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function deleteEvent(id) {
        if (confirm('Are you sure you want to delete this event?')) {
            // Send AJAX request to delete event
            fetch('<?php echo $_SERVER["PHP_SELF"]; ?>?id=' + id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Reload the page to reflect the changes
                    location.reload();
                })
                .catch(error => {
                    console.error('There was a problem with your fetch operation:', error);
                });
        }
    }

    function deleteImage(id) {
        if (confirm('Are you sure you want to delete this Image?')) {
            // Send AJAX request to delete image
            fetch('<?php echo $_SERVER["PHP_SELF"]; ?>?id=' + id)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Reload the page to reflect the changes
                    location.reload();
                })
                .catch(error => {
                    console.error('There was a problem with your fetch operation:', error);
                });
        }
    }
</script>
</body>
</html>
