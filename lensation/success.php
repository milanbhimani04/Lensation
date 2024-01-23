<?php

require_once "connection.php";

require('config.php');



require('razorpay-php/Razorpay.php');
if(@$_REQUEST['done']=="abc")
{
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<?php require_once 'head.php'; ?>
	<title></title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
	$(document).ready(function(){
		$("#bill").modal({backdrop: 'static'});
	});
    function generatePDF(aa) {
// Choose the element that our invoice is rendered in.
const element = document.getElementById(aa);
var opt = {
        margin: [0,0,0,0],
        filename: aa,
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 5 },
        jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait' }
    };
// Choose the element and save the PDF for our user.
html2pdf()
    .from(element)
    .set(opt)
    .save();
}
</script>

<body onload="generatePDF('abc')">


<?php 
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    // $html = "<p>Your payment was successful</p>
    //          <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    $_SESSION['payid']=$_POST['razorpay_payment_id'];
    $td=date('Y-m-d');
    $ed=date('Y-m-d', strtotime("+".$_SESSION['duration']." months", strtotime($td)));
    $in=$con->query("insert into subscription values('$_SESSION[userid]',$_SESSION[pdid],0,0,'$td','$ed','$_SESSION[amount]',0,'$_SESSION[amount]','$_SESSION[payid]','netbenking',1)");
    ?>
    <div class="modal fade" id="bill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        
        <div class="modal-body" id="abc" style="border-style: solid; border-color: black; margin: 20px;">
            <div class="container-fluid">
                <div class="container">
                </br>
                
                

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="img/florence1.png" alt="">
                                </div>
                                <div class="col-md-9">
                                    <h3 class="pt-5" style="color: #9c5451;">LENSATION</h3>
                                    <span class="pb-2">P h o t o  S t u d i o</span> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style=" text-align:right;">
                        <label class="pt-5 m-3" style="color: black; font-size: 40px;">INVOICE</label>
                        </div>
                    </div>
                    </br>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="pl-2 m-1" style="color: green; font-size:18px; border-style: solid; border-color: black;"><?php echo $_SESSION['payid']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="p-3" style="text-align:right; color: black;">DATE   &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $td; ?></p>
                        </div>
                    </div></br>

                    <div class="row">
                        
                        <label class="pl-5 pt-1" style="font-size: 20px; color: black;">Invoice to : </label><a class="pt-2" style="color: black;">&nbsp;&nbsp;Raj Impria, varachha, Surat, Gujarat 395006.</a>

                    </div>
                    </br>
                    </br>

                    <div class="row" style="max-height: 500px;">
                        <div class="col-md-12"> 
                            <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">

                                <tr class="paple">
                                    <th style="background-color: #9c5451; color: white; border-style: solid; border-color: white; font-weight:50">SL.</th>
                                    <th class="" style="background-color: #9c5451; color: white; border-color: white; font-weight:50;">PACKAGE NAME</th>
                                    <th style="background-color: #9c5451; color: white; border-color: white; font-weight:50">PAC> AMOUNT</th>
                                    
                                    
                                </tr>
                                
                                <tr>
                                    <td>1.</td>
                                    <td>
                                    <?php
                                        $data = $con->query("select * from package where packageid=$_SESSION[pdid];");
                                        while ($row = mysqli_fetch_array($data))
                                        echo $row[1];
                                    ?>
                                    </td>
                                    <td><b><?php echo $_SESSION['amount']; ?></b></td>
                                    
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>TOTAL</td>
                                    <td>Rs.&nbsp;<b><?php echo $_SESSION['amount']; ?></b></td>
                                    
                                </tr>
                                
                                               
                            </table>
                        </div>
                    </div>
                    </br>

                    

                    <div class="row">
                        <div class="col-md-12">

                        <label class="pl-3 pt-4 ml-2" style="font-size: 20px; color: black;">Terms & Condition : </label></br>
                        <a class="pl-4" style="color: black;">This is computerized generated bill does not any physical signature.</a></br>
                        

                        </div>
                        
                    </div>
                    </br>

                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4 pt-2">
                            <p style="color: blue;">Thank you for your business</p>
                        </div>
                        <div class="col-md-4">
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="butn-dark btn" data-dismiss="modal">Close</button> -->
            <form action="" method="post" name="done">
            <button type="submit" class="butn-dark btn" value="abc" name="done">done</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <?php
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo @$html;

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<?php require_once 'script.php'; ?>
</body>
</html>