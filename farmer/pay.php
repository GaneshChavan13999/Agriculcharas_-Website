<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:../includes/logout.php');
    } 
else{
  $success=0;
  $orderid=0;
  echo'<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
      $msg="";
      try{
          if(isset($_POST["card_num"])){
            echo'<script> console.log("hello"); </script>';
            $msg2="Hello";
            $orderid = date("YmdHis");
            $uid=(int)$_SESSION['cmsaid'];
            $name = $_POST['firstname'];
            $email=$_POST["email"];
            $addr = $_POST['address'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $pin=$_POST['zip'];
            $cname=$_POST['cname'];
            $card_num = (int)$_POST['card_num'];
            $card_cvc = (int)$_POST['cvc'];
            $exp_month = $_POST['exp_month'];
            $exp_year = $_POST['exp_year'];  
            $products=$_POST['products'];
            $sql="INSERT INTO `rorders`(`orderid`, `fid`, `name`, `email`, `addr`, `city`, `state`, `pincode`, `card_name`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `amount`) VALUES (
                ".$orderid.",
                ".$uid.",
                '".$name."',
                '".$email."',
                '".$addr."',
                '".$city."',
                '".$state."',
                '".$pin."',
                '".$cname."',
                ".$card_num.",
                ".$card_cvc.",
                '".$exp_month."',
                '".$exp_year."',
                ".(int)$products["total"].")";
                // $result = mssql_query($con,$sql);
            $result=$con->query($sql);
            if($result){
              $a= unserialize($products["ids"]);
              $b= unserialize($products["qnts"]);
              $c= unserialize($products["amts"]);
              for($i=0; $i< count($a)-1; $i++){
                $ret=mysqli_query($con,"SELECT `rid` FROM `rproduct` WHERE `id`=".$a[$i]);
                $row=mysqli_fetch_array($ret);
                $sql1="INSERT INTO `rporders`(`orderid`, `fid`, `rid`, `pid`, `qnt`, `amt`) VALUES (
                  ".$orderid.",
                  ".$uid.",
                  ".(int)$row["rid"].",
                  ".(int)$a[$i].",
                  ".(int)$b[$i].",
                  ".(int)$c[$i].")";
                  echo'<script type="text/javascript">
                          console.log("'.$a[$i].'");
                      </script>';
                  $result1=$con->query($sql1);
              }
                            include "../includes/mail.php";
                            $m="Hello <br> Your order has been placed successfully. order details:<br> order id: ".$orderid." <br> Amount: ".$products['total']."<br> view reciept on website for more details. <br> Thank you. ";
                            $s=mailto($email,"Order Placed",$m);
                            if($s){
                                $msg2="Registered IS SUCCESSFUL.";
                            }  
                            $success=1;
                          echo'<script type="text/javascript">
                          localStorage.clear();
                      </script>';
                // header("location: bill.php?oid=".$orderid);
              }
              else{
              $msg="Something went wrong. Please try again later.";
              
              }
  }}
  catch(Exception $e) {
	$msg= 'Message: ' .$e->getMessage();
  }

       
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />

  <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

  <!-- Glidejs StyleSheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <!-- StyleSheet -->
  <script src="./js/cart.js"></script>
  <title>Pay</title>
<link rel="stylesheet" href="css/pay.css">
<link rel="stylesheet" href="css/styles.css" />
<!-- Script for payment details -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>
<body>
<?php
  $ids=explode(",",$_POST["products"]["ids"]);
  // print_r($ids);
  $ids1 = array_map('intval', $ids);
  // print_r($ids);
  $names=explode(",",$_POST["products"]["names"]);
  $qnts=explode(",",$_POST["products"]["qnts"]);
  $qnts1 = array_map('intval', $qnts);
  $prices=explode(",",$_POST["products"]["amts"]);
  $prices1 = array_map('intval', $prices);
  $total=intval($_POST["products"]["total"])
?>
<div id="pre-loader">
    <div class="loader"></div>
  </div>
  <?php include_once("include/header.php");?>
