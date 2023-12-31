<?php
session_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="../../js/navigation.js"></script>
<script>

    $(document).on('click', '#btn_login', function (e) {
        console.log("hello");
        e.preventDefault();

        var username = $('#txt_username').val();
        var password = $('#txt_password').val();

        if (username == '') { // check username not empty
            alert('please enter username !!');
        }
        else if (password == '') { //check password not empty
            alert('please enter password !!');
        }
        else {
            $.ajax({
                url: '/api/processlogin.php',
                type: 'post',
                data:
                {
                    newusername: username,
                    newpassword: password
                },
                success: function (response) {
                    $('#message').html(response);
                    GoActualite();
                }
            });

            $('#login_form')[0].reset();
        }
    });
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>
<!-- NAVBAR-->
<link rel="stylesheet" href="/css/style.css">
<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="#" class="navbar-brand">
            <!-- Logo Image -->
            <img src="../../assets/logo.PNG" width="45" alt="" class="d-inline-block align-middle mr-2">
            <!-- Logo Text -->
            <span onclick="GoActualite()" class="text-uppercase font-weight-bold">Card-Collector</span>
        </a>

        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a onclick="GoActualite()" class="nav-link">Actualités <span
                            class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a onclick="GoCollection()" class="nav-link">Collection</a></li>
                <div class="btn-group">
                    <button type="button" class="btn btn-login nav-link">Mon compte</button>
                    <button type="button" class="btn btn-login dropdown-toggle dropdown-toggle-split nav-link"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <h2>Login</h2>
        <p>Please fill this form to Login.</p>
        <form method="post" id="login_form">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="txt_username" name="username" required class="form-control"
                    placeholder="Nom d'utilisateur">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="txt_password" name="password" required class="form-control"
                    placeholder="Mot de passe" />
            </div>
            <div class="form-group">
                <input type="submit" id="btn_login" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Don't have an account <a href="register.php">Register here</a>.</p>
        </form>
    </div>
</body>

</html>