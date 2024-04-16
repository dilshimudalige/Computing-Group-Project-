<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Image With Preview Image</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/style.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    <link rel="stylesheet" href="./assets/style.css">

    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .img-area {
            border: 2px dashed #ccc;
            padding: 20px;
            cursor: pointer;
            transition: 0.3s;
            margin-bottom: 20px;
        }

        .img-area:hover {
            border-color: #999;
        }

        .img-area i {
            font-size: 36px;
            color: #999;
        }

        .img-area h3 {
            font-size: 18px;
            margin-top: 10px;
            color: #555;
        }

        .img-area p {
            font-size: 14px;
            color: #888;
        }

        .btn-container {
            text-align: center;
        }

        .select-image,
        .submit-image {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .select-image:hover,
        .submit-image:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    // Configuration
    $uploadDir = 'uploads/'; // Directory where the images will be uploaded
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif'); // Allowed file types

    // Get the uploaded file information
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $uploadDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the file type is allowed
    if (in_array($fileType, $allowedTypes)) {
        // Upload file to the server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // File uploaded successfully, insert into database
            $imageURL = $fileName;

            // Connect to MySQL database (replace with your credentials)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "spark_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert image file name into database
            $sql = "INSERT INTO images_list (f_name) VALUES ('$imageURL')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                  });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    text: 'Sorry, there was an error uploading your file.',
                    showConfirmButton: false,
                    timer: 1500
                  });
                </script>";
            }

            // Close connection
            $conn->close();
        } else {
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                text: 'Sorry, there was an error uploading your file.',
                showConfirmButton: false,
                timer: 1500
              });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            text: 'Sorry, only JPG, JPEG, PNG, GIF files are allowed.',
            showConfirmButton: false,
            timer: 1500
          });
        </script>";
    }
}
?>

<?php include 'nav.php' ?>

<div class="container">
    <form method="post" enctype="multipart/form-data">
        <input type="file" id="file" name="file" accept="image/*" hidden>
        <div class="img-area" data-img="">
            <i class='bx bxs-cloud-upload icon'></i>
            <h3>Upload Image</h3>
            <p>Image size must be less than <span>2MB</span></p>
        </div>
        <div class="btn-container">
            <button class="select-image" type="button"><i class="fas fa-images"></i>Select Image</button>
            <br>
            <button class="submit-image" type="submit" id="img_upload"><i class="fas fa-upload"></i>Upload Image</button>
        </div>
    </form>
</div>




<script src="./assets/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
