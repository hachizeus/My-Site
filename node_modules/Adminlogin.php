<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Add Font Awesome -->
    <title>Document</title>
</head>

<body>

    <div class="card ">
        <div class="card-body">
            <h1 style="color: #fff;">ADMIN LOGIN</h1>
            <input type="text" autocomplete="off" name="text" class="input" placeholder="Username">
            <br> <!-- Add line break -->
            <div class="password-container">
                <input type="password" autocomplete="off" name="Password" class="input" placeholder="Password">
                <span class="password-toggle"><i class="far fa-eye" id="togglePassword"></i></span>
            </div>
            <br> <!-- Add line break -->
            <a href=""> <button id="submitBtn" sty>LOGIN</button></a>
            <p style="color: #fff;"><a href="Login.php">Back</a></p>
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

    .card {
        justify-content: center;
        align-items: center;
        display: flex;
        background-image: url(taa.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        width: 1500px;
        height: 750px;
        border-radius: 94px;
        margin-top: 70px;
        margin-left: -50px;
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

    button {
        text-decoration: none;
        position: relative;
        border: none;
        font-size: 14px;
        font-family: inherit;
        cursor: pointer;
        color: #fff;
        width: 9em;
        height: 3em;
        line-height: 2em;
        text-align: center;
        background: linear-gradient(90deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
        background-size: 300%;
        border-radius: 30px;
        z-index: 1;
        margin-left: -100px;
        margin-top: 20px;
    }

    button:hover {
        animation: ani 8s linear infinite;
        border: none;
    }

    @keyframes ani {
        0% {
            background-position: 0%;
        }

        100% {
            background-position: 400%;
        }
    }

    button:before {
        content: "";
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        z-index: -1;
        background: linear-gradient(90deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
        background-size: 400%;
        border-radius: 35px;
        transition: 1s;
    }

    button:hover::before {
        filter: blur(20px);
    }

    button:active {
        background: linear-gradient(32deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
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
</style>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.querySelector('input[name="Password"]');
    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordInput = document.querySelector('input[name="ConfirmPassword"]');
    toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>

</html>
