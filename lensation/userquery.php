<?php

// change password
if(isset($_REQUEST['chpass']))
{
    $data=$con->query("select password from user_register where userid like '$_SESSION[userid]'");

    $row=mysqli_fetch_array($data);

    if($row[0]==$_REQUEST['curpassword'])
    {
        $up=$con->query("update user_register set password='$_REQUEST[newpassword]' where userid like '$_SESSION[userid]'");
        header('location:logout.php');
    }    
    else
    {
        
    }    
}



// change designer_password
if(isset($_REQUEST['chpass']))
{
    $data=$con->query("select password from designer_register where userid like '$_SESSION[userid]'");

    $row=mysqli_fetch_array($data);

    if($row[0]==$_REQUEST['curpassword'])
    {
        $up=$con->query("update designer_register set password='$_REQUEST[newpassword]' where userid like '$_SESSION[userid]'");
        header('location:logout.php');
    }    
    else
    {
        
    }    
}



// company_change password

if(isset($_REQUEST['cchpass']))
{
    $data=$con->query("select password from company_register where userid like '$_SESSION[userid]'");

    $row=mysqli_fetch_array($data);

    if($row[0]==$_REQUEST['curpassword'])
    {
        $up=$con->query("update company_register set password='$_REQUEST[newpassword]' where userid like '$_SESSION[userid]'");
        header('location:logout.php');
    }    
    else
    {
        
    }    
}




// edit profile

if(isset($_REQUEST['profile']))
{
        $up=$con->query("update user_register set name='$_REQUEST[changename]',bdate='$_REQUEST[bdate]' where userid like '$_SESSION[userid]'");
        // header('location:logout.php');
}


if(isset($_REQUEST['btnchangepic']))
	{
		//file available validation
		if($_FILES['changeprofilepic']['name']!="")
		{
			//file size validation
			if(($_FILES['changeprofilepic']['size']/1024/1024)<5)
			{
				//file type validation
				if($_FILES['changeprofilepic']['type']=="image/jpg" || $_FILES ['changeprofilepic']['type']=="image/jpeg")
				{
					//file currepted
					if($_FILES['changeprofilepic']['error']==0)
					{
						$ex=".".substr($_FILES['changeprofilepic']['type'],6);
						$newname=date('m').chr(rand(65,90)).rand(10,99);
						
						// echo $newname.$ex;

						$serverpath=dirname(__FILE__)."\img\userprofile\\".$newname.$ex;

						// echo $serverpath;

						$databasepath="img/userprofile/".$newname.$ex;
						
						//echo $databasepath;

						if(move_uploaded_file($_FILES['changeprofilepic']['tmp_name'],$serverpath))
						{
                            $up=$con->query("update user_register set profile='$databasepath' where userid like '$_SESSION[userid]'");
						}
					}
				}
			}
		}
	}







// company_edit profile

if(isset($_REQUEST['upprofile']))
{
	// echo $_REQUEST['changesince'];
     $upp=$con->query("update company_register set company_name='$_REQUEST[changename]',location='$_REQUEST[changelocation]',contact='$_REQUEST[changecontact]',since=$_REQUEST[changesince] where userid like '$_SESSION[userid]'");
        // header('location:logout.php');
}


if(isset($_REQUEST['btnchangephoto']))
	{
		
		//file available validation
		if($_FILES['changeprofilepic']['name']!="")
		{
			//file size validation
			if(($_FILES['changeprofilepic']['size']/1024/1024)<5)
			{
				//file type validation
				if($_FILES['changeprofilepic']['type']=="image/jpg" || $_FILES ['changeprofilepic']['type']=="image/jpeg" || $_FILES ['changeprofilepic']['type']=="image/png")
				{
					//file currepted
					if($_FILES['changeprofilepic']['error']==0)
					{
						$ex=".".substr($_FILES['changeprofilepic']['type'],6);
						$newname=date('m').chr(rand(65,90)).rand(10,99);
						
						// echo $newname.$ex;

						$serverpath=dirname(__FILE__)."\img\companyprofile\\".$newname.$ex;

						// echo $serverpath;

						$databasepath="img/companyprofile/".$newname.$ex;
						
						// echo $databasepath;

						if(move_uploaded_file($_FILES['changeprofilepic']['tmp_name'],$serverpath))
						{
							// echo "hii";
                            $up=$con->query("update company_register set logo='$databasepath' where userid like '$_SESSION[userid]'");
						}
					}
				}
			}
		}
	}



// bank

if(isset($_REQUEST['done']))

{
	$in=$con->query("insert into bank values('$_SESSION[who]','$_SESSION[userid]',0,'$_REQUEST[name]','$_REQUEST[acnumber]','$_REQUEST[ifsc]','$_REQUEST[swiftcode]')");
}




	


// designer_edit profile

if(isset($_REQUEST['designerprofile']))
{
        $up=$con->query("update designer_register set name='$_REQUEST[changename]',bdate='$_REQUEST[bdate]' where userid like '$_SESSION[userid]'");
        // header('location:logout.php');
}


