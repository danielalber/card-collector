<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../js/navigation.js"></script>
    <script src="https://kit.fontawesome.com/abc9d1c3d1.js" crossorigin="anonymous"></script>
    <title>Sign Up</title>
</head>
<style>
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 360px;
        padding: 20px;
    }
</style>
<script>
    $(document).on('click', '#btn_register', function(e) {
        console.log("hello");
        e.preventDefault();

        var username = $('#txt_username').val();
        var email = $('#txt_email').val();
        var password = $('#txt_password').val();

        var atpos = email.indexOf('@');
        var dotpos = email.lastIndexOf('.com');

        if (username == '') { // check username not empty
            alert('please enter username !!');
        } else if (!/^[a-z A-Z]+$/.test(username)) { // check username allowed capital and small letters 
            alert('username only capital and small letters are allowed !!');
        } else if (email == '') { //check email not empty
            alert('please enter email address !!');
        } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) { //check valid email format
            alert('please enter valid email address !!');
        } else if (password == '') { //check password not empty
            alert('please enter password !!');
        } else if (password.length < 6) { //check password value length six 
            alert('password must be 6 !!');
        } else {
            $.ajax({
                url: '/api/process.php',
                type: 'post',
                data: {
                    newusername: username,
                    newemail: email,
                    newpassword: password
                },
                success: function(response) {
                    $('#message').html(response);
                }
            });

            $('#registraion_form')[0].reset();
        }
    });
</script>


<!-- NAVBAR-->
<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="#" class="navbar-brand">
            <!-- Logo Image -->
            <img src="../../assets/logo.PNG" width="45" alt="" class="d-inline-block align-middle mr-2">
            <!-- Logo Text -->
            <span onclick="GoActualite()" class="text-uppercase font-weight-bold">Card-Collector</span>
        </a>

        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a onclick="GoActualite()" class="nav-link">Actualités <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a onclick="GoCollection()" class="nav-link">Collection</a></li>
                <div class="btn-group">
                    <button type="button" class="btn btn-login nav-link">Mon compte</button>
                    <button type="button" class="btn btn-login dropdown-toggle dropdown-toggle-split nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" onclick="GoLogin()">Connexion</a>
                        <a class="dropdown-item" onclick="GoRegister()">Inscription</a>
                        <a class="dropdown-item" href="logout.php">Déconnection</a>
                        <a class="dropdown-item" onclick="GoProfile()">Profile</a>
                    </div>
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form method="post" id="registraion_form">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="txt_username" name="username" required class="form-control" placeholder="Nom d'utilisateur">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="txt_email" name="email" required class="form-control" placeholder="Email" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="txt_password" name="password" required class="form-control" placeholder="Mot de passe" />
            </div>
            <div class="form-group">
                <input type="submit" id="btn_register" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>