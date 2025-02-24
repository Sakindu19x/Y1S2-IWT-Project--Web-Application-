<?php
include_once 'db_connect.php';
include_once 'psl-config.php';

$error_msg = "";

if (isset($_POST['email'], $_POST['password'])) {

    $email = $_POST['email'];
    $username = $email;
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $level=$_POST['level'];

    $password = $_POST['password'];

    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
    }


    if (empty($error_msg)) {

        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, fname, lname, level, password) VALUES (?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssis', $username, $email, $fname, $lname, $level, $password);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: /');
            }
        }

        header('Location: ./user-list.php');
    }
}