if(isset($_REQUEST['btnchangepost']))
	{
		//file available validation
		if($_FILES['changeprofilepic']['name']!="")
		{
			//file size validation
			if(($_FILES['changeprofilepic']['size']/1024/1024)<5)
			{
				//file type validation
				if($_FILES['changeprofilepic']['type']=="image/jpg" || $_FILES ['changeprofilepic']['type']=="image/jpeg")
				{
					//file currepted
					if($_FILES['changeprofilepic']['error']==0)
					{
						$ex=".".substr($_FILES['changeprofilepic']['type'],6);
						$newname=date('m').chr(rand(65,90)).rand(10,99);
						
						// echo $newname.$ex;

						$serverpath=dirname(__FILE__)."\img\designerprofile\\".$newname.$ex;

						// echo $serverpath;

						$databasepath="img/designerprofile/".$newname.$ex;
						
						//echo $databasepath;

						if(move_uploaded_file($_FILES['changeprofilepic']['tmp_name'],$serverpath))
						{
                            $up=$con->query("update designer_register set profile='$databasepath' where userid like '$_SESSION[userid]'");
						}
					}
				}
			}
		}
	}




// posting

	if(isset($_REQUEST['posted']))
	{
		
		//file available validation
		if($_FILES['poster']['name']!="" && $_FILES['posterzip']['name']!="")
		{
			if(($_FILES['poster']['size']/1024/1024)<5 && ($_FILES['posterzip']['size']/1024/1024)<20)
			{

				if($_FILES['poster']['error']==0 && $_FILES['posterzip']['error']==0)
				{
					$data = pathinfo($_FILES["poster"]["name"]);
					$zipdata = pathinfo($_FILES["posterzip"]["name"]);

					$newname=$_REQUEST['name'].date('m').chr(rand(65,90)).rand(10,99);	
					$newname1=$_REQUEST['name'].date('m').chr(rand(65,90)).rand(10,99);

					$target_dir = "img/poster/";
					$ziptarget_dir = "img/posterzip/";

					$today=date('Y-m-d');

					

					$target_file = $target_dir . $newname .'.'. $data['extension'];
					$ziptarget_file = $ziptarget_dir . $newname1 .'.'. $zipdata['extension'];

					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					if((move_uploaded_file($_FILES['poster']['tmp_name'],$target_file)) && (move_uploaded_file($_FILES['posterzip']['tmp_name'],$ziptarget_file)))
					{		
					$in=$con->query("insert into posting values('$_SESSION[who]','$_SESSION[userid]',$_REQUEST[categoryid],
					$_REQUEST[subcategoryid],$_REQUEST[design_softwareid],$_REQUEST[posttypeid],0,'$_REQUEST[name]',
					'$_REQUEST[description]','$target_file','$ziptarget_file','$today',$_REQUEST[coststatus],
					'$_REQUEST[amount]',1)");
	
					}
				}	
			
			}
			
			
		}
		// 	//file size validation
		// 	if(($_FILES['poster']['size']/1024/1024)<5 && ($_FILES['posterzip']['size']/1024/1024)<20)
		// 	{
				
		// 		//file type validation
		// 		if(($_FILES['poster']['type']=="image/jpg" || $_FILES ['poster']['type']=="image/jpeg" || $_FILES ['poster']['type']=="image/png") && ($_FILES ['posterzip']['type']=="application/zip"))
		// 		{
					
		// 			//file currepted
		// 			if($_FILES['poster']['error']==0 && $_FILES['posterzip']['error']==0)
		// 			{
		// 				$ex=".".substr($_FILES['poster']['type'],6);
		// 				$ex1=".".substr($_FILES['posterzip']['type'],9);

		// 				$newname=$_REQUEST['name'].date('m').chr(rand(65,90)).rand(10,99);
						
		// 				$newname1=$_REQUEST['name'].date('m').chr(rand(65,90)).rand(10,99);
						
		// 				// echo $newname1.$ex1;

		// 				$serverpath=dirname(__FILE__)."\img\poster\\".$newname.$ex;
		// 				$serverpath1=dirname(__FILE__)."\img\posterzip\\".$newname1.$ex1;

		// 				// echo $serverpath1;

		// 				$databasepath="img/poster/".$newname.$ex;
		// 				$databasepath1="img/posterzip/".$newname1.$ex1;
		// 				// echo $databasepath1;
						
		// 				// echo $databasepath;
		// 				$today=date('Y-m-d');

		// 				if((move_uploaded_file($_FILES['poster']['tmp_name'],$serverpath))&& (move_uploaded_file($_FILES['posterzip']['tmp_name'],$serverpath1)))
		// 				{
							
		// 						 $in=$con->query("insert into posting values('$_SESSION[who]','$_SESSION[userid]',$_REQUEST[categoryid],
		// 						$_REQUEST[subcategoryid],$_REQUEST[design_softwareid],$_REQUEST[posttypeid],0,'$_REQUEST[name]',
		// 						'$_REQUEST[description]','$databasepath','$databasepath1','$today',$_REQUEST[coststatus],
		// 						'$_REQUEST[amount]',1)");
	
		// 				}
		// 				else
		// 				{
		// 					echo "no";
		// 				}
		// 			}
		// 		}
		// 	}
		// }
		
			
	}


// like
	 
if($_REQUEST['what']=="like")
{
	require_once"connection.php";
	$in=$con->query("insert into likee values('$_REQUEST[user_userid]','$_REQUEST[ref]','$_REQUEST[userid]',$_REQUEST[postid],0)");	
	header('location: index.php');
}


if($_REQUEST['what']=="unlike")
{
	require_once"connection.php";
	$del=$con->query("delete from likee where user_userid like '$_REQUEST[user_userid]' and reference like '$_REQUEST[ref]' and userid like '$_REQUEST[userid]' and postid=$_REQUEST[postid]");
	header('location: index.php');
}


?>






