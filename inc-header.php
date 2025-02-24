
<div class="header">
    <div class="top-nav">
        <div class="top-bar">
            <a href="#"><i class="fa fa-fw fa-facebook"></i></a>
            <a href="#"><i class="fa fa-fw fa-twitter"></i></a>
            <a href="#"><i class="fa fa-fw fa-instagram"></i></a>
        </div>
        <div class="login">
            <a href="login.php"><i class="fa fa-fw fa-user"> </i> Login </a>
            <a>
                <?php if (login_check($mysqli) == true) { echo "as ".$_SESSION['fname']."(".user_level($_SESSION['level']).")";?></a> <a href="login/includes/logout.php"><i class="fa fa-fw fa-exit"> </i> Logout </a><?php  } ?>


        </div>
    </div>
    <a href="index.php" class="logo">
        <img src="img/blue-horizon-logo.png" alt="Logo" class="logo">
    </a>
    <div class="nav">
        <a <?=(basename($_SERVER["SCRIPT_FILENAME"])=="index.php"?"class='active'":"")?>  href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a <?=(basename($_SERVER["SCRIPT_FILENAME"])=="about-us.php"?"class='active'":"")?> href="about-us.php"><i class="fa fa-fw fa-exclamation"></i> About us</a>
        <a <?=(basename($_SERVER["SCRIPT_FILENAME"])=="services.php"?"class='active'":"")?> href="services.php"><i class="fa fa-fw fa-cog"></i> Services</a>
        <a <?=(basename($_SERVER["SCRIPT_FILENAME"])=="gallery.php"?"class='active'":"")?> href="gallery.php"><i class="fa fa-fw fa-photo"></i> Gallery</a>
        <a <?=(basename($_SERVER["SCRIPT_FILENAME"])=="contact.php"?"class='active'":"")?> href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <?php
        if (login_check($mysqli) == true){
            if ($_SESSION['level']==1){
            ?>
            <a <?=(basename($_SERVER["SCRIPT_FILENAME"])=="admin.php"?"class='active'":"")?> href="admin.php"><i class="fa fa-fw fa-cogs"></i> Admin</a>
            <?php
            }
            if ($_SESSION['level']==0){
                ?>
                <a <?=(basename($_SERVER["SCRIPT_FILENAME"])=="admin.php"?"class='active'":"")?> href="user.php"><i class="fa fa-fw fa-cogs"></i> User Profile</a>
                <?php
            }
        }
        ?>
    </div>
</div>