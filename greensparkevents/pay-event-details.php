<?php
ob_start();
session_start();

if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}


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


$sql = "SELECT full_name, email, role FROM users WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $username = $row['full_name'];
    $email = $row['email'];
    $role = $row['role'];
} else {
    // User not found
    // Handle this case appropriately, such as logging the error or redirecting to an error page
    die("User not found");
}

// Close prepared statement
$stmt->close();


// Check if event_id is provided in the URL
if (isset($_GET['event_id'])) {
    // Retrieve event details based on event_id
    $event_id = $_GET['event_id'];
    $query = "SELECT * FROM events_list WHERE id = $event_id";
    $result = $connection->query($query);

    // Check if the event exists
    if ($result->num_rows > 0) {
      
        $row = $result->fetch_assoc();
        $eventName = $row['event_name'];
        $ticketID = uniqid('TICKET_');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ZoSdOOHYXONRcuqO9JztI/ik85xTR/DbACuqEgDlByTV5KdL8n8k4kPe5n25k5ml1BgTWu61NQk2H4Fwb9n+sQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/greensparkevents.css" rel="stylesheet">
    <link href="css/pay.css" rel="stylesheet">
</head>

<body>
    <main>
 
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                GreenSparkEvents
            </a>

         
            <a href="login.php" class="btn custom-btn d-lg-none ms-auto me-4">Join with us</a>

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
                            <a class="nav-link" href="./admin/">Admin</a>
                        </li>

                        
                    
                  
                   
                    
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
                            <button id="bookTicketBtn" class="btn btn-success">Book Ticket</button>
                            <br><br>
        
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

<div id="popupContainer" class="popup-container">
    <!-- Popup content -->
    <div class="popup-content">
        <span class="close">&times;</span>
        <div class="icon">
            <i class="bi bi-megaphone-fill"></i>
        </div>
        <form id="ticketForm" action="process_booking.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Enter your name" value="'.$username.'" readonly  required>
            <input type="text" id="usermail" name="usermail" placeholder="Enter your email" value="'.$email.'" readonly required>
            <input type="text" id="eventName" name="eventName" value="'.$row['event_name'].'" readonly>
            <input type="text" id="eventDate" name="eventDate" value="'.$row['event_date'].'" readonly>
            <input type="text" id="ticketID" name="ticketID" value="'. $ticketID.'" readonly >
            
           
            <div class="row">
            <div class="col-lg-4 col-md-4 col-12" id="earyStandardSection">
                <div class="form-check form-check-radio form-control">
                    <input class="form-check-input" type="radio" name="ticketType" id="Eary" value="2000">
                    <label class="form-check-label" for="Eary">
                        Eary bird Rs.2000
                    </label>
                </div>
                <div class="form-check form-check-radio form-control">
                    <input class="form-check-input" type="radio" name="ticketType" id="Standard" value="4000">
                    <label class="form-check-label" for="Standard">
                        Standard Rs.4000
                    </label>
                </div>
            </div>
        
            <div class="col-lg-4 col-md-4 col-12" id="alumniSection">
                <div class="form-check form-check-radio form-control">
                    <input class="form-check-input" type="radio" name="ticketType" id="alumni" value="13000">
                    <label class="form-check-label" for="alumni">
                        Alumni Rs.13000
                    </label>
                </div>
            </div>
        </div>
     
        
        <br>
            <button type="submit">Book Now</button>
        </form>
    </div>
</div>
</html>';
    } else {
        echo "<p>Event not found.</p>";
    }
} else {
    echo "<p>No event ID provided.</p>";
}

include "footer.php";

// Close connection
$connection->close();

?>





<script>
    // Get the user's role
    var role = "<?php echo $role; ?>";

    // Function to show or hide sections based on the user's role
    function toggleSections() {
        if (role === "student") {
            document.getElementById("earyStandardSection").style.display = "block";
            document.getElementById("alumniSection").style.display = "none";
        } else if (role === "alumni") {
            document.getElementById("earyStandardSection").style.display = "none";
            document.getElementById("alumniSection").style.display = "block";
        } else {
            // Handle other roles if needed
        }
    }

    // Call the function when the page loads
    window.onload = toggleSections;
</script>


<script>
// Get the modal
var modal = document.getElementById("popupContainer");

// Get the button that opens the modal
var btn = document.getElementById("bookTicketBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<style>
/* Popup container */
.popup-container {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

/* Popup content */
.popup-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    max-width: 500px;
    border-radius: 10px;
    position: absolute;
    top: 10%;
    left: 30%;
    transform: translate(-50%, -50%);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: pop 0.3s ease forwards;
}

/* Close button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Popup animation */
@keyframes pop {
    0% {
        transform: scale(0);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Customized form elements */
.popup-content input[type="text"],
.popup-content input[type="number"],
.popup-content button[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Submit button */
.popup-content button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

.popup-content button[type="submit"]:hover {
    background-color: #45a049;
}

/* Icon */
.popup-content .icon {
    font-size: 36px;
    margin-bottom: 10px;
}

/* Centering the popup */
@media screen and (max-width: 600px) {
    .popup-content {
        width: 80%;
    }
}
</style>
