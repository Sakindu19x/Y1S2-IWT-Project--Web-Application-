<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once ("inc-func.php");
require_once 'login/includes/functions.php';
require_once 'login/includes/update-pw.php';

sec_session_start();

if (login_check($mysqli) == false) {
    header("Location: /");
    exit;
}

if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
} else {
    header("Location: user-list.php");
    exit;
}

if ($_SESSION['level']!=1){
    $sql="select * from members where id='".$_SESSION['idd']."'";
    $id =$_SESSION['idd'];
}else{
    $sql="select * from members where id='".$id."'";
}

$db = new mySQL();

$res=$db->execute($sql);
$row=mysqli_fetch_array($res);


$fname=$row['fname'];
$lname=$row['lname'];
$email=$row['email'];
$username=$row['username'];
$level=$row['level'];
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
        <div class="col-1">


        </div>

    </div>


    <div class="text-content">
        <div class="col-2">
            <h2 class="hd-1">User - Edit</h2>

            <a href="user-edit-profile.php?id=<?=$id?>" class="button button3"> Profile </a>

            <form class="needs-validation" novalidate method="post" action="user-edit.php" name="registration_form">
                <div class="form-group">
                    <label for="email" class="col-lg-2 col-sm-2 control-label">E-Mail</label>
                    <div class="col-lg-10">
                        <input readonly type="email" value="<?=$email?>" id="email" name="email" placeholder="Email" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="fname" class="col-lg-2 col-sm-2 control-label">First Name</label>
                    <div class="col-lg-10">
                        <input readonly type="text" value="<?=$fname?>" class="form-control" id="fname" name="fname" placeholder="First Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lname" class="col-lg-2 col-sm-2 control-label">Last Name</label>
                    <div class="col-lg-10">
                        <input readonly type="text" value="<?=$lname?>" class="form-control" id="lname" name="lname" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="level" class="col-lg-2 col-sm-2 control-label">User Level</label>
                    <div class="col-lg-10">
                        <select readonly id="level" name="level">
                            <option value="0" <?php if ($level=='0'){echo "selected";}?>>User</option>
                            <?php if ($_SESSION['level']=='1') { ?>
                                <option value="0" <?php if ($level=='0'){echo "selected";}?>>User</option>
                                <option value="1" <?php if ($level=='1'){echo "selected";}?>>Admin</option>

                            <?php } ?>

                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label for="password" class="col-lg-2 col-sm-2 control-label">Password </label>
                    <div class="col-lg-10">
                        <input type="password" id="password" name="password"  class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmpwd" class="col-lg-2 col-sm-2 control-label">Confirm Password </label>
                    <div class="col-lg-10">
                        <input type="password" id="confirmpwd" name="confirmpwd"  class="form-control" >
                    </div>
                </div>


                <button class="button button1" name="submit" type="submit" >
                    Save</button>
                <a class="button button2" href="user-list.php" > <i class="fa fa-home"></i> Home</a>


            </form>
        </div>
        <div class="col-2">
            <img src="./profile/<?=$img_name?>" alt="<?=$fname?>" style="width: 50%;" >
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