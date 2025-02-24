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

if (login_check($mysqli) == false) {
    header('Location: /');
    exit;
}

if ($_SESSION['level'] != 1) {
    header('Location: /');
    exit;
}

$db=new mySQL();

if (isset($_POST['submit'])){

    $sql = "UPDATE gallery SET caption =  '".mysql_escape_cust($caption)."' WHERE gal_id='".$gal_id."'";


    $res=$db->execute($sql);

    header('Location: gallery-list.php');
}


$sql="SELECT * FROM gallery WHERE gal_id='".$gal_id."'";

$res=$db->execute($sql);
$row=mysqli_fetch_array($res);
$caption=$row['caption'];
$img_name=$row['img_name'];

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
            <h2 class="hd-1">Gallery - Edit</h2>

            <p>
                <img src="./gallery/<?=$img_name?>" alt="<?=$caption?>">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="caption" placeholder="Enter Image Caption" value="<?=$caption?>">
                <input type="hidden" name="gal_id" value="<?=$gal_id?>">

                <button type="submit" class="button button1" name="submit" value="submit">Update</button>
                <a href="gallery-list.php" class="button button3">Home</a>
            </form>
            </p>
        </div>

    </div>



</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>