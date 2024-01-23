<?php
    require_once "connection.php";

    $_SESSION['page']="photodetail";

    

    if($_REQUEST['ref']!="")
    {
        $_SESSION['ref']=$_REQUEST['ref'];
        $_SESSION['cdid']=$_REQUEST['id'];
        $_SESSION['ucdid']=$_REQUEST['uid'];
        $_SESSION['postid']=$_REQUEST['id'];
        // $_SESSION['userid']=$_REQUEST['uid'];

        header('location:photodetail.php');
    }
    if(isset($_REQUEST['rate']))
{
	$today=date('Y-m-d');
	$in=$con->query("insert into review values('$_SESSION[userid]','$_SESSION[ref]','$_SESSION[ucdid]',$_SESSION[postid],0,'$_REQUEST[review]','$today')");
}

    if($_SESSION['ref']=="company")
    {
        $data=$con->query("select cr.*,p.*,ds.* from company_register as cr,posting as p,design_software as ds where p.design_softwareid=ds.design_softwareid and cr.userid like '$_SESSION[ucdid]' and postid=$_SESSION[cdid]");
        $row=mysqli_fetch_array($data);
        $cat=$row[11];
    }

    if($_SESSION['ref']=="designer")
    {
        $data=$con->query("select dr.*,p.*,ds.* from designer_register as dr,posting as p,design_software as ds where p.design_softwareid=ds.design_softwareid and dr.userid like '$_SESSION[ucdid]' and postid=$_SESSION[cdid]");
        $row=mysqli_fetch_array($data);
        $cat=$row[10];
    }

    if(isset($_REQUEST['follower'])){
        $today=date('Y-m-d');
        $in=$con->query("insert into follower values('$_SESSION[userid]','$_SESSION[ref]','$_SESSION[ucdid]',0,'$today')");
    }

    if(isset($_REQUEST['unfollower']))
    {
        $del=$con->query("delete from follower where user_userid like '$_SESSION[userid]' and reference like '$_SESSION[ref]' and userid like '$_SESSION[ucdid]'");
    }

    if(isset($_REQUEST['pin'])){
        $in=$con->query("insert into pinpost values('$_SESSION[userid]','$_SESSION[cdid]',0)");
    }

    if(isset($_REQUEST['unpin']))
    {
        $del=$con->query("delete from pinpost where user_userid like '$_SESSION[userid]' and postid like '$_SESSION[cdid]'");
    }

    if((isset($_REQUEST['loginfollower'])) || (isset($_REQUEST['loginpin'])))
    {
        header('location: login.php');
    }
?>
<?php
if(isset($_REQUEST['delete'])){
    if($_SESSION['who']=="company"){
        $imgid = $_REQUEST['id'];
         $del=$con->query("delete from posting where  postid='$imgid' ");
         header('location:usermaster.php'); 
    } 
    // echo 'hello';
 }
?>
<html>

<?php require_once"head.php"; ?>

<?php require_once"menu.php"; ?>

<?php require_once"subheader.php"?>


<br />
<br />
<br />