<div class="row">
  <div class="col-75">
    <div class="container1">
      <form name="paymentFrm" id="paymentFrm"   method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Shipping Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" placeholder="john@example.com" required>
            <label for="adr"><i class="fas fa-map-marker-alt"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Mumbai" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Maharashtra" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="number" id="zip" name="zip" placeholder="10001" required>
              </div>
            </div>
          </div>
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fab fa-cc-visa" style="color:navy;"></i>
              <i class="fab fa-cc-amex" style="color:blue;"></i>
              <i class="fab fa-cc-mastercard" style="color:red;"></i>
              <i class="fab fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cname" placeholder="John More Doe" required>
            <label for="card_num">Card number</label>
            <input type="text"   name="card_num" id="card_num" class="card-number" size="20" autocomplete="off" required="">
            <label for="exp_month">Exp Month</label>
            <input type="text" name="exp_month" size="2" class="card-expiry-month" required>
            <div class="row">
              <div class="col-50">
                <label for="exp_year">Exp Year</label>
                  <input type="text" name="exp_year" size="4" class="card-expiry-year" required>
              </div>
              <div class="col-50">
                <label for="cvc">CVV</label>
                <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc" required>
                <?php echo'<input type="hidden" name="products[ids]" value='.htmlentities(serialize($ids1)).' hidden/>'; ?>
                <?php echo'<input type="hidden" name="products[names]" value='.htmlentities(serialize($names)).' hidden/>'; ?>
                <?php echo'<input type="hidden" name="products[qnts]"  value='.htmlentities(serialize($qnts1)).' hidden/>'; ?>
                <?php echo'<input type="hidden" name="products[amts]"  value='.htmlentities(serialize($prices1)).' hidden/>'; ?>
                <?php echo'<input type="hidden" name="products[total]" value='.$total.' hidden/>'; ?>
              </div>
            </div>
          </div>
        </div>
        <div><span class="payment-errors" style="font-size:16px; color:red"></span><br>
        <button name="payBtn" type="submit" id="payBtn" class="btn">PAY</button>
        <script type="text/javascript">
            //set your publishable key
            Stripe.setPublishableKey('pk_test_vAXewLVJ2TvJ0NI8cWjuRvFL00LYh13dqX');
            //callback to handle the response from stripe
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    //enable the submit button
                    $('#payBtn').removeAttr("disabled");
                    //display the errors on the form
                    $(".payment-errors").html(response.error.message);
                } else {
                    var form$ = $("#paymentFrm");
                    //get token id
                    var token = response['id'];
                    //insert the token into the form
            //         form$.append("<input type='hidden' name='stripeToken' value='" 
            // + token + "' />");
                    //submit form to the server
                    form$.get(0).submit();
                    // $('form').submit();
                    // $('#paymentFrm').submit();
                }
            }
            $(document).ready(function() {
                //on form submit
                
                $("#paymentFrm").submit(function(event) { 
                    
                                    //disable the submit button to prevent repeated clicks
                    $('#payBtn').attr("disabled", "disabled");
                    
                    //create single-use token to charge the user
                    Stripe.createToken({
                        number: $('#card_num').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                    
                    //submit from callback
                    return false;
                    }    );
            
                    });
            </script></div>
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container1">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo substr_count($_POST["products"]["ids"],","); ?></b></span></h4>
      <?php
      for($i=0; $i<count($names)-1;$i++){
      ?>
      <p><a href="product.php?pid=<?php echo $ids[$i];?>"><?php echo $names[$i]; ?></a> <span class="price">₹<?php echo $prices[$i]; ?></span></p><?php } ?>

      <hr>
      <p>Shipping <span class="price" style="color:black"><b>+₹50</b></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>₹<?php echo $_POST["products"]["total"]; ?></b></span></p>
    </div>
  </div>
</div>
<!-- Footer -->
<?php include_once("../includes/footer.php");?>
  <!-- End Footer -->
  <script src="./js/cart.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
  <?php 
  
  if($success==1){?>

              <script type="text/javascript">
                          localStorage.clear();
                          location.href='bill.php?oid='+<?php echo $orderid;?>;
                      </script>
   <?php 
}
   ?>                   

</body>

</html>
        
        

<?php } ?>