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
    <link href="css/events.css" rel="stylesheet">
    <link href="css/ourgallery.css" rel="stylesheet">
    <style>
        .event {
            margin-bottom: 30px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
        }

        .event img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .details h3 {
            margin-bottom: 10px;
        }

        .social a {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <?php include 'nav.php' ?>
    <main>
       

   


        <section id="events" class="wow fadeInUp">
            <div class="container">
                <div class="section-header">
                    <h2 style="color:white">Events on going</h2>
                    <p style="color:white"><b>Here are some of our events</b></p>
                </div>

                <br><br>

                <div class="row">
                    <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    // Step 1: Connect to MySQL database
                    $servername = "localhost"; // Change this to your MySQL server hostname
                    $username = "root"; // Change this to your MySQL username
                    $password = ""; // Change this to your MySQL password
                    $database = "spark_db"; // Change this to your MySQL database name
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Step 2: Query the database to retrieve events with category 'Free to see'
                    $sql = "SELECT * FROM events_list WHERE event_category = 'Free to see'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-4 col-md-6">';
                            echo '<div class="event">';
                            echo '<img src="./admin/' . $row["event_image_url"] . '" alt="' . $row["event_name"] . '" class="img-fluid">';
                            echo '<a class="nav-link" style="color:#7FFF00;   font-size: 25px;                            " href="free-event.php?event_id=' . $row['id'] . '">' . $row['event_name'] . '</a>';
                            echo '<h6 style="color:white; ">' . $row["event_date"] . '</h6';
                             echo '<br/>';
                             $event_time = $row["event_time"];
                             $time_without_seconds = substr($event_time, 0, 5); // Extract the first 5 characters (HH:MM)
                             
                             echo '<h6 style="color:white;">' . $time_without_seconds . '</h6>';
                            echo '<div class="social">';
                           
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No events found";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </div>
            </div>
        </section>
        <br><br>
      

        </main>

        <footer class="site-footer">
            <div class="site-footer-top">
                <div class="container">
                    <div class="row">
    
                        <div class="col-lg-6 col-12">
                            <h2 class="text-white mb-lg-0"><Datag>GreenSparkTickets</Datag></h2>
                        </div>
    
                        <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                            <ul class="social-icon d-flex justify-content-lg-end">
                                <li class="social-icon-item">
                                    <a href="https://twitter.com/i/flow/login" class="social-icon-link">
                                        <span class="bi-twitter"></span>
                                    </a>
                                </li>
    
                                <li class="social-icon-item">
                                    <a href="https://www.instagram.com/accounts/login/?hl=en" class="social-icon-link">
                                        <span class="bi-instagram"></span>
                                    </a>
                                </li>
    
                                <li class="social-icon-item">
                                    <a href="https://www.youtube.com/account?hl=id" class="social-icon-link">
                                        <span class="bi-youtube"></span>
                                    </a>
                                </li>
    
                                <li class="social-icon-item">
                                    <a href="https://www.pinterest.com/login/" class="social-icon-link">
                                        <span class="bi-pinterest"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container">
                <div class="row">
    
                    <div class="col-lg-6 col-12 mb-4 pb-2">
                        <h5 class="site-footer-title mb-3">Links</h5>
    
                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="index.php" class="site-footer-link">Home</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="Gallery.php" class="site-footer-link">Gallery</a>
                            </li>
    
                            <li class="site-footer-link-item">
                                <a href="Schedule.php" class="site-footer-link">Schedule</a>
                            </li>
                            
                            <li class="site-footer-link-item">
                                <a href="Contact.php" class="site-footer-link">Contact</a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <h5 class="site-footer-title mb-3">Have a question?</h5>
    
                        <p class="text-white d-flex mb-1">
                            <a href="tel: 090-080-0760" class="site-footer-link">
                                +94-712345677              </a>
                        </p>
    
                        <p class="text-white d-flex">
                            <a href="mailto:hello@company.com" class="site-footer-link">
                                hello@GreenEventSpark.com
                            </a>
                        </p>
                    </div>
    
                    <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                        <h5 class="site-footer-title mb-3">Location</h5>
    
                        <p class="text-white d-flex mt-3 mb-2">
                            No: 23/1, Homagama, Colombo</p>
    
                        <a class="link-fx-1 color-contrast-higher mt-3" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4047240.6180159017!2d78.06259083309006!3d7.854880591977768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2593cf65a1e9d%3A0xe13da4b400e2d38c!2sSri%20Lanka!5e0!3m2!1sen!2slk!4v1707803914146!5m2!1sen!2slk">
                            <span>Our Maps</span>
                            <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="16" cy="16" r="15.5"></circle>
                                    <line x1="10" y1="18" x2="16" y2="12"></line>
                                    <line x1="16" y1="12" x2="22" y2="18"></line>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
    
            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">
    
                        <div class="col-lg-3 col-12 mt-5">
                            <p class="copyright-text">Copyright © 2024 GreenSparkTickets</p>
                            <p class="copyright-text">Distributed by: <a href="Group06">Group06</a></p>
                        </div>
    
                        <div class="col-lg-8 col-12 mt-lg-5">
                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="terms&condition.php" class="site-footer-link">Terms &amp; Conditions</a>
                                </li>
    
                                <li class="site-footer-link-item">
                                    <a href="privacypolicy.php" class="site-footer-link">Privacy Policy</a>
                                </li>
    
                                        <li class="site-footer-link-item">
                                            <a href="feedback.php" class="site-footer-link">Your Feedback</a>
                                        </li>
                                    
                                </nav>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
</html>
