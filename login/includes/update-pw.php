<?php
require_once('./login/includes/psl-config.php');
//echo "a";
include_once "./mysql.php";
//echo "b";

$error_msg = "";

//echo $_POST['email'];

if (isset($_POST['email'], $_POST['password'])) {
    // Sanitize and validate the data passed in

    $email = $_POST['email'];
    $username = $email;
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $level=$_POST['level'];


    $password = $_POST['password'];

    $db=new mySQL();
    $sql="UPDATE members SET password='$password', level='$level' WHERE email='$email'";
    $res=$db->execute($sql);
    header('Location: user-list.php');
}