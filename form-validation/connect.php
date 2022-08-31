<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "crud_php_ajax");

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}


?>