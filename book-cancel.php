<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();

foreach($_REQUEST as $key=>$value){
    $key=strtolower($key);
    $$key=$value;
}
$db=new mySQL();

$sql="DELETE from book where book_id='".$book_id."'";

$res = $db->execute($sql);

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
            <h2 class="hd-1" style="text-align: center;">Booking Cancelled </h2>
            <p style="text-align: center;">Thank you Come again</p>
            <br><br>
            <div style="text-align: center ">
                <a href="user.php" class="button button2">Profile Page</a>
            </div>

        </div>


    </div>



</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>