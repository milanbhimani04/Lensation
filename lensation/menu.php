<?php require_once"connection.php"; ?>
<?php
    if($_SESSION['user_register']!="")
    {
    ?>
    <div id="tx" style="display: none;">

    </div>
    <?php
    }
    ?>

<nav class="navbar navbar-expand-lg">

        <div class="logo-wrapper valign">
            <div class="logo">
                <h2><a href="index.php" title='Just Go With The Colours'>Lensation</a><span>Photo Studio</span></h2>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><i class="ti-line-double"></i></span> </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="mavali"><i class="ti-search"></i></a></li>  
                <li class="nav-item"><input type="search" onkeyup="getindex('index','search',this.value);" class="form-control" style="border-radius : 50px; margin-top: 15px;" placeholder="Search & enter"></li>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <li class="nav-item"><a class="nav-link <?php if($_SESSION['page']=="home"){echo "active";}?>" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SESSION['page']=="about"){echo "active";}?>" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SESSION['page']=="ourpartner"){echo "active";}?>" href="ourpartner.php">Our Partner</a></li>
                <li class="nav-item"><a class="nav-link <?php if($_SESSION['page']=="ourpackage"){echo "active";}?>" href="ourpackage.php">Our Package</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="gallery.html">Category</a></li> -->
                <li class="nav-item"><a class="nav-link <?php if($_SESSION['page']=="contact"){echo "active";}?>" href="contact.php">Contact Us</a></li>
               <?php
               if($_SESSION['userid']==""){
                ?>
               
                <li><a href="login.php"> <button type="" name="login" value="" class="butn-dark btn btn-block">Login</button></a>
    			</li>
                <?php
                }
                else{
                    if($_SESSION['page']=="usermaster")
                    {
                        ?>
                    <li><a href="logout.php"> <button type="" name="logout" value="" class="butn-dark btn btn-block">Log out</button></a>
                    </li>
                    <?php
                    }
                    else
                    {
                        ?>
                    <li><a href="usermaster.php"> <button type="" name="logout" value="" class="butn-dark btn btn-block">Dashboard</button></a>
                    </li>
                    <?php
                    }
                    
                }
                ?>
               </i></span>
                    <ul class="dropdown-menu last">
                        <li class="dropdown-item"><a href="blog.html">Blog Page</a></li>
                        <li class="dropdown-item"><a href="post.html">Post Page</a></li>
                        <li class="dropdown-item"><a href="services-page.html">Services Page</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>