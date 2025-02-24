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
    header("Location: /");
    exit;
}

$db=new mySQL();

if ($_SESSION['level'] != 1) {
    $sql = "
            SELECT
                book.*, 
                members.*, 
                pack.*
                
            
            FROM
                book
                INNER JOIN
                members
                ON 
                    book.id = members.id
                INNER JOIN
                pack
                ON 
                    book.pack_type = pack.pack_type
            WHERE
                book.id = '" . $_SESSION['idd'] . "'
            ORDER BY
                book.check_in DESC 
            ";
}else{
    $sql = "
            SELECT
                book.*, 
                members.*, 
                pack.*
                
            
            FROM
                book
                INNER JOIN
                members
                ON 
                    book.id = members.id
                INNER JOIN
                pack
                ON 
                    book.pack_type = pack.pack_type
            ORDER BY
                book.check_in DESC 
            ";
}

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
            <a href="services.php" class="button button1">New Reservation</a>
            <div class="hd-1">Reservations</div>
            <table width="100%">
                <thead>
                <tr>
                    <th >ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Check-in</th>
                    <th>Adults</th>
                    <th>Child</th>
                    <th>Amount</th>
                    <th>Package</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $gtot=0;
                while ($row=mysqli_fetch_array($res)){
                    if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d',strtotime($row['check_in'])))){
                        $can_time="1";
                    }else{
                        $can_time="0";
                    }
                    ?>
                    <tr <?=($can_time=="1"?"style='background-color: #717171;'":"")?>>
                        <td><?=$row['book_id']?></td>
                        <td><?=$row['fname']?> <?=$row['lname']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['check_in']?></td>
                        <td align="center"><?=$row['adults']?></td>
                        <td align="center"><?=$row['child']?></td>
                        <td align="center"><?=$row['amount']?></td>
                        <td align="center"><?=$row['pack_name']?></td>
                        <td align="center">
                            <?php
                            if ($can_time=="0"){
                            ?>
                                <a href="book-edit.php?book_id=<?=$row['book_id']?>" class="button button1" > Edit </a>
                                <a href="book-cancel.php?book_id=<?=$row['book_id']?>" class="button button3"> Cancel </a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    $gtot=$gtot+$row['amount'];
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?=number_format($gtot,2,'.',',')?></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>



</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>