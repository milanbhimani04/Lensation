
<?php 
    require_once"connection.php";
    require_once"userquery.php"; 
    $_SESSION['page']="usermaster";

    if($_SESSION['userid']=="")
    {
        header('location:index.php');
    }
?>

<html>

<?php require_once"head.php"; ?>

  

<body onload="getdata('<?php echo $_SESSION['identity']; ?>')";>

<?php require_once"menu.php"; ?>

<?php require_once"subheader.php"?>


<section class="section-padding">
        <div class="container" id="missdata">
            <div class="row">
                
                <div class="col-md-4" onclick="getdata('profile')">
                    <div class="blog-style">
                        <a class="blog-img"><img src="img/kisspng.png" class="img-fluid" alt=""></a>
                        <center>
                            <div class="desc">
                                <h3>PROFILE</h3>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-style" onclick="getdata('changepass')">
                        <a class="blog-img"><img src="img/blog/01.jpg" class="img-fluid" alt=""></a>
                        <center>
                            <div class="desc">
                                <h3>CHANGE PASSWORD</h3>
                            </div>
                        </center>
                    </div>
                </div>

            </div>
        </div>
</section>
    



<?php require_once"footer.php";?>
<?php require_once"script.php"; ?>

</body>
</html>

