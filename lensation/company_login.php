
<?php 
    require_once"connection.php"; 
    $_SESSION['page']="login";

    if($_SESSION['userid']!="")
    {
        header('location:usermaster.php');
    }

if(isset($_REQUEST['login']))
{
    //sql injection

    $userid=$con->real_escape_string($_REQUEST['userid']);
    $password=$con->real_escape_string($_REQUEST['password']);

    //echo $userid;
    //echo $password;

    setcookie("block",$userid,time()+31556926,'/');

    //query wizard
    $data=$con->query("select * from company_register where userid like '$userid' and password like '$password'");
    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
       $flag=1;
       $data=$con->query("select * from company_register where userid like '$_COOKIE[block]'");
       $row=mysqli_fetch_array($data);

       if($row[0]!="")
       {
           echo "hi";
       }

    }
    else
    // {
    //    //user info
    //    $_SESSION['userid']=$row[0];
    //    $_SESSION['name']=$row[2];
    //    $_SESSION['lastlogintime']=$row[6];
    //    $_SESSION['password']=$row[1];
    //    $_SESSION['bdate']=$row[4];
    //    $_SESSION['profile']=$row[5];
    //    $_SESSION['identity']="dashboard";

    //    if(isset($_REQUEST['rem']))
    //     {
    //         setcookie("cuserid",$row[0]);
    //         setcookie("cpassword",$row[1]);

    //     }
    //     else
    //     {
    //         if(isset($_COOKIE['cuserid']))
    //         {
    //             setcookie("cuserid",$row[0],time()-60);
    //             setcookie("cpassword",$row[1],time()-60);
    //         }     
    //     }
    //     header('location:usermaster.php');
    // }
    $_COOKIE['block'];
}

?>

<html>

<?php require_once"head.php"; ?>

<body class="lbd">
<?php require_once"menu.php"; ?>

<div class="container-fluid" >
    <section class="section-padding">
        <div class="container sp">
            <div class="row">
                <div class="col-md-8 col-sm-0">
                <span class="mt-100"><h1 class="logwel">Welcome !</h1></span>
                    <h3>To THE WORLD OF COLOURS.</h3>
                </div>

                <div class="col-md-4 bg p-4">
                    <p class="lgb">
                    LOGIN
                    <?php
                    if($flag==1)
                    {
                            echo "<font color=red>Invalid User Id or password</font>";

                    }                    
                    
                    ?>
                    
                    </p>

                    <p class="m-0 p-0 lggb">Welcome Back, You are in safe hand.</p>
                    <form action="" method="post" name="login" id="loginform" >
						<div class="row">
                            <div class="col-md-12" >
    							<input type="email" class="form-control-sm" id="email" name="userid" placeholder="name@domain.com" required="" value="
                                <?php
                                    if(isset($_COOKIE['cuserid']))
                                    {
                                        echo $_COOKIE['cuserid'];
                                    }             
                                ?>">
    						</div>

                            <div class="col-md-12 mt-4 input-group">
    							<input type="password" id="lpassword" class="form-control"  name="password" placeholder="**********" required="" pattern="^[a-zA-Z0-9]*$" value="<?php if(isset($_COOKIE['cpassword'])){echo  $_COOKIE['cpassword'];} ?>">
                                <i class="ti-eye input-group-text" onclick="hideshow('login');"></i>
                            </div>
                                    
                            

                            <div class="col-md-6 mt-4">
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

                            <div class="col-md-6 text-right mt-4">
                                <label><a class="ia" href="getpassword.php" style="font-size :13px;">Forgot Password?</a></label>
                            </div>
    							
    						<div class="form-group col-md-12 mt-0">
    							<div class="row">    
    								<div class="col-md-6">
    									<button type="submit" name="login" value="submit" class="butn-dark btn btn-block">Login</button>
    								</div>
    								<div class="col-md-6">
    									<button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
    								</div>
    							</div>
                                </br>
    							<p class="text-center m-0 ifc">Don’t you have an account?          <a href="company_register.php" class="ia">Create Here</a></p>
    						</div>
                        </div>
					</form>
                </div>
            </div>   
        </div>
    </section>  
</div>
<?php require_once"script.php"; ?>

</body>
</html>

