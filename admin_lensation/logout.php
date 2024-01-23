<?php 
    require_once"connection.php"; 
    date_default_timezone_set('Asia/Kolkata');
    
    $lastlogintime=date('Y-m-d h:i:s');

    $data=$con->query("update admin_register set lastlogintime='$lastlogintime' where userid like '$_SESSION[userid]'");
    unset($_SESSION['userid1']);
    unset($_SESSION['name']);
    unset($_SESSION['lastlogintime']);
    

    header('location:index.php');


?>