<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();

$db=new mySQL();

$sql="SELECT * FROM pack";

$res=$db->execute($sql);
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
            <h2 class="hd-1">Services</h2>
            <p>Explore the Maadu River with Blue Horizon Boat Safaris. Choose from our safari packages: mangrove marvels, wildlife encounters, cultural expeditions, and sunset serenity. Book now for an unforgettable adventure!</p>
        </div>

    </div>

    <div class="text-content">

        <?php
        while ($row = mysqli_fetch_array($res)){
        ?>
            <div class="col-3">
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
                <a href="book.php?pack_type=<?=$row['pack_type']?>" class="button button3"> Book Now </a>
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