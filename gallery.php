<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");

require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';

require_once ("inc-func.php");

sec_session_start();

$db=new mySQL();

$sql="SELECT * FROM gallery order by gal_id desc";

$res=$db->execute($sql);

?>

<!doctype html>
<html lang="en">
<head>
    <?php include "inc-head.php"; ?>
    <link rel="stylesheet" href="css/mas-gal.css">
</head>
<style>


</style>
<body>

<div class="container">
    <?php include "inc-header.php"; ?>


    <div class="text-content">
        <div class="col-1">
            <h2 class="hd-1">Gallery</h2>

            <?php
            if (login_check($mysqli) == true ) {
                if ($_SESSION['level']==1){
                    ?>

                    <a href="gallery-list.php" class="button button3" >Gallary Update</a>

            <?php
                }
            }
            ?>


            <p>
            <div class="grid-wrapper">
                <?php
                while ($row=mysqli_fetch_array($res)){
                    ?>

                        <div style="float: left;display: block;margin-bottom: 20px;">

                            <img src="./gallery/<?=$row['img_name']?>" alt="<?=$row['caption']?>" />
                            <pre style="color: #004ac2"><?=$row['caption']?></pre>

                        </div>

                <?php
                    }
                ?>
            </div>
            </p>
        </div>

    </div>



</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>