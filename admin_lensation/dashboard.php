<?php
require_once"connection.php";

require_once"query.php";
?>

<!DOCTYPE html>
<html lang="en">



<?php require_once"head.php"; ?>

<body class="skin-default-dark fixed-layout" onload="getdata('<?php echo $_SESSION['identity']; ?>','display',0);">

    <div id="main-wrapper">

        <?php require_once"header.php"; ?>

        <?php require_once"menu.php";?>

        <div class="page-wrapper">

                <div class="container-fluid ">
                    <div class="row" id="missdata">
                       
                    </div>
                </div>
                </br>





 <?php require_once"footer.php";?>

</body>



</html>