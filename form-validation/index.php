<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Form validation</title>
</head>
<body>
    <div class="container">
        <form id="signin" class="form">
            <h1></h1>
            <div class="form-field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off">
                <small></small>
            </div>
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
                <label for="confirm-password">Confirm password</label>
                <input type="password" name="confirm-password" id="confirm-password" autocomplete="off">
                <small></small>
            </div>
            <div class="form-field">
                <!-- <input type="submit" value="Sign Up"> -->
                <button type="button" class="btn btn-primary" id="btn-Signin">Sign In</button>
                <small></small>
            </div>
        </form>
    </div>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>