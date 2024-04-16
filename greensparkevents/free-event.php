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

// Check if event_id is provided in the URL
if (isset($_GET['event_id'])) {
    // Retrieve event details based on event_id
    $event_id = $_GET['event_id'];
    $query = "SELECT * FROM events_list WHERE id = $event_id";
    $result = $connection->query($query);

    // Check if the event exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Output the HTML code
        echo '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GreenSparkTickets</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/greensparkevents.css" rel="stylesheet">
    <link href="css/pay.css" rel="stylesheet">
</head>

<body>
    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">GreenSparkTickets</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Gallery.php">Gallery</a>
                        </li>
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Events
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="free-to-see.php">Free to See</a>
                              <a class="dropdown-item" href="pay-to-play.php">Pay to Play</a>
                            </div>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact.php">Contact</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>

        <br>

        <section id="events-details" class="wow fadeIn">
            <div class="container">
                <div class="section-header">
                    <h2>Event Details</h2>
           
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <img src="./admin/' . $row['event_image_url'] . '" alt="' . $row['event_name'] . '" style="max-width: 100%; height: auto;">
                    </div>

                    <div class="col-md-6">
                        <div class="details">
                            <h2>' . $row['event_name'] . '</h2>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-google"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                            <p>' . $row['event_desc'] . '</p>

                        
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br><br><br><br>

    </main>

    <footer class="site-footer">
        <!-- Footer content here -->
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>';
    } else {
        echo "<p>Event not found.</p>";
    }
} else {
    echo "<p>No event ID provided.</p>";
}

// Close connection
$connection->close();
?>
