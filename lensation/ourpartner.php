
<?php 
    require_once"connection.php";
    require_once"userquery.php"; 
    $_SESSION['page']="ourpartner";

   
?>

<html>

<?php require_once"head.php"; ?>

  

<body onload="getdata('<?php echo $_SESSION['identity']; ?>')";>

<?php require_once"menu.php"; ?>

<?php require_once"subheader.php"?>


<br/><br/><br/><br/><br/><br/>
    
    <div class="container-fluid mb-30">
        <div class="row p-0 pl-3">

           
            <div class="col-md-2">
            </div>

            
                                    
            <div class="col-md-4">
                <div class="blog-style">
                    <center>
                    <a class="blog-img" style="height: 300px;width:300px;background-color:tomato;border-radius:20px"><img src="img/kisspng.png" class="img-fluid" alt=""></a>
                    
                    <div class="col-md-6">
                        <a href="designer_register.php">
                            <button type="btn" name="register" value="submit" class="butn-dark btn btn-block">Designer Registration</button>
                        </a>
                    </div>
                    </center>
                </div>
            </div>

            <div class="col-md-4">
                <div class="blog-style">
                    <center>
                    <a class="blog-img" style="height: 300px;width:300px;background-color:tomato;border-radius:20px"><img src="img/kisspng.png" class="img-fluid" alt=""></a>
                    
                        <div class="col-md-6">
                            <a href="company_register.php">
                                <button type="btn" name="register" value="submit" class="butn-dark btn btn-block">Company Registration</button>
                            </a>
                        </div>
    								
                    </center>
                </div>
            </div>

            
                                

            <div class="col-md-2">
            </div>

        </div>
    </div>
    

    <br/><br/><br/><br/>

<?php require_once"footer.php";?>
<?php require_once"script.php"; ?>

</body>
</html>

