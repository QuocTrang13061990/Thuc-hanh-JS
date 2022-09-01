<?php
include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <form id="signin" class="form form-login">
            <h1>Sign In</h1>
            <?php
            if (isset($_SESSION['created'])) {
                echo '<div class="alert alert-success">' . $_SESSION['created'] . '</div>';
            }
            unset($_SESSION['created']); // khi load lại thì session này sẽ mất đi
            ?>
            <div class="form-field">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off">
                <small></small>
            </div>
            <div class="form-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off">
                <small></small>
            </div>
            <div class="form-field">
                <button type="button" class="btn btn-primary" id="btn-Signin">Sign Ip</button>
                <small></small>
            </div>
        </form>
    </div>
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./js/app.js"></script>
    <!-- <script>
        $(document).ready(function() {
            function login() {
                console.log('loginod');
            }
        })
    </script> -->

</body>

</html>