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

$db=new mySQL();

$sql="SELECT * from pack";

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


            <div class="hd-1">Packages</div>
            <a href="pack-add.php" class="button button3"> New Packages </a>

            <table width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Package</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>pack_amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row=mysqli_fetch_array($res)){
                    ?>
                    <tr>
                        <td><?=$row['pack_type']?></td>
                        <td><?=$row['pack_name']?></td>
                        <td><?=$row['pack_sub']?></td>
                        <td width="20%"><?=substr($row['pack_desc'],0,100)?> ... </td>
                        <td><?=$row['pack_amount']?></td>
                        <td align="center">
                            <a href="pack-edit.php?pack_type=<?=$row['pack_type']?>" class="button button1"> Edit </a>
                            <a href="pack-del.php?pack_type=<?=$row['pack_type']?>" class="button button3"> Delete </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>