<?php
    if($_SESSION['page'] == "about"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/53.jpg" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>

<?php
    if($_SESSION['page'] == "usermaster"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/5.jpg" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                    <h4 style="color: #9c5451;">Welcome</h4>
                    <h1><?php echo strtoupper($_SESSION['name'])?></h1>
                    <p>[Last Seen: <?php echo $_SESSION['lastlogintime']; ?>] </p>
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>

<?php
    if($_SESSION['page'] == "contact"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/40.jpg" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                    <h5>Welcome</h5>
                    <h1>Contact-us</h1>
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>

<?php
    if($_SESSION['page'] == "bookmark"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/41.jpg" data-stellar-background-ratio="0">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                    <h5></h5>
                    <h1>Terms & Condition</h1>
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>

<?php
    if($_SESSION['page'] == "rating"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/38.jpg" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                    <h5>Welcome</h5>
                    <h3>dashboard</h3>
                    
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>


<?php
    if($_SESSION['page'] == "ourpartner"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/43.jpg" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                <h1>Our Partner</h1>
                    
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>


<?php
    if($_SESSION['page'] == "viewall"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/38.jpg" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                <h1>All Photos</h1>
                    
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>


<?php
    if($_SESSION['page'] == "photodetail"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="<?php if($_SESSION['ref']=="company"){ echo $row[18];} if($_SESSION['ref']=="designer"){echo $row[17];} ?>" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                <h1>Get to know us</h1>
                    
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>


<?php
    if($_SESSION['page'] == "ourpackage"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/58.jpg" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                    
                    <h1>Our Plan</h1>
                    
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>


<?php
    if($_SESSION['page'] == "packagedetail"){
?>
<header class="banner-header banner-img valign bg-img" data-overlay-light="0" data-background="img/70.jpg" data-stellar-background-ratio="0.4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-5 text-right caption mt-60 animate-box" data-animate-effect="fadeInUp">
                    
                    <h1>Secure payment</h1>
                    
                </div>
            </div>
        </div>
    </header>
<?php 
    }
?>