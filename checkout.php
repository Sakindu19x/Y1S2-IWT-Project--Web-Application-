<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();

$db=new mySQL();

foreach($_REQUEST as $key=>$value){
    $key=strtolower($key);
    $$key=$value;
}

if (isset($_POST['submit'])){

    $db=new mySQL();

    foreach($_REQUEST as $key=>$value){
        $key=strtolower($key);
        $$key=$value;
    }

    $dt = date('Y-m-d');
    $dt_send = date('Y-m-d h:i:s');
    $check_in= date('Y-m-d', strtotime($check_in));
    $ip = getUserIpAddr();

    $sql = "INSERT INTO book (
                        dt,
                        pack_type,
                        check_in,
                        country,
                        tel,
                        adults,
                        child,
                        amount,
                        message,
                        ip,
                        dt_send,
                        id
                        ) VALUES (
                                 '".mysql_escape_cust($dt)."', 
                                 '".mysql_escape_cust($pack_type)."',
                                 '".mysql_escape_cust($check_in)."',
                                 '".mysql_escape_cust($country)."',
                                 '".mysql_escape_cust($tel)."',
                                 '".mysql_escape_cust($adults)."',
                                 '".mysql_escape_cust($child)."',
                                 '".mysql_escape_cust($amount)."',
                                 '".mysql_escape_cust($message)."',
                                 '".mysql_escape_cust($ip)."',
                                 '".mysql_escape_cust($dt_send)."',
                                 '".mysql_escape_cust($idx)."'
                        )";


    $res=$db->execute($sql);

    header('Location: book-list.php');
}



$sql="SELECT * FROM pack where pack_type='".$pack_type."'";

$res=$db->execute($sql);
$row=mysqli_fetch_array($res);


$idx='';
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
        <?php
        if (login_check($mysqli) == false) {
            ?>
            <div class="col-2">
                <h2 class="hd-3">Register and Login first</h2>
                <a href="login.php" class="button button1"> Login </a>
            </div>
            <?php
        }else{
            ?>
            <div class="col-2">
                <h2 class="hd-3"><?=$row['pack_name']?></h2>
                <h2 class="hd-4"><?=$row['pack_sub']?></h2>

                <div style="height: 250px; display: block; overflow: hidden;">
                    <img src="packimg/<?=$row['img_name']?>" alt="<?=$row['pack_name']?>" style="width: 100%">
                </div>
                <p><?=$row['pack_desc']?></p>
                <div style="color: #004ac2 ; font-weight: bold; font-size: large; text-align: center;">
                    <?=number_format($row['pack_amount'],2,'.',',')?>
                </div>

            </div>
            <div class="col-2">
                <h2 class="hd-3">Checkout</h2>
                <h2 class="hd-3"><?=$row['pack_name']?></h2>
                <h2 class="hd-4"><?=$row['pack_sub']?></h2>

                <br>
                <br>
                <br>



                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <?php
                    if ($_SESSION['level'] != 1) {
                        $idx=$_SESSION['idd'];
                        ?>
                        <input type="hidden" name="idx" value="<?=$idx?>">
                        Name : <?=$_SESSION['fname']." ".$_SESSION['lname']?> <br>
                        Email : <?=$_SESSION['email']?>
                        <?php
                    }else{
                        ?>
                        <label for="id">User</label>
                        <select id="idx" name="idx">
                            <option value="0">Select User</option>
                            <?=combo_read('members', $idx,'id', 'email')?>
                        </select>
                        <?php
                    }
                    ?>

                    <label for="fname">Check in</label>
                    <input type="date" id="check_in" name="check_in" placeholder="">

                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="australia">Australia</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                    </select>

                    <label for="tel">Telephone</label>
                    <input type="tel" id="tel" name="tel" placeholder="">

                    <label for="adults">Adults</label>
                    <input type="number" id="adults" name="adults" placeholder="">

                    <label for="child">Children</label>
                    <input type="number" id="child" name="child" placeholder="">

                    <input type="hidden" id="pack_type" name="pack_type" value="<?=$row['pack_type']?>">
                    <input type="hidden" id="amount" name="amount" value="<?=$row['pack_amount']?>">

                    <label for="subject">Message</label>
                    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

                    <input type="submit" value="Submit" name="submit" class="button button1">
                </form>

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