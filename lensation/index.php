<?php require_once"connection.php"; 

$_SESSION['page']="home";

?>

<!DOCTYPE html>
<html lang="zxx">

<?php require_once"head.php"; ?>

<body onload="getindex('index','display',0);">

    <div class="loading">
        <div class="text-center middle">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <?php require_once"menu.php";?>

    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            <div class="text-right item bg-img" data-overlay-dark="3" data-background="img/11.jpg">
                <div class="v-middle caption mt-30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="o-hidden">
                                    <h4>Agency Owner</h4>
                                    <h1>Vika Spring</h1>
                                    <p>We are professional photography agency</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-right item bg-img" data-overlay-dark="5" data-background="img/wedding_slider.jpg">
                <div class="v-middle caption mt-30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="o-hidden">
                                    <h4>Wedding Shots</h4>
                                    <h1>Nata & Robert</h1>
                                    <p>Happiness for a lifetime</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right item bg-img" data-overlay-dark="3" data-background="img/unsplash1.jpg">
                <div class="v-middle caption mt-30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="o-hidden">
                                    <h4>Plumeria</h4>
                                    <h1>Frangipani</h1>
                                    <p>Human is beautiful, perfect is boring</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="left-panel">
            <div class="left-txt">
                <!-- <a href="#" target="_blank">Behance</a> <span>-</span> -->
                <a href="#" target="_blank">Facebook</a> <span>-</span>
                <a href="#" target="_blank">Twitter</a> <span>-</span>
                <a href="#" target="_blank">Instagram</a>
            </div>
        </div>
    </header>



    <section class="container-fluid jophoto-gallery section-padding mb-30">
        <div class="container">

            <center>
                <header class="header slider-fade" style="height: 10px; width: 600px;">
                    <div class="owl-carousel owl-theme">
                        <?php
                    $data=$con->query("select * from advertisement order by advertisementid desc");
                    while($row=mysqli_fetch_array($data))
                        {
                        ?>
                            <div class="text-right item bg-img" data-overlay-dark="3" data-background="">
                                <img class="Advert" src="<?php echo "../admin_lensation/".$row[1]; ?>" alt="">   
                            </div>
                            <?php
                        }
                        ?>
                    </div>



                </header>
                
            </center>

            </br>
            </br>


            <div class="row jophoto-photos" id="jophoto-section-photos">
                <div class="row" id="missindex">



                </div>
            </div>
            <div class="col-md-6 mood" href="viewall.php">

                    <li><a href="viewall.php"> <button type="" name="" value="" class="butn-dark btn btn-block">View
                                All</button></a>
                    </li>

                </div>

        </div>

    </section>

    


    <?php require_once"footer.php";?>

    <?php require_once"script.php"; ?>
</body>



</html>