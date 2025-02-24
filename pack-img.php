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
            <h2 class="hd-1">User - Profile Image</h2>

            <p>

                <img src="./packimg/<?=$img_name?>" alt="">

            <form id="form" action="user_ajax.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="pack_type" value="<?=$pack_type?>">
                <div id="err"></div>
                <input id="uploadImage" type="file" accept=".jpeg,.jpg,.png,.gif,.bmp" name="image" />

                <div id="preview"><img src="./img/blank.png" /></div><br>

                <button type="submit" class="button button1" name="submit" value="submit">Update</button>
                <a href="pack-list.php" class="button button3">Home</a>

            </form>
            </p>
        </div>

    </div>
</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script>
    $(document).ready(function (e) {
        $("#form").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url: "pack_ajax.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function()
                {
                    //$("#preview").fadeOut();
                    $("#err").fadeOut();
                },
                success: function(data)
                {
                    if(data=='invalid')
                    {
                        // invalid file format.
                        $("#err").html("Invalid File !").fadeIn();
                    }
                    else
                    {
                        // view uploaded file.
                        $("#preview").html(data).fadeIn();
                        $("#form")[0].reset();
                    }
                },
                error: function(e)
                {
                    $("#err").html(e).fadeIn();
                }
            });
        }));
    });
</script>
</body>
</html>