
<?php
    require_once"connection.php";
    require_once"userquery.php";
    $_SESSION['page']="usermaster";

    if($_SESSION['userid']=="")
    {
        header('location:index.php');
    }
?>

<html>

<?php require_once"head.php"; ?>


<body onload="getdata('<?php echo $_SESSION['identity']; ?>','<?php echo $_SESSION['who']?>')";>

<?php require_once"menu.php"; ?>

<?php require_once"subheader.php"?>


<br/>
<br/>
<br/>

    <div class="container-fluid mb-30">
        <div class="row p-0 pl-3">

            <div class="col-md-2">
                <ul class="navbar-nav ml-auto mc sb" style="display: <?php if($_SESSION['who']!="user"){echo "none";} ?>; border-radius: 20px; box-shadow: 5px 5px 10px 10px #bbb;">
                    <li class="nav-item p-3 mt-3 mr-2 ml-2 mb-1 nb" class="nav-link" onclick="getdata('dashboard','user')">Dashboard</li>
                    <li class="nav-item p-3 mb-1 mr-2 ml-2 nb" class="nav-link" onclick="getdata('profile','user')">My Profile</li>
                    <li class="nav-item p-3 mb-3 mr-2 ml-2 nb" class="nav-link" onclick="getdata('changepass','user')">Change Password</li>

                </ul>
                <ul class="navbar-nav ml-auto sb" style="display: <?php if($_SESSION['who']!="company"){echo "none";} ?>; border-radius: 20px; box-shadow: 5px 5px 10px 10px #bbb;">
                    <li class="nav-item p-3 mt-3 mr-2 ml-2 mb-1 nb" class="nav-link" onclick="getdata('dashboard','company')">Dashboard</li>
                    <li class="nav-item p-3 mb-1 mr-2 ml-2 nb" class="nav-link" onclick="getdata('profile','company')">My Profile</li>
                    <li class="nav-item p-3 mb-1 mr-2 ml-2 nb" class="nav-link" onclick="getdata('changepass','company')">Change Password</li>
                    <li class="nav-item p-3 mb-1 mr-2 ml-2 nb" class="nav-link" onclick="getdata('bank','company')">Bank Detail</li>
                    <li class="nav-item p-3 mb-3 mr-2 ml-2 nb" class="nav-link" onclick="getdata('post','company')">Post</li>
                </ul>
                <ul class="navbar-nav ml-auto sb" style="display: <?php if($_SESSION['who']!="designer"){echo "none";} ?>; border-radius: 20px; box-shadow: 5px 5px 10px 10px #bbb;">
                    <li class="nav-item p-3 mt-3 mr-2 ml-2 mb-1 nb" class="nav-link" onclick="getdata('dashboard','designer')">Dashboard</li>
                    <li class="nav-item p-3 mb-1 mr-2 ml-2 nb" class="nav-link" onclick="getdata('profile','designer')">My Profile</li>
                    <li class="nav-item p-3 mb-1 mr-2 ml-2 nb" class="nav-link" onclick="getdata('changepass','designer')">Change Password</li>
                    <li class="nav-item p-3 mb-1 mr-2 ml-2 nb" class="nav-link" onclick="getdata('bank','designer')">Bank Detail</li>
                    <li class="nav-item p-3 mb-3 mr-2 ml-2 nb" class="nav-link" onclick="getdata('post','designer')">Post</li>
                </ul>
            </div>


            <div class="col-md-10">
                <div class="row" id="missdata">

                </div>

            </div>

        </div>
    </div>




<?php require_once"footer.php";?>
<?php require_once"script.php"; ?>

</body>
</html>

