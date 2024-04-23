<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Add Font Awesome -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <style>
        /* Your CSS styles */
    </style>
</head>

<body>
    <?php
    session_start(); // Start session to use session variables
    include("include/connection.php");

    $error = ""; // Initialize error variable

    if (isset($_POST['submit'])) {
        $uname = $_POST['uname'];
        $password = $_POST['pass'];

        if (empty($uname) || empty($password)) {
            $error = "Both username and password are required";
        } else {
            // Prepare and execute query (Note: Use prepared statements to prevent SQL injection)
            $query = "SELECT * FROM clients WHERE username='$uname' AND password='$password'";
            $res = mysqli_query($connect, $query);

            if ($res && mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_array($res);
                if ($row['status'] == "Pending") {
                    header("Location: home.html");
                    exit; // Make sure to exit after redirection to prevent further execution
                }
                // Authentication successful, set session variable
                $_SESSION['clients'] = $uname;
                echo "<script>alert('done')</script>";
            } else {
                // Invalid credentials
                $error = "Invalid Account";
            }
        }
    }
    ?>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="#home">Home</a>
        <a href="Products.html">Products</a>
        <a href="Contact.html">Contact</a>
        <a href="About.html">About Us</a>
        <a href="About.html">Services</a>
        <i class="fa fas fa-shopping-cart" style="margin-right: auto;"></i> <!-- Move cart icon to the right -->
        <a href="Login.php" class="logout">Logout</a> <!-- Added logout button -->
    </div>

    <Text class="text" style="font-size: 90px;margin-left: -250px;margin-top: -390px;color: wheat;">Elit Tech
        Clothings</Text>

    <div class="card">
        <div class="card-body">
            <h1 style="color: #fff;">Login</h1>
            <?php if (!empty($error)): ?>
                <h5 class="text-center text-danger alert alert-danger"><?php echo $error; ?></h5>
            <?php endif; ?>
            <form method="post" action=""> <!-- Added form tag and action attribute -->
                <div class="form-group">
                    <input type="text" autocomplete="off" required name="uname" class="input form-control"
                        placeholder="Enter Username">
                </div>
                <br> <!-- Add line break -->
                <div class="password-container form-group">
                    <input type="password" autocomplete="off" required name="pass" class="input form-control"
                        placeholder="Enter Password">
                    <span class="password-toggle"><i class="far fa-eye" id="togglePassword"></i></span>
                </div>
                <br> <!-- Add line break -->
                <input type="submit" name="submit" class="btn btn-success "
                    style="padding: 9px;background-color:blue; border-radius: 10px; color:white;" value="SUBMIT">
            </form> <!-- Added form tag -->
            <p style="color: #fff;">Forgotten password? <a href="forgotpassword.php">Reset</a></p>
            <p style="color: #fff;">Create an Account <a href="create.php">Create</a></p>
            <a href="Adminlogin.php">Admin</a>
        </div>
    </div>

    <!-- Your JavaScript code -->

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.querySelector('input[name="pass"]');
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

<style>
    body {
        background-image: url(black.jpg);
        justify-content: center;
        align-items: center;
        display: flex;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .row {
        clear: both;
        display: flex;
        margin-left: 60px;
        margin-top: -120px;
    }

    body {
        background-color: blanchedalmond;
    }

    /* Styles for the navigation bar */
    .navbar {
        display: flex;
        justify-content: right;
        /* Align items to the start and end of the navbar */
        align-items: right;
        width: 100%;
        /* Ensure the navbar spans the entire width */
        overflow: hidden;
        background-color: transparent;
        position: fixed;
        margin-top: -790px;
        margin-left: 2480px;
        padding: 0 20px;
        /* Add padding to separate items */
    }

    .navbar a {
        color: white;
        text-decoration: none;
        padding: 14px 20px;
        margin: 20px;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    .navbar a.active {
        background-color: #4CAF50;
        color: white;
    }

    .card {
        justify-content: center;
        align-items: center;
        display: flex;
        background-image: url(taa.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        width: 600px;
        height: 750px;
        border-radius: 94px;
        margin-top: 70px;
        margin-left: -1650px;
        box-shadow: 0px 0px 22px white, -31px -31px 62px black;
    }

    .card-body {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-left: auto;
        margin-right: auto;
    }

    .input {
        border: none;
        outline: none;
        border-radius: 15px;
        padding: 1em;
        background-color: #ccc;
        box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
        transition: 300ms ease-in-out;
        width: 400px;
        margin-bottom: 10px;
    }

    .input:focus {
        background-color: white;
        transform: scale(1.05);
        box-shadow: 13px 13px 100px #969696, -13px -13px 100px #ffffff;
    }

    .password-container {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    /* @media query for screen widths up to 700px */
    @media only screen and (max-width: 768px) {
        body {
            background-image: url(black.jpg);
            justify-content: center;
            align-items: center;
            display: flex;
            width: 100%;
            background-size: auto;
            background-repeat: no-repeat;
            position: fixed;
        }

        .h1 {
            font-size: 10;
        }

        p {
            font-size: 10px;
        }

        .text {
            font: none;
        }

        .row {
            clear: both;
            display: flex;
            margin-left: 60px;
            margin-top: -120px;
        }

        body {
            background-color: blanchedalmond;
        }

        /* Styles for the navigation bar */
        .navbar {
            display: flex;
            justify-content: left;
            /* Align items to the start and end of the navbar */
            align-items: left;
            width: 100%;
            /* Ensure the navbar spans the entire width */
            overflow: hidden;
            background-color: transparent;
            position: fixed;
            padding: 0 20px;
            /* Add padding to separate items */
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            margin: 20px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }

        .card {
            justify-content: center;
            align-items: center;
            display: flex;
            background-image: url(taa.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            width: 250px;
            height: 350px;
            border-radius: 20px;
            margin-top: 170px;
            margin-left: -467px;
            box-shadow: 0px 0px 22px white, -31px -31px 62px black;
        }

        .card-body {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
        }

        .input {
            border: none;
            outline: none;
            border-radius: 15px;
            padding: 5px;
            background-color: #ccc;
            box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
            transition: 300ms ease-in-out;
            width: 150px;
            margin-bottom: 10px;
        }

        .input:focus {
            background-color: white;
            transform: scale(1.05);
            box-shadow: 13px 13px 100px #969696, -13px -13px 100px #ffffff;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .container {
            margin-top: 0px;
        }
    }
</style>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.querySelector('input[name="pass"]');
    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
</html>
