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

    $dt = date('Y-m-d');
    $dt_send = date('Y-m-d h:i:s');
    $check_in= date('Y-m-d', strtotime($check_in));
    $ip = getUserIpAddr();

    $pack_type='1';
    $amount=99.00;

    $sql = "UPDATE book SET 
                        dt = '".mysql_escape_cust($dt)."',
                        pack_type ='".mysql_escape_cust($pack_type)."',
                        check_in = '".mysql_escape_cust($check_in)."',
                        country ='".mysql_escape_cust($country)."',
                        tel ='".mysql_escape_cust($tel)."',
                        adults ='".mysql_escape_cust($adults)."',
                        child ='".mysql_escape_cust($child)."',
                        amount ='".mysql_escape_cust($amount)."',
                        message ='".mysql_escape_cust($message)."',
                        ip ='".mysql_escape_cust($ip)."',
                        dt_send ='".mysql_escape_cust($dt_send)."',
                        id ='".mysql_escape_cust($id)."'
                        WHERE book_id='".$book_id."'";


    $res=$db->execute($sql);

    header('Location: book-list.php');
}

$sql = "SELECT * FROM book WHERE book_id='".$book_id."'";
$res=$db->execute($sql);
$row = mysqli_fetch_array($res);

$dt         = $row['dt'];
$pack_type  = $row['pack_type'];
$check_in   = $row['check_in'];
$country    = $row['country'];
$tel        = $row['tel'];
$adults     = $row['adults'];
$child      = $row['child'];
$amount     = $row['amount'];
$message    = $row['message'];
$id         = $row['id'];
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
                <h2 class="hd-3">Checkout</h2>
                <h2 class="hd-4">
                    <?=get_field_value('pack_name','pack','pack_type',$pack_type)?>
                </h2>
                <p>
                    <?=get_field_value('pack_sub','pack','pack_type',$pack_type)?>
                </p>
                <br>
                <br>
                <br>


                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <?php
                    if ($_SESSION['level'] != 1) {
                        ?>
                        Name : <?=$_SESSION['fname']." ".$_SESSION['lname']?> <br>
                        Email : <?=$_SESSION['email']?>
                        <?php
                    }else{
                        ?>
                        <label for="id">User</label>
                        <select id="id" name="id">
                            <option value="australia">Select User</option>
                            <?=combo_read('members', $id,'id','email')?>
                        </select>
                        <?php
                    }
                    ?>

                    <label for="fname">Check in</label>
                    <input value="<?=$check_in?>" type="date" id="check_in" name="check_in" placeholder="">

                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="australia">Australia</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                    </select>

                    <label for="tel">Telephone</label>
                    <input value="<?=$tel?>" type="tel" id="tel" name="tel" placeholder="">

                    <label for="adults">Adults</label>
                    <input value="<?=$adults?>" type="number" id="adults" name="adults" placeholder="">

                    <label for="child">Children</label>
                    <input value="<?=$child?>" type="number" id="child" name="child" placeholder="">


                    <label for="subject">Message</label>
                    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"><?=$message?></textarea>

                    <input type="hidden" name="book_id" value="<?=$book_id?>">
                    <input type="hidden" name="pack_type" value="<?=$pack_type?>">
                    <input type="hidden" name="amount" value="<?=$amount?>">

                    <input type="submit" value="Submit" name="submit" class="button button1">
                </form>

            </div>

    </div>

</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>