<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();

$db=new mySQL();

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' ); // valid extensions
$path = './gallery/'; // upload directory
if(!empty($_POST['caption']) || $_FILES['image'])
{
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
    $final_image = $img;
// check's valid format
    if(in_array($ext, $valid_extensions))
    {
        $path = $path.strtolower($final_image);
        if(move_uploaded_file($tmp,$path))
        {
            echo "<img src='$path' />";
            $caption = $_POST['caption'];

            $sql="INSERT INTO gallery (   caption,
                                          img_name )
                                          VALUES (
                                                  '".mysql_escape_cust($caption)."',
                                                  '".mysql_escape_cust($img)."'
                                          )";
            $res = $db->execute($sql);
        }
    }
    else
    {
        echo 'invalid';
    }
}
?>