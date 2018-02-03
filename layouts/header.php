<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resume - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/startbootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">
    <link href="/assets/startbootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/startbootstrap/vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="/assets/startbootstrap/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/startbootstrap/css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="/assets/startbootstrap/img/profile.jpg"
               alt="">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    if ($_SESSION["isLogin"]):
    ?>
    <div style="color: white;">
        <h3><?php echo $_SESSION["user"]["username"]; ?></h3>
        <h4><?php echo $_SESSION["user"]["name"]; ?></h4>

        score: <?php echo $_SESSION["user"]["score"]; ?>
    </div>
    <hr>
    <?php
    endif;
    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <?php
            if (is_null($_SESSION["username"])):
                ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/forgotpass.php">Forgot Password</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/post/create.php">Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/logout.php">LOGOUT</a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</nav>

<div class="container-fluid p-0">
