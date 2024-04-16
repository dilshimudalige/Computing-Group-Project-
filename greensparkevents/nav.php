<header>
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

</header>
<nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    GreenSparkTickets
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
                            <li class="nav-item">
                                <a class="nav-link" href="Schedule.php">Schedule</a>
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
                            <li class="nav-item">
    <?php
    if(isset($_SESSION['user'])) {
        echo '<a href="logout.php" class="btn custom-btn d-none d-lg-inline-block">Log Out</a>';
    } else {
        echo '<a href="login.php" class="btn custom-btn d-none d-lg-inline-block">Join with us</a>';
    }
    ?>
</li>

                            
                        
                      
                       
                        
            </div>
        </nav>