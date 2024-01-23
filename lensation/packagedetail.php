<?php 
require('config.php');
require('razorpay-php/Razorpay.php');
    require_once"connection.php";
    require_once"userquery.php"; 
    $_SESSION['page']="packagedetail";

    if($_REQUEST['id']!="")
    {
        $_SESSION['pdid']=$_REQUEST['id'];

        header('location:packagedetail.php');
    }

    if($_SESSION['pdid'])
    {
        $data=$con->query("select * from package where packageid=$_SESSION[pdid]");
        $row=mysqli_fetch_array($data);
        $_SESSION['amount']=$row[4];
    }
    if(isset($_REQUEST['loginpay']))
    {
        header('location: login.php');
    }

    use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//check all field are set or not?
$name=$_SESSION['name'];
$mail=$_SESSION['userid'];
$amount=$_SESSION['amount'];
$_SESSION['duration']=3;


// $phno='9913072178';


//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $amount * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Lensation",
    "description"       => "LENSATION - Just Go With The Colours",
    "image"             => "img/florence.png",
    "prefill"           => [
    "name"              => $name,
    "email"             => $mail,
    "contact"           => $phno,
    ],
    "notes"             => [
    "address"           => "Shayona Plaza, varachha, Surat, Gujarat 395006.",
    "merchant_order_id" => rand(1000,9999),
    ],
    "theme"             => [
    "color"             => "#9c5451"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
?>

<html>

<?php require_once"head.php"; ?>


<body onload="getdata('<?php echo $_SESSION['identity']; ?>')" ;>

    <?php require_once"menu.php"; ?>

    <?php require_once"subheader.php"?>






    <div class="container sp">
        <div class="row">
            <div class="col-md-3">

            </div>

            <div class="col-md-6 bg p-4">
                <p class="m-0 p-0" style="color: #9c5451;font-size: 30px">Secure payment gateway</p>

                <p class="" style="color: black;font-size: 40px">One Step Away!</p>

                <p class="m-0 p-0" style="color: #9c5451;font-size: 25px">JUST CLICK BELOW LINK TO BUY PLAN</p>


                <form action="" method="post" name="login" id="loginform">
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 30px;margin-left: 15px;color: black;font-size: 25px;">
                            Amount
                        </div>

                        <div class="col-md-12" style="margin-top: 20px;margin-left: 15px;color: green;font-size: 25px;">
                            <?php echo $row[4]; ?>
                        </div>



                        <div class="col-md-6" style="margin-top: 40px;margin-left: 15px;color: black;font-size: 25px;">
                            Plan
                        </div>

                        <div class="col-md-6" style="margin-top: 20px;margin-left: 15px;color: green;font-size: 25px;">
                            <?php echo $row[1]; ?>
                        </div>



                        <div class="form-group col-md-12 mt-3">
                            <div class="row">
                                <form action="" method="post" name="pay">
                                    <?php
                                    if($_SESSION['who']=="user")
                                    {
                                        ?>
                                    <div class="col-md-4">
                                        <button type="submit" id="rzp-button1" name="paynow" value="" class="butn-dark btn btn-block">Pay
                                            Now</button>
                                    </div>
                                    <?php
                                    }else{
                                        ?>
                                    <div class="col-md-4">
                                        <button type="submit" name="loginpay" value=""
                                            class="butn-dark btn btn-block">Pay
                                            Now</button>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-md-8">

                                    </div>
                                </form>
                                <form name='razorpayform' action="success.php" method="POST">
                                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                                    <input type="hidden" name="mail" value="<?php echo $mail; ?>">
                                    <input type="hidden" name="phno" value="<?php echo $phno; ?>">
                                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">

                                </form>
                            </div>
                            </br>

                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3"></div>

        </div>
    </div>



    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    // Checkout details as a json
    var options = <?php echo $json?>;

    /**
     * The entire list of Checkout fields is available at
     * https://docs.razorpay.com/docs/checkout-form#checkout-fields
     */
    options.handler = function(response) {
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
        },
        // Boolean indicating whether pressing escape key 
        // should close the checkout form. (default: true)
        escape: true,
        // Boolean indicating whether clicking translucent blank
        // space outside checkout form should close the form. (default: false)
        backdropclose: false
    };

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e) {
        rzp.open();
        e.preventDefault();
    }
    </script>
    <?php require_once"footer.php";?>
    <?php require_once"script.php"; ?>

</body>

</html>