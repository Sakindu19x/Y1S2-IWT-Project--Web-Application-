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
    $id = $_SESSION['idd'];
    $sql=   "SELECT * FROM members where id='$id'";
}else{
    $sql=   "SELECT * FROM members";
}

$db=new mySQL();


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


            <div class="hd-1">Users</div>

            <?php
            if ($_SESSION['level'] == 1) {
            ?>
            <a href="user-add.php" class="button button3"> NEW </a>
            <?php
            }
            ?>
            <table width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row=mysqli_fetch_array($res)){
                    ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td>
                            <?php
                            if (is_file('./profile/'.$row['img_name'])){
                            ?>
                            <img style="width: 32px;" src="./profile/<?=$row['img_name']?>" alt="<?=$row['fname']?> <?=$row['lname']?>">
                            <?php
                            }else{
                                echo " - ";
                            }
                            ?>
                        </td>
                        <td><?=$row['fname']?> <?=$row['lname']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=user_level($row['level'])?></td>
                        <td align="center">
                            <a href="user-edit.php?id=<?=$row['id']?>" class="button button1"> Edit </a>
                            <?php
                            if ($_SESSION['level']!=1){
                            ?>
                            <a href="user-del.php?id=<?=$row['id']?>" class="button button3"> Suspend </a>
                            <?php
                            }
                            ?>
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