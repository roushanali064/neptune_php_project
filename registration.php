<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Signup</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="./assets/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="./assets/css/main.min.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="./login.php">Sign In</a></p>
            <?php if (isset($_SESSION['db_connect error'])) : ?>
                <div class="alert alert-custom " role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title">Sorry</span>
                        <span class="alert-text"><?= $_SESSION['db_connect error']; ?></span>
                    </div>
                </div>
            <?php endif;
            unset($_SESSION['db_connect error']) ?>
            
            <form action="./registration_POST.php" method="POST">
                <div class="auth-credentials m-b-xxl">
                    <label for="signUpUsername" class="form-label">Name</label>
                    <input type="text" class="form-control m-b-md <?= (isset($_SESSION['name error'])) ? 'is-invalid' : ''; ?>" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter Name" name="name">
                    <?php if (isset($_SESSION['name error'])) : ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['name error'] ?></div>
                    <?php endif;
                    unset($_SESSION['name error']) ?>

                    <label for="signUpEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control m-b-md <?= (isset($_SESSION['email error'])) ? 'is-invalid' : ''; ?>" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" name="email">
                    <?php if (isset($_SESSION['email error'])) : ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['email error'] ?></div>
                    <?php endif;
                    unset($_SESSION['email error']) ?>

                    <label for="signUpPassword" class="form-label">Password</label>
                    <input type="password" class="form-control <?= (isset($_SESSION['password error'])) ? 'is-invalid' : ''; ?>" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password">
                    <?php if (isset($_SESSION['password error'])) : ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['password error'] ?></div>
                    <?php endif;
                    unset($_SESSION['password error']) ?>

                    <label for="signUpPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control <?= (isset($_SESSION['confiram_password error'])) ? 'is-invalid' : ''; ?>" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="confiram_password">
                    <?php if (isset($_SESSION['confiram_password error'])) : ?>
                        <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['confiram_password error'] ?></div>
                    <?php endif;
                    unset($_SESSION['confiram_password error']) ?>

                </div>
                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
                <div class="divider"></div>
            </form>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="./assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="./assets/plugins/pace/pace.min.js"></script>
    <script src="./assets/js/main.min.js"></script>
    <script src="./assets/js/custom.js"></script>
</body>

</html>