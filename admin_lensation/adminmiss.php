<?php

require_once "connection.php";
require_once "query.php";

$_SESSION['identity']=$_REQUEST['what'];
$perpage=5;
$page=5;
// print_r($_REQUEST);

//start dashboard
if($_REQUEST['what']=="dashboard")
{
    ?>

    
    <div id="main-wrapper">

        <div class="container-fluid">
        
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            
        </div>

        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="fa fa-cogs" aria-hidden="true"></i></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">
                                    <?php
                                        $data=$con->query("select count(*) from category");
                                        $row=mysqli_fetch_array($data);
                                        echo $row[0];
                                    ?>
                                </h3>
                                <h5 class="text-muted m-b-0">Category</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">
                                    <?php
                                        $data=$con->query("select count(*) from subcategory");
                                        $row=mysqli_fetch_array($data);
                                        echo $row[0];
                                    ?>
                                </h3>
                                <h5 class="text-muted m-b-0">Sub Category</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-info"><i class="fa fa-users" aria-hidden="true"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">
                                    <?php
                                        $data=$con->query("select count(*) from user_register");
                                        $row=mysqli_fetch_array($data);
                                        echo $row[0];
                                    ?>
                                </h3>
                                <h5 class="text-muted m-b-0">Users</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-info"><i class="fa fa-magic" aria-hidden="true"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">
                                    <?php
                                        $data=$con->query("select count(*) from design_software");
                                        $row=mysqli_fetch_array($data);
                                        echo $row[0];
                                    ?>
                                </h3>
                                <h5 class="text-muted m-b-0">Use Software</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round align-self-center round-success"><i class="fa fa-cubes" aria-hidden="true"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">
                                    <?php
                                        $data=$con->query("select count(*) from package");
                                        $row=mysqli_fetch_array($data);
                                        echo $row[0];
                                    ?>
                                </h3>
                                <h5 class="text-muted m-b-0">Package</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
       
    <?php   
}
//end dashboard



//start category
if($_REQUEST['what']=="category")
{
    if($_REQUEST['action']=="display" && $_REQUEST['id']==0)
    {
        $_SESSION['currpage']=1;
    }
    if($_SESSION['currpage']=="" || $_SESSION['insuccess']==1)
    {
        $_SESSION['currpage']=1;
        unset($_SESSION['insuccess']);
    }

    if($_REQUEST['action']=="paging")
    {
        $st=($_REQUEST['id']*$perpage)-$perpage;
        $_SESSION['currpage']=$_REQUEST['id'];
    }
    else
    {
        $st=($_SESSION['currpage']*$perpage)-$perpage;
    }

    if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from category where categoryid=$_REQUEST[id]");
        }
    if($_REQUEST['action']=="deleteall")
        {
            $del=$con->query("delete from category");
        }
        

        $rec=$con->query("select count(*) from category");
        $norec=mysqli_fetch_array($rec);
        $_SESSION['categorycount']=$norec[0];

        $pages=ceil($_SESSION['categorycount']/$perpage);

        if($pages<$_SESSION['currpage'])
        {
            if($pages==0)
            {
                $_SESSION['currpage']=1;    
            }
            else
            {
                $_SESSION['currpage']=$pages;
            }
            $st=($_SESSION['currpage']*$perpage)-$perpage;
        }

?>

<div class="col-md-12 animated bounceInRight">
    <p class="adminp"><?php echo $_SESSION['identity']." management"; ?></p>
    <hr/>
