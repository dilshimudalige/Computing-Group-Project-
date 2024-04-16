<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-c7+0AAz7/n8mcJSXWO4JMqevgiMiCm+3sZLoflFOJSpBoys+Xky8n4HPQCw1XGoa9mrINvIzI7PrfXGxvH3hiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        input[type="time"] {
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
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

    // Prepare data for insertion
    $event_name = $_POST["event_name"];
    $event_date = $_POST["event_date"];
    $event_category = $_POST["event"];
    $event_time = $_POST["event_time"];
    $event_venue = $_POST["event_venue"];
    $event_description = $_POST['event_desc'];

    // Upload image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["event_image"]["name"]);
    move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file);
    $event_image_url = $target_file;

    // Insert data into database
    $sql = "INSERT INTO events_list (event_name, event_date, event_category, event_time, event_venue, event_image_url,event_desc)
            VALUES ('$event_name', '$event_date', '$event_category', '$event_time', '$event_venue', '$event_image_url','$event_description')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
          });</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
  <?php include 'nav.php' ?>
    <div class="container">
        <h2>Create Event</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">

<div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
    <div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
        <label for="event_name" style="font-weight: bold;">
            <i class="fas fa-pencil-alt"></i> Event Name
        </label>
        <input type="text" id="event_name" name="event_name" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
    </div>
    <div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
        <label for="event_date" style="font-weight: bold;">
            <i class="far fa-calendar-alt"></i> Event Date
        </label>
        <input type="date" id="event_date" name="event_date" required style="padding: 10px; width: 90%; border-radius: 5px; border: 1px solid #ccc;">
    </div>
    <div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
        <label for="event_date" style="font-weight: bold;">
            <i class="far fa-calendar-alt"></i> Event Category
        </label>
        <select id="select_event" name="event" required style="padding: 10px; width: 90%; border-radius: 5px; border: 1px solid #ccc;">
  <option value="" selected >Select Event</option>
  <option value="Free to see"  >Free To See</option>
  <option value="Pay to play"  >Pay To Play</option>
  <!-- Add your options here -->
</select>
    </div>
    <div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
        <label for="event_time" style="font-weight: bold;">
            <i class="far fa-clock"></i> Event Time
        </label>
        <input type="time" id="event_time" name="event_time" required style="padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
    </div>
    <div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
        <label for="event_venue" style="font-weight: bold;">
            <i class="fas fa-map-marker-alt"></i> Event Venue
        </label>
        <input type="text" id="event_venue" name="event_venue" required style="margin-top:3px;padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
    </div>

    <div style="flex: 0 0 calc(50% - 10px); margin-bottom: 20px;">
        <label for="event_venue" style="font-weight: bold;">
            <i class="fas fa-map-marker-alt"></i> Event Description
        </label>
        <textarea   id="event_desc" name="event_desc" required style="margin-top:3px;padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc;"></textarea>
    </div>
</div>

<div style="display: flex; align-items: center; margin-bottom: 20px;">
    <label for="event_image" style="font-weight: bold;">
        <i class="far fa-image"></i> Event Image
    </label>
    <div style="flex: 1; margin-left: 10px;">
        <input type="file" id="event_image" name="event_image" accept="image/*" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
    </div>
</div>

<div style="text-align: center;">
    <img id="imagePreview" src="#" alt="Event Image Preview" style="max-width: 100%; border-radius: 10px; display: none;">
</div>

<input type="submit" value="Create Event" style="background-color: #4CAF50; color: white; padding: 15px 30px; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 0 auto;">
</form>

<script>
document.getElementById('event_image').addEventListener('change', function() {
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('imagePreview').src = e.target.result;
        document.getElementById('imagePreview').style.display = 'block';
    }
    reader.readAsDataURL(this.files[0]);
});
</script>



    </div>
    

    <script>
    // Function to preview the image before uploading
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]); // Convert to base64 string
        }
    }

    // Trigger image preview when a file is selected
    document.getElementById('event_image').addEventListener('change', function() {
        previewImage(this);
    });
</script>


</body>
<!-- Sweet Alert CDN -->

</html>
