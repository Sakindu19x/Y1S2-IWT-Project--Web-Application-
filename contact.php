<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();

if (isset($_POST['submit'])){

    $db=new mySQL();

    foreach($_REQUEST as $key=>$value){
        $key=strtolower($key);
        $$key=$value;
    }

    $dt = date('Y-m-d');
    $dt_send = date('Y-m-d h:i:s');

    $ip = getUserIpAddr();

    $sql = "INSERT INTO contact (
                        dt,
                        fname,
                        lname,
                        country,
                        message,
                        ip,
                        dt_send
                        ) VALUES (
                                 '".mysql_escape_cust($dt)."', 
                                 '".mysql_escape_cust($fname)."',
                                 '".mysql_escape_cust($lname)."',
                                 '".mysql_escape_cust($country)."',
                                 '".mysql_escape_cust($message)."',
                                 '".mysql_escape_cust($ip)."',
                                 '".mysql_escape_cust($dt_send)."'
                        )";
    $res=$db->execute($sql);

    header('Location: contact-thanks.php');
}

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
            <h2 class="hd-1">Contact us</h2>
            <p>We'd love to hear from you! Whether you have questions about our safari packages, want to book an adventure, or simply want to say hello, don't hesitate to reach out. Contact Blue Horizon Boat Safaris via phone, email, or fill out the form below, and our friendly team will be in touch soon to assist you in planning your Maadu River adventure.</p>

            <a href="#"><i class="fa fa-fw fa-map"></i> Balapitiya, Galle Road</a><br>
            <a href="#"><i class="fa fa-fw fa-mobile"></i> +94 555 555 555</a><br>
            <a href="#"><i class="fa fa-fw fa-envelope"></i> info@bluehorizon.lk</a><br>
        </div>
        <div class="col-2">
            <h2 class="hd-2">Feedback</h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="Your name..">

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Your last name..">

                <label for="country">Country</label>
                <select id="country" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>

                <label for="subject">Subject</label>
                <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

                <input type="submit" value="Submit" name="submit" class="button button1">
            </form>
        </div>

    </div>



</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>