</div>
        <div class="col-md-3">
            <div class="frm p-3">

                    <?php
                    if($_REQUEST['action']=="update")
                        {
                            $data=$con->query("select * from category where categoryid=$_REQUEST[id]");
                            $row=mysqli_fetch_array($data);
                            $_SESSION['upid']=$_REQUEST['id'];
                    ?>

                        <form action="" method="post" name="upcategory">
                        <p><?php echo "update ".$_SESSION['identity']; ?></p>
                        <hr/>
                            <?php
                                if($_SESSION['duperr']==1)
                                {
                                    echo "<font size=2 color=red>Already Exist!</font>";
                                    $_SESSION['duperr']=0;
                                }                        
                            ?>
                            
                            <label>Category Name</label>
                            <input type="text" class="form-control" id="" name="upname" value="<?php echo $row[1];?>" required="">
                            
                            <div class="mt-3">   
                                <button name="upcategory" class="btn btn-info" type="submit">Update</button>
                                
                                <button class="btn btn-info" type="reset">Cancel</button>
                            </div>
                        </form>

                    <?php
                        }
                    else
                        {
                    ?>

                        <form action="" method="post" name="category">
                            <p><?php echo "add ".$_SESSION['identity']; ?></p>
                            <hr/>
                                <?php
                                    if($_SESSION['duperr']==1)
                                    {
                                        echo "<font size=2 color=red>Already Exist!</font>";
                                        $_SESSION['duperr']=0;
                                    }                        
                                ?>

                                <label>Category Name</label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Category Name" required="">
                                
                                <div class="mt-3">   
                                    <button name="incategory" class="btn btn-info" type="submit">Submit</button>
                                    
                                    <button class="btn btn-info" type="reset">Cancel</button>
                                </div>
                        </form>

                    <?php
                        }
                    ?> 

            </div>
        </div>
        <div class="col-md-9">
            <div class="dis p-3">
                <p><?php echo "manage ".$_SESSION['identity']; ?>
                <?php
                    if($_SESSION['categorycount']!=0)
                    { 
                    $rs=(($_SESSION['currpage']*$perpage)-$perpage)+1;
                    $re=$_SESSION['currpage']*$perpage;
                    if($re>$_SESSION['categorycount'])
                    {
                        $re=$_SESSION['categorycount'];
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
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </thead>

                            <tbody>
                                <?php
                                    $c=0;
                                    if($_REQUEST['action']=="search")
                                    {

                                            $data=$con->query("select * from category where name like '%$_REQUEST[id]%'");
                                    }
                                    else
                                    {
                                            $data=$con->query("select * from category order by categoryid desc limit $st,$perpage");
                                    }    

                                    while($row=mysqli_fetch_array($data))
                                    {
                                        $c++;
                                ?>
                                        <tr>
                                            <td><?php echo $row[1]; ?> </td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','update',<?php echo $row[0]?>);"><i class="far fa-edit"></i></td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[0]?>);"><i class="far fa-trash-alt"></i></td>
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
<?php 

}

//end category








//start design_software
if($_REQUEST['what']=="design_software")
{
    if($_REQUEST['action']=="display" && $_REQUEST['id']==0)
    {
        $_SESSION['currpage']=1;
    }
    if($_SESSION['currpage']=="" || $_SESSION['insuccess']==1)
    {
        $_SESSION['currpage']=1;
        unset($_SESSION['insuccess']);
    }

    if($_REQUEST['action']=="paging")
    {
        $st=($_REQUEST['id']*$perpage)-$perpage;
        $_SESSION['currpage']=$_REQUEST['id'];
    }
    else
    {
        $st=($_SESSION['currpage']*$perpage)-$perpage;
    }

    if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from design_software where design_softwareid=$_REQUEST[id]");
        }
    if($_REQUEST['action']=="deleteall")
        {
            $del=$con->query("delete from design_software");
        }
        

        $rec=$con->query("select count(*) from design_software");
        $norec=mysqli_fetch_array($rec);
        $_SESSION['design_softwarecount']=$norec[0];

        $pages=ceil($_SESSION['design_softwarecount']/$perpage);

        if($pages<$_SESSION['currpage'])
        {
            if($pages==0)
            {
                $_SESSION['currpage']=1;    
            }
            else
            {
                $_SESSION['currpage']=$pages;
            }
            $st=($_SESSION['currpage']*$perpage)-$perpage;
        }

?>

<div class="col-md-12 animated bounceInRight">
    <p class="adminp"><?php echo $_SESSION['identity']." management"; ?></p>
    <hr/>
</div>
        <div class="col-md-3">
            <div class="frm p-3">

                    <?php
                    if($_REQUEST['action']=="update")
                        {
                            $data=$con->query("select * from design_software where design_softwareid=$_REQUEST[id]");
                            $row=mysqli_fetch_array($data);
                            $_SESSION['upid']=$_REQUEST['id'];
                    ?>

                        <form action="" method="post" name="updesign_software" enctype="multipart/form-data">
                        <p><?php echo "update ".$_SESSION['identity']; ?></p>
                        <hr/>
                            <?php
                                if($_SESSION['duperr']==1)
                                {
                                    echo "<font size=2 color=red>Already Exist!</font>";
                                    $_SESSION['duperr']=0;
                                }                        
                            ?>
                            
                            <label>Software Name</label>
                            <input type="text" class="form-control" name="upname" value="<?php echo $row[1];?>" required="">
                            <br/>
                            <br/>
                            <input type="file" class="form-control-sm" name="upicon" >
                            <input type="hidden" name="oldpath" value="<?php echo $row[2];?>">
                            
                            <div class="mt-3">   
                                <button name="updesign_software" class="btn btn-info" type="submit">Update</button>
                                
                                <button class="btn btn-info" type="reset">Cancel</button>
                            </div>
                        </form>

                    <?php
                        }
                    else
                        {
                    ?>

                        <form action="" method="post" name="design_software" enctype="multipart/form-data">
                            <p><?php echo "add ".$_SESSION['identity']; ?></p>
                            <hr/>
                                <?php
                                    if($_SESSION['duperr']==1)
                                    {
                                        echo "<font size=2 color=red>Already Exist!</font>";
                                        $_SESSION['duperr']=0;
                                    }                        
                                ?>

                                <label>Software Name</label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Software Name" required="">
                                <br/>
                                <br/>
                                <input type="file" class="form-control-sm"  name="icon" required="">
                                
                                <div class="mt-3">   
                                    <button name="indesign_software" class="btn btn-info" type="submit">Submit</button>
                                    
                                    <button class="btn btn-info" type="reset">Cancel</button>
                                </div>
                        </form>

                    <?php
                        }
                    ?> 

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
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','update',<?php echo $row[0]?>);"><i class="far fa-edit"></i></td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[0]?>);"><i class="far fa-trash-alt"></i></td>
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
<?php 

}

//end design_software









//start posttype
if($_REQUEST['what']=="posttype")
{
    if($_REQUEST['action']=="display" && $_REQUEST['id']==0)
    {
        $_SESSION['currpage']=1;
    }
    if($_SESSION['currpage']=="" || $_SESSION['insuccess']==1)
    {
        $_SESSION['currpage']=1;
        unset($_SESSION['insuccess']);
    }

    if($_REQUEST['action']=="paging")
    {
        $st=($_REQUEST['id']*$perpage)-$perpage;
        $_SESSION['currpage']=$_REQUEST['id'];
    }
    else
    {
        $st=($_SESSION['currpage']*$perpage)-$perpage;
    }

    if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from posttype where posttypeid=$_REQUEST[id]");
        }
    if($_REQUEST['action']=="deleteall")
        {
            $del=$con->query("delete from posttype");
        }
        

        $rec=$con->query("select count(*) from posttype");
        $norec=mysqli_fetch_array($rec);
        $_SESSION['posttypecount']=$norec[0];

        $pages=ceil($_SESSION['posttypecount']/$perpage);

        if($pages<$_SESSION['currpage'])
        {
            if($pages==0)
            {
                $_SESSION['currpage']=1;    
            }
            else
            {
                $_SESSION['currpage']=$pages;
            }
            $st=($_SESSION['currpage']*$perpage)-$perpage;
        }

?>

<div class="col-md-12 animated bounceInRight">
    <p class="adminp"><?php echo $_SESSION['identity']." management"; ?></p>
    <hr/>
</div>
        <div class="col-md-3">
            <div class="frm p-3">

                    <?php
                    if($_REQUEST['action']=="update")
                        {
                            $data=$con->query("select * from posttype where posttypeid=$_REQUEST[id]");
                            $row=mysqli_fetch_array($data);
                            $_SESSION['upid']=$_REQUEST['id'];
                    ?>

                        <form action="" method="post" name="upposttype">
                        <p><?php echo "update ".$_SESSION['identity']; ?></p>
                        <hr/>
                            <?php
                                if($_SESSION['duperr']==1)
                                {
                                    echo "<font size=2 color=red>Already Exist!</font>";
                                    $_SESSION['duperr']=0;
                                }                        
                            ?>
                            
                            <label>Post Name</label>
                            <input type="text" class="form-control" id="" name="upname" value="<?php echo $row[1];?>" required="">
                            
                            <div class="mt-3">   
                                <button name="upposttype" class="btn btn-info" type="submit">Update</button>
                                
                                <button class="btn btn-info" type="reset">Cancel</button>
                            </div>
                        </form>

                    <?php
                        }
                    else
                        {
                    ?>

                        <form action="" method="post" name="posttype">
                            <p><?php echo "add ".$_SESSION['identity']; ?></p>
                            <hr/>
                                <?php
                                    if($_SESSION['duperr']==1)
                                    {
                                        echo "<font size=2 color=red>Already Exist!</font>";
                                        $_SESSION['duperr']=0;
                                    }                        
                                ?>

                                <label>Post Name</label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Post Type" required="">
                                
                                <div class="mt-3">   
                                    <button name="inposttype" class="btn btn-info" type="submit">Submit</button>
                                    
                                    <button class="btn btn-info" type="reset">Cancel</button>
                                </div>
                        </form>

                    <?php
                        }
                    ?> 

            </div>
        </div>
        <div class="col-md-9">
            <div class="dis p-3">
                <p><?php echo "manage ".$_SESSION['identity']; ?>
                <?php
                    if($_SESSION['posttypecount']!=0)
                    { 
                    $rs=(($_SESSION['currpage']*$perpage)-$perpage)+1;
                    $re=$_SESSION['currpage']*$perpage;
                    if($re>$_SESSION['posttypecount'])
                    {
                        $re=$_SESSION['posttypecount'];
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
                                <th>Posttype Name</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </thead>

                            <tbody>
                                <?php
                                    $c=0;
                                    if($_REQUEST['action']=="search")
                                    {

                                            $data=$con->query("select * from posttype where name like '%$_REQUEST[id]%'");
                                    }
                                    else
                                    {
                                            $data=$con->query("select * from posttype order by posttypeid desc limit $st,$perpage");
                                    }    

                                    while($row=mysqli_fetch_array($data))
                                    {
                                        $c++;
                                ?>
                                        <tr>
                                            <td><?php echo $row[1]; ?> </td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','update',<?php echo $row[0]?>);"><i class="far fa-edit"></i></td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[0]?>);"><i class="far fa-trash-alt"></i></td>
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
<?php 

}

//end posttype







//start package_offer
if($_REQUEST['what']=="package_offer")
{
    if($_REQUEST['action']=="display" && $_REQUEST['id']==0)
    {
        $_SESSION['currpage']=1;
    }
    if($_SESSION['currpage']=="" || $_SESSION['insuccess']==1)
    {
        $_SESSION['currpage']=1;
        unset($_SESSION['insuccess']);
    }

    if($_REQUEST['action']=="paging")
    {
        $st=($_REQUEST['id']*$perpage)-$perpage;
        $_SESSION['currpage']=$_REQUEST['id'];
    }
    else
    {
        $st=($_SESSION['currpage']*$perpage)-$perpage;
    }

    if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from package_offer where package_offerid=$_REQUEST[id]");
        }
    if($_REQUEST['action']=="deleteall")
        {
            $del=$con->query("delete from package_offer");
        }
        

        $rec=$con->query("select count(*) from package_offer");
        $norec=mysqli_fetch_array($rec);
        $_SESSION['package_offercount']=$norec[0];

        $pages=ceil($_SESSION['package_offercount']/$perpage);

        if($pages<$_SESSION['currpage'])
        {
            if($pages==0)
            {
                $_SESSION['currpage']=1;    
            }
            else
            {
                $_SESSION['currpage']=$pages;
            }
            $st=($_SESSION['currpage']*$perpage)-$perpage;
        }

?>

<div class="col-md-12 animated bounceInRight">
    <p class="adminp"><?php echo $_SESSION['identity']." management"; ?></p>
    <hr/>
</div>
        <div class="col-md-3">
            <div class="frm p-3">

                    <?php
                    if($_REQUEST['action']=="update")
                        {
                            $data=$con->query("select * from package_offer where package_offerid=$_REQUEST[id]");
                            $row=mysqli_fetch_array($data);
                            $_SESSION['upid']=$_REQUEST['id'];
                    ?>

                        <form action="" method="post" name="uppackage_offer">
                        <p><?php echo "update ".$_SESSION['identity']; ?></p>
                        <hr/>
                            <?php
                                if($_SESSION['duperr']==1)
                                {
                                    echo "<font size=2 color=red>Already Exist!</font>";
                                    $_SESSION['duperr']=0;
                                }                        
                            ?>

                           
                            <label>Package Offer Name</label>
                            <input type="text" class="form-control" id="" name="upname" value="<?php echo $row[name];?>" required="">
                            <br/>
                            <br/>

                            <label>Start Date</label>
    						<input type="date" class="form-control" name="upstartdate" value="<?php echo $row[startdate];?>" required>
                            <br/>
                            <br/>

                            <label>End Date</label>
    						<input type="date" class="form-control" name="upenddate" value="<?php echo $row[enddate];?>" required>
                             <br/>
                            <br/>

                            <label>Percentage</label>
                            <input type="text" class="form-control" id="" name="uppercentage" value="<?php echo $row[percentage];?>" required="">
                           
                            <div class="mt-3">   
                                <button name="uppackage_offer" class="btn btn-info" type="submit">Update</button>
                                
                                <button class="btn btn-info" type="reset">Cancel</button>
                            </div>
                        </form>

                    <?php
                        }
                    else
                        {
                    ?>

                        <form action="" method="post" name="package_offer">
                            <p><?php echo "add ".$_SESSION['identity']; ?></p>
                            <hr/>
                                <?php
                                    if($_SESSION['duperr']==1)
                                    {
                                        echo "<font size=2 color=red>Already Exist!</font>";
                                        $_SESSION['duperr']=0;
                                    }                        
                                ?>

                                <label>Package Offer Name</label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Package Name" required="">
                                <br/>
                                <br/>

                                <label>Start Date</label>
    						    <input type="date" class="form-control" name="startdate" required>
                                <br/>
                                <br/>

                                <label>End Date</label>
                                <input type="date" class="form-control" name="enddate" required>
                                <br/>
                                <br/>

                                <label>Percentage</label>
                                <input type="text" class="form-control" id="" name="percentage" required="">  
                                
                                <div class="mt-3">   
                                    <button name="inpackage_offer" class="btn btn-info" type="submit">Submit</button>
                                    
                                    <button class="btn btn-info" type="reset">Cancel</button>
                                </div>
                        </form>

                    <?php
                        }
                    ?> 

            </div>
        </div>
        <div class="col-md-9">
            <div class="dis p-3">
                <p><?php echo "manage ".$_SESSION['identity']; ?>
                <?php
                    if($_SESSION['package_offercount']!=0)
                    { 
                    $rs=(($_SESSION['currpage']*$perpage)-$perpage)+1;
                    $re=$_SESSION['currpage']*$perpage;
                    if($re>$_SESSION['package_offercount'])
                    {
                        $re=$_SESSION['package_offercount'];
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
                                <th>Package Offer Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Percentage</th>
                                <!-- <th>Edit</th> -->
                                <th>Remove</th>
                            </thead>

                            <tbody>
                                <?php
                                    $c=0;
                                    if($_REQUEST['action']=="search")
                                    {

                                            $data=$con->query("select * from package_offer where name like '%$_REQUEST[id]%'");
                                    }
                                    else
                                    {
                                            $data=$con->query("select * from package_offer order by package_offerid desc limit $st,$perpage");
                                    }    

                                    while($row=mysqli_fetch_array($data))
                                    {
                                        $c++;
                                ?>
                                        <tr>
                                            <td><?php echo $row[1]; ?> </td>
                                            <td><?php echo $row[2]; ?> </td>
                                            <td><?php echo $row[3]; ?> </td>
                                            <td><?php echo $row[4]." "; ?> %</td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[0]?>);"><i class="far fa-trash-alt"></i></td>
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
<?php 

}

//end package_offer







//start subcategory
if($_REQUEST['what']=="subcategory")
{
    if($_REQUEST['action']=="display" && $_REQUEST['id']==0)
    {
        $_SESSION['currpage']=1;
    }
    if($_SESSION['currpage']=="" || $_SESSION['insuccess']==1)
    {
        $_SESSION['currpage']=1;
        unset($_SESSION['insuccess']);
    }

    if($_REQUEST['action']=="paging")
    {
        $st=($_REQUEST['id']*$perpage)-$perpage;
        $_SESSION['currpage']=$_REQUEST['id'];
    }
    else
    {
        $st=($_SESSION['currpage']*$perpage)-$perpage;
    }

    if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from subcategory where subcategoryid=$_REQUEST[id]");
        }
    if($_REQUEST['action']=="deleteall")
        {
            $del=$con->query("delete from subcategory");
        }
        

        $rec=$con->query("select count(*) from subcategory");
        $norec=mysqli_fetch_array($rec);
        $_SESSION['subcategorycount']=$norec[0];

        $pages=ceil($_SESSION['subcategorycount']/$perpage);

        if($pages<$_SESSION['currpage'])
        {
            if($pages==0)
            {
                $_SESSION['currpage']=1;    
            }
            else
            {
                $_SESSION['currpage']=$pages;
            }
            $st=($_SESSION['currpage']*$perpage)-$perpage;
        }

?>

<div class="col-md-12 animated bounceInRight">
    <p class="adminp"><?php echo $_SESSION['identity']." management"; ?></p>
    <hr/>
</div>
        <div class="col-md-3">
            <div class="frm p-3">

                    <?php
                    if($_REQUEST['action']=="update")
                        {
                            $data=$con->query("select * from subcategory where subcategoryid=$_REQUEST[id]");
                            $row=mysqli_fetch_array($data);
                            $_SESSION['upid']=$_REQUEST['id'];
                    ?>

                        <form action="" method="post" name="upsubcategory">
                        <p><?php echo "update ".$_SESSION['identity']; ?></p>
                        <hr/>
                            <?php
                                if($_SESSION['duperr']==1)
                                {
                                    echo "<font size=2 color=red>Already Exist!</font>";
                                    $_SESSION['duperr']=0;
                                }                        
                            ?>

                            <select class="form-control" name="upcategoryid" required="">
                           
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
                            <br/>
                            <br/>
                            <label>Category Name</label>
                            <input type="text" class="form-control" id="" name="upname" value="<?php echo $row[2];?>" required="">
                            
                            <div class="mt-3">   
                                <button name="upsubcategory" class="btn btn-info" type="submit">Update</button>
                                
                                <button class="btn btn-info" type="reset">Cancel</button>
                            </div>
                        </form>

                    <?php
                        }
                    else
                        {
                    ?>

                        <form action="" method="post" name="subcategory">
                            <p><?php echo "add ".$_SESSION['identity']; ?></p>
                            <hr/>
                                <?php
                                    if($_SESSION['duperr']==1)
                                    {
                                        echo "<font size=2 color=red>Already Exist!</font>";
                                        $_SESSION['duperr']=0;
                                    }                        
                                ?>

                                <select class="form-control" name="categoryid" required="">
                                <option value="">--Select Category--</option>
                                <?php
                                    $data=$con->query("select * from category");
                                    while($row=mysqli_fetch_array($data))
                                    {
                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                <?php        
                                    }
                                ?>
                                </select>
                                <br/>
                                <br/>
                                <label>Category Name</label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Category Name" required="">
                                
                                <div class="mt-3">   
                                    <button name="insubcategory" class="btn btn-info" type="submit">Submit</button>
                                    
                                    <button class="btn btn-info" type="reset">Cancel</button>
                                </div>
                        </form>

                    <?php
                        }
                    ?> 

            </div>`
        </div>
        <div class="col-md-9">
            <div class="dis p-3">
                <p><?php echo "manage ".$_SESSION['identity']; ?>
                <?php
                    if($_SESSION['subcategorycount']!=0)
                    { 
                    $rs=(($_SESSION['currpage']*$perpage)-$perpage)+1;
                    $re=$_SESSION['currpage']*$perpage;
                    if($re>$_SESSION['subcategorycount'])
                    {
                        $re=$_SESSION['subcategorycount'];
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
                                <th>Categoryid</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </thead>

                            <tbody>
                                <?php
                                    $c=0;
                                    if($_REQUEST['action']=="search")
                                    {

                                            $data=$con->query("select * from subcategory where name like '%$_REQUEST[id]%'");
                                    }
                                    else
                                    {
                                            $data=$con->query("select sc.*,c.name from subcategory as sc,category c where sc.categoryid=c.categoryid order by subcategoryid desc limit $st,$perpage");
                                    }    

                                    while($row=mysqli_fetch_array($data))
                                    {
                                        $c++;
                                ?>
                                        <tr>
                                            <td><?php echo $row[3]; ?> </td>    
                                            <td><?php echo $row[2]; ?> </td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','update',<?php echo $row[1]?>);"><i class="far fa-edit"></i></td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[1]?>);"><i class="far fa-trash-alt"></i></td>
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
<?php 

}

//end subcategory










//start package_rules
if($_REQUEST['what']=="package_rules")
{
    if($_REQUEST['action']=="display" && $_REQUEST['id']==0)
    {
        $_SESSION['currpage']=1;
    }
    if($_SESSION['currpage']=="" || $_SESSION['insuccess']==1)
    {
        $_SESSION['currpage']=1;
        unset($_SESSION['insuccess']);
    }

    if($_REQUEST['action']=="paging")
    {
        $st=($_REQUEST['id']*$perpage)-$perpage;
        $_SESSION['currpage']=$_REQUEST['id'];
    }
    else
    {
        $st=($_SESSION['currpage']*$perpage)-$perpage;
    }

    if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from package_rules where package_rulesid=$_REQUEST[id]");
        }
    if($_REQUEST['action']=="deleteall")
        {
            $del=$con->query("delete from package_rules");
        }
        

        $rec=$con->query("select count(*) from package_rules");
        $norec=mysqli_fetch_array($rec);
        $_SESSION['package_rulescount']=$norec[0];

        $pages=ceil($_SESSION['package_rulescount']/$perpage);

        if($pages<$_SESSION['currpage'])
        {
            if($pages==0)
            {
                $_SESSION['currpage']=1;    
            }
            else
            {
                $_SESSION['currpage']=$pages;
            }
            $st=($_SESSION['currpage']*$perpage)-$perpage;
        }

?>

<div class="col-md-12 animated bounceInRight">
    <p class="adminp"><?php echo $_SESSION['identity']." management"; ?></p>
    <hr/>
</div>
        <div class="col-md-3">
            <div class="frm p-3">

                    <?php
                    if($_REQUEST['action']=="update")
                        {
                            $data=$con->query("select * from package_rules where package_rulesid=$_REQUEST[id]");
                            $row=mysqli_fetch_array($data);
                            $_SESSION['upid']=$_REQUEST['id'];
                    ?>

                        <form action="" method="post" name="uppackage_rules">
                        <p><?php echo "update ".$_SESSION['identity']; ?></p>
                        <hr/>
                            <?php
                                if($_SESSION['duperr']==1)
                                {
                                    echo "<font size=2 color=red>Already Exist!</font>";
                                    $_SESSION['duperr']=0;
                                }                        
                            ?>

                            <select class="form-control" name="uppackageid" required="">
                           
                                <?php
                                    $data=$con->query("select * from package");
                                    while($row1=mysqli_fetch_array($data))
                                    {
                                ?>
                                    <option value="<?php echo $row1[0];?>" <?php if($row1[0]==$row[0]) echo "selected" ?>><?php echo $row1[1]; ?></option>
                                <?php        
                                    }
                                ?>
                            </select>
                            <br/>
                            <br/>

                            <label>Rules</label>
                            <input type="text" class="form-control" id="" name="uprules" value="<?php echo $row[2];?>" required="">
                            
                            <div class="mt-3">   
                                <button name="uppackage_rules" class="btn btn-info" type="submit">Update</button>
                                
                                <button class="btn btn-info" type="reset">Cancel</button>
                            </div>
                        </form>

                    <?php
                        }
                    else
                        {
                    ?>

                        <form action="" method="post" name="package_rules">
                            <p><?php echo "add ".$_SESSION['identity']; ?></p>
                            <hr/>
                                <?php
                                    if($_SESSION['duperr']==1)
                                    {
                                        echo "<font size=2 color=red>Already Exist!</font>";
                                        $_SESSION['duperr']=0;
                                    }                        
                                ?>

                                <select class="form-control" name="packageid" required="">
                                <option value="">--Select Package--</option>
                                <?php
                                    $data=$con->query("select * from package");
                                    while($row=mysqli_fetch_array($data))
                                    {
                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                <?php        
                                    }
                                ?>
                                </select>
                                <br/>
                                <br/>
                                <label>Package Name</label>
                                <input type="text" class="form-control" id="" name="rules" placeholder="Package Rules" required="">
                                
                                <div class="mt-3">   
                                    <button name="inpackage_rules" class="btn btn-info" type="submit">Submit</button>
                                    
                                    <button class="btn btn-info" type="reset">Cancel</button>
                                </div>
                        </form>

                    <?php
                        }
                    ?> 

            </div>
        </div>
        <div class="col-md-9">
            <div class="dis p-3">
                <p><?php echo "manage ".$_SESSION['identity']; ?>
                <?php
                    if($_SESSION['package_rulescount']!=0)
                    { 
                    $rs=(($_SESSION['currpage']*$perpage)-$perpage)+1;
                    $re=$_SESSION['currpage']*$perpage;
                    if($re>$_SESSION['package_rulescount'])
                    {
                        $re=$_SESSION['package_rulescount'];
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
                                <th>Categoryid</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </thead>

                            <tbody>
                                <?php
                                    $c=0;
                                    if($_REQUEST['action']=="search")
                                    {

                                            $data=$con->query("select * from package_rules where name like '%$_REQUEST[id]%'");
                                    }
                                    else
                                    {
                                            $data=$con->query("select pr.*,p.name from package_rules as pr,package p where pr.packageid=p.packageid order by package_rulesid desc limit $st,$perpage");
                                    }    

                                    while($row=mysqli_fetch_array($data))
                                    {
                                        $c++;
                                ?>
                                        <tr>
                                            <td><?php echo $row[3]; ?> </td>    
                                            <td><?php echo $row[2]; ?> </td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','update',<?php echo $row[1]?>);"><i class="far fa-edit"></i></td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[1]?>);"><i class="far fa-trash-alt"></i></td>
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
                            <center>
                            
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
<?php 

}

//end package_rules










//start package
if($_REQUEST['what']=="package")
{
    if($_REQUEST['action']=="display" && $_REQUEST['id']==0)
    {
        $_SESSION['currpage']=1;
    }
    if($_SESSION['currpage']=="" || $_SESSION['insuccess']==1)
    {
        $_SESSION['currpage']=1;
        unset($_SESSION['insuccess']);
    }

    if($_REQUEST['action']=="paging")
    {
        $st=($_REQUEST['id']*$perpage)-$perpage;
        $_SESSION['currpage']=$_REQUEST['id'];
    }
    else
    {
        $st=($_SESSION['currpage']*$perpage)-$perpage;
    }

    if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from package where packageid=$_REQUEST[id]");
        }
    if($_REQUEST['action']=="deleteall")
        {
            $del=$con->query("delete from package");
        }
        

        $rec=$con->query("select count(*) from package");
        $norec=mysqli_fetch_array($rec);
        $_SESSION['packagecount']=$norec[0];

        $pages=ceil($_SESSION['packagecount']/$perpage);

        if($pages<$_SESSION['currpage'])
        {
            if($pages==0)
            {
                $_SESSION['currpage']=1;    
            }
            else
            {
                $_SESSION['currpage']=$pages;
            }
            $st=($_SESSION['currpage']*$perpage)-$perpage;
        }

?>

<div class="col-md-12 animated bounceInRight">
    <p class="adminp"><?php echo $_SESSION['identity']." management"; ?></p>
    <hr/>
</div>
        <div class="col-md-3">
            <div class="frm p-3">

                    <?php
                    if($_REQUEST['action']=="update")
                        {
                            $data=$con->query("select * from package where packageid=$_REQUEST[id]");
                            $row=mysqli_fetch_array($data);
                            $_SESSION['upi']=$_REQUEST['id'];
                    ?>

                        <form action="" method="post" name="uppackage" enctype="multipart/form-data">
                        <p><?php echo "update ".$_SESSION['identity']; ?></p>
                        <hr/>
                            <?php
                                if($_SESSION['duperr']==1)
                                {
                                    echo "<font size=2 color=red>Already Exist!</font>";
                                    $_SESSION['duperr']=0;
                                }                        
                            ?>
                            
                            <label>Package Name</label>
                            <input type="text" class="form-control" name="upname" value="<?php echo $row[1];?>" required="">
                            <br/>
                            <br/>

                            <input type="file" class="form-control-sm" name="upicon" >
                            <input type="hidden" name="oldpath" value="<?php echo $row[2];?>">
                            <br/>
                            <br/>

                            <label>Duration</label>
                            <input type="text" class="form-control" name="upduration" value="<?php echo $row[3];?>" required="">
                           

                            <label>Amount</label>
                            <input type="text" class="form-control" name="upamount" value="<?php echo $row[4];?>" required="">
                           

                            <label>Download Counter</label>
                            <input type="text" class="form-control" name="updownload_counter" value="<?php echo $row[5];?>" required="">
                            
                            <div class="mt-3">   
                                <button name="uppackage" class="btn btn-info" type="submit">Update</button>
                                
                                <button class="btn btn-info" type="reset">Cancel</button>
                            </div>
                        </form>

                    <?php
                        }
                    else
                        {
                    ?>

                        <form action="" method="post" name="package" enctype="multipart/form-data">
                            <p><?php echo "add ".$_SESSION['identity']; ?></p>
                            <hr/>
                                <?php
                                    if($_SESSION['duperr']==1)
                                    {
                                        echo "<font size=2 color=red>Already Exist!</font>";
                                        $_SESSION['duperr']=0;
                                    }                        
                                ?>

                                <label>Package Name</label>
                                <input type="text" class="form-control" id="" name="name" placeholder="Package Name" required="">
                                <br/>
                                <br/>
                                <input type="file" class="form-control-sm"  name="icon" required="">
                                <br/>
                                <br/>
                                <label>Duration</label>
                                <input type="text" class="form-control" name="duration" value="<?php echo $row[3];?>" required="">
                                
                                <label>Amount</label>
                                <input type="text" class="form-control" name="amount" value="<?php echo $row[4];?>" required="">

                                <label>Download Counter</label>
                                <input type="text" class="form-control" name="download_counter" value="<?php echo $row[5];?>" required="">
                                
                                <div class="mt-3">   
                                    <button name="inpackage" class="btn btn-info" type="submit">Submit</button>
                                    
                                    <button class="btn btn-info" type="reset">Cancel</button>
                                </div>
                        </form>

                    <?php
                        }
                    ?> 

            </div>
        </div>
        <div class="col-md-9">
            <div class="dis p-3">
                <p><?php echo "manage ".$_SESSION['identity']; ?>
                <?php
                    if($_SESSION['packagecount']!=0)
                    { 
                    $rs=(($_SESSION['currpage']*$perpage)-$perpage)+1;
                    $re=$_SESSION['currpage']*$perpage;
                    if($re>$_SESSION['packagecount'])
                    {
                        $re=$_SESSION['packagecount'];
                    }
                ?>
                [Record Range : <?php echo "$rs to $re"; ?>]
                <?php 
                    } 
                ?>
                <i class="far fa-trash-alt" style="opacity: 0;" ondblclick="getdata('<?php echo $_SESSION['identity']; ?>','deleteall',0);" ></i>
                </p>
                <hr/>
                    <div class="row">
                      <!--  <table class="table table-hover">
                            <thead style="background-color:#03a9f3; color:#fff;">    
                                <th>Package Name</th>
                                <th>Icon</th>
                                <th>Duration</th>
                                <th>Amount</th>
                                <th>Download Counter</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </thead>

                            <tbody>  -->   




                                <?php
                                    $c=0;
                                    if($_REQUEST['action']=="search")
                                    {

                                            $data=$con->query("select * from package where name like '%$_REQUEST[id]%'");
                                    }
                                    else
                                    {
                                            $data=$con->query("select * from package order by packageid desc");
                                    }    

                                    while($row=mysqli_fetch_array($data))
                                    {
                                        $c++;
                                        $l++;
                                ?>
                                    <div class="col-md-4">
                                        <div class="pack">
                                            <div class="packover">
                                                <center>
                                                    <p class="tx"><?php echo $row[1]; ?></p>
                                                    <img class="animated pulse infinite" style="cursor: pointer;" src="<?php echo $row[2]; ?>" />
                                                    <div class="row text-center"><p class="txx col-md-6"><?php echo $row[3] ?></p>
                                                    
                                                    <p class="txx col-md-6"><?php echo $row[5]." "; ?>Downloadre</p>
                                                </div>
                                                    <a onclick="getdata('<?php echo $_SESSION['identity']; ?>','update',<?php echo $row[0]?>);" ><i class="far fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a onclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[0]?>);"><i class="far fa-trash-alt"></i></a>
                                                    <p class="pri">&#8377;<?php echo " ".$row[4]; ?></p>
                                                </center>                    
                                            </div>
                                            <img  src="package/<?php echo $l.".png"; ?>" />
                                            <?php if($l==3){$l=0;}?>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                        <!--    </tbody> --> 
                            <?php 
                                if($c!=0) 
                                {
                                    if($_REQUEST['action']!="search")
                                    { 
                            ?>    
                         <!--   <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <center>
          
                                                <ul class="paging"> -->
                                                   
                                          <!--      </ul>
                                            </center>
                                        </td>
                                    </tr>
                            </tfoot> -->
                            <?php 
                                }
                            }
                            ?>
                     <!-- </table>  -->
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
<?php 

}

//end package









//start advertisement
if($_REQUEST['what']=="advertisement")
{
    if($_REQUEST['action']=="display" && $_REQUEST['id']==0)
    {
        $_SESSION['currpage']=1;
    }
    if($_SESSION['currpage']=="" || $_SESSION['insuccess']==1)
    {
        $_SESSION['currpage']=1;
        unset($_SESSION['insuccess']);
    }

    if($_REQUEST['action']=="paging")
    {
        $st=($_REQUEST['id']*$perpage)-$perpage;
        $_SESSION['currpage']=$_REQUEST['id'];
    }
    else
    {
        $st=($_SESSION['currpage']*$perpage)-$perpage;
    }

    if($_REQUEST['action']=="delete")
        {
            $del=$con->query("delete from advertisement where advertisementid=$_REQUEST[id]");
        }
    if($_REQUEST['action']=="deleteall")
        {
            $del=$con->query("delete from advertisement");
        }
        

        $rec=$con->query("select count(*) from advertisement");
        $norec=mysqli_fetch_array($rec);
        $_SESSION['advertisementcount']=$norec[0];

        $pages=ceil($_SESSION['advertisementcount']/$perpage);

        if($pages<$_SESSION['currpage'])
        {
            if($pages==0)
            {
                $_SESSION['currpage']=1;    
            }
            else
            {
                $_SESSION['currpage']=$pages;
            }
            $st=($_SESSION['currpage']*$perpage)-$perpage;
        }

?>

<div class="col-md-12 animated bounceInRight">
    <p class="adminp"><?php echo $_SESSION['identity']." management"; ?></p>
    <hr/>
</div>
        <div class="col-md-3">
            <div class="frm p-3">

                    <?php
                    if($_REQUEST['action']=="update")
                        {
                            $data=$con->query("select * from advertisement where advertisementid=$_REQUEST[id]");
                            $row=mysqli_fetch_array($data);
                            $_SESSION['upid']=$_REQUEST['id'];
                    ?>

                        <form action="" method="post" name="upadvertisement" enctype="multipart/form-data">
                        <p><?php echo "update ".$_SESSION['identity']; ?></p>
                        <hr/>
                            <?php
                                if($_SESSION['duperr']==1)
                                {
                                    echo "<font size=2 color=red>Already Exist!</font>";
                                    $_SESSION['duperr']=0;
                                }                        
                            ?>
                            
                           
                            <input type="file" class="form-control-sm" name="uppostimage" >
                            <input type="hidden" name="oldpath" value="<?php echo $row[1];?>">
                            
                            <div class="mt-3">   
                                <button name="upadvertisement" class="btn btn-info" type="submit">Update</button>
                                
                                <button class="btn btn-info" type="reset">Cancel</button>
                            </div>
                        </form>

                    <?php
                        }
                    else
                        {
                    ?>

                        <form action="" method="post" name="advertisement" enctype="multipart/form-data">
                            <p><?php echo "add ".$_SESSION['identity']; ?></p>
                            <hr/>
                                <?php
                                    if($_SESSION['duperr']==1)
                                    {
                                        echo "<font size=2 color=red>Already Exist!</font>";
                                        $_SESSION['duperr']=0;
                                    }                        
                                ?>

                               
                                <input type="file" class="form-control-sm"  name="postimage" required="">
                                
                                <div class="mt-3">   
                                    <button name="inadvertisement" class="btn btn-info" type="submit">Submit</button>
                                    
                                    <button class="btn btn-info" type="reset">Cancel</button>
                                </div>
                        </form>

                    <?php
                        }
                    ?> 

            </div>
        </div>
        <div class="col-md-9">
            <div class="dis p-3">
                <p><?php echo "manage ".$_SESSION['identity']; ?>
                <?php
                    if($_SESSION['advertisementcount']!=0)
                    { 
                    $rs=(($_SESSION['currpage']*$perpage)-$perpage)+1;
                    $re=$_SESSION['currpage']*$perpage;
                    if($re>$_SESSION['advertisementcount'])
                    {
                        $re=$_SESSION['advertisementcount'];
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
                                <th>Post Image</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </thead>

                            <tbody>
                                <?php
                                    $c=0;
                                    if($_REQUEST['action']=="search")
                                    {

                                            $data=$con->query("select * from advertisement where name like '%$_REQUEST[id]%'");
                                    }
                                    else
                                    {
                                            $data=$con->query("select * from advertisement order by advertisementid desc limit $st,$perpage");
                                    }    

                                    while($row=mysqli_fetch_array($data))
                                    {
                                        $c++;
                                ?>
                                        <tr>
                                            <td class="pimage"><img src="<?php echo $row[1];?>"></td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','update',<?php echo $row[0]?>);"><i class="far fa-edit"></i></td>
                                            <td onclick="getdata('<?php echo $_SESSION['identity']; ?>','delete',<?php echo $row[0]?>);"><i class="far fa-trash-alt"></i></td>
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
<?php 

}

//end advertisement








?>
