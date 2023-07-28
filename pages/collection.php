<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <script src="/js/navigation.js"></script>
    <script src="https://kit.fontawesome.com/abc9d1c3d1.js" crossorigin="anonymous"></script>
    <title>Card-Collector</title>
</head>
<!-- NAVBAR-->
<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="#" class="navbar-brand">
            <!-- Logo Image -->
            <img src="../assets/logo.PNG" width="45" alt="" class="d-inline-block align-middle mr-2">
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

</html>