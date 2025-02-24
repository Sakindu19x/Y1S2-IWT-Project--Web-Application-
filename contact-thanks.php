<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <?php include "inc-head.php"; ?>
</head>
<body>

<div class="container">
    <?php include "inc-header.php"; ?>

    <div class="text-content">
        <div class="col-1">


        </div>

    </div>
    <div class="text-content" style="height: 45vh;">
        <div class="col-1">
            <h2 class="hd-1" style="text-align: center;">Thank you</h2>
            <p style="text-align: center;">Thank you for Contacting us</p>
            <br><br>
            <div style="text-align: center ">
                <a href="index.php" class="button button2">Home</a>
            </div>

        </div>


    </div>



</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>