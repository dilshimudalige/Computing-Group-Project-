<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start(); // Start session once at the top

// Backend PHP code for handling login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
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

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve hashed password from the database based on email
    $sql = "SELECT id,email, pwd FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['pwd'];

        // Verify the entered password with the hashed password from the database
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user'] = $email;
            $_SESSION ['userid'] = $row['id'];
            // Redirect after setting session
            header("Location: index.php");
            exit; // Always exit after redirect
        } else {
            // Invalid credentials
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid Login Details!',
                });
            </script>";
        }
    } else {
        // User not found
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'User not found!',
            });
        </script>";
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Include SweetAlerts library -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php include 'nav.php'; ?>
<body class="bg-gray-100">

  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-lg w-96">
       <h2 class="text-2xl text-center text-gray-800 font-semibold mb-6">GreenSparkEvents</h2>
      <h2 class="text-xl text-center text-gray-800 font-semibold mb-6">Login</h2>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
          <div class="relative">
            <span class="absolute left-3 top-2 text-gray-400"><i class="far fa-envelope"></i></span>
            <input type="email" id="email" name="email" placeholder="example@gmail.com" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
          </div>
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-3 top-2 text-gray-400"><i class="fas fa-lock"></i></span>
            <input type="password" id="password" name="password" placeholder="Password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
          </div>
        </div>
        <button type="submit" name="login" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Login</button>
      </form>
      <div class="mt-6 text-center">
       
      </div>
      <div class="mt-4 text-center">
        <p class="text-gray-600">Not a member? <a href="signup.php" class="text-blue-500 hover:underline">Sign Up</a></p>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>

</body>
</html>
