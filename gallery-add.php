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
    header('Location: /');
    exit;
}

if ($_SESSION['level'] != 1) {
    header('Location: /');
    exit;
}

$db=new mySQL();

if (isset($_POST['submit'])){

    $sql = "INSERT INTO gallery (   caption, 
                                    img_name
                                )  VALUES  (
                                    '" . mysql_escape_cust($caption) . "',
                                    '" . mysql_escape_cust($img_name) . "'
                                )";

    $res=$db->execute($sql);

    header('Location: gallery-list.php');
}



$caption="";
$img_name="";

?>

<!doctype html>
<html lang="en">
<head>
    <?php include "inc-head.php"; ?>
    <link rel="stylesheet" href="css/mas-gal.css">
</head>
<style>


</style>
<body>

<div class="container">
    <?php include "inc-header.php"; ?>


    <div class="text-content">
        <div class="col-1">
            <h2 class="hd-1">Gallery - New</h2>

            <p>
                <img src="./gallery/<?=$img_name?>" alt="<?=$caption?>">

            <form id="form" action="gallery_ajax.php" method="post" enctype="multipart/form-data">
                <input type="text" name="caption" placeholder="Enter Image Caption" value="<?=$caption?>">
                <input type="hidden" name="gal_id" value="<?=$gal_id?>">
                <div id="err"></div>
                <input id="uploadImage" type="file" accept=".jpeg,.jpg,.png,.gif,.bmp" name="image" />

                <div id="preview"><img src="./img/blank.png" /></div><br>

                <button type="submit" class="button button1" name="submit" value="submit">Update</button>
                <a href="gallery-list.php" class="button button3">Home</a>
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
                url: "gallery_ajax.php",
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