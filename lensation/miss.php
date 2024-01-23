<?php
require_once"connection.php";

if($_REQUEST['what']!="")
{
$_SESSION['identity']=$_REQUEST['what'];
}
// print_r($_REQUEST);



// user dashboard

if($_REQUEST['what']=="dashboard" && $_SESSION['who']=="user")
{
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 col-sm-0">
            </div>

            <div class="col-md-10 col-sm-0 p-3 m-0 hlt">
                <div class="row mt-3 mb-3">

                    <div class="col-md-4">
                        <div class="blog-style">
                            <center>
                            <?php
                                $data=$con->query("select count(*) from download where user_userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);
                            ?>
                            <a class="blog-img" style="height: 180px;width:180px;border-radius:100px;background-color: black;"><p style="font-size: 70px; color: white; padding-top: 40px;"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <p style="color: #9c5451; font-size: 20px;">My Download</p>
                            </div>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="blog-style">
                            <center>
                            <?php

                                $data=$con->query("select count(*) from pinpost where user_userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);

                            ?>
                            <a class="blog-img" style="height: 180px;width:180px;border-radius:100px;background-color: #b90600;"><p style="font-size: 70px; color: white; padding-top: 40px;"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <p style="color: #9c5451; font-size: 20px;">My Favorite</p>
                            </div>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="blog-style">
                            <center>
                            <?php

                                $data=$con->query("select count(*) from follower where user_userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);

                            ?>
                            <a class="blog-img" style="height: 180px; width:180px; border-radius:100px; background-color: green;"><p style="font-size: 70px; color: white; padding-top: 40px;"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <p style="color: #9c5451; font-size: 20px;">Following</p>
                            </div>
                            </center>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="col-md-1 col-sm-0">
    </div>



<?php
}

// end user dashboard









// subcompany 1 dashboard

if($_REQUEST['su']=="followers" && $_REQUEST['tamekon']=="company")
{
    ?>
    <div class="row">
            <div class="col-md-1 col-sm-0">
            </div>

            <div class="col-md-10  col-sm-0 p-3 m3 hlt">
                <div class="row mt-3 mb-3">

                    <div class="col-md-12 mb-3">
                        <h3 style="color: black;">Followers</h3>
                    </div>

                    <div class="col-md-12" style="height: 500px; overflow-x: scroll; overflow-y: none;">
                        <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
                        <tr class="paple">
                            <th>Profile</th>
                            <th>Name</th>

                        </tr>
                        <?php
                        $data=$con->query("select * from follower where userid='$_REQUEST[tamaroid]'");
                        while($row=mysqli_fetch_array($data))
                        {
                            $data1=$con->query("select * from user_register where userid='$row[0]'");
                            $row1=mysqli_fetch_array($data1)
                        ?>
                        <tr>
                            <td><img style="max-height: 70px; max-width: 70px;" src="<?php echo $row1[5];?>"></td>
                            <td><?php echo $row[0];?></td>

                        </tr>
                          <?php
                            }
                          ?>
                        </table>
                    </div>


                </div>

            </div>




        </div>
    <?php
}




// subcompany 2 dashboard

if($_REQUEST['su']=="likee" && $_REQUEST['tamekon']=="company")
{
    ?>
    <div class="row">
            <div class="col-md-1 col-sm-0">
            </div>

            <div class="col-md-10  col-sm-0 p-3 m3 hlt">
                <div class="row mt-3 mb-3">

                    <div class="col-md-12 mb-3">
                        <h3 style="color: black;">Likes</h3>
                    </div>

                    <div class="col-md-12" style="height: 500px; overflow-x: scroll; overflow-y: none;">
                        <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">

                        <tr class="paple">
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Photo</th>

                        </tr>
                        <?php
                        $data=$con->query("select l.*,p.* from likee as l,posting as p where l.postid=p.postid and l.userid='$_REQUEST[tamaroid]'");
                        while($row=mysqli_fetch_array($data))
                        {
                            $data1=$con->query("select * from user_register where userid='$row[0]'");
                            $row1=mysqli_fetch_array($data1)
                        ?>
                        <tr>
                            <td><img style="max-height: 70px; max-width: 70px;" src="<?php echo $row1[5];?>"></td>
                            <td><?php echo $row[0];?></td>
                            <td><img style="max-height: 70px; max-width: 70px;" src="<?php echo $row[14];?>"></td>

                        </tr>
                          <?php
                            }
                          ?>
                        </table>
                    </div>


                </div>

            </div>




        </div>
    <?php
}





// Company dashboard

if($_REQUEST['what']=="dashboard" && $_SESSION['who']=="company")
{
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 col-sm-0">
            </div>

            <div class="col-md-10 col-sm-0 p-3 m-0 hlt">
                <div class="row mt-3 mb-3">

                    <div class="col-md-4">
                        <div class="blog-style">
                            <center>
                            <?php
                                $data=$con->query("select count(*) from follower where userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);
                            ?>
                            <a class="blog-img" onclick="getuserdata('followers','<?php echo $_SESSION['who']?>','<?php echo $_SESSION['userid']?>')" style="height: 180px;width:180px;border-radius:100px;background-color: black;"><p class="dash"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <h4 style="color: #9c5451;">Followers</h4>
                            </div>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="blog-style">
                        <center>
                            <?php

                                $data=$con->query("select count(*) from likee where userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);

                            ?>
                            <a class="blog-img" onclick="getuserdata('likee','<?php echo $_SESSION['who']?>','<?php echo $_SESSION['userid']?>')" style="height: 180px;width:180px;border-radius:100px;background-color: #b90600;"><p class="dash"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <h4 style="color: #9c5451;">Like</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="blog-style">
                            <center>
                            <?php

                                $data=$con->query("select count(*) from posting where userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);

                            ?>
                            <a class="blog-img" style="height: 180px;width:180px;border-radius:100px;background-color: green;" onclick="getdata('post','company')"><p class="dash"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <h4 style="color: #9c5451;">Upload</h4>
                            </div>
                            </center>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="col-md-1 col-sm-0">
    </div>


    <div class="container-fluid mt-3" id="missuserdata">

    </div>
    <div class="col-md-1 col-sm-0">
    </div>




<?php

}

// end company dashbord







// subdesigner 1 dashboard

if($_REQUEST['su']=="followers" && $_REQUEST['tamekon']=="designer")
{
    ?>
    <div class="row">
            <div class="col-md-1 col-sm-0">
            </div>

            <div class="col-md-10  col-sm-0 p-3 m3 hlt">
                <div class="row mt-3 mb-3">

                    <div class="col-md-12 mb-3">
                        <h3 style="color: black;">Followers</h3>
                    </div>

                    <div class="col-md-12" style="height: 500px; overflow-x: scroll; overflow-y: none;">
                        <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
                        <tr class="paple">
                            <th>Profile</th>
                            <th>Name</th>

                        </tr>
                        <?php
                        $data=$con->query("select * from follower where userid='$_REQUEST[tamaroid]'");
                        while($row=mysqli_fetch_array($data))
                        {
                            $data1=$con->query("select * from user_register where userid='$row[0]'");
                            $row1=mysqli_fetch_array($data1)
                        ?>
                        <tr>
                            <td><img style="max-height: 70px; max-width: 70px;" src="<?php echo $row1[5];?>"></td>
                            <td><?php echo $row[0];?></td>

                        </tr>
                          <?php
                            }
                          ?>
                        </table>
                    </div>


                </div>

            </div>




        </div>
    <?php
}




// subdesigner 2 dashboard

if($_REQUEST['su']=="likee" && $_REQUEST['tamekon']=="designer")
{
    ?>
    <div class="row">
            <div class="col-md-1 col-sm-0">
            </div>

            <div class="col-md-10  col-sm-0 p-3 m3 hlt">
                <div class="row mt-3 mb-3">

                    <div class="col-md-12 mb-3">
                        <h3 style="color: black;">Likes</h3>
                    </div>

                    <div class="col-md-12" style="height: 500px; overflow-x: scroll; overflow-y: none;">
                        <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
                        <tr class="paple">
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Photo</th>

                        </tr>
                        <?php
                        $data=$con->query("select l.*,p.* from likee as l,posting as p where l.postid=p.postid and l.userid='$_REQUEST[tamaroid]'");
                        while($row=mysqli_fetch_array($data))
                        {
                            $data1=$con->query("select * from user_register where userid='$row[0]'");
                            $row1=mysqli_fetch_array($data1)
                        ?>
                        <tr>
                            <td><img style="max-height: 70px; max-width: 70px;" src="<?php echo $row1[5];?>"></td>
                            <td><?php echo $row[0];?></td>
                            <td><img style="max-height: 70px; max-width: 70px;" src="<?php echo $row[14];?>"></td>

                        </tr>
                          <?php
                            }
                          ?>
                        </table>
                    </div>


                </div>

            </div>




        </div>
    <?php
}




// designer dashboard

if($_REQUEST['what']=="dashboard" && $_SESSION['who']=="designer")
{

?>
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-md-1 col-sm-0">
            </div>

            <div class="col-md-10 col-sm-0 p-3 m-0 hlt">
                <div class="row mt-3 mb-3">

                    <div class="col-md-4">
                        <div class="blog-style">
                            <center>
                            <?php
                                $data=$con->query("select count(*) from follower where userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);
                            ?>
                            <a class="blog-img" onclick="getuserdata('followers','<?php echo $_SESSION['who']?>','<?php echo $_SESSION['userid']?>')" style="height: 180px;width:180px;border-radius:100px;background-color: black;"><p class="dash"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <h4 style="color: #9c5451;">Followers</h4>
                            </div>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="blog-style">
                            <center>
                            <?php

                                $data=$con->query("select count(*) from likee where userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);

                            ?>
                            <a class="blog-img" onclick="getuserdata('likee','<?php echo $_SESSION['who']?>','<?php echo $_SESSION['userid']?>')" style="height: 180px;width:180px;border-radius:100px;background-color: #b90600;"><p class="dash"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <h4 style="color: #9c5451;">Like</h4>
                            </div>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="blog-style">
                            <center>
                            <?php

                                $data=$con->query("select count(*) from posting where userid='$_SESSION[userid]'");
                                $row=mysqli_fetch_array($data);

                            ?>
                            <a class="blog-img" style="height: 180px;width:180px;border-radius:100px;background-color: green;" onclick="getdata('post','designer')"><p class="dash"><?php echo $row[0];?></p></a>

                            <div class="col-md-6 mt-3">
                                <h4 style="color: #9c5451;">Upload</h4>
                            </div>
                            </center>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="col-md-1 col-sm-0">
    </div>


    <div class="container-fluid mt-3" id="missuserdata">

    </div>
    <div class="col-md-1 col-sm-0">
    </div>




<?php

}

// end designer dashbord







// index page

if($_REQUEST['what']=="index")
{
    if($_REQUEST['suu']=="like")
    {
        $in=$con->query("insert into likee value('$_REQUEST[uuid]','$_REQUEST[ref]','$_REQUEST[uid]',$_REQUEST[pid],0)");
    }
    if($_REQUEST['suu']=="unlike")
    {
        $in=$con->query("delete from likee where user_userid like '$_REQUEST[uuid]' and reference like '$_REQUEST[ref]' and userid like '$_REQUEST[uid]' and postid like $_REQUEST[pid]");
    }
    if($_REQUEST['suu']=="download")
    {
        $in=$con->query("insert into download value('$_REQUEST[uuid]','$_REQUEST[ref]','$_REQUEST[uid]',$_REQUEST[pid],0,1)");
    }
    if($_REQUEST['action']=="search")
    {
        $data=$con->query("select p.*,sc.*,c.* from posting as p,subcategory as sc,category as c where p.subcategoryid=sc.subcategoryid and p.categoryid=c.categoryid and p.categoryid=sc.categoryid and sc.categoryid=c.categoryid and sc.name like '%$_REQUEST[id]%' or p.subcategoryid=sc.subcategoryid and p.categoryid=c.categoryid and p.categoryid=sc.categoryid and sc.categoryid=c.categoryid and c.name like '%$_REQUEST[id]%' order by rand() limit 0,51");
    }else{
        $data=$con->query("select * from posting limit 0,51");
    }
    while($row=mysqli_fetch_array($data))
            {
            ?>
                <div class="col-md-4" data-animate-effect="fadeInUp">
                    <div class="d-block jophoto-photo-item">
                    <img src="<?php echo $row[9]; ?>" alt="Image"
                            class="img-fluid">
                        <div class="row photo-text-more">
                            <div class="col-md-12 lp">
                                <div class="row xyz">
                                    <p class="col-md-8 pt-2 kkd"><?php echo $row[7]; ?></p>
                                    <div class="col-md-3 p-0 pt-2 ml-4 rkd">

                                        <!-- <form action="" method="post" name="abc"> -->
                                        <?php
                                        $like=$con->query("select * from likee where user_userid like '$_SESSION[userid]' and reference like '$row[0]' and userid like '$row[1]' and postid like $row[6]");
                                        $like=mysqli_fetch_array($like);
                                        if($like[0]=="")
                                        {
                                        ?>
                                            <div class="col-md-3 rkd" onclick="likepost('<?php echo $_SESSION['userid']; ?>','<?php echo $row[0]; ?>','<?php echo $row[1]; ?>','<?php echo $row[6]; ?>','index','like');">
                                                <button class="tx"><i class="far fa-heart" style="color: #fff;"></i></button>
                                            </div>
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <div class="col-md-3 rkd" onclick="likepost('<?php echo $_SESSION['userid']; ?>','<?php echo $row[0]; ?>','<?php echo $row[1]; ?>','<?php echo $row[6]; ?>','index','unlike');">
                                            <button class="tx"><i class="fas fa-heart" style="color: red;"></i></button>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <!-- </form> -->


                                    </div>
                                    <!-- <p class="col-md-12 abc">savan</p> -->
                                </div>
                                <div class="row asd">
                                    <p class="col-md-5 ml-2 abc d-flex align-items-end"
                                        onclick="window.location.href='photodetail.php?ref=<?php echo $row[0]; ?>&id=<?php echo $row[6] ?>&uid=<?php echo $row[1] ?>';">
                                        <?php if($row[0]=="company"){$data1=$con->query("select * from company_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];}else{$data1=$con->query("select * from designer_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];} ?>
                                    </p>
                                    <p class="col-md-5 ml-2 abc cba d-flex align-items-end">
                                        <a class="yas" href="<?php echo $row[9]; ?>" download="<?php echo rand(0,9)."_".chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(65,90)).rand(0,9).rand(0,9)." - LENSATION"; ?>" onclick="likepost('<?php echo $_SESSION['userid']; ?>','<?php echo $row[0]; ?>','<?php echo $row[1]; ?>','<?php echo $row[6]; ?>','index','download');"><i class="ti-download"></i></a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <?php
            }

}

// end index








//change password
?>
<?php
if($_REQUEST['what']=="changepass" && $_SESSION['who']=="user")
{
?>
<div class="col-md-2"></div>
<div class="col-md-4 pt-30 hlt">
    <p class="lgb">
        CHANGE PASSWORD
    </p>
    <p>.</p>

    <form action="" method="post" name="changepassword" id="loginform" onsubmit="return checkps();">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="currentpass" class="form-control" name="curpassword" placeholder="Current Password"
                        required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('curpassword');"></i>
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="newpass" class="form-control" name="newpassword"
                        placeholder="New Password" required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('newpassword');"></i>
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="conpass" class="form-control" name="conpassword"
                        placeholder=" Confirm New Password" required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('conpassword');"></i>
                </div>



                <div class="form-group col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="chpass" value="submit" class="butn-dark btn btn-block">Chnage
                                Password</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php

}

//end change password
?>




<?php

    if($_REQUEST['what']=="profile" && $_SESSION['who']=="user")
    {

//start profile
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-3 m-0 hlt">
            <div class="coml-md-8 row">
                <div>
                    <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;"> Profile</h4>


                    <img src="<?php echo $_SESSION['profile']; ?>" class="imgsize" alt="member"
                        style="border-radius: 50%; height:150px;"></img>
                </div>


                <div class="caption namespace">
                    <div class="viewer_header ml-2">
                        <h4><?php echo ucwords($_SESSION['name'])?></h4>
                        <p><?php echo $_SESSION['userid']?></p>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" name="btnsubmit" value="submit" class="butn-dark btn btn-block" onclick="getdata('editprofile')"> Edit Profile</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div> </br> </br>

        <form class="" action=" " method="post" id="" name="" onsubmit="return ">
                <div class="col-md-8 input-group">
                    <input type="password" class="form-control" id="showpass" disabled name="showpassword"
                        placeholder="Enter Password" value="<?php echo $_SESSION['password'];?>" required=""
                        pattern="^[a-zA-Z0-9]*$">
                        <i class="ti-eye input-group-text" onclick="hideshow('showpassword');"></i>
                </div>

                <div class="col-md-12 mt-4">
                    <input type="date" class="form-control-sm mb-4" id="bdate" disabled value="<?php echo $_SESSION['bdate'];?>"
                        name="bdate" required="">
                </div>

        </form>
    </div>
</div>

<?php
}
//end profile
?>







<?php

    if($_REQUEST['what']=="editprofile" && $_SESSION['who']=="user")
    {

        // session_start();
        // if(isset($_REQUEST['profile']))
        // {
        //     $_SESSION['name'] = $_REQUEST['name'];
        //     $_SESSION['bdate'] = $_REQUEST['bdate'];
        //     echo "====================------------------------------------------";
        // }

        $name = $date = "";
        $name = $_SESSION['name'];
        $date = $_SESSION['bdate'];
//start edit profile
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-4 hlt">
            <div class="coml-md-8 row">
            <div>
                <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;"> Profile</h4>

                <img src="<?php echo $_SESSION['profile'];?>" class="imgsize" alt="member"
                    style="border-radius: 50%; height:150px;"></img>

            </div>

            <div class="caption namespace">
                    <div class="viewer_header ml-2">


                        <div class="row">
                            <div class="col-md-12">

                            <form class="" action="" enctype="multipart/form-data" method="post" name="chpic">
                            <label for="">Choose Profile</label>
    							<input type="file" class="form-control p-0 m-0" id="file" name="changeprofilepic" required="" >
                                <button type="submit" name="btnchangepic" value="submit" class="butn-dark btn btn-block">Change photo</button>
                            </form>
                            </div>

                        </div>
                    </div>
            </div>

         </div> </br> </br>

         <form class="" action="" method="post" id="" name="" onsubmit="return">

                 <!-- <div class="col-md-8 mt">
                    <input type="email" class="form-control-sm" id="email" placeholder="Userid"
                        value="<?php echo $_SESSION['userid'];?>" required="">
                </div> -->

                <!-- <div class="col-md-8 input-group">
                    <input type="password" class="form-control" id="copypass" name="copypassword"
                        placeholder="Enter Password" value="<?php echo $_SESSION['password'];?>" required=""
                        pattern="^[a-zA-Z0-9]*$">
                        <i class="ti-eye input-group-text" onclick="hideshow('copypassword');"></i>
                </div> -->

                <div class="col-md-8">
                    <input type="text" class="form-control-sm" name="changename" id="name" value="<?php echo $name;?>"
                        placeholder="Name" required="">
                </div>

                <div class="col-md-12 mt-4">
                    <input type="date" class="form-control-sm" name="bdate" id="bdate" value="<?php echo $date;?>"
                        name="bdate" required="">
                </div></br>

                <div class="row p-3">
                    <div class="col-md-3">
                        <button type="submit" name="profile" value="submit" onclick="getdata('profile')" class="butn-dark btn btn-block">Save</button>
                    </div>
                    <div class="col-md-3">
                        <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                    </div>
                </div>


        </div>
        </form>
    </div>
</div>

 <!-- end edit profile -->














 <?php
    }

//start insert rate

if($_REQUEST['why']=="rate")
{
    // print_r($_REQUEST);
    $id=$_SESSION['postid'];
    // echo $id;
    $id1=$_SESSION['userid'];
    // echo $id1;
    $data=$con->query("select * from rate where user_userid like '$id1' and postid like '$id'");

    $row=mysqli_fetch_array($data);
    if($_REQUEST['ketla']!=0)
    {
        if($row[0]=="")
        {
            $hyy=$_SESSION['ref'];
            //echo $hyy;
            $id4=$_SESSION['ucdid'];
            //echo $id4;
            $kon=$_REQUEST['kon'];
            //echo $kon;
            $id=$_SESSION['postid'];
            //echo $id;
            $id1=$_SESSION['userid'];
            // echo $id1;

            $in=$con->query("insert into rate values('$id1','$hyy','$id4',$id,0,$_REQUEST[ketla])");
        }
        else
        {

            $up=$con->query("update rate set ratenumber='$_REQUEST[ketla]' where user_userid like '$id1' and postid like '$id'");


        }
            $oldrate=$_REQUEST['ketla'];
    }
    else
    {
        if($row[0]=="")
        {
            $oldrate=0;
        }
        else
        {
            $oldrate=$row[5];
        }
    }
?>
   <div class="modal-header">
            <h5 class="modal-title" style="color: #9c5451;" id="rateusLabel">Rate Us</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

    </div>
    <div class="modal-body">
            Your Rate Is Important For Us. Rate To Say Us Hows We Are !
            <br/><br/>
            <center>
            <?php
            for($i=1;$i<=5;$i++)
            {
                if($i<=$oldrate)
                {
                    ?>
                    <i style="padding: 0px 10px;font-size: 40px;color:#FBC206;" class="star fa fa-star filled" onclick="forrate('rate',<?php echo $_SESSION['postid']; ?>,'<?php echo $_SESSION['userid']; ?>',<?php echo $i; ?>);"></i>
                    <?php
                }
                else
                {
                    ?>
                    <i style="padding: 0px 10px;font-size: 40px;color:#FBC206;" class="star far fa-star" onclick="forrate('rate',<?php echo $_SESSION['postid'];?>,'<?php echo $_SESSION['userid'];?>',<?php echo $i; ?>);"></i>
                    <?php
                }
            }
            ?>
            <br/><br/>

            <form action="" method="POST">

                <div class="col-md-8 mt-4">
                    <label for="">Feedback</label>
                        <textarea name="review" id="" class="form-control" cols="20" rows="3" ></textarea>
                    </div>

                <button type="submit" name="rate" class="mt-2 ml-1 butn-dark btn btn-md  btn-theme-light-2 btn-rounded">submit</button>
            </form>
            </center>
    </div>
<?php
}

//end insert rate
?>








 <!-- captcha -->
<?php


if($_REQUEST['captcha']=="captcha")
{
    $scap="";
?>

<div>
    <div class="col-md-12 form-control m-0 ml-3" style="padding: 2px; font-size: 17px; background-image:url('img/42.jpg'); font-weight:bold; color:white;" disable>

        <span style="padding: 0px 15px; -webkit-transform: rotate(35deg)"><?php echo $ek=rand(0,9); ?></span>
        <span style="padding: 0px 15px; -webkit-transform: rotate(-30deg)"><?php echo $be=chr(rand(65,90)); ?></span>
        <span style="padding: 0px 15px; -webkit-transform: rotate(40deg)"><?php echo $tran=chr(rand(97,122)); ?></span>
        <span style="padding: 0px 15px; -webkit-transform: rotate(-25deg)"><?php echo $char=chr(rand(97,122));; ?></span>
        <span style="padding: 0px 15px; -webkit-transform: rotate(0deg)"><?php echo $pach=chr(rand(65,90)); ?></span>
        <span style="padding: 0px 15px; -webkit-transform: rotate(40deg)"><?php echo $chh=rand(0,9); ?></span>

    </div>
</div>



<div class="col-md-12 input-group m-0 mt-2" title="captcha" >
    <input type="text" class="" id="usercaptcha" placeholder="Enter Captcha" required="" autocomplete="off" >
</div>

<div class="col-md-12 mt-4 input-group" title="captcha" >
    <input type="hidden" value="<?php echo$ek.$be.$tran.$char.$pach.$chh ?>" class="form-control" id="systemcaptcha" required="">
</div>




<?php
}
?>

<!-- //end captcha -->





<!-- start designer_changepassword -->
<?php
if($_REQUEST['what']=="changepass" && $_SESSION['who']=="designer")
{
?>
<div class="col-md-2"></div>
<div class="col-md-4 pt-30 hlt">
    <p class="lgb">
        CHANGE PASSWORD
    </p>
    <p>.</p>

    <form action="" method="post" name="changepassword" id="loginform" onsubmit="return checkps();">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="currentpass" class="form-control" name="curpassword" placeholder="Current Password"
                        required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('curpassword');"></i>
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="newpass" class="form-control" name="newpassword"
                        placeholder="New Password" required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('newpassword');"></i>
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="conpass" class="form-control" name="conpassword"
                        placeholder=" Confirm New Password" required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('conpassword');"></i>
                </div>



                <div class="form-group col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="chpass" value="submit" class="butn-dark btn btn-block">Chnage
                                Password</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php

}

//end designer_change password
?>




<!-- company_change password -->
<?php
if($_REQUEST['what']=="changepass" && $_SESSION['who']=="company")
{
?>
<div class="col-md-2"></div>
<div class="col-md-4 pt-30 hlt">
    <p class="lgb">
        CHANGE PASSWORD
    </p>
    <p>.</p>

    <form action="" method="post" name="changepassword" id="loginform" onsubmit="return checkps();">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="currentpass" class="form-control" name="curpassword" placeholder="Current Password"
                        required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('curpassword');"></i>
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="newpass" class="form-control" name="newpassword"
                        placeholder="New Password" required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('newpassword');"></i>
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="password" id="conpass" class="form-control" name="conpassword"
                        placeholder=" Confirm New Password" required="" pattern="^[a-zA-Z0-9]*$">
                    <i class="ti-eye input-group-text" onclick="hideshow('conpassword');"></i>
                </div>



                <div class="form-group col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="cchpass" value="submit" class="butn-dark btn btn-block">Chnage
                                Password</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php

}

//company_end change password
?>



<?php

    if($_REQUEST['what']=="profile" && $_SESSION['who']=="company")
    {
        $data=$con->query("select * from company_register where userid like '$_SESSION[userid]'");
        $row=mysqli_fetch_array($data);

//comapny_start profile
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-3 m-0 hlt">
            <div class="coml-md-8 row">
                <div>
                    <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;"> Profile</h4>


                    <img src="<?php echo $row[3]; ?>" class="imgsize" alt="member"
                        style="border-radius: 50%; height:150px;"></img>
                </div>


                <div class="caption namespace">
                    <div class="viewer_header ml-2">
                        <h4><?php echo ucwords($row[2])?></h4>
                        <p><?php echo $row[0];?></p>

                        <div class="row">
                            <div class="col-md-8">
                                <button type="submit" name="btnsubmit" value="submit" class="butn-dark btn" onclick="getdata('editprofile')"> Edit Profile</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div> </br> </br>

            <form class="" action=" " method="post" id="" name="" onsubmit="return ">
                <div class="col-md-8 input-group">
                    <input type="password" class="form-control" id="showpass" disabled name="showpassword"
                        placeholder="Enter Password" value="<?php echo $_SESSION['password'];?>" required=""
                        pattern="^[a-zA-Z0-9]*$">
                        <i class="ti-eye input-group-text" onclick="hideshow('showpassword');"></i>
                </div>

                <div class="col-md-12 mt-4">
                    <input type="text" class="form-control-sm" id="" disabled name="location" required="" value="<?php echo $row[4];?>">
                </div>

                <div class="col-md-12 mt-4">
                    <input type="text" class="form-control-sm" id="" disabled name="contact" required="" value="<?php echo $row[5];?>">
                </div>

                <div class="col-md-12 mt-4">
                    <input type="text" class="form-control-sm" id="" disabled name="since" required="" value="<?php echo $row[6];?>">
                </div>


        </div>
        </form>
    </div>
</div>

<?php
}
//company_end profile
?>






<?php

    if($_REQUEST['what']=="editprofile" && $_SESSION['who']=="company")
    {

//start company_edit profile
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-4 hlt">
            <div class="coml-md-8 row">
            <div>
                <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;"> Profile</h4>

                <img src="<?php echo $_SESSION['logo'];?>" class="imgsize" alt="member"
                    style="border-radius: 50%; height:150px;"></img>

            </div>

            <div class="caption namespace">
                    <div class="viewer_header ml-2">


                        <div class="row">
                            <div class="col-md-12">

                            <form class="" action="" enctype="multipart/form-data" method="post" name="chpic">
                            <label for="">Choose Profile</label>
    							<input type="file" class="form-control p-0 m-0" id="file" name="changeprofilepic" required="" >
                                <button type="submit" name="btnchangephoto" value="submit" class="butn-dark btn" onclick="getdata('profile')">Change photo</button>
                            </form>
                            </div>

                        </div>
                    </div>
            </div>




            </div> </br> </br>
        <form class="" action="" method="post" enctype="multipart/form-data" id="" name="" onsubmit="return">
            <div>


                <div class="col-md-8">
                    <input type="text" class="form-control-sm" name="changename" id="name" value="<?php echo $_SESSION['name'];?>"
                        placeholder="Name" required="">
    </div>

                <div class="col-md-12 mt-4">
                    <input type="text" class="form-control-sm" name="changelocation" value="<?php echo $_SESSION['location'];?>">
                </div>

                <div class="col-md-12 mt-4">
                    <input type="text" class="form-control-sm" name="changecontact" value="<?php echo $_SESSION['contact'];?>">
                </div>

                <div class="col-md-12 mt-4">
                    <input type="text" class="form-control-sm" name="changesince" value="<?php echo $_SESSION['since'];?>">
                </div></br>

                <div class="row p-3">
                    <div class="col-md-3">
                        <button type="submit" name="upprofile" onclick="getdata('profile')" class="butn-dark btn btn-block">Save</button>
                    </div>
                    <div class="col-md-3">
                        <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                    </div>
                </div>


            </div>
        </form>
    </div>
</div>

<!-- end company_edit profile -->

<?php
}
?>





<!-- company_bank detail -->

<?php
if($_REQUEST['what']=="bank" && $_SESSION['who']=="company")
{
?>
<div class="col-md-2"></div>
<div class="col-md-4 pt-30 hlt">
    <p class="lgb ml-3">
        YOUR BANK DETAIL
    </p>
    <p class="ml-3">.</p>
    <?php
    $data=$con->query("select * from bank where userid like '$_SESSION[userid]' and reference like '$_SESSION[who]' order by bankid desc limit 1");
    // echo $data;
    $row=mysqli_fetch_array($data);

    ?>

    <label for="" class="ml-3">BANK NAME : </label><a href="" style="color: black;"> &nbsp;<?php echo $row[3]; ?></a></br>
    <label for="" class="ml-3">ACCOUNT NUMBER : </label><a href="" style="color: black;" > &nbsp;<?php echo $row[4]; ?></a></br>
    <label for="" class="ml-3">IFSC CODE : </label><a href="" style="color: black;" > &nbsp;<?php echo $row[5]; ?></a></br>
    <label for="" class="ml-3">SWIFT CODE : </label><a href="" style="color: black;" > &nbsp;<?php echo $row[6]; ?></a></br>

    <form action="" method="post" name="" id="loginform" onsubmit="return checkps();">
        <div class="row">
            <div class="col-md-12">

                <div class="form-group col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="done" value="submit" class="butn-dark btn btn-block" onclick="getdata('addbank','company')">Add Bank Acount
                            </button>
                        </div>
                        <!-- <div class="col-md-6">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php

}

//end company_bank detail
?>




<!-- company_bank detail creat-->

<?php
if($_REQUEST['what']=="addbank" && $_SESSION['who']=="company")
{
?>
<div class="col-md-2"></div>
<div class="col-md-4 pt-30 hlt">
    <p class="lgb">
        YOUR BANK DETAIL
    </p>
    <p>.</p>

    <form action="" method="post" name="changepassword" id="loginform" onsubmit="return checkps();">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-12 mt-4 input-group">
                    <input type="text" id="" class="form-control" name="name" placeholder="Enter Bank Name"
                        required="">
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="text" id="" class="form-control" name="acnumber"
                        placeholder="Acount Number" required="" >
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="text" id="" class="form-control" name="ifsc"
                        placeholder="IFSC Code">
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="text" id="" class="form-control" name="swiftcode"
                        placeholder="Swift Code">
                </div>



                <div class="form-group col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="done" value="submit" class="butn-dark btn btn-block" onclick="getdata('bank','company')">Done
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php

}

//end company_bank detail creat
?>






<?php

    if($_REQUEST['what']=="post" && $_SESSION['who']=="company")
    {
        if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from posting where postid=$_REQUEST[id]");

        }

//start company_post 1
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 col-sm-0">
        </div>
        <div class="col-md-10 col-sm-0 p-3 m-0 hlt">
            <div class="row">
                <div class="col-md-6 mt-2"><center>Photos</center>
                </div>
                <div class="col-md-6">
                    <button type="submit" name="" value="" class="butn-dark btn btn-block" onclick="getdata('addpost')">Add Post</button>
                </div>

                <div class="row jophoto-photos" id="jophoto-section-photos">
            <?php
            $data=$con->query("select * from posting where userid='$_SESSION[userid]' order by postid desc");
            while($row=mysqli_fetch_array($data))
            {

            ?>
                <div class="col-md-4">
                    <a class="d-block jophoto-photo-item"> <img src="<?php echo $row[9]; ?>" alt="Image" class="img-fluid">
                        <div class="row photo-text-more">
                           <div class="col-md-12 lp">
                                <div class="row xyz">
                                    <i class="col-md-8 pt-2 kkd"><?php echo $row[7]; ?></i>
                                    <div class="col-md-3 p-0 pt-2 ml-4 oiu">

                                        <button class="pinak">
                                            <i class="ti-trash" onclick="getdata('post','company',<?php echo $row[6]; ?>,'delete')"></i>
                                        </button>

                                    </div>
                                    <!-- <p class="col-md-12 abc">savan</p> -->
                                </div>
                                <div class="row pino">
                                    <p class="col-md-8 ml-2 abc d-flex align-items-end"
                                        onclick="window.location.href='photodetail.php?ref=<?php echo $row[0]; ?>&id=<?php echo $row[6] ?>&uid=<?php echo $row[1] ?>';">
                                        <?php if($row[0]=="company"){$data1=$con->query("select * from company_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];}else{$data1=$con->query("select * from designer_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];} ?>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </a>
                </div>


                <?php
            }
                ?>



            </div>

            </div>
        </div>
        <div class="col-md-1 col-sm-0">
        </div>


</div>

<?php
}
//end company_post 1
?>







<?php

    if($_REQUEST['what']=="addpost" && $_SESSION['who']=="company")
    {

//start company_post 2
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-4 hlt">
            <div class="coml-md-8 row">
                <div>
                    <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;">POST DETAIL</h4>
                </div>
            </div>

           </br>

            <form class="" action="" method="post" enctype="multipart/form-data" id="" name="" onsubmit="return checkpass();">
                <div>
                    <div class="col-md-8">
                    <label for="">Select Category</label>
                        <select class="form-control" name="categoryid" required="" onchange="combobox('subcategory',this.value)">
                           <option value="">-- Select Category --</option>
                           <?php
                               $data=$con->query("select * from category");
                               while($row1=mysqli_fetch_array($data))
                               {
                           ?>
                               <option value="<?php echo $row1[0];?>" <?php if($row1[0]==$row[0]) echo "selected" ?>><?php echo $row1[1]; ?></option>
                           <?php
                               }
                           ?>
                       </select>
                    </div>

                    <div class="col-md-8 mt-4">
                        <label for="">Select SubCategory</label>
                        <select class="form-control" name="subcategoryid" required="" id="subcategorydata">

                        <option value="">-- Select Subcategory --</option>

                       </select>
                    </div>

                    <div class="col-md-8 mt-4">
                        <label for="">Select Design Software</label>
                        <select class="form-control" name="design_softwareid" required="">
                                <option value="">--Select Design Software--</option>
                                <?php
                                    $data=$con->query("select * from design_software");
                                    while($row=mysqli_fetch_array($data))
                                    {
                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>

                    <div class="col-md-8 mt-4">
                        <label for="">Select Post Type</label>
                        <select class="form-control" name="posttypeid" required="">
                                <option value="">--Select Post Type--</option>
                                <?php
                                    $data=$con->query("select * from posttype");
                                    while($row=mysqli_fetch_array($data))
                                    {
                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>

                    <div class="col-md-8 mt-3">
                        <input type="text" id="" class="form-control" name="name" placeholder="Photo Name" required="">
                    </div>

                    <div class="col-md-8 mt-4">
                    <label for="">Description of Photo</label>
                        <textarea name="description" id="" class="form-control" cols="20" rows="3" ></textarea>
                    </div>

                    <div class="col-md-8 mt-4">
                    <label for="">Choose Photo</label>
                        <input type="file" class="form-control m-0" id="file" name="poster" required="">
                    </div>

                    <div class="col-md-8 mt-4">
                    <label for="">Choose Zip for Photo</label>
                        <input type="file" class="form-control  m-0" id="file" name="posterzip">
                    </div>

                    <div class="col-md-8 mt-3">
                        <input type="radio" value="0" name="coststatus" checked=""> Free
                                    &nbsp
                                    &nbsp
                                    &nbsp
                                    &nbsp
                                    &nbsp
                        <input type="radio" name="coststatus" value="1"> Premium
                    </div>

                    <div class="col-md-8 mt-4">
                        <input type="text" id="" class="form-control" name="amount" placeholder="Amount">
                    </div>

                    <div class="row p-3">
                        <div class="col-md-3">
                        <button type="submit" name="posted" class="butn-dark btn btn-block" onclick="getdata('post')">Share</button>
                        </div>
                        <div class="col-md-3">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>



<?php
}
?>






<!-- end company_post 2 -->





<!-- designer_bank detail -->

<?php
if($_REQUEST['what']=="bank" && $_SESSION['who']=="designer")
{
?>
<div class="col-md-2"></div>
<div class="col-md-4 pt-30 hlt">
    <p class="lgb ml-3">
        YOUR BANK DETAIL
    </p>
    <p class="ml-3">.</p>
    <?php
    $data=$con->query("select * from bank where userid like '$_SESSION[userid]' and reference like '$_SESSION[who]' order by bankid desc limit 1");
    $row=mysqli_fetch_array($data);
    ?>

    <label for="" class="ml-3">BANK NAME : </label><a href="" style="color: black;"> &nbsp;<?php echo $row[3]; ?></a></br>
    <label for="" class="ml-3">ACCOUNT NUMBER : </label><a href="" style="color: black;" > &nbsp;<?php echo $row[4]; ?></a></br>
    <label for="" class="ml-3">IFSC CODE : </label><a href="" style="color: black;" > &nbsp;<?php echo $row[5]; ?></a></br>
    <label for="" class="ml-3">SWIFT CODE : </label><a href="" style="color: black;" > &nbsp;<?php echo $row[6]; ?></a></br>


    <form action="" method="post" name="changepassword" id="loginform" onsubmit="return checkps();">
        <div class="row">
            <div class="col-md-12">

                <div class="form-group col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="done" value="submit" class="butn-dark btn btn-block" onclick="getdata('addbank','company')">Add Bank Acount
                            </button>
                        </div>
                        <!-- <div class="col-md-6">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php

}

//end designer_bank detail
?>




<!-- designer_bank detail creat-->

<?php
if($_REQUEST['what']=="addbank" && $_SESSION['who']=="designer")
{
?>
<div class="col-md-2"></div>
<div class="col-md-4 pt-30 hlt">
    <p class="lgb">
        YOUR BANK DETAIL
    </p>
    <p>.</p>

    <form action="" method="post" name="changepassword" id="loginform" onsubmit="return checkps();">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-12 mt-4 input-group">
                    <input type="text" id="" class="form-control" name="name" placeholder="Enter Bank Name"
                        required="">
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="text" id="" class="form-control" name="acnumber"
                        placeholder="Acount Number" required="" >
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="text" id="" class="form-control" name="ifsc"
                        placeholder="IFSC Code">
                </div>

                <div class="col-md-12 mt-4 input-group">
                    <input type="text" id="" class="form-control" name="swiftcode"
                        placeholder="Swift Code">
                </div>



                <div class="form-group col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="done" value="submit" class="butn-dark btn btn-block" onclick="getdata('bank','company')">Done
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
<?php

}

//end designer_bank detail creat
?>






<?php

    if($_REQUEST['what']=="post" && $_SESSION['who']=="designer")
    {

        if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from posting where postid=$_REQUEST[id]");
        }
//start designer_post 1
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 col-sm-0">
        </div>
        <div class="col-md-10 col-sm-0 p-3 m-0 hlt">
            <div class="row">
                <div class="col-md-6"><center>Photos</center>
                </div>
                <div class="col-md-6">
                    <button type="submit" name="" value="" class="butn-dark btn btn-block" onclick="getdata('addpost')">Add Post</button>
                </div>

                <div class="row jophoto-photos" id="jophoto-section-photos">
            <?php
            $data=$con->query("select * from posting where userid='$_SESSION[userid]' order by postid desc");
            while($row=mysqli_fetch_array($data))
            {

            ?>
                <div class="col-md-4">
                    <a class="d-block jophoto-photo-item"> <img src="<?php echo $row[9]; ?>" alt="Image" class="img-fluid">
                        <div class="row photo-text-more">
                           <div class="col-md-12 lp">
                                <div class="row xyz">
                                    <i class="col-md-8 pt-2 kkd"><?php echo $row[7]; ?></i>
                                    <div class="col-md-3 p-0 pt-2 ml-4 oiu">



                                        <button class="pinak">
                                                <i class="ti-trash" ondblclick="getdata('post','designer',<?php echo $row[6]; ?>,'delete')"></i>
                                            </button></i>


                                    </div>
                                    <!-- <p class="col-md-12 abc">savan</p> -->
                                </div>
                                <div class="row pino">
                                    <p class="col-md-8 ml-2 abc d-flex align-items-end"
                                        onclick="window.location.href='photodetail.php?ref=<?php echo $row[0]; ?>&id=<?php echo $row[6] ?>&uid=<?php echo $row[1] ?>';">
                                        <?php if($row[0]=="company"){$data1=$con->query("select * from company_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];}else{$data1=$con->query("select * from designer_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];} ?>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>


            </div>

        </div>
        <div class="col-md-1 col-sm-0">
        </div>


</div>

<?php
}
//end designer_post 1
?>







<?php

    if($_REQUEST['what']=="addpost" && $_SESSION['who']=="designer")
    {

//start designer_post 2
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-4 hlt">
            <div class="coml-md-8 row">
                <div>
                    <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;">POST DETAIL</h4>
                </div>
            </div>

           </br>

            <form class="" action="" method="post" enctype="multipart/form-data" id="" name="" onsubmit="return checkpass();">
                <div>
                    <div class="col-md-8">
                    <label for="">Select Category</label>
                        <select class="form-control" name="categoryid" required="" onchange="combobox('subcategory',this.value)">
                           <option value="">-- Select Category --</option>
                           <?php
                               $data=$con->query("select * from category");
                               while($row1=mysqli_fetch_array($data))
                               {
                           ?>
                               <option value="<?php echo $row1[0];?>" <?php if($row1[0]==$row[0]) echo "selected" ?>><?php echo $row1[1]; ?></option>
                           <?php
                               }
                           ?>
                       </select>
                    </div>

                    <div class="col-md-8 mt-4">
                        <label for="">Select SubCategory</label>
                        <select class="form-control" name="subcategoryid" required="" id="subcategorydata">

                        <option value="">-- Select Subcategory --</option>

                       </select>
                    </div>

                    <div class="col-md-8 mt-4">
                        <label for="">Select Design Software</label>
                        <select class="form-control" name="design_softwareid" required="">
                                <option value="">--Select Category--</option>
                                <?php
                                    $data=$con->query("select * from design_software");
                                    while($row=mysqli_fetch_array($data))
                                    {
                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>

                    <div class="col-md-8 mt-4">
                        <label for="">Select Post Type</label>
                        <select class="form-control" name="posttypeid" required="">
                                <option value="">--Select Post Type--</option>
                                <?php
                                    $data=$con->query("select * from posttype");
                                    while($row=mysqli_fetch_array($data))
                                    {
                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>

                    <div class="col-md-8 mt-3">
                        <input type="text" id="" class="form-control" name="name" placeholder="Photo Name" required="">
                    </div>

                    <div class="col-md-8 mt-4">
                    <label for="">Description of Photo</label>
                        <textarea name="description" id="" class="form-control" cols="20" rows="3" ></textarea>
                    </div>

                    <div class="col-md-8 mt-4">
                    <label for="">Choose Photo</label>
                        <input type="file" class="form-control m-0" id="file" name="poster" required="">
                    </div>

                    <div class="col-md-8 mt-4">
                    <label for="">Choose Zip for Photo</label>
                        <input type="file" class="form-control  m-0" id="file" name="posterzip">
                    </div>

                    <div class="col-md-8 mt-3">
                        <input type="radio" name="coststatus" value="0" checked=""> Free
                                    &nbsp
                                    &nbsp
                                    &nbsp
                                    &nbsp
                                    &nbsp
                        <input type="radio" name="coststatus" value="1"> Premium
                    </div>

                    <div class="col-md-8 mt-4">
                        <input type="text" id="" class="form-control" name="amount" placeholder="Amount">
                    </div>

                    <div class="row p-3">
                        <div class="col-md-3">
                        <button type="submit" name="posted" class="butn-dark btn btn-block" onclick="getdata('post')">Share</button>
                        </div>
                        <div class="col-md-3">
                            <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>



<?php
}
?>




<?php

if($_REQUEST['combo']=="subcategory")
{
    $data=$con->query("select * from subcategory where categoryid=$_REQUEST[comboid]");
    while($row1=mysqli_fetch_array($data))
    {
?>
    <option value="<?php echo $row1[1];?>" <?php if($row1[0]==$row[0]) echo "selected" ?>><?php echo $row1[2]; ?></option>
<?php
    }
}
?>

<!-- end designer_post 2 -->








<?php

    if($_REQUEST['what']=="profile" && $_SESSION['who']=="designer")
    {

//start designer_profile
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-3 m-0 hlt">
            <div class="coml-md-8 row">
                <div>
                    <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;"> Profile</h4>


                    <img src="<?php echo $_SESSION['profile']; ?>" class="imgsize" alt="member"
                        style="border-radius: 50%; height:150px;"></img>
                </div>


                <div class="caption namespace">
                    <div class="viewer_header ml-2">
                        <h4><?php echo ucwords($_SESSION['name'])?></h4>
                        <p><?php echo $_SESSION['userid']?></p>

                        <div class="row">
                            <div class="col-md-8">
                                <button type="submit" name="btnsubmit" value="submit" class="butn-dark btn btn-block" onclick="getdata('editprofile')"> Edit Profile</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div> </br> </br>

        <form class="" action=" " method="post" id="" name="" onsubmit="return ">
                <div class="col-md-8 input-group">
                    <input type="password" class="form-control" id="showpass" disabled name="showpassword"
                        placeholder="Enter Password" value="<?php echo $_SESSION['password'];?>" required=""
                        pattern="^[a-zA-Z0-9]*$">
                        <i class="ti-eye input-group-text" onclick="hideshow('showpassword');"></i>
                </div>

                <div class="col-md-12 mt-4">
                    <input type="date" class="form-control-sm mb-4" id="bdate" disabled value="<?php echo $_SESSION['bdate'];?>"
                        name="bdate" required="">
                </div>

        </form>
    </div>
</div>

<?php
}
//end designer_profile
?>







<?php

    if($_REQUEST['what']=="editprofile" && $_SESSION['who']=="designer")
    {

//start edit designer_profile
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-4 hlt">
            <div class="coml-md-8 row">
            <div>
                <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;"> Profile</h4>

                <img src="<?php echo $_SESSION['profile'];?>" class="imgsize" alt="member"
                    style="border-radius: 50%; height:150px;"></img>

            </div>

            <div class="caption namespace">
                    <div class="viewer_header ml-2">


                        <div class="row">
                            <div class="col-md-12">

                            <form class="" action="" enctype="multipart/form-data" method="post" name="chpic">
                            <label for="">Choose Profile</label>
    							<input type="file" class="form-control p-0 m-0" id="file" name="changeprofilepic" required="" >
                                <button type="submit" name="btnchangepost" value="submit" class="butn-dark btn btn-block">Change photo</button>
                            </form>
                            </div>

                        </div>
                    </div>
            </div>

         </div> </br> </br>

         <form class="" action=" " method="post" id="" name="" onsubmit="return">

                <div class="col-md-8">
                    <input type="text" class="form-control-sm" name="changename" id="name" value="<?php echo $_SESSION['name'];?>"
                        placeholder="Name" required="">
                </div>

                <div class="col-md-12 mt-4">
                    <input type="date" class="form-control-sm" name="bdate" id="bdate" value="<?php echo $_SESSION['bdate'];?>"
                        name="bdate" required="">
                </div></br>

                <div class="row p-3">
                    <div class="col-md-3">
                        <button type="submit" name="designerprofile" value="submit" onclick="getdata('profile')" class="butn-dark btn btn-block">Save</button>
                    </div>
                    <div class="col-md-3">
                        <button type="reset" value="cancel" class="butn-dark btn btn-block mb-10">Cancel</button>
                    </div>
                </div>


        </div>
        </form>
    </div>
</div>

<!-- //end edit designer_profile
<?php
}
?>


