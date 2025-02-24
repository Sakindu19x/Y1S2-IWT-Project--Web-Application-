<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();


if (login_check($mysqli) == false) {
    header('Location: /');
    exit;
}

if ($_SESSION['level'] != 1) {
    header('Location: /');
    exit;
}

$db=new mySQL();

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
            <a href="gallery-add.php" class="button button3">New Item</a>
            <p>
            <div class="grid-wrapper">
                <?php
                while ($row=mysqli_fetch_array($res)){
                    ?>

                    <div style="float: left;display: block;margin-bottom: 35px;">
                        <div style="float: right; color: #004ac2; text-decoration: none; font-size: 12px">
                            <a href="gallery-edit.php?gal_id=<?=$row['gal_id']?>">Edit</a> |
                            <a href="gallery-del.php?gal_id=<?=$row['gal_id']?>">Delete</a>
                        </div>
                        <pre style="width:70%; overflow:hidden; color: #004ac2" title="<?=$row['caption']?>"><?=$row['caption']?></pre>
                        <img src="./gallery/<?=$row['img_name']?>" alt="<?=$row['caption']?>" title="<?=$row['caption']?>" />




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