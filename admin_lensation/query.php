<?php
require_once "connection.php";

//category query

if(isset($_REQUEST['incategory']))
{
    $data=$con->query("select * from category where name like '$_REQUEST[name]'");

    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
        $in=$con->query("insert into category values(0,'$_REQUEST[name]')");
        $_SESSION['insuccess']=1;
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}

if(isset($_REQUEST['upcategory']))
{
    $data=$con->query("select * from category where name like '$_REQUEST[upname]'");

    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
        $up=$con->query("update category set name='$_REQUEST[upname]' where categoryid=$_SESSION[upid]");
        unset($_SESSION['upid']);
        
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}







//design_software query

if(isset($_REQUEST['indesign_software']))
	{
        $data=$con->query("select * from design_software where name like '$_REQUEST[name]'");

        $row=mysqli_fetch_array($data);
    
        if($row[0]=="")
        {
         
		//file available validation
		if($_FILES['icon']['name']!="")
		{
          //  echo "hey";
			//file size validation
			if(($_FILES['icon']['size']/1024/1024)<5)
			{
				//file type validation
				if($_FILES['icon']['type']=="image/jpg" || $_FILES ['icon']['type']=="image/jpeg"|| $_FILES ['icon']['type']=="image/png")
				{
					//file currepted
					if($_FILES['icon']['error']==0)
					{
						$ex=".".substr($_FILES['icon']['type'],6);
						$newname=$_REQUEST['name'].date('m').chr(rand(65,90)).rand(10,99);
						
						// echo $newname.$ex;

						$serverpath=dirname(__FILE__)."\assets\images\softicon\\".$newname.$ex;

						// echo $serverpath;

						$databasepath="assets/images/softicon/".$newname.$ex;
						
						//echo $databasepath;

						if(move_uploaded_file($_FILES['icon']['tmp_name'],$serverpath))
						{
							$in=$con->query("insert into design_software values(0,'$_REQUEST[name]','$databasepath')");
                            $_SESSION['insuccess']=1;
						}
					}
				}
			}
		}
    }
    else{
        $_SESSION['duperr']=1;
    }
}




if(isset($_REQUEST['updesign_software']))
	{
      
            // echo "hey";
            if($_FILES['upicon']['name']!="")
            {
                if(($_FILES['upicon']['size']/1024/1024)<5)
                {
                    //file type validation
                    if($_FILES['upicon']['type']=="image/jpg" || $_FILES ['upicon']['type']=="image/jpeg"|| $_FILES ['upicon']['type']=="image/png")
                    {
                        //file currepted
                        if($_FILES['upicon']['error']==0)
                        {
                            $ex=".".substr($_FILES['upicon']['type'],6);
                            $newname=$_REQUEST['upname'].date('m').chr(rand(65,90)).rand(10,99);
                            $ex;
                            
                            // echo $newname.$ex;

                            $serverpath=dirname(__FILE__)."\assets\images\softicon\\".$newname.$ex;

                            // echo $serverpath;

                            $databasepath="assets/images/softicon/".$newname.$ex;
                            
                            //echo $databasepath;

                            if(move_uploaded_file($_FILES['upicon']['tmp_name'],$serverpath))
                            {
                                $up=$con->query("update design_software set name='$_REQUEST[upname]',icon='$databasepath' where design_softwareid=$_SESSION[upid]");
                                unset($_SESSION['upid']);
                            }
                            else
                            {
                                $_SESSION['duperr']=1;
                            }
                        }
                    }
                }
            }
    else
    {
        $up=$con->query("update design_software set name='$_REQUEST[upname]',icon='$_REQUEST[oldpath]' where design_softwareid=$_SESSION[upid]");
    }
}














//posttype query

if(isset($_REQUEST['inposttype']))
{
    $data=$con->query("select * from posttype where name like '$_REQUEST[name]'");

    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
        $in=$con->query("insert into posttype values(0,'$_REQUEST[name]')");
        $_SESSION['insuccess']=1;
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}

