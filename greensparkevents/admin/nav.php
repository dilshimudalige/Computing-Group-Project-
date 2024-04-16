<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Navigation</title>
    <!-- Font Awesome CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <nav style="background-color: #f4f4f4; padding: 20px; text-align: center;">
        <a href="create_event.php"><i class="fas fa-plus-circle"></i> Create Event</a>
        <a href="update_event.php"><i class="fas fa-edit"></i> Update Event</a>
        <a href="gallery.php"><i class="fas fa-edit"></i>Gallery</a>
        <a href="view_event.php"><i class="fas fa-eye"></i> View Details</a>
        <a href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <a href="index.php"><i class="fas fa-home"></i> Home Page</a>
    </nav>

    <style>
        nav a {
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            border: 1px solid transparent;
            border-radius: 5px;
            background-color: #fff;
            position: relative;
            overflow: hidden;
            display: inline-block;
            transition: color 0.3s, border-color 0.3s;
        }

        nav a:hover {
            color: #32CD32;
            border-color: #32CD32;
        }

        nav a::before,
        nav a::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background-color: #333;
            z-index: -1;
            transition: all 0.4s ease;
            border-radius: 50%;
        }

        nav a::before {
            transform: translate(-50%, -50%);
        }

        nav a::after {
            transform: translate(-50%, -50%);
            opacity: 0;
        }

        nav a:hover::before {
            width: 200%;
            height: 200%;
        }

        nav a:hover::after {
            width: 300%;
            height: 300%;
            opacity: 1;
        }

        nav a i {
            margin-right: 5px;
            transition: all 0.3s ease;
        }

        nav a:hover i {
            transform: rotate(360deg);
        }
    </style>
    
    <script>
      
    function logout() {
        // Display confirmation dialog using SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#228B22',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms logout, redirect to logout.php
                window.location.href = "logout.php";
            }
        });
    }
</script>

    </script>
</body>
</html>
