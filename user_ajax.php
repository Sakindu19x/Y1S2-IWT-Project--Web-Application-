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
$path = './profile/'; // upload directory
if($_FILES['image'])
{
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $id= $_POST['id'];
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    $final_image = $id."-".$img;

    if(in_array($ext, $valid_extensions))
    {
        $path = $path.strtolower($final_image);
        if(move_uploaded_file($tmp,$path))
        {
            echo "<img src='$path' />";
            $sql="UPDATE members SET img_name = '".mysql_escape_cust($final_image)."' WHERE id='".$id."'";
            $res = $db->execute($sql);
        }
    }
    else
    {
        echo 'invalid';
    }
}
?>