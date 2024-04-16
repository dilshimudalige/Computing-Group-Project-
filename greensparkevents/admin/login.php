<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-v0v8Nb+xmRlB7vGi98A8CWlEZ/QjODbpW22r3t5rGsbIjR7qG8HraCgPMwR/0NyO5Ei0t63t74M3t+T53/N0Wg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin | Login</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <div class="container d-flex justify-content-center align-items-center min-vh-100">


       <div class="row border rounded-5 p-3 bg-white shadow box-area">


    <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background-image: url('https://i.ibb.co/R6hHw2R/IMG-20240321-WA0007.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
           <div class="featured-image mb-3">
           </div>
       </div> 

        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Hello,Again</h2>
                     <p>We are happy to have you back.</p>
                </div>
                <form action="login.php" method="POST">
    <div class="input-group mb-3">
        <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" required>
    </div>
    <div class="input-group mb-1">
        <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
    </div>
    <div class="input-group mb-5 d-flex justify-content-between">
       
    </div>
    <div class="input-group mb-3">
        <button type="submit" name="sub" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
    </div>
    <div class="input-group mb-3 ">
        <a href="../index.php" cl class="text-decoration-none fs-6 text-center">Home Page</a>

</div>

</form>

          </div>
       </div> 

      </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

body{
    font-family: 'Poppins', sans-serif;
    background: #ececec;
}


.box-area{
    width: 930px;
}


.right-box{
    padding: 40px 30px 40px 40px;
}


::placeholder{
    font-size: 16px;
}

.rounded-4{
    border-radius: 20px;
}
.rounded-5{
    border-radius: 30px;
}



@media only screen and (max-width: 768px){

     .box-area{
        margin: 0 10px;

     }
     .left-box{
        height: 100px;
        overflow: hidden;
     }
     .right-box{
        padding: 20px;
     }

}
    </style>

</body>
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


$conn = mysqli_connect("localhost", "root", "", "spark_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['sub'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Admin_List WHERE username='$username' AND pwd='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit;
    } else {
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Invalid username or password!",
          });</script>';
    }
}
mysqli_close($conn);
?>

</html>