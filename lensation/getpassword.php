<?php
require_once "connection.php";

if (isset($_REQUEST['getpassword'])) {
    $userid = $con->real_escape_string($_REQUEST['userid']);

    $data = $con->query("select * from user_register where userid like '$userid'");
    $row = mysqli_fetch_array($data);

    if ($row[0]=="") {
        $flag = 1;
    } else {
        $to=$row[0];
        $subject = " Lensation : Password";
        $body = "your password : $row[1]";
        if(mail($to,$subject,$body)) 
        {
            echo '<script> alert($to)</script>';
        }
        else
        {
            echo '<script> alert("SOMETHING WRONG")</script>';

        }
    }
}

?>

<html>

<?php require_once "head.php"; ?>

<body class="lbd">
    <?php require_once "menu.php"; ?>

    <div class="container-fluid">
        <section class="section-padding">
            <div class="container sp">
                <div class="row">
                    <div class="col-md-8 col-sm-0">
                        <span class="mt-100">
                            <h1 class="logwel">Welcome !</h1>
                        </span>
                        <h3>TO THE WORLD OF COLOURS.</h3>
                    </div>

                    <div class="col-md-4 bg p-4">
                        <p class="lgb">
                            LOGIN
                            <?php
                            if ($flag == 1) {
                                echo "<font color=red>Invalid User Id or password</font>";
                            }

                            ?>

                        </p>

                        <p class="m-0 p-0"></p>
                        <form action="" method="post" name="getpassword" id="loginform">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="email" class="form-control-sm" id="email" name="userid" placeholder="name@domain.com" required="">
                                </div>
                                <div class="form-group col-md-12 mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" name="getpassword" value="submit" class="butn-dark btn btn-block">Login</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                                        </div>
                                    </div>
                                    </br>
                                    <p class="text-center m-0 ifc">Don’t you have an account? <a href="register.php" class="ia">Create Here</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php require_once "script.php"; ?>

</body>

</html>