<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up Form</title>
<link rel="stylesheet" href="css/signup.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>



<div class="container">
  <h2>Sign Up</h2>
  <select id="roleSelect">
    <option value="student">Student</option>
    <option value="alumni">Alumni</option>
  </select>

  <form id="studentForm" style="display: none;" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="hidden" name="role" value="student">
    <input type="text" placeholder="Full Name" name="full_name" required><br>
    <select name="faculty" required>
      <option value="" disabled selected>Select your faculty</option>
      <option value="faculty of computing">faculty of computing</option>
      <option value="faculty2">Faculty of business</option>
      <option value="faculty of engineering">faculty of engineering</option>
      <option value="faculty of science">faculty of science</option>
    </select><br>
    <input type="text" placeholder="Batch" name="batch" required><br>
    <input type="email" placeholder="Email" name="email" required><br>
    <input type="password" placeholder="Create Password" name="password" required><br>
    <input type="password" placeholder="Confirm Password" name="confirm_password" required><br>
    <button type="submit">Sign Up</button>
  </form>

  <form id="alumniForm" style="display: none;" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="hidden" name="role" value="alumni">
    <input type="text" placeholder="Full Name" name="full_name" required><br>
    <input type="text" placeholder="Alumni ID" name="alumni_id" required><br>
    <select name="faculty" required>
      <option value="" disabled selected>Select your faculty</option>
      <option value="faculty of computing">faculty of computing</option>
      <option value="faculty of business">faculty of business</option>
      <option value="faculty of engineering">faculty of engineering</option>
      <option value="faculty of science">faculty of science</option>
    </select><br>
    <input type="text" placeholder="Batch" name="batch" required><br>
    <input type="email" placeholder="Email" name="email" required><br>
    <input type="password" placeholder="Create Password" name="password" required><br>
    <input type="password" placeholder="Confirm Password" name="confirm_password" required><br>
    <button type="submit" name="btn_register" id="btn_register">Sign Up</button>
  </form>
</div>

<script>
  // Display student form by default
  document.getElementById('studentForm').style.display = 'block';
  document.getElementById('alumniForm').style.display = 'none';

  // Event listener for role select
  document.getElementById('roleSelect').addEventListener('change', function() {
    var role = this.value;
    if (role === 'student') {
      document.getElementById('studentForm').style.display = 'block';
      document.getElementById('alumniForm').style.display = 'none';
    } else if (role === 'alumni') {
      document.getElementById('studentForm').style.display = 'none';
      document.getElementById('alumniForm').style.display = 'block';
    }
  });
</script>

<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "spark_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitize($input) {
    global $conn;
    return mysqli_real_escape_string($conn, $input);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather user data from the form
    $role = sanitize($_POST['role']);
    $fullName = sanitize($_POST['full_name']);
    $faculty = sanitize($_POST['faculty']);
    $batch = sanitize($_POST['batch']);
    $email = sanitize($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

    // Insert user data into the database
    $sql = "INSERT INTO users (role, full_name, faculty, batch, email, pwd) 
            VALUES ('$role', '$fullName', '$faculty', '$batch', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
?>
<script>
        Swal.fire({
            icon: 'success',
            title: 'Registration successful!',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location = 'login.php'; 
        });
    </script>
<?php
    } else {
        echo "<script>
        Swal.fire({
            icon: 'Error',
            title: 'Registration unsuccessful!',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location = 'index.php'; 
        });
    </script>";
    }
}

// Close database connection
$conn->close();
?>
</body>
</html>
