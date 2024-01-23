<?php 
    require_once"connection.php"; 
    $_SESSION['page']="index";

    if($_SESSION['userid1'] !="")
    {
        header('location:dashboard.php');
    }


if(isset($_REQUEST['login']))
{
    //sql injection

    $userid=$con->real_escape_string($_REQUEST['userid']);
    $password=$con->real_escape_string($_REQUEST['password']);

    //echo $userid;
    //echo $password;

    //query wizard
    $data=$con->query("select * from admin_register where userid like '$userid' and password like '$password'");
    $row=mysqli_fetch_array($data);

    
    if($row[0]=="")
    {
       $flag=1;
    }
    else
    {
       //user info
       $_SESSION['userid1']=$row[0];
    //    $_SESSION['name']=$row[2];
       $_SESSION['lastlogintime']=$row[2];
       $_SESSION['password']=$row[1];
    //    $_SESSION['bdate']=$row[4];
    //    $_SESSION['profile']=$row[5];
       $_SESSION['identity']="dashboard";

       if(isset($_REQUEST['rem']))
        {
            setcookie("cuserid",$row[0]);
            setcookie("cpassword",$row[1]);

        }
        else
        {
            if(isset($_COOKIE['cuserid']))
            {
                setcookie("cuserid",$row[0],time()-60);
                setcookie("cpassword",$row[1],time()-60);
            }     
        }
        header('location:dashboard.php');
    }
}

?>



<!DOCTYPE html>
<html lang="en">


<?php require_once"head.php"; ?>

<body class="skin-default card-no-border">
    
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="" method="post">
                        <h3 class="text-center m-b-20">Sign In</h3>
                            <?php
                            if($flag==1)
                            {
                                    echo "<font color=red>Invalid User Id or password</font>";

                            }                    
                            
                            ?> 

                        <div class="form-group ">
                            <div class="col-xs-12">
                            <input type="email" class="form-control" id="email" name="userid" placeholder="name@domain.com" required="" value="
                                <?php
                                    if(isset($_COOKIE['cuserid']))
                                    {
                                        echo $_COOKIE['cuserid'];
                                    }             
                                ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                            <input type="password" id="lpassword" class="form-control"  name="password" placeholder="**********" required="" value="<?php if(isset($_COOKIE['cpassword'])){echo  $_COOKIE['cpassword'];} ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">

                                    <?php
                                    if(isset($_COOKIE['cuserid']))
                                    {
                                ?>

                                    <input type="checkbox" id="p-option-1" name="rem" checked>&nbsp;
    							    <label for="p-option-1" style="font-size :14px;">Remember Me?</label>
                                <?php
                                    }
                                    else
                                    {
                                    ?>    
                                    <input type="checkbox" id="p-option-1" name="rem">&nbsp;
    							    <label for="p-option-1" style="font-size :14px;">Remember Me?</label>
                                <?php       
                                    }
                                ?>      

                                    </div> 
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button name="login" class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                            </div>
                        </div>


                        <!-- <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <button class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>
                                    <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>
                                </div>
                            </div>
                        </div> -->


                        <!-- <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Don't have an account? <a href="pages-register.html" class="text-info m-l-5"><b>Sign Up</b></a>
                            </div>
                        </div> -->
                    </form>
                    <form class="form-horizontal" id="recoverform" action="http://eliteadmin.themedesigner.in/demos/bt4/crm/index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>



</html>