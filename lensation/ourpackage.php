
<?php 
    require_once"connection.php";
    require_once"userquery.php"; 
    $_SESSION['page']="ourpackage";

?>

<html>

<?php require_once"head.php"; ?>

  
<body onload="getdata('<?php echo $_SESSION['identity']; ?>')";>

<?php require_once"menu.php"; ?>

<?php require_once"subheader.php"?>


<br/>
<br/>
<br/>
    
    <div class="container-fluid mb-30">
        <div class="row">

            <div class="col-md-2">
            </div>

            <div class="col-md-10">
                <div class="row">

                    <?php
                    $data = $con->query("select * from package");
                    while ($row = mysqli_fetch_array($data))
                    {
                    ?>

                    <div class="col-md-3 m-4">
                        <div class="">
                            <center style="box-shadow: 5px 5px 5px #999;">
                                <div class="tit p-2"><?php echo $row[1]; ?></div>   
                                <div class="isq">
                                    <div class="pt-4"><img src="<?php echo "../admin_lensation/".$row[2]; ?>"/></div>
                                    <div class="p-3">
                                            primeum
                                    </div>
                                    <div class="pb-3">
                                        <?php
                                        $data1 = $con->query("select * from package_rules where packageid=$row[0]");
                                        while ($row1 = mysqli_fetch_array($data1))
                                                echo $row1[2]."<br>";
                                        ?>
                                    </div>
                                </div>
                                <div class="tite p-2">
                                    <a href="packagedetail.php?id=<?php echo $row[0]; ?>">Buy Now</a>
                                </div>
                            </center>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                    

                </div>
            </div>

            <div class="col-md-2">
            </div>

         </div>
    </div>

    </br>
    </br>



<?php require_once"footer.php";?>
<?php require_once"script.php"; ?>

</body>
</html>

