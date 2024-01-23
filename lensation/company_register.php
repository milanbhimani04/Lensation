<?php require_once "connection.php"; ?>


<?php

if (isset($_REQUEST['register'])) {
	//file available validation
	if ($_FILES['profilepic']['name'] != "") {
		//file size validation
		if (($_FILES['profilepic']['size'] / 1024 / 1024) < 5) {
			//file type validation
			if ($_FILES['profilepic']['type'] == "image/jpg" || $_FILES['profilepic']['type'] == "image/jpeg" || $_FILES['profilepic']['type'] == "image/png") {
				//file currepted
				if ($_FILES['profilepic']['error'] == 0) {
					$ex = "." . substr($_FILES['profilepic']['type'], 6);
					$newname = $_REQUEST['name'] . date('m') . chr(rand(65, 90)) . rand(10, 99);

					// echo $newname.$ex;

					$serverpath = dirname(__FILE__) . "\img\companyprofile\\" . $newname . $ex;

					// echo $serverpath;

					$databasepath = "img/companyprofile/" . $newname . $ex;

					//echo $databasepath;

					if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $serverpath)) {
						$in = $con->query("insert into company_register values('$_REQUEST[userid]','$_REQUEST[password]','$_REQUEST[name]','$databasepath','$_REQUEST[location]','$_REQUEST[contact]',$_REQUEST[since],'',1)");
						if ($in) {
							echo "<script> alert('Successfully register !')</script>";
						} else {
							echo "<script> alert('registration falid please try againe !')</script>";
						}

					}
				}
			}
		}
	}
}
?>

<html>

<?php require_once "head.php"; ?>

<body class="drlc" onload="getcaptcha('captcha');">
	<?php require_once "menu.php"; ?>



	<div class="container-fluid">
		<section class="section-padding">
			<div class="container sp">
				<div class="row">
					<div class="col-md-8 col-sm-0">
						<span class="mt-100">
							<h1 class="logwel">Welcome !</h1>
						</span>
						<br />
						<br />
						<h3>LET'S BECOME A MEMBER TO <br />ACCESS MORE DATA.</h3>


					</div>

					<div class="col-md-4 bg pt-4 pr-4 pb-2 pl-4">
						<p class="lgb p-0 m-0 mb-1">COMPANY REGISTER</p>


						<form class="" action="" enctype="multipart/form-data" method="post" id="registrationform"
							novalidate name="registration" onsubmit="return checkpass();">
							<div class="row">

								<div class="col-md-12 m-0 mt-2">
									<input type="text" class="form-control-sm" id="" name="name"
										placeholder="Enter Company Name" required="">
									<div class="input-icon">
										<span class="far fa-id-card color-primary"></span>
									</div>
								</div>

								<div class="col-md-12 mt-0">
									<input type="email" class="form-control-sm" id="email" name="userid"
										placeholder="Userid" required="">
								</div>

								<div class="col-md-12">
									<label for="">Choose Company Logo</label>
									<input type="file" class="form-control p-0 m-0" id="file" name="profilepic"
										required="">
								</div>

								<div class="col-md-12 mt-2">
									<input type="text" class="form-control-sm" id="" name="location"
										placeholder="Enter Location" required="">
								</div>

								<div class="col-md-12 mt-0">
									<input type="text" class="form-control-sm" id="" name="contact"
										placeholder="Contact Number" required="">
								</div>

								<div class="col-md-12 mt-2">
									<input type="text" class="form-control-sm" id="" name="since"
										placeholder="Company Starting Year" required="">
								</div>

								<div class="col-md-12 input-group mt-3">
									<input type="password" class="form-control" id="rnpassword" name="password"
										placeholder="Enter Password" required="" pattern="^[a-zA-Z0-9]*$">
									<!-- <div class="input-group-prepend"> -->
									<i class="ti-eye input-group-text" onclick="hideshow('rnpass')" ;></i>
									<!-- </div> -->
								</div>

								<div class="col-md-12 mt-3 input-group">
									<input type="password" class="form-control" id="rcpassword" name="password"
										placeholder="Confirm Password" required="" pattern="^[a-zA-Z0-9]*$">
									<i class="ti-eye input-group-text" onclick="hideshow('rcpass')" ;></i>
								</div>

								<div class="col-md-12">
									<input type="checkbox" id="p-option-1" name="agree" checked disabled>&nbsp;
									<label for="p-option-1" style="font-size :12px;">I agree the <a
											href="bookmark.php">Terms & Conditions</a></label>
								</div>

								<div id="captcha" class="m-0 mt-2 p-0">
								</div>

								<div class="form-group col-md-12">
									<div class="row">
										<div class="col-md-6">
											<button type="submit" name="register" value="submit"
												class="butn-dark btn btn-block">Continue</button>
										</div>
										<div class="col-md-6">
											<button type="reset" value="cancel"
												class="butn-dark btn btn-block mb-10">Cancel</button>
										</div>
										<hr class="rnl" />
									</div>
									<p class="text-center m-0 p-0 ifc"> Already a register! <a href="login.php"
											class="ia">Login Here </a></p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php require_once "footer.php"; ?>
	<?php require_once "script.php"; ?>

</body>

</html>