<div class="container-fluid mb-30">
    <div class="row p-0 pl-3">

        <div class="col-md-1">

        </div>


        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php if($_SESSION['ref']=="company"){ echo $row[18];} if($_SESSION['ref']=="designer"){echo $row[17];} ?>"
                        alt="">
                </div>
                <div class="col-md-6">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 p-3 m-0">
                                <div class="row m-3">

                                    <h4 style="padding-left: px; padding-bottom:20px; color:#9c5451;">
                                        <?php echo $_SESSION['ref']." Profile"; ?></h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">

                                        <img src="<?php if($_SESSION['ref']=="company"){ echo $row[3];} if($_SESSION['ref']=="designer"){echo $row[5];} ?>"
                                            class="imgsize" alt="member"
                                            style="border-radius: 50%; height:150px;"></img>
                                    </div>

                                    <div class="col-md-8 caption">
                                        <div class="viewer_header">
                                            <h4 class="ml-2">
                                                <?php if($_SESSION['ref']=="company"){ echo $row[2];} if($_SESSION['ref']=="designer"){echo $row[2];} ?>
                                            </h4></br>
                                            <label for=""
                                                class="ml-3"><?php if($_SESSION['ref']=="company"){ echo "SINCE :";} if($_SESSION['ref']=="designer"){echo "BIRTH :";} ?></label><a
                                                href="" style="color: black;"> &nbsp;
                                                <?php if($_SESSION['ref']=="company"){ echo $row[6];} if($_SESSION['ref']=="designer"){echo $row[4];} ?></a></br>
                                            <label for="" class="ml-3">EMAIL : </label><a href="" style="color: black;">
                                                &nbsp;<?php if($_SESSION['ref']=="company"){ echo $row[0];} if($_SESSION['ref']=="designer"){echo $row[0];} ?></a></br>

                                            <label for="" class="ml-3">SPECIAL SKILL : </label><a href=""
                                                style="color: black;"> &nbsp;
                                                <?php if($_SESSION['ref']=="company"){ echo $row[25];} if($_SESSION['ref']=="designer"){echo $row[24];} ?></a></br>
                                        </div>
                                        <div class="row p-3">
                                            <form action="" method="post" name="pinfollower">
                                            <?php
                                                if($_SESSION['who']=="user"){
                                                    $data3=$con->query("select * from pinpost where user_userid like '$_SESSION[userid]' and postid like '$_SESSION[cdid]'");
                                                    $row3=mysqli_fetch_array($data3);
                                                    if($row3[0]=="")
                                                    {
                                                    ?>
                                                    <div class="col-md-12">
                                                    <button type="submit" name="pin" value=""
                                                        class="butn-dark btn btn-block mb-10">Pin Post</button>
                                                </div>
                                                <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <div class="col-md-12">
                                                    <button type="submit" name="unpin" value=""
                                                        class="butn-dark btn btn-block mb-10">Un Pin</button>
                                                </div>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <div class="col-md-12">
                                                    <button type="submit" name="loginpin" value=""
                                                        class="butn-dark btn btn-block mb-10">Pin Post</button>
                                                </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if($_SESSION['who']=="user"){
                                                    $data2=$con->query("select * from follower where user_userid like '$_SESSION[userid]' and reference like '$_SESSION[ref]' and userid like '$_SESSION[ucdid]'");
                                                    $row2=mysqli_fetch_array($data2);
                                                    if($row2[0]=="")
                                                    {
                                                    ?>
                                                    <div class="col-md-12">
                                                    <button type="submit" name="follower" value=""
                                                        class="butn-dark btn btn-block mb-10">Follow Me</button>
                                                </div>
                                               
                                                <?php
                                                    }else
                                                    {
                                                        ?>
                                                        <div class="col-md-12">
                                                    <button type="submit" name="unfollower" value=""
                                                        class="butn-dark btn btn-block mb-10">UnFollow</button>
                                                </div>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <div class="col-md-12">
                                                    <button type="submit" name="loginfollower" value=""
                                                        class="butn-dark btn btn-block mb-10">Follow Me</button>
                                                </div>
                                                    <?php
                                                }

                                                   ?>
                                                   
                                            </form>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4"><h4 class="ml-3" style="color: black;">Review</h4></div>
                
            </div>

            <div class="row m-4">
                <div class="col-md-6">
                    <h3 class="ml-4">People love me like</h3>
                    <br />
                   

                    <!-- average Rating -->



                    <div class="col-md-10">


                        <ul class="list-unstyled list-inline">
                            <li>
                                <?php
                                $data=$con->query("select avg(ratenumber) from rate where postid='$_SESSION[postid]' ");
                                
                                $rate=mysqli_fetch_array($data);
                                $fullrate=$rate[0];
                                
                                $roundrate=floor($fullrate);
                                $howmuch=$fullrate-$roundrate;

                                for($i=1;$i<=5;$i++)
                                {
                                    if($rate[3]==$roundrate)
                                    {
                                        if($i<=$rate[3])
                                        {
                                            ?>
                                            <i style="padding: 0px 10px;font-size: 50px;color:#FBC206;" class="fas fa-star"></i>
                                            <?php	
                                        }
                                        else
                                            {echo $fullrate;
                                            ?>
                                            <i style="padding: 0px 10px;font-size: 50px;color:#FBC206;" class="far fa-star"></i>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        if($i<=$roundrate+1)
                                        {
                                            if($i==$roundrate+1)
                                            {
                                                if($howmuch>0.50)
                                                {
                                                    ?>
                                                    <i style="padding: 0px 10px;font-size: 50px;color:#FBC206;" class="fas fa-star"></i>
                                                    <?php	
                                                }
                                                else
                                                {
                                                    ?>
                                                    <i style="padding: 0px 10px;font-size: 50px;color:#FBC206;" class="fas fa-star-half-alt"></i>
                                                    <?php	
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <i style="padding: 0px 10px;font-size: 50px;color:#FBC206;" class="fas fa-star"></i>
                                                <?php	
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <i style="padding: 0px 10px;font-size: 50px;color:#FBC206;" class="far fa-star"></i>
                                            <?php	
                                        }
                                    }
                                }
                                
                                ?>
                                <!-- <i style="padding: 0px 10px;font-size: 20px;color:#FBC206;" class="ti-star"></i>  -->
                                <?php
                                ?>
                            </li>

                        </ul>

                        <?php
                            if($_SESSION['userid']!="")
                            {
                                ?>

                                <button class="butn-dark btn" type="button"
                                    onclick="forrate('rate',<?php echo $_SESSION['postid']; ?>,'<?php echo $_SESSION['userid'] ?>',0);"
                                    data-toggle="modal" data-target="#rateus"> rate us </button>

                                <?php	
                            }
                            else
                            {     
                                ?>
                                <span> <a href="login.php"> <b>Login</b> </a> to leave a rate</span>
                                <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="col-md-2">

                </div>

                <div class="col-md-4 review">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mkrev">
                            <?php
                            
                            $data=$con->query("select * from review where userid like '$row[0]'");
                            while($row=mysqli_fetch_array($data))
                            {
                            ?>
                                <div>

                                    <h3 style="float: left;"><?php echo $row[0];?></h3>
                                    <h3><?php echo $row[6];?></h3>
                                    <p><?php echo $row[5];?></p>

                                </div>
                            <?php
                            }
                            ?>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </br>

            <div class="row">
                <section class="container-fluid jophoto-gallery section-padding mb-30">
                    <div class="container">

                        <div class="row mb-20">
                            <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                                <h6>RELATED PHOTOS</h6>

                            </div>
                        </div>


                        <div class="row jophoto-photos" id="jophoto-section-photos">
                            <?php
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
                                $data=$con->query("select * from posting where categoryid=$cat");
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
                                                            <button class="pinak"><i class="far fa-heart" style="color: #fff;"></i></button>
                                                        </div>
                                                    <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <div class="col-md-3 rkd" onclick="likepost('<?php echo $_SESSION['userid']; ?>','<?php echo $row[0]; ?>','<?php echo $row[1]; ?>','<?php echo $row[6]; ?>','index','unlike');">
                                                        <button class="pinak"><i class="fas fa-heart" style="color: red;"></i></button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <!-- </form> -->
                                                    

                                                </div>
                                                <!-- <p class="col-md-12 abc">savan</p> -->
                                            </div>
                                            <div class="row pino">
                                                <p class="col-md-5 ml-2 abc d-flex align-items-end"
                                                    onclick="window.location.href='photodetail.php?ref=<?php echo $row[0]; ?>&id=<?php echo $row[6] ?>&uid=<?php echo $row[1] ?>';">
                                                    <?php if($row[0]=="company"){$data1=$con->query("select * from company_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];}else{$data1=$con->query("select * from designer_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];} ?>
                                                </p>
                                                <p class="col-md-5 ml-2 nir cba d-flex align-items-end">
                                                    <a class="load" href="<?php echo $row[9]; ?>" download="<?php echo rand(0,9)."_".chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(65,90)).rand(0,9).rand(0,9)." - LENSATION"; ?>" onclick="likepost('<?php echo $_SESSION['userid']; ?>','<?php echo $row[0]; ?>','<?php echo $row[1]; ?>','<?php echo $row[6]; ?>','index','download');"><i class="ti-download"></i></a>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                                ?>



                        </div>

                    </div>

                </section>

            </div>

        </div>
        <div class="col-md-1">

        </div>

    </div>
</div>

</br>
</br>


<!-- modal ma rate hoi te -->


<div class="modal fade" id="rateus" tabindex="-1" role="dialog" aria-labelledby="rateusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="missrate">

        </div>
    </div>
</div>


<?php require_once"footer.php";?>
<?php require_once"script.php"; ?>

</body>

</html>