<?php

include("include/connection.php");
if (isset($_POST['submit'])) {

    $firstname = $_POST['fname'];
    $secondname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if (empty($firstname)) {
        $error['submit'] = "First name is required";
    } else if (empty($secondname)) {
        $error['submit'] = "Second name is required";
    } else if (empty($username)) {
        $error['submit'] = "Username is required";
    } else if (empty($email)) {
        $error['submit'] = "Email is required";
    } else if (empty($password)) {
        $error['submit'] = "Password is required";
    } else if (empty($confirm_password)) {
        $error['submit'] = "Confirm password is required";
    } else if ($password !== $confirm_password) { // Check if passwords match
        $error['submit'] = "Passwords do not match";
    }

    if (count($error) == 0) {

        $query ="INSERT INTO clients(Firstname,Secondname,Username,Email,Password,data_reg,status,profile) 
        VALUES('$firstname','$secondname','$username','$email','$password',NOW(),'Pending','short.png')";

        $result = mysqli_query($connect,$query);

        if ($result) {

            header("Location: Login.php");
            exit;
            echo "<script>alert('You have succesfuly created an Account')</script>";
        } else {
            echo "<script>alert('Failed')</script>";
        }
    }

}

if (isset($error['submit'])) {
    $s = $error['submit'];
    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";

} else {
    $show = ""; // Make sure to assign an empty value if there are no errors
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Add Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> <!-- Add Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>
     
<!-- Navigation Bar -->
<div class="navbar">
      <a  href="#home">Home</a>
      <a href="Products.html">Products</a>
      <a href="Contact.html">Contact</a>
      <a href="About.html">About Us</a>
      <a href="About.html">Services</a>
      <i class="fa fas fa-shopping-cart" style="margin-right: auto;"></i> <!-- Move cart icon to the right -->
      <a href="Login.php" class="logout">Logout</a> <!-- Added logout button -->
    </div>
    
  
    <Text style="font-size: 90px;margin-left: -250px;margin-top: -390px;color: wheat;">Elit Tech Clothings</Text>

    <div class="card ">
        <div class="card-body">
            <h1 style="color: #fff;">CREATE ACCOUNT</h1>
            <div>
                <?php echo $show; ?>
            </div>
            <form method="post" action=""> <!-- Added form tag and action attribute -->
                <div class="form-group">
                    <input type="text" autocomplete="off" required name="fname" class="input form-control" placeholder="Enter Firstname"
                    value="<?php if(isset($_POST[ 'fname'])) echo $_POST['fname'];?>">
                </div>
                <br> <!-- Add line break -->
                <div class="form-group">
                    <input type="text" autocomplete="off" required name="sname" class="input form-control" placeholder="Enter Secondname"
                    value="<?php if(isset($_POST[ 'sname'])) echo $_POST['sname'];?>">
                </div>
                <br> <!-- Add line break -->
                <div class="form-group">
                    <input type="text" autocomplete="off" required name="uname" class="input form-control" placeholder="Enter Username"
                    value="<?php if(isset($_POST[ 'uname'])) echo $_POST['uname'];?>">
                </div>
                <br> <!-- Add line break -->
                <div class="form-group">
                    <input type="text" autocomplete="off" required name="email" class="input form-control" placeholder="Enter Email"
                    value="<?php if(isset($_POST[ 'email'])) echo $_POST['email'];?>">
                </div>
                <br> <!-- Add line break -->
                <div class="password-container form-group">
                    <input type="password" autocomplete="off" required name="pass" class="input form-control" placeholder="Enter Password"
                     pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                    value="<?php if(isset($_POST[ 'pass'])) echo $_POST['pass']; ?>">
                    <span class="password-toggle"><i data-feather="eye" id="togglePassword"></i></span>
                </div>
                <br> <!-- Add line break -->
                <div class="password-container form-group">
                    <input type="password" autocomplete="off" required name="con_pass" class="input form-control" placeholder="Confirm Password"
                    value="<?php if(isset($_POST[ 'con_pass'])) echo $_POST['con_pass'];?>">
                    <span class="password-toggle"><i style="color: red;" data-feather="eye-off" id="toggleConfirmPassword"></i></span>
                </div>
                <br> <!-- Add line break -->
                <input type="submit" name="submit" class="btn btn-success" style="padding: 9px;background-color:blue; border-radius: 10px; color:white;" value="SUBMIT">
            </form> <!-- Added form tag -->
            <P style="color: #fff;" >Already have an Account <a href="Login.php">Login</a></P>
        </div>
    </div>


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
    justify-content: right; /* Align items to the start and end of the navbar */
    align-items: right;
    width: 100%; /* Ensure the navbar spans the entire width */
    overflow: hidden;
    background-color:transparent;
    position: fixed;
    margin-top: -790px;
    margin-left: 2480px;
    padding: 0 20px; /* Add padding to separate items */
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
     @media only screen and (max-width:768px) {
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
            font-size: 10px;
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
            height: 550px;
            border-radius: 20px;
            margin-top: 100px;
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
            padding: 3px;
            background-color: #ccc;
            box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
            transition: 300ms ease-in-out;
            width: 200px;
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
    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        feather.replace(); // Refresh Feather Icons
    });

    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordInput = document.querySelector('input[name="con_pass"]');
    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        feather.replace(); // Refresh Feather Icons
    });
</script>

</html>
