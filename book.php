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

$sql="SELECT * FROM pack where pack_type='".$pack_type."'";

$res=$db->execute($sql);
$row=mysqli_fetch_array($res);

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
        <?php
        if (login_check($mysqli) == false) {
            ?>
            <div class="col-2">
                <h2 class="hd-3">Register and Login first</h2>

                <a href="login.php" class="button button1"> Login </a>
            </div>
        <?php
        }else{
            ?>
            <div class="col-2">
                <h2 class="hd-3"><?=$row['pack_name']?></h2>
                <h2 class="hd-4"><?=$row['pack_sub']?></h2>

                <div style="height: 250px; display: block; overflow: hidden;">
                    <img src="packimg/<?=$row['img_name']?>" alt="<?=$row['pack_name']?>" style="width: 100%">
                </div>
                <p><?=$row['pack_desc']?></p>
                <div style="color: #004ac2 ; font-weight: bold; font-size: large; text-align: center;">
                    <?=number_format($row['pack_amount'],2,'.',',')?>
                </div>
                <div style="text-align: center">
                    <a href="checkout.php?pack_type=<?=$row['pack_type']?>" class="button button1"> Checkout </a>
                </div>
            </div>

            <?php
        }
        ?>



    </div>



</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>