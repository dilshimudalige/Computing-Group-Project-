<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

// Check if user is logged in
if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Green Spark Events</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/greensparkevents.css" rel="stylesheet">

    <link href="css/ourgallery.css" rel="stylesheet">

    <link href="css/ourgallery2.css" rel="stylesheet">

    <link href="css/events.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .table-background-image-wrap {
        position: relative;
        overflow: hidden;
    }

    .table-background-image-wrap h3,
    .table-background-image-wrap p {
        position: relative;
        z-index: 1;
    }

    .section-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Adjust opacity as needed */
        transition: opacity 0.3s ease;
        opacity: 0;
    }

    .table-background-image-wrap:hover .section-overlay {
        opacity: 1;
    }

    /* Animation for hover effect */
    .section-overlay {
        transition: opacity 0.3s ease;
    }

    .table-background-image-wrap:hover .section-overlay {
        opacity: 0.7; /* Adjust opacity as needed */
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .table-background-image-wrap {
            height: 200px; /* Adjust height for smaller screens */
        }
    }
    .img {
  position:relative;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}
</style>
    <main>
        

      <?php include 'nav.php'; ?>

     
        <section class="hero-section" id="section_1">
            <div class="section-overlay">

            </div>

            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">

                    <div class="col-12 mt-auto mb-5 text-center">
                        <small>Nsbm Events Presents</small>

                        <h1 class="text-white mb-5">GreenSparkTickets</h1>


                        <a class="btn custom-btn smoothscroll" href="https://youtu.be/M7B-6xfVkM4?si=Lh-2mLA2DLmiGhkw" target="_blank">
                            Watch Trailer
                        </a>
                    </div>


                    <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                        <div class="date-wrap">
                            <h5 class="text-white">
                                <i class="custom-icon bi-clock me-2"></i>
                               
                            </h5>
                        </div>

                        <div class="location-wrap mx-auto py-3 py-lg-0">
                            <h5 class="text-white">
                                <i class="custom-icon bi-geo-alt me-2"></i>
                              
                            </h5>
                        </div>

                    <div class="social-share">
                            <ul class="social-icon d-flex align-items-center justify-content-center">
                                <span class="text-white me-3">Share :</span>

                                <ul class="social-icon-list">
                                    <li class="social-icon-item">
                                        <a href="https://www.facebook.com/yourusername" class="social-icon-link" onclick="shareOnFacebook(); return false;">
                                            <span class="bi-facebook"></span>
                                        </a>
                                    </li>
                                </ul>
                                

                                 <ul class="social-icon-list">
                                    <li class="social-icon-item">
                                        <a href="https://twitter.com/yourusername/" class="social-icon-link" onclick="shareOnTwitter(); return false;">
                                            <span class="bi-twitter"></span>
                                        </a>
                                    </li>
                                </ul>
                                
                                    
                                    <ul class="social-icon-list">
                                        <li class="social-icon-item">
                                            <a href="https://www.instagram.com/yourusername" class="social-icon-link" target="_blank" onclick="reloadInstagram(); return false;">
                                                <span class="bi-instagram"></span>
                                            </a>
                                        </li>
                                    </ul>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="video-wrap">
        
            <div id="carouselExampleIndicators" class="custom-video" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img class="img" src="https://z-p3-scontent.fcmb7-1.fna.fbcdn.net/v/t39.30808-6/427705071_1101728801216143_9187064481196544147_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGG1UwmJRGqrHrkuFi2BborDCdkwS0gBEcMJ2TBLSAER69p6ApJN4ei9BCntOzm-7jMKwbIsoIhfhN3oeo7glfT&_nc_ohc=RYt0j3Vko1kAX8qI851&_nc_zt=23&_nc_ht=z-p3-scontent.fcmb7-1.fna&oh=00_AfDrtMXtsXexeClyIr82lEapjA9p0Ogn5cCLzb9lXrhDLg&oe=6601674D" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.nsbm.ac.lk/wp-content/uploads/2022/news/prana/320218350_1225052371426535_6893296864452338795_n.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://z-p3-scontent.fcmb7-1.fna.fbcdn.net/v/t39.30808-6/401717898_893596452126060_7049581720084713279_n.jpg?stp=dst-jpg_p843x403&_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGv1KeKy_htWaPUcCKXdHop55n5rh4wLunnmfmuHjAu6ZqkjphTUN1kg6s4t6sCMn9u7lvmNpybEZhZo3KQR_y7&_nc_ohc=1-J4OT0dM_QAX-SgD0e&_nc_zt=23&_nc_ht=z-p3-scontent.fcmb7-1.fna&oh=00_AfCjAZF6NABwYVso6c2xuNWfXA58Gx13MRhMAxwjenedSA&oe=66002584" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

            </div>
        </section>




        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h2 class="text-white mb-4">About GreenSparkTickets</h2>

                            <p class="text-white">"Green Spark Events" is a student-focused event ticketing website 
                                designed to cater to university communities. Our platform provides an efficient and 
                                convenient way for students to discover, purchase, and attend various events hosted 
                                by their university or nearby campuses. From academic seminars to social gatherings, 
                                we aim to ignite the spirit of engagement and create a vibrant event culture, all 
                                while prioritizing sustainability and environmental consciousness. Join us at Green 
                                Spark Events and let's illuminate your university experience together.</p>

                            <h6 class="text-white mt-4">"Unforgettable Adventure"</h6>

                            <p class="text-white">Please spread the word about Green Spark Events.</p>

                            <h6 class="text-white mt-4">"All-Night Extravaganza"</h6>

                            <p class="text-white">Let your friends know about our website. Thank you.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="images/music-7238254_640.jpg" class="about-image img-fluid">

                            <div class="about-text-info d-flex">
                                <div class="d-flex">
                                    <i class="about-text-icon bi-person" onclick="redirectToLoginPage()"></i>
                                </div>


                                <div class="ms-4">
                                    <h3>login with happy moment</h3>

                                    <p class="mb-0">your amazing festival experience with us</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>




        <h1><a href="Gallery.php">Our Gallery</a></h1>

        <article class="gallery">
        <?php
        
       
       
        

        
