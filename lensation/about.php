<?php require_once "connection.php";
$_SESSION['page'] = "about";
?>

<!DOCTYPE html>
<html lang="zxx">



<?php require_once "head.php"; ?>

<body>




    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .section-padding h6 {
            font-size: 19px;
        }
    </style>


    <!-- Loading -->
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
    <!-- Navbar -->

    <?php require_once "menu.php"; ?>

    <!-- Header Banner -->

    <?php require_once "subheader.php" ?>

    <!--  About -->
    <section class="section-padding mt-30 mb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7 mb-60">
                            <div class="row">
                                <div class="col-md-3 animate-box" data-animate-effect="fadeInUp"> <span
                                        class="line-one"></span> </div>
                                <div class="col-md-8 animate-box" data-animate-effect="fadeInUp">
                                    <h6>LENSATION STUDIO is a photography agency. LENSATION STUDIO makes creative
                                        photography shoots.</h6>
                                    <p>Vestibulum at scelerisque tellus. Mauris consequat, nibh varius interdum tempus,
                                        massa odio venenatis turpis, non iaculis nisi mi a sem. Cras sagittis enim sit
                                        amet nisi malesuada pellentesque. Etiam consequat ac lacus at condimentum.</p>
                                    <p>Quality sagittis enim sit amet nisi malesuada pellentesque. Etiam consequat ac
                                        lacus at condimentum.</p>
                                    <p>Cras commodo sodales ex, non consequat lacus dapibus sed. Suspendisse non laoreet
                                        nulla. Aliquam ultrices metus ac purus porta, a aliquam ante mattis. Proin in
                                        odio ultrices massa ultricies convallis id id erat.</p> <img src="img/sign.png"
                                        class="sign" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 animate-box" data-animate-effect="fadeInUp">
                            <div class="Florenceto-about-img">
                                <div class="img"> <img src="img/about.jpg" alt=""> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials -->
    <div class="testimonails bg-img section-padding" data-overlay-light="7" data-background="img/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center over  mt-30 mb-30">
                    <div class="owl-carousel owl-theme">
                        <div class="citem">
                            <div class="client-img"> <img src="img/team/t3.jpg" alt=""> </div>
                            <h5>Freida & Pablo</h5>
                            <h6>Wedding Shooting</h6>
                            <p>Fusce blandit leo quis nulla congue dictum a ac nulla. Mauris a turpis id ligula auctor
                                mattis. Suspendisse purus the justo hendrerit posuere lacinia dui. Nam lorem risus vel
                                turpis pretium dignissim fermentum enim.</p>
                        </div>
                        <div class="citem">
                            <div class="client-img"> <img src="img/team/t1.jpg" alt=""> </div>
                            <h5>Olivia & Enrico</h5>
                            <h6>Wedding Shooting</h6>
                            <p>Fusce blandit leo quis nulla congue dictum a ac nulla. Mauris a turpis id ligula auctor
                                mattis. Suspendisse purus the justo hendrerit posuere lacinia dui. Nam lorem risus vel
                                turpis pretium dignissim fermentum enim.</p>
                        </div>
                        <div class="citem">
                            <div class="client-img"> <img src="img/team/t2.jpg" alt=""> </div>
                            <h5>Eleanor & Stefano</h5>
                            <h6>Wedding Shooting</h6>
                            <p>Fusce blandit leo quis nulla congue dictum a ac nulla. Mauris a turpis id ligula auctor
                                mattis. Suspendisse purus the justo hendrerit posuere lacinia dui. Nam lorem risus vel
                                turpis pretium dignissim fermentum enim.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team -->
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-30">
                    <span class="section-subtitle">Senior</span>
                    <h2 class="section-title">Our Team</h2>
                </div>
            </div>



            <div class="row">

                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col item ">
                            <div class="card shadow-sm img">

                                <rect width="100%" height="100%" fill="#55595c">
                                    <img src="img/team/millan.jpeg" alt="">

                                </rect>

                                <div class="card-body">
                                    <h6 class="card-text">MILAN BHIMANI</h6>
                                    <p style="margin-bottom: 0px"> Portrait Photographer</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group social valign">
                                            <div class="full-width">
                                                <a href="#">
                                                    <p>milanbhimani@gmail.com</p>
                                                </a><br>
                                                <a href="#">
                                                    <i class="ti-facebook"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-twitter-alt"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col item ">
                            <div class="card shadow-sm img">

                                <rect width="100%" height="100%" fill="#55595c">
                                    <img src="img/team/nirali.jpeg" alt="">

                                </rect>

                                <div class="card-body">
                                    <h6 class="card-text">NIRALI BHINGRADIYA</h6>
                                    <p style="margin-bottom: 0px"> Wedding Photographer</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group social valign">
                                            <div class="full-width">
                                                <p>niralibhingradiya@gmail.com</p>
                                                <a href="#">
                                                    <i class="ti-facebook"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-twitter-alt"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col item ">
                            <div class="card shadow-sm img">

                                <rect width="100%" height="100%" fill="#55595c">
                                    <img src="img/team/mira.jpeg" alt="">

                                </rect>

                                <div class="card-body">
                                    <h6 class="card-text">MIRALI BORDA</h6>
                                    <p style="margin-bottom: 0px"> Wedding Photographer</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group social valign">
                                            <div class="full-width">
                                                <p>miraliborda@gmail.com</p>
                                                <a href="#">
                                                    <i class="ti-facebook"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-twitter-alt"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col item ">
                            <div class="card shadow-sm img">

                                <rect width="100%" height="100%" fill="#55595c">
                                    <img src="img/team/jonsy.jpeg" alt="">

                                </rect>

                                <div class="card-body">
                                    <h6 class="card-text">JONSY BALAR</h6>
                                    <p style="margin-bottom: 0px"> Wedding Photographer</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group social valign">
                                            <div class="full-width">
                                                <p>jonsybalar@gmail.com</p>
                                                <a href="#">
                                                    <i class="ti-facebook"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-twitter-alt"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php require_once "footer.php"; ?>

    <?php require_once "script.php"; ?>
</body>

<!-- Mirrored from duruthemes.com/demo/html/Florence/light/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 10:04:19 GMT -->

</html>








<!-- <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text> -->