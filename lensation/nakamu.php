<section class="jophoto-gallery section-padding mb-30">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">



                        <div class="col-md-3 animate-box" data-animate-effect="fadeInUp">
                             <div class="counts hide-xs hide-sm">
                                
                                    <center> 
                                        <div class="blog-entry">
                                            <a href="" class="blog-img"><img src="img/blog/05.jpg" class="img-fluid" alt=""></a>
                                        </div>
                                        <p class="txx">cdmkmcwe</p>
                                    </center>
                             
                             </div>
                        </div>


                        
                    </div>         
                </div>
            </div>
        </div>
    </section>




// rating 
<?php

    if($_REQUEST['why']=="rate")
    {
        print_r($_REQUEST);
        $data=$con->query("select * from rate where user_userid like '$_REQUEST[kon]' and '$_REQUEST[kone]'");
        $row=mysqli_fetch_all($data);

        if($_REQUEST['ketla']!=0)
        {
            if($row[0]=="")
            {
                $in=$con->query("insert into rate value('$_REQUEST[kon]',0,$_REQUEST[ketla])");
            }
            else
            {
                $up=$con->query("update rate set rate='$_REQUEST[ketla]' where user_userid like '$_REQUEST[kon]'");
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
                $oldrate=$row[3];
            }
        }
    }
    ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate Us</h5>
                        <button type="button" class="close p-2 m-0" style="background-color: red;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <br/>
                        your rate is important for us. rate to say to us hoes we are!
                        <br/>
                        <center>
                        <?php
                        for($i=1;$i<=5;$i++) 
                        {
                            if($i<=$oldrate)
                            {
                        ?>
                            <i class="ti-star" aria-hidden="true" onclick="('rate',0,0'<?php echo $_SESSION['0']; ?>')" style="padding: 0px 10px; font-size: 20px; color: #FBC206;"></i>
                        <?php
                        }
                        else
                        {
                            ?>
                            <i class="ti-star" aria-hidden="true" onclick="('rate',0,0'<?php echo $_SESSION['0']; ?>')" style="padding: 0px 10px; font-size: 20px; color: #FBC206;"></i>
                            <?php
                        }
                        ?>
                        <br/><br/>
                        <form>
                            <button type="submit" name="rate" class="btn butn-dark">submit</button> 
                        </form>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn butn-dark" data-dismiss="modal">Close</button>
                        <button type="button" class="btn butn-dark">Save changes</button>
                    </div>



                    <ul class="rateus">

                        <li>
                        
                            <?php

                                $data=$con->query("select avg(rate) from rate where user_userid=$_SESSION[pid]");
                                $fullrate=0;
                                $roundrate=$floor($fullrate);
                                $howmuch=$fullrate-$floor;

                            for($i=1;$i<=5;$i++) 
                            {
                                if($row[0]==$roundrate)
                                {
                                     if($i<=$row[0])
                                     {
                                         ?>
                                             <i class="ti-star" aria-hidden="true" style="padding: 0px 10px; font-size: 20px; color: #FBC206;"></i>
                                         <?php
                                     }
                                     else
                                     {
                                         ?>
                                             <i class="ti-star-half" aria-hidden="true" style="padding: 0px 10px; font-size: 20px; color: #FBC206;"></i>
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
                                                        <i class="ti-star" aria-hidden="true" style="padding: 0px 10px; font-size: 20px; color: #FBC206;"></i>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                        <i class="ti-star-half" aria-hidden="true" style="padding: 0px 10px; font-size: 20px; color: #FBC206;"></i>
                                                    <?php
                                                }
                                        }
                                        else
                                        {
                                                ?>
                                                    <i class="ti-star" aria-hidden="true" style="padding: 0px 10px; font-size: 20px; color: #FBC206;"></i>
                                                <?php 
                                        }
                                    }
                                    else
                                    {
                                            ?>
                                                <i class="ti-star-haff" aria-hidden="true" style="padding: 0px 10px; font-size: 20px; color: #FBC206;"></i>
                                            <?php
                                    }
                                }
                            }
                        }
                            ?>
                        </li>
                        <li>
                        <?php
                            if($_SESSION['who']=="")
                            {
                                ?>
                                     <button type="submit" name="" value="" title="login first, then give rate"  disabled="" class="butn-dark btn">rate Us</button>
                                <?php
                            
                            }
                            else
                            {
                                ?>
                                     
                                     <button type="submit" class="btn butn-dark"  onclick="('rate',0,0,0)" data-toggle="modal" data-target="#rateus"> Rate Us</button>  
                                <?php
                            }
                        ?>
                        </li>
                    </ul>

                    <!-- Button trigger modal -->
                        <button type="submit" class="btn btn-primary" onclick="('rate',0,0,0)" data-toggle="modal" data-target="#rateus">
                        Launch demo modal
                        </button>

                        <!-- //rate model -->
                        <div class="modal fade" id="rateus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content" id="#missrate">
                                    
                                    </div>
                                </div>
                        </div>

        </div>
    </section>





    <?php

    if($_REQUEST['what']=="addpost2" && $_SESSION['who']=="designer")
    {
      
//start designer_post 3
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-4 hlt">
            <div class="coml-md-8 row">
            <div>
                <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;"></h4>
                
            </div>  
            </div>
            <form class="" action="" method="post" enctype="multipart/form-data" id="" name="" onsubmit="return">
                <div>
                    <div class="col-md-8">
                        <input type="text" id="" class="form-control" name="name" placeholder="Photo Name" required="" value="<?php echo $_SESSION['name'];?>">
                    </div>

                    <div class="col-md-8 mt-4">
                    <label for="">Description of Photo</label>
                        <textarea name="" id="" class="form-control" cols="20" rows="3" value="<?php echo $_SESSION['description'];?>"></textarea>
                    </div>

                    <div class="col-md-8 mt-4">
                        <input type="file" class="form-control m-0" id="file" name="poster" required="" value="<?php echo $_SESSION['poster'];?>">
                    </div>

                    <div class="col-md-8 mt-4">
                        <input type="file" class="form-control  m-0" id="file" name="posterzip" value="<?php echo $_SESSION['posterzip'];?>">
                    </div>

                    </br>

                    <div class="row p-3">    
                        <div class="col-md-3">
                            <button type="submit" name="upprofile" class="butn-dark btn btn-block" onclick="getdata('addpost')">Back</button>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" name="upprofile" class="butn-dark btn btn-block" onclick="getdata('addpost3')">next</button>
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

<!-- end designer_post 3 -->







<?php

    if($_REQUEST['what']=="addpost3" && $_SESSION['who']=="designer")
    {
      
//start designer_post 4
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>

        <div class="col-md-7 p-4 hlt">
            <div class="coml-md-8 row">
            <div>
                <h4 style="padding-left: 50px; padding-bottom:20px; color:#9c5451;"></h4>
                
            </div>  
            </div>
            <form class="" action="" method="post" enctype="multipart/form-data" id="" name="" onsubmit="return">
                <div>
                    <div class="col-md-8">
                        <input type="radio" name="gender" checked="" value="<?php echo $_SESSION['coststatus'];?>"> Free
                                    &nbsp
                                    &nbsp
                                    &nbsp
                                    &nbsp
                                    &nbsp 	
                        <input type="radio" name="gender" value="<?php echo $_SESSION['coststatus'];?>"> Premium
                    </div>

                    <div class="col-md-8 mt-4">
                        <input type="text" id="" class="form-control" name="name" placeholder="Amount" required="" value="<?php echo $_SESSION['amount'];?>">
                    </div>

                    </br>

                    <div class="row p-3">    
                        <div class="col-md-3">
                            <button type="submit" name="posted" class="butn-dark btn btn-block">Share</button>
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

<!-- end designer_post 4 -->


















<div class="row jophoto-photos mt-30" id="jophoto-section-photos">
    <div class="col-md-6">
        <a href="img/services/wedding.jpg" class="d-block jophoto-photo-item" data-caption="Eleanor & Stefano" data-fancybox="gallery"> <img src="img/services/wedding.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more"> <span class="ti-fullscreen"></span> </div>
        </a>
    </div>
</div>
















<?php

//start insert rate

if($_REQUEST['why']=="rate")
{
    //print_r($_REQUEST);
    $id=$_SESSION['postid'];
    //echo $id;
    $id1=$_SESSION['userid'];
    //echo $id1;
    $data=$con->query("select * from rate where user_userid like '$id1' and postid like '$id'");

    $row=mysqli_fetch_array($data);
    if($_REQUEST['ketla']!=0)
    {
        if($row[0]=="")
        {

            $hyy=$_SESSION['whowho'];
            //echo $hyy;
            $id4=$_SESSION['d_userid'];
            //echo $id4;
            $kon=$_REQUEST['kon'];
            //echo $kon;
            $id=$_SESSION['postid'];
            //echo $id;
            $id1=$_SESSION['userid'];
            //echo $id1;

            $in=$con->query("insert into rate values('$id1','$hyy','$id4','$id',0,$_REQUEST[ketla])");
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
            <h5 class="modal-title" id="rateusLabel">Rate Us</h5>

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
                <button name="rate" class="mt-2 ml-1 btn btn-md  btn-theme-light-2 btn-rounded">SUBMIT</button>
            </form>
            </center>
    </div>
<?php
}

//end insert rate
?>



<!-- modal ma rate hoi te -->


<div class="modal fade" id="rateus" tabindex="-1" role="dialog" aria-labelledby="rateusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="missrate">
		
    </div>
  </div>
</div>






<!-- average Rating -->



<div class="col-md-6">


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
                <li>
            </ul>
            <?php
                if($_SESSION['userid']!="")
                {
                ?>

                <button class="form-control col-md-2" type="button" onclick="forrate('rate',<?php echo $_SESSION['postid']; ?>,'<?php echo $_SESSION['userid'] ?>',0);"  data-toggle="modal" data-target="#rateus"> rate us </button>
                
                <?php	
                }
                else
                {     
                                ?>
                <span> <a href="login.php"> <b>Login</b>  </a> to leave a rate</span>
            <?php
            }
            ?>


</div>












<div class="col-md-6 mkrev">
                    <div>
                        <h3 style="float: left;"> nilesh nakrani</h3>
                        <h3>Post on : 05\06\2021 </h3>
                        <p>fernvreuvbervniutbvuitnviubvhbvjibviungvtrugctgyrvgtcgntigtygcyg</p>
                        <h2>By </h2>
                    </div>
                </div>





                <li class="mama"><a class="nav-link"><i class="fas fa-angle-left"></i></a></li>
                        <li class="mom"><a class="nav-link">Home</a></li>
                        <li class="mom"><a class="nav-link">About Us</a></li>
                        <li class="mom"><a class="nav-link">Our Partner</a></li>
                        <li class="mom"><a class="nav-link">Our Package</a></li>
                        <li class="mom"><a class="nav-link">Category</a></li>
                        <li class="mom"><a class="nav-link">Contact Us</a></li>
                        <li class="mom"><a class="nav-link">Home</a></li>
                        <li class="mom"><a class="nav-link">About Us</a></li>
                        <li class="mom"><a class="nav-link">Our Partner</a></li>
                        <li class="mom"><a class="nav-link">Our Package</a></li>
                        <li class="mom"><a class="nav-link">Category</a></li>
                        <li class="mom"><a class="nav-link">Contact Us</a></li>
                        <li class="mama"><a class="nav-link"><i class="fas fa-angle-right"></i></a></li>





                        <div class="col-md-5">
                    <div class="mkrev">
                        <div>
                            <h3 style="float: left;"> nilesh nakrani</h3>
                            <h3>Post on : 05\06\2021 </h3>
                            <p>fernvreuvbervniutbvuitnviubvhbvjibviungvtrugctgyrvgtcgntigtygcyg</p>
                            
                        </div>
                        <div>
                            <h3 style="float: left;"> nilesh nakrani</h3>
                            <h3>Post on : 05\06\2021 </h3>
                            <p>fernvreuvbervniutbvuitnviubvhbvjibviungvtrugctgyrvgtcgntigtygcyg</p>
                            
                        </div>
                    </div>
                </div>










                <div class="col-md-9">
            <div class="dis p-3">
                <p><?php echo "manage ".$_SESSION['identity']; ?>
                <?php
                    if($_SESSION['design_softwarecount']!=0)
                    { 
                    $rs=(($_SESSION['currpage']*$perpage)-$perpage)+1;
                    $re=$_SESSION['currpage']*$perpage;
                    if($re>$_SESSION['design_softwarecount'])
                    {
                        $re=$_SESSION['design_softwarecount'];
                    }
                ?>
                [Record Range : <?php echo "$rs to $re"; ?>]
                <?php 
                    } 
                ?>
                <i class="far fa-trash-alt" style="opacity: 0;" ondblclick="getdata('<?php echo $_SESSION['identity']; ?>','deleteall',0);" ></i>
                </p>
                <hr/>
                    <div>
                        <table class="table table-hover">
                            <thead style="background-color:#03a9f3; color:#fff;">    
                                <th>Design Software Name</th>
                                <th>Icon</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </thead>

                            <tbody>
                                <?php
                                    $c=0;
                                    if($_REQUEST['action']=="search")
                                    {

                                            $data=$con->query("select * from design_software where name like '%$_REQUEST[id]%'");
                                    }
                                    else
                                    {
                                            $data=$con->query("select * from design_software order by design_softwareid desc limit $st,$perpage");
                                    }    

                                    while($row=mysqli_fetch_array($data))
                                    {
                                        $c++;
                                ?>
                                        <tr>
                                            <td><?php echo $row[1]; ?> </td>
                                            <td class="timage"><img src="<?php echo $row[2];?>"></td>
                                            <td ondblclick="getdata('<?php echo $_SESSION['identity']; ?>','update',<?php echo $row[0]?>);"><i class="far fa-edit"></i></td>
                                            <td ondblclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[0]?>);"><i class="far fa-trash-alt"></i></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                            <?php 
                                if($c!=0) 
                                {
                                    if($_REQUEST['action']!="search")
                                    { 
                            ?>    
                            <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <center>
          
                                                <ul class="paging">
                                                    <?php

                                                    if($pages<=$page)
                                                    {
                                                        $ls=1;
                                                        $le=$pages;
                                                    }
                                                    else
                                                    {
                                                        if($_SESSION['currpage']>$page)
                                                        {
                                                            $ls=$_SESSION['currpage']-2;
                                                            $le=$_SESSION['currpage']+2;
                                                            if($le>$pages)
                                                            {
                                                                $le=$pages;
                                                            }
                                                            if($_SESSION['currpage']==$pages-1)
                                                            {
                                                                $ls=$_SESSION['currpage']-3;
                                                                $le=$pages;
                                                            }
                                                            if($_SESSION['currpage']==$pages)
                                                            {
                                                                $ls=$_SESSION['currpage']-4;
                                                                $le=$pages;
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $ls=1;
                                                            $le=$page;
                                                        }
                                                    }
                                                    if($_SESSION['currpage']>$page)
                                                    {
                                                    ?>
                                                            <li onclick="getdata('<?php echo $_SESSION['identity']; ?>','paging',<?php echo $_SESSION['currpage']-1; ?>);">
                                                                PREV
                                                            </li>
                                                    <?php
                                                    }
                                                    for($i=$ls;$i<=$le;$i++)
                                                    {
                                                        if($_SESSION['currpage']==$i)
                                                        {
                                                    ?> 
                                                        <li class="active" onclick="getdata('<?php echo $_SESSION['identity']; ?>','paging',<?php echo $i; ?>);">
                                                            <?php echo $i; ?>
                                                        </li>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                        <li onclick="getdata('<?php echo $_SESSION['identity']; ?>','paging',<?php echo $i; ?>);">
                                                            <?php echo $i; ?>
                                                        </li>

                                                    <?php  
                                                        }
                                                    }
                                                    if($_SESSION['currpage']!=$pages)
                                                    {
                                                    if($pages>$page)
                                                    {
                                                    ?>
                                                            <li onclick="getdata('<?php echo $_SESSION['identity']; ?>','paging',<?php echo $_SESSION['currpage']+1; ?>);">
                                                            NEXT
                                                            </li>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </ul>
                                            </center>
                                        </td>
                                    </tr>
                            </tfoot>
                            <?php 
                                }
                            }
                            ?>
                        </table>
                        <?php
                            if($c==0)
                            {
                        ?>
                           <div class="nodata">
                            <center style="height: 10px; width:100px;">
                            <i class="fab fa-github-alt"></i>
                                <br/>
                                <p>NO RECORD!</p>
                            </center>
                           </div> 

                        <?php        
                            }
                        ?>
                    </div>
            </div>
        </div>








        <div class="col-md-4">

                    <img src="img/kisspng.png"
                    class="imgsize" alt="member"
                    style="border-radius: 50%; height:80px; width:80px;"></img>

                    <a class="ml-4" href="">Savan Pansuriya</a>

                </div>






                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>


<li class="nav-item"><a class="nav-link" href="gallery.html">Category</a></li>








 <!-- subdesigner 2 dashboard -->
<?php
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
?>

<div class="col-md-4">
            <a class="d-block jophoto-photo-item"> <img src="<?php echo $row[0]; ?>" alt="Image" class="img-fluid">
                <div class="row photo-text-more"> 
                    <div class="col-md-12 lp">
                        <div class="row xyz">
                            <i class="col-md-8 pt-2 kkd"><?php echo $row[7]; ?></i>
                            <div class="col-md-3 p-0 pt-2 ml-4 oiu">
                        
                                <button class="pinak">
                                    <i class="ti-trash" ondblclick="getdata('post','company',<?php echo $row[6]; ?>,'delete')"></i>
                                </button>

                            </div>
                            <!-- <p class="col-md-12 abc">savan</p> -->
                        </div>
                        <div class="row pino">
                            <p class="col-md-12 ml-2 abc d-flex align-items-end"
                                onclick="window.location.href='photodetail.php?ref=<?php echo $row[0]; ?>&id=<?php echo $row[6] ?>&uid=<?php echo $row[1] ?>';">
                                <?php if($row[0]=="company"){$data1=$con->query("select * from company_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];}else{$data1=$con->query("select * from designer_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];} ?>
                            </p>
                            
                        </div>

                    </div>
                </div>
            </a>
        </div>





       
        // index page
<?php
if($_REQUEST['what']=="index")
{
    if($_REQUEST['action']=="search")
    {
        $data=$con->query("select p.*,sc.*,c.* from posting as p,subcategory as sc,category as c where p.subcategoryid=sc.subcategoryid and p.categoryid=c.categoryid and p.categoryid=sc.categoryid and sc.categoryid=c.categoryid and sc.name like '%$_REQUEST[id]%' or p.subcategoryid=sc.subcategoryid and p.categoryid=c.categoryid and p.categoryid=sc.categoryid and sc.categoryid=c.categoryid and c.name like '%$_REQUEST[id]%' order by rand() limit 0,51");
    }else{
        $data=$con->query("select * from posting order by rand() limit 0,51");
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

                                        
                                        <!-- <form action="" method="post" name="pluslike"> -->
                                        <?php
                                            if($_SESSION['who']=="user")
                                            {
                                                $data2=$con->query("select * from likee where user_userid like '$_SESSION[userid]' and reference like '$row[0]' and userid like '$row[1]' and postid=$row[6]");
                                                $row2=mysqli_fetch_array($data2);
                                                if($row2[0]=="")
                                                {
                                                ?>
                                        <button class="tx" name="like" onclick="window.location.href='userquery.php?user_userid=<?php echo $_SESSION['userid']; ?>&ref=<?php echo $row[0] ?>&userid=<?php echo $row[1] ?>&postid=<?php echo $row[6] ?>&what=<?php echo 'like'; ?>';">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <?php
                                                }else
                                                {
                                                    ?>
                                        <button class="tx" name="unlike" onclick="window.location.href='userquery.php?user_userid=<?php echo $_SESSION['userid']; ?>&ref=<?php echo $row[0] ?>&userid=<?php echo $row[1] ?>&postid=<?php echo $row[6] ?>&what=<?php echo 'unlike'; ?>';">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <?php
                                                }
                                            }else
                                            {
                                                ?>
                                        <button class="tx" name="loginlike" onclick="window.location.href='login.php'">
                                            <i class="ti-heart"></i>
                                        </button>
                                        <?php
                                            }
                                            ?>
                                        <!-- <button class="tx">
                                            <i class="ti-heart"></i>
                                        </button> -->
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
                                        <a class="yas" href="<?php echo $row[9]; ?>" download="<?php echo rand(0,9)."_".chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(65,90)).rand(0,9).rand(0,9)." - LENSATION"; ?>"><i class="ti-download"></i></a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <?php
            }

}
?>
// end index



<div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                                <div class="d-block jophoto-photo-item"> 
                                    <img src="<?php echo $row[9]; ?>" alt="Image"
                                        class="img-fluid">
                                    <div class="row photo-text-more">
                                        <div class="col-md-12 lp">
                                            <div class="row xyz">
                                                <p class="col-md-8 pt-2 kkd"><?php echo $row[7]; ?></p>
                                                <div class="col-md-3 p-0 pt-2 ml-4 rkd">



                                                    <button class="pinak">
                                                        <i class="ti-plus" data-toggle="modal"
                                                            data-target="#exampleModal"></i>
                                                    </button>
                                                    <button class="pinak">
                                                        <i class="ti-heart"></i>
                                                    </button>

                                                </div>
                                                <!-- <p class="col-md-12 abc">savan</p> -->
                                            </div>
                                            <div class="row pino">
                                                <p class="col-md-5 ml-2 abc d-flex align-items-end"
                                                    onclick="window.location.href='photodetail.php?ref=<?php echo $row[0]; ?>&id=<?php echo $row[6] ?>&uid=<?php echo $row[1] ?>';">
                                                    <?php if($row[0]=="company"){$data1=$con->query("select * from company_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];}else{$data1=$con->query("select * from designer_register where userid like '$row[1]'");$row1=mysqli_fetch_array($data1);echo $row1[2];} ?>
                                                </p>
                                                <p class="col-md-5 ml-2 nir cba d-flex align-items-end">
                                                    
                                                    <a class="load" href="<?php echo $row[9]; ?>" download="<?php echo rand(0,9)."_".chr(rand(97,122)).chr(rand(97,122)).chr(rand(97,122)).chr(rand(65,90)).rand(0,9).rand(0,9)." - LENSATION"; ?>"><i class="ti-download"></i></a>
                                                    
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>





                            $data=$con->query("select * from posting where categoryid=$cat order by rand()");
                            while($row=mysqli_fetch_array($data))





                            <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 col-sm-0">
                </div>
                <div class="col-md-10 col-sm-0 p-3 m-0 hlt">
                    <div class="row">
                        
                        
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
                                                    <i class="ti-trash" ondblclick="getdata('post','company',<?php echo $row[6]; ?>,'delete')"></i>
                                                </button>

                                            </div>
                                            <!-- <p class="col-md-12 abc">savan</p> -->
                                        </div>
                                        <div class="row pino">
                                            <p class="col-md-12 ml-2 abc d-flex align-items-end"
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