// Connect to your database (replace placeholders with actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spark_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve image URLs from the database
$sql = "SELECT f_name FROM images_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<img src='admin/uploads/". $row["f_name"] ."' alt='Image'>";
    }
} else {
    echo "No images found";
}

$conn->close();
?>

        </article>
        <br>
        <br>

        


        <section class="schedule-section section-padding" id="section_4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-white mb-4">Event Schedule</h2>
                <div class="table-responsive">
                    <table class="schedule-table table table-dark"  style="width:430px; margin-left:320px;">
                        <thead>
                            <tr>
                                <th scope="col">Free Events</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
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

    // Step 2: Query the database to retrieve all free events
    $sql = "SELECT * FROM events_list WHERE event_category = 'Free To See'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display events in the table
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>';
            echo '<div class="table-background-image-wrap" style="background-image: url(\'./admin/' . $row["event_image_url"] . '\' ); ">';
            echo '<h3>' . $row["event_name"] . '</h3>';
            echo '<p class="mb-2">' . $row["event_date"] . '</p>';
            echo '<p>' . $row["event_time"] . '</p>';
            echo '<div class="section-overlay"></div>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo "No free events found.";
    }

    // Close connection
    $conn->close();
    ?>
</tbody>

</table>

                            </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-center mb-4">Interested? Let's talk</h2>

                        <nav class="d-flex justify-content-center">
                            <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                                role="tablist">
                                <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactForm" type="button" role="tab"
                                    aria-controls="nav-ContactForm" aria-selected="false">
                                    <h5>Contact Form</h5>
                                </button>

                                <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactMap" type="button" role="tab"
                                    aria-controls="nav-ContactMap" aria-selected="false">
                                    <h5>Google Maps</h5>
                                </button>
                            </div>
                        </nav>

                        <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                                aria-labelledby="nav-ContactForm-tab">
                                <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post"
                                    role="form">
                                    <div class="contact-form-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="text" name="contact-name" id="contact-name"
                                                    class="form-control" placeholder="Full name" required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <input type="email" name="contact-email" id="contact-email"
                                                    pattern="[^ @]*@[^ @]*" class="form-control"
                                                    placeholder="Email address" required>
                                            </div>
                                        </div>

                                        <input type="text" name="contact-company" id="contact-company"
                                            class="form-control" placeholder="Company" required>

                                        <textarea name="contact-message" rows="3" class="form-control"
                                            id="contact-message" placeholder="Message"></textarea>

                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "spark_db"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO contact_messages (full_name, email, company, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $company, $message);

    // Set parameters and execute
    $full_name = $_POST["contact-name"];
    $email = $_POST["contact-email"];
    $company = $_POST["contact-company"];
    $message = $_POST["contact-message"];

    if ($stmt->execute() === TRUE) {
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: "Your message has been sent successfully."
                });
              </script>';
    } else {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Sorry, there was an error while sending your message. Please try again later."
                });
              </script>';
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>


                            <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                                aria-labelledby="nav-ContactMap-tab">
                                <iframe class="google-map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.575796315306!2d80.03899797404786!3d6.821334419632579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2523b05555555%3A0x546c34cd99f6f488!2sNSBM%20Green%20University!5e0!3m2!1sen!2slk!4v1710846964417!5m2!1sen!2slk"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

  
   


<?php include 'footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
  const slides = document.querySelector(".slides");
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");

  let slideIndex = 0;

  function showSlides() {
    const slideWidth = slides.firstElementChild.clientWidth;
    slides.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
  }

  function prevSlide() {
    if (slideIndex === 0) {
      slideIndex = slides.childElementCount - 1;
    } else {
      slideIndex--;
    }
    showSlides();
  }

  function nextSlide() {
    if (slideIndex === slides.childElementCount - 1) {
      slideIndex = 0;
    } else {
      slideIndex++;
    }
    showSlides();
  }

  prevBtn.addEventListener("click", prevSlide);
  nextBtn.addEventListener("click", nextSlide);

  showSlides();
});

</script>

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