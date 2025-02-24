<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // The hashed password.

    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../../index.php');
    } else {
        // Login failed 
        header('Location: ../../login.php');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}