if(isset($_REQUEST['upposttype']))
{
    $data=$con->query("select * from posttype where name like '$_REQUEST[upname]'");

    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
        $up=$con->query("update posttype set name='$_REQUEST[upname]' where posttypeid=$_SESSION[upid]");
        unset($_SESSION['upid']);
        
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}








//package_offer query

if(isset($_REQUEST['inpackage_offer']))
{

    // $data=$con->query("select * from package_offer where name like '$_REQUEST[name]','$_REQUEST[startdate]','$_REQUEST[enddate]','$_REQUEST[percentage]'");
    $data = $con->query("select * from package_offer where name like '$_REQUEST[name]'and name like '$_REQUEST[startdate]'and name like '$_REQUEST[enddate]'and name like '$_REQUEST[percentage]'");

    // echo 'DEDA';
    // die();
    $row=mysqli_fetch_array($data);
    
    if($row[0]=="")
    {
        // $in=$con->query("insert into package_offer values(0,'$_REQUEST[name]','$_REQUEST[startdate]','$_REQUEST[enddate]','$_REQUEST[percentage]')");
        $in = $con->query("insert into package_offer values(0,'$_REQUEST[name]','$_REQUEST[startdate]','$_REQUEST[enddate]','$_REQUEST[percentage]')");

        $_SESSION['insuccess']=1;
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}

// if(isset($_REQUEST['uppackage_offer']))
// {
//     // $data=$con->query("select * from package_offer where name like '$_REQUEST[upname]','$_REQUEST[upstartdate]','$_REQUEST[upenddate]','$_REQUEST[uppercentage]'");
//     $data = $con->query("select * from package_offer where name like '$_REQUEST[upname]'and name like'$_REQUEST[upstartdate]'and name like'$_REQUEST[upenddate]'and name like'$_REQUEST[uppercentage]'");

//     $row=mysqli_fetch_array($data);

//     if($row[0]=="")
//     {
//         // $up=$con->query("update package_offer set name=?,startdate=?,enddate=?,'percentage=? where package_offerid=?");
//         $up=$con->query("update package_offer set name='$_REQUEST[upname]',startdate='$_REQUEST[upstartdate]',enddate='$_REQUEST[upenddate]','percentage=$_REQUEST[uppercentage]' where package_offerid=$_SESSION[upid]");
//     //  echo "================================= $_REQUEST[upname]------------";
//     //  $up->execute($_REQUEST['name'],$_REQUEST['startdate'],$_REQUEST['enddate'],$_REQUEST['percentage'],$_REQUEST['id']);

//            unset($_SESSION['upid']);
        
//     }
//     else
//     {
//         $_SESSION['duperr']=1;
//     }    

// }









//subcategory query

if(isset($_REQUEST['insubcategory']))
{
    // $data=$con->query("select * from subcategory where name like '$_REQUEST[categoryid]','$_REQUEST[name]'");
    $data = $con->query("select * from subcategory where name like '$_REQUEST[categoryid]' and name like '$_REQUEST[name]'");

    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
        $in=$con->query("insert into subcategory values('$_REQUEST[categoryid]',0,'$_REQUEST[name]')");
        $_SESSION['insuccess']=1;
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}

if(isset($_REQUEST['upsubcategory']))
{
    // $data=$con->query("select * from subcategory where name like '$_REQUEST[upcategoryid]','$_REQUEST[upname]'");
    $data = $con->query("select * from subcategory where name like '$_REQUEST[upcategoryid]'and name like '$_REQUEST[upname]'");

    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
        // $up=$con->query("update subcategory set categoryid='$_REQUEST[upcategoryid]',name='$_REQUEST[upname]' where subcategoryid=$_SESSION[upid]");
        $up = $con->query("update subcategory set categoryid='$_REQUEST[upcategoryid]',name='$_REQUEST[upname]' where subcategoryid=$_SESSION[upid]");
        
        unset($_SESSION['upid']);
        
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}



//package_rules query

if(isset($_REQUEST['inpackage_rules']))
{
    // $data=$con->query("select * from package_rules where rules like '$_REQUEST[packageid]','$_REQUEST[rules]'");
    $data = $con->query("select * from package_rules where rules like '$_REQUEST[packageid]'and rules like '$_REQUEST[rules]'");

    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
        $in=$con->query("insert into package_rules values('$_REQUEST[packageid]',0,'$_REQUEST[rules]')");
        $_SESSION['insuccess']=1;
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}

if(isset($_REQUEST['uppackage_rules']))
{
    // $data=$con->query("select * from package_rules where rules like '$_REQUEST[uppackageid]','$_REQUEST[uprules]'");
    $data = $con->query("select * from package_rules where rules like '$_REQUEST[uppackageid]' and rules like '$_REQUEST[uprules]'");

    $row=mysqli_fetch_array($data);

    if($row[0]=="")
    {
        $up=$con->query("update package_rules set packageid='$_REQUEST[uppackageid]',rules='$_REQUEST[uprules]' where package_rulesid=$_SESSION[upid]");
        unset($_SESSION['upid']);
        
    }
    else
    {
        $_SESSION['duperr']=1;
    }    

}








//package query

if(isset($_REQUEST['inpackage']))
	{
        $data=$con->query("select * from package where name like '$_REQUEST[name]'");

        $row=mysqli_fetch_array($data);
    
        if($row[0]=="")
        {
         
		//file available validation
		if($_FILES['icon']['name']!="")
		{
          //  echo "hey";
			//file size validation
			if(($_FILES['icon']['size']/1024/1024)<5)
			{
				//file type validation
				if($_FILES['icon']['type']=="image/jpg" || $_FILES ['icon']['type']=="image/jpeg"|| $_FILES ['icon']['type']=="image/png")
				{
					//file currepted
					if($_FILES['icon']['error']==0)
					{
						$ex=".".substr($_FILES['icon']['type'],6);
						$newname=$_REQUEST['name'].date('m').chr(rand(65,90)).rand(10,99);
						
						// echo $newname.$ex;

						$serverpath=dirname(__FILE__)."\assets\images\packageicon\\".$newname.$ex;

						// echo $serverpath;

						$databasepath="assets/images/packageicon/".$newname.$ex;
						
						//echo $databasepath;

						if(move_uploaded_file($_FILES['icon']['tmp_name'],$serverpath))
						{
							$in=$con->query("insert into package values(0,'$_REQUEST[name]','$databasepath','$_REQUEST[duration]',$_REQUEST[amount],$_REQUEST[download_counter])");
                            $_SESSION['insuccess']=1;
						}
					}
				}
			}
		}
    }
    else
    {
        $_SESSION['duperr']=1;
    }
}




if(isset($_REQUEST['uppackage']))
	{
      
        $data=$con->query("select * from package where name like '$_REQUEST[upnam]'");

        $row=mysqli_fetch_array($data);
    
        if($row[0]=="")
        {
           
            if($_FILES['upicon']['name']==""){
            $up=$con->query("update package set name='$_REQUEST[upname]',icon='$_REQUEST[oldpath]',duration='$_REQUEST[upduration]',amount=$_REQUEST[upamount],download_counter=$_REQUEST[updownload_counter] where packageid=$_SESSION[upi]");
            unset($_SESSION['upid']);
            }
            else
            {
            // echo "hey";
            if($_FILES['upicon']['name']!="")
            {
                if(($_FILES['upicon']['size']/1024/1024)<5)
                {
                    //file type validation
                    if($_FILES['upicon']['type']=="image/jpg" || $_FILES ['upicon']['type']=="image/jpeg"|| $_FILES ['upicon']['type']=="image/png")
                    {
                        //file currepted
                        if($_FILES['upicon']['error']==0)
                        {
                            $ex=".".substr($_FILES['upicon']['type'],6);
                            $newname=$_REQUEST['upname'].date('m').chr(rand(65,90)).rand(10,99);
                            $ex;
                            
                            // echo $newname.$ex;

                            $serverpath=dirname(__FILE__)."\assets\images\packageicon\\".$newname.$ex;

                            // echo $serverpath;

                            $databasepath="assets/images/packageicon/".$newname.$ex;
                            
                            //echo $databasepath;

                            if(move_uploaded_file($_FILES['upicon']['tmp_name'],$serverpath))
                            {
                                $up=$con->query("update package set name='$_REQUEST[upname]',icon='$databasepath',duration='$_REQUEST[upduration]',amount=$_REQUEST[upamount],download_counter=$_REQUEST[updownload_counter] where packageid=$_SESSION[upi]");
                                unset($_SESSION['upid']);
                            }
                        }
                    }
                }
            }
        }
    }
    else
    {
        $_SESSION['duperr']=1;
    }
}










//advertisement query

if(isset($_REQUEST['inadvertisement']))
	{
        // $data=$con->query("select * from advertisement where name like '$_REQUEST[name]'");
        $data = $con->query("select * from advertisement where postimage like '$_REQUEST[name]'");

        $row=mysqli_fetch_array($data);
    
        if($row[0]=="")
        {
         
		//file available validation
		if($_FILES['postimage']['name']!="")
		{
          //  echo "hey";
			//file size validation
			if(($_FILES['postimage']['size']/1024/1024)<5)
			{
				//file type validation
				if($_FILES['postimage']['type']=="image/jpg" || $_FILES ['postimage']['type']=="image/jpeg"|| $_FILES ['postimage']['type']=="image/png")
				{
					//file currepted
					if($_FILES['postimage']['error']==0)
					{
						$ex=".".substr($_FILES['postimage']['type'],6);
						$newname=$_REQUEST['name'].date('m').chr(rand(65,90)).rand(10,99);
						
						// echo $newname.$ex;

						// $serverpath=dirname(__FILE__)."\assets\images\postimage\\".$newname.$ex;

						// echo $serverpath;

						$databasepath="assets/images/postimage/".$newname.$ex;
						
						//echo $databasepath;

						// if(move_uploaded_file($_FILES['postimage']['tmp_name'],$serverpath))
                        if (move_uploaded_file($_FILES['postimage']['tmp_name'], $databasepath))
						{
							$in=$con->query("insert into advertisement values(0,'$databasepath')");
                            $_SESSION['insuccess']=1;
						}
					}
				}
			}
		}
    }
    else{
        $_SESSION['duperr']=1;
    }
}




if(isset($_REQUEST['upadvertisement']))
	{
      
        // $data=$con->query("select * from advertisement where name like '$_REQUEST[upnam]'");
        $data = $con->query("select * from advertisement where postimage like '$_REQUEST[upnam]'");

        $row=mysqli_fetch_array($data);
    
        if($row[0]=="")
        {
           
            if($_FILES['uppostimage']['name']==""){
            $up=$con->query("update advertisement set postimage='$_REQUEST[oldpath]' where advertisementid=$_SESSION[upid]");
            unset($_SESSION['upid']);
        }
        else
        {
            // echo "hey";
            if($_FILES['uppostimage']['name']!="")
            {
                if(($_FILES['uppostimage']['size']/1024/1024)<5)
                {
                    //file type validation
                    if($_FILES['uppostimage']['type']=="image/jpg" || $_FILES ['uppostimage']['type']=="image/jpeg"|| $_FILES ['uppostimage']['type']=="image/png")
                    {
                        //file currepted
                        if($_FILES['uppostimage']['error']==0)
                        {
                            $ex=".".substr($_FILES['uppostimage']['type'],6);
                            $newname=$_REQUEST['upname'].date('m').chr(rand(65,90)).rand(10,99);
                            $ex;
                            
                            // echo $newname.$ex;

                            $serverpath=dirname(__FILE__)."\assets\images\postimage\\".$newname.$ex;

                            // echo $serverpath;

                            $databasepath="assets/images/postimage/".$newname.$ex;
                            
                            //echo $databasepath;

                            if(move_uploaded_file($_FILES['uppostimage']['tmp_name'],$serverpath))
                            {
                                $up=$con->query("update advertisement set postimage='$databasepath' where advertisementid=$_SESSION[upid]");
                                unset($_SESSION['upid']);
                            }
                        }
                    }
                }
            }
        }
    }
    else
    {
        $_SESSION['duperr']=1;
    }
}






?>


