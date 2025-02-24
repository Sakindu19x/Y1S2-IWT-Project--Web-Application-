<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");

require_once 'login/includes/db_connect.php';

require_once 'login/includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    header("Location:index.php");
    exit;
}

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


    <div class="text-content">
        <div class="col-2">
            <h2 class="hd-1">Login</h2>
            <p>Welcome to Blue Horizon Boat Safaris! Log in below to access your account and start managing your adventures effortlessly.</p>

            <form method="post" class="form-signin" action="login/includes/process_login.php" name="login_form">
                <div class="form-group">
                    <input type="text" class="form-control" autofocus name="email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                </div>

                <div class="form-group clearfix">

                    <button type="submit" class="button button1">
                        LOGIN
                    </button>

                </div>

                <a href="user-add.php">Register now</a>



            </form>
        </div>


    </div>




        </div>
        <!--/login form-->
    </div>
</div>




</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>




