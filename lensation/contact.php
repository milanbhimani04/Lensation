<?php require_once"connection.php"; 
$_SESSION['page']="contact";
?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from duruthemes.com/demo/html/jopho/light/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 10:06:40 GMT -->
<?php require_once"head.php"; ?>

<body>
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
    <?php require_once"menu.php"; ?>
    <!-- Header -->
    <?php require_once"subheader.php"?>
    <!-- Contact -->
    <section class="section-padding">
        <div class="container">
            <div class="row mb-90">
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <h6>Contact Info</h6>
                    <p>Qualamy nisl sodales sit amet sapien id, placerat sodales orciter.
                        <br>Vivamus nec magna rhoncus felis, faucibus printy.</p>
                    <p><b>Phone :</b> +91 8401010141</p>
                    <p><b>Email :</b> lensationstudio@gmail.com</p>
                    <p><b>Address :</b> Shayona Plaza, varachha, Surat, Gujarat 395006.</p>
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    <h6>Contact Form</h6>
                    <p>Interested to work wiht us?</p>
                    <form method="post" class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" placeholder="Full Name"> </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" placeholder="Email" required=""> </div>
                        <div class="col-md-12">
                            <textarea name="message" id="message" cols="40" rows="4" placeholder="Message"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="butn-dark mt-10" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Map Section-->
            <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.2972546927026!2d72.75598101488531!3d21.140565485937934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0527dd042eae1%3A0x6722c564195d8058!2sBlue%20Ribbon!5e0!3m2!1sen!2sin!4v1612952839405!5m2!1sen!2sin" width="1920" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php require_once"footer.php";?>
    <!-- jQuery -->
    <?php require_once"script.php"; ?>
</body>


<!-- Mirrored from duruthemes.com/demo/html/jopho/light/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 10:06:41 GMT -->
</html>