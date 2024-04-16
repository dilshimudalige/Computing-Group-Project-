<!DOCTYPE html>
<?php
// Start the session
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Poppins, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://i.ytimg.com/vi/h_wBRuneFxE/maxresdefault.jpg'); 
            background-size: cover;
            background-position: center;
            color: #222;
        }
        header {
            background-color: #7abd73;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            margin-top: 20px;
            text-align: center;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-text {
            color: #555;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .card-icon {
            font-size: 48px;
            color: #28a745;
            margin-bottom: 10px;
        }
        footer {
            background-color:#7abd73 ;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <?php include 'nav.php' ?>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spark_db";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Function to fetch counts
    function getCount($table, $connection) {
        $query = "SELECT COUNT(*) AS count FROM $table";
        $result = $connection->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        } else {
            return 0;
        }
    }

    // Fetch counts
    $userCount = getCount('users', $connection);
    $eventCount = getCount('events_list', $connection);
    $bookingCount = getCount('bookings_list', $connection);

    // Close connection
    $connection->close();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-users card-icon"></i>
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Total Users: <?php echo $userCount ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-calendar-alt card-icon"></i>
                        <h5 class="card-title">Events</h5>
                        <p class="card-text">Total Events: <?php echo $eventCount ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-book card-icon"></i>
                        <h5 class="card-title">Bookings</h5>
                        <p class="card-text">Total Bookings: <?php echo $bookingCount ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>&copy; GREENSPARKEVENT <?php echo date("Y") ?></p>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        function logout() {
            // Display confirmation dialog
            var confirmLogout = confirm("Are you sure you want to logout?");
            if (confirmLogout) {
                // If user confirms logout, redirect to logout.php
                window.location.href = "logout.php";
            }
        }
    </script>
</body>
</html>
