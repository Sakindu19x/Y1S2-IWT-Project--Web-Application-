<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();

if (login_check($mysqli) == false) {
    header("Location: /");
    exit;
}


if ($_SESSION['level']!=1){
    header("Location: /");
    exit;
}



foreach($_REQUEST as $key=>$value){
    $key=strtolower($key);
    $$key=$value;
}

$db=new mySQL();

if (isset($_POST['submit'])){

    $sql_s = "UPDATE pack SET      
                   pack_name =  '".mysql_escape_cust($pack_name)."',
                   pack_sub =  '".mysql_escape_cust($pack_sub)."',
                   pack_desc =  '".mysql_escape_cust($pack_desc)."',
                   pack_amount =  '".mysql_escape_cust($pack_amount)."'
                WHERE pack_type='".$pack_type."'";


    $res_s=$db->execute($sql_s);

    header('Location: pack-list.php');
}

$sql="SELECT * from pack where pack_type='".$pack_type."'";

$res=$db->execute($sql);
$row = mysqli_fetch_array($res);
$pack_name  =$row['pack_name'];
$pack_sub   =$row['pack_sub'];
$pack_desc  =$row['pack_desc'];
$pack_amount=$row['pack_amount'];
$img_name=$row['img_name'];
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
        <div class="col-2">
            <h2 class="hd-1">Package - Edit </h2>

            <a href="pack-img.php?pack_type=<?=$pack_type?>" class="button button3"> Package Image </a>

            <form class="needs-validation" novalidate method="post" action="pack-edit.php" name="registration_form">
                <div class="form-group">
                    <label for="pack_name" class="col-lg-2 col-sm-2 control-label">Package Name</label>
                    <div class="col-lg-10">
                        <input type="text" value="<?=$pack_name?>" id="pack_name" name="pack_name"  >
                    </div>
                </div>

                <div class="form-group">
                    <label for="pack_sub" class="col-lg-2 col-sm-2 control-label">Sub Title</label>
                    <div class="col-lg-10">
                        <input type="text" value="<?=$pack_sub?>" class="form-control" id="pack_sub" name="pack_sub" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="pack_desc" class="col-lg-2 col-sm-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea id="pack_desc" rows="20" name="pack_desc" placeholder="Last Name"><?=$pack_desc?>
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pack_amount" class="col-lg-2 col-sm-2 control-label">Amount</label>
                    <div class="col-lg-10">
                        <input type="text" value="<?=$pack_amount?>" class="form-control" id="pack_amount" name="pack_amount" >
                    </div>
                </div>

                <input type="hidden" name="pack_type" value="<?=$pack_type?>">
                <button class="button button1" name="submit" type="submit" >Save</button>
                <a class="button button2" href="pack-list.php" > <i class="fa fa-home"></i> Home</a>


            </form>
        </div>
        <div class="col-2">
            <img src="./packimg/<?=$img_name?>" alt="<?=$pack_name?>" style="width: 100%;" >
        </div>

    </div>
</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>