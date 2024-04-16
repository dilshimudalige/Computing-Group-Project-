<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenSparkEvents</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/greensparkevents.css" rel="stylesheet">
    <link href="css/ourgallery.css" rel="stylesheet">
    <link href="css/ourgallery2.css" rel="stylesheet">
    <style>
        /* Additional CSS for table styling */
        .schedule-table {
            width: 100%;
        }
        .schedule-table th,
        .schedule-table td {
            text-align: center;
            padding: 10px;
        }
        .table-heading {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            background-color: #333;
        }
        .table-category {
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            background-color: #555;
        }
        .table-background-image-wrap {
            position: relative;
            width: 100%;
            height: 200px; /* Adjust height as needed */
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }
        .table-background-image-wrap h3,
        .table-background-image-wrap p {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: #fff;
            margin: 0;
            padding: 5px 10px;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .section-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <main>
        <?php include 'nav.php' ?>
        <section class="schedule-section section-padding" id="section_4">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Event Schedule</h2>
                        <div class="table-responsive">
                            <table class="schedule-table table table-dark">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="table-heading">Events</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-category">Free Events</td>
                                        <td class="table-category">Paid Events</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            // Fetch Free Events
                                            // Connect to MySQL database
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $database = "spark_db";

                                            $conn = new mysqli($servername, $username, $password, $database);

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT * FROM events_list WHERE event_category = 'Free To See'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<div class="table-background-image-wrap" style="background-image: url(\'./admin/' . $row["event_image_url"] . '\' ); ">';
                                                    echo '<h3>' . $row["event_name"] . '</h3>';
                                                    echo '<p class="mb-2">' . $row["event_date"] . '</p>';
                                                    echo '<p>' . $row["event_time"] . '</p>';
                                                    echo '<div class="section-overlay"></div>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo "No free events found.";
                                            }

                                            $conn->close();
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            // Fetch Paid Events
                                            // Connect to MySQL database
                                            $conn = new mysqli($servername, $username, $password, $database);

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            $sql = "SELECT * FROM events_list WHERE event_category = 'Pay to play'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<div class="table-background-image-wrap" style="background-image: url(\'./admin/' . $row["event_image_url"] . '\' ); ">';
                                                    echo '<h3>' . $row["event_name"] . '</h3>';
                                                    echo '<p class="mb-2">' . $row["event_date"] . '</p>';
                                                    echo '<p>' . $row["event_time"] . '</p>';
                                                    echo '<div class="section-overlay"></div>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo "No paid events found.";
                                            }

                                            $conn->close();
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
        <?php include 'footer.php'; ?>
        </footer>
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

</html>
