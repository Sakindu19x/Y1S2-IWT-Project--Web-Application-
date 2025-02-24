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

$sql = "SELECT
	book.*, 
	members.* 
FROM
	book
	INNER JOIN
	members
	ON 
		book.id = members.id
 ORDER by book.check_in desc ";

$res=$db->execute($sql);


$sql_c = "SELECT * FROM	contact";
$res_c=$db->execute($sql_c);

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

        <div class="col-4">
            <a href="user-list.php" class="button button2">Users</a>
        </div>
        <div class="col-4">
            <a href="pack-list.php" class="button button2">Packages</a>
        </div>
        <div class="col-4">
            <a href="book-list.php" class="button button2">Reservation</a>
        </div>
        <div class="col-4">
            <a href="gallery-list.php" class="button button2">Gallery</a>

        </div>


    </div>
    <div class="text-content">


        <div class="col-1">
            <div class="hd-1">Contact us Messages</div>
            <table width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Message</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row_c=mysqli_fetch_array($res_c)){
                    ?>
                    <tr>
                        <td><?=$row_c['id']?></td>
                        <td><?=$row_c['fname']?> <?=$row_c['lname']?></td>
                        <td><?=$row_c['country']?></td>
                        <td align="center"><?=$row_c['message']?></td>
                        <td align="center">

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