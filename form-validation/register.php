<?php 
include "connect.php";

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword'])) {
    /* EMAIL: <username>@<domain>.<ext>
        - Không trống
        - <username> : [^"]+
        - <domain> : [a-zA-Z0-9-]+
        - <txt> : [a-zA-Z]{2,}
    */
    function isEmailVal($email) {
        $check = false;
        $pattern = '~^[^"]+@[a-zA-Z0-9-]+.[a-zA-Z]{2,}$~';
        if (preg_match($pattern, $email)) {
            $check = true;
        }
        return $check;
    }
    /* PASSWORD: 
        - Không trống
        - Ít nhất 8 kí tự gồm: 1 thường & 1 hoa & 1 số & 1 đặc biệt ((! @ # $% ^ & *)
    */
    function isPassword($password) {
        $check = false;
        $pattern = '~^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])(?=.{8,})~';
        if (preg_match($pattern, $password)) {
            $check = true;
        }
        return $check;
    }

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);

    $errors = [];
    // validate username: không trống, 3<=val<=25
    $min = 3; $max = 25;
    if(empty($username)) {
        $errors['username']['required'] = 'Username cannot be blank';
    }elseif (strlen($username) < $min || strlen($username) > $max) {
        $errors['username']['between'] = 'Username must be between '.$min.' and '.$max.' characters';
    }
    // validate email
    if (empty($email)) {
        $errors['email']['required'] = 'Email cannot be blank.';
    }else {
        if (!isEmailVal($email)) {
            $errors['email']['valid'] = 'Email is not valid.';
        }else {
            $sql = 'SELECT id FROM `users` WHERE email = \''.$email.'\'';
            $result = mysqli_query($conn, $sql);
            if (mysqli_fetch_row($result) > 0) {
                $errors['email']['unique'] = 'Email already exists';
            }
        }
    }
    // validate password
    if (empty($password)) {
        $errors['password']['required'] = 'Password cannot be blank';
    }elseif (!isPassword($password)) {
        $errors['password']['valid'] = 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)';
    }
    // validate confirmpassword
    if (empty($confirmpassword)) {
        $errors['confirmpassword']['required'] = 'Confirm password cannot be blank';
    }elseif ($password !== $confirmpassword) {
        $errors['confirmpassword']['match'] = 'Confirm password does not match';
    }

    if (empty($errors)) {
        $response = [];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $createAt = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO `users`(`username`, `email`, `password`, `create_at`) VALUE (\''.$username.'\', \''.$email.'\', \''.$passwordHash.'\', \''.$createAt.'\')';
        $insertStatus = mysqli_query($conn, $sql);
        if ($insertStatus) {
            $_SESSION['created'] = 'your account has been created successfully';
            $response = ['status' => 'success'];
        }else {
        }

        // response
        echo json_encode($response);
    }else {
        echo json_encode($errors);
    }

    
}
