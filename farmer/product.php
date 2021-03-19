
<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
// if (strlen($_SESSION['cmsaid']==0)) {
//     header('location:../includes/logout.php');
//     } else{
    if(!isset($_GET["pid"])){
        header('location: products.php');
    }
    else{
      $msg=0;
      if(isset($_GET["qnt"])){
        
        echo ' <script src="./js/cart.js"></script>';
        echo "<script> add_to_cart(".$_GET["pid"].",'".$_GET["pname"]."',".$_GET["qnt"].",".$_GET["pprice"].",".$_GET["pdisc"].");</script>";
        $msg=1;

    }
?>  
<!DOCTYPE html>
<html lang="en">

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
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/qnt.css">
  <script src="./js/cart.js"></script>
  <title>Product</title>
</head>

<body>
  <div id="pre-loader">
    <div class="loader"></div>
  </div>
  <!-- <div class="adverts">
    <span>30% off your first purchase</span>
  </div> -->

  <!-- Header -->
  <?php include_once("include/header.php");
  if($msg==1){
  echo'<div class="adverts">
    <span>Product added to Cart Successfully.</span>
  </div>';}?>
  <!-- Main -->
  <main>
  <?php 
    $ret1=mysqli_query($con,"SELECT * FROM  rproduct WHERE id=".(int)$_GET["pid"]);
    $row1=mysqli_fetch_array($ret1);
    $ret=mysqli_query($con,"SELECT * FROM  retailer  WHERE id=".(int)$row1["rid"]);
    $row=mysqli_fetch_array($ret);
  ?>
  <div class="glide__slide">
              <div class="banner">
                <div class="banner-content">
                  <span>Best Quality</span>
                  <h1><?php echo $row1["title"];?></h1>
                  <h3><?php echo $row1["descr"];?></h3>
                  <h1>By</h1><h2><?php echo $row["fname"].$row["lname"];?><br>From</h2>
                  <h3><?php echo $row["city"].", ".$row["state"].", ".$row["country"];?></h3>
                  <div class="buttons-group"><form method="get" >
                    <div class="form__group field">
                      <input type="text" name="pname" id='pname'value=<?php echo $row1["title"];?> hidden />
                      <input type="number" name="pprice" id='pprice'value=<?php echo $row1["price"];?> hidden />
                      <input type="number" name="pdisc" id='pdisc'value=<?php echo $row1["disc"];?> hidden />
                      <input type="number" name="pid" id='pid'value=<?php echo $_GET["pid"];?> hidden />
                      <input type="number" class="form__field" placeholder="Name" name="qnt" id='qnt' min="1" value=1 required />
                      <label for="Quantity" class="form__label">Quantity</label>
                    </div>
                    <button type="submit" >Add To Cart</button></form>
                  </div>
                </div>
                <?php echo'<img src="data:image/jpeg;base64,'.base64_encode($row1['photo'] ).'"class="special_01" alt="" />';?>
            </div>

    <!-- Search Box -->
    <!-- <div class="wrap">
    <div class="search"><form name="search" methode="GET" >
        <input type="text" name="searchfor" class="searchTerm" placeholder="What are you looking for?">
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
      </button></form>
    </div>
  </div>
  <!-- All Products -->
  <!--<section class="section" id="shop">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active" data-id="latest">
            <span class="dot"></span>
            <?php //if(isset($_GET["searchfor"])){?>
              <h1 class="primary-title">Searched for: <?php //echo $_GET["searchfor"];?></h1>
            <?php //} //elseif(isset($_GET["category"])){?>
              <h1 class="primary-title">Category: <?php
                //$ret1=mysqli_query($con,"SELECT * FROM  farmcategories WHERE id=".(int)$_GET["category"]);
                //$row1=mysqli_fetch_array($ret1);
                //echo $row1["category"];?></h1>
              <?php// } else {?>
                <h1 class="primary-title">All Products</h1>
                <?php// } ?>
          </div>
        </div>
      </div>


      <div class="product-center container">
      <?php 
        //if(isset($_GET["searchfor"])){
         // $ret=mysqli_query($con,"SELECT * FROM fproduct WHERE title LIKE '%".$_GET["searchfor"]."%'");
       /// }
        ///elseif(isset($_GET["category"])){
        ///  $ret=mysqli_query($con,"SELECT * FROM fproduct WHERE category=".(int)$_GET["category"]);
       /// }
       /// else{
       ///   $ret=mysqli_query($con,"SELECT * FROM fproduct");
        ///}
        //$num=mysqli_num_rows($ret);
        //   if($num >0){
        //   while ($row=mysqli_fetch_array($ret)) {
      ?>
      <div class="product">
        <a href="../dashboard.php">
          <div class="product-header">
            <?php //echo'<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="200" width="200" class="img-thumnail" alt="product">';?>
          </div></a>
          <div class="product-footer">
            <h3><?php //echo $row['title'];?></h3>
            <div class="rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <div class="product-price">
              <h4><?php 
            //   $price= $row['price']-($row['price']* 0.01* $row['disc']);
            //   echo '<strike>'.$row['price'].'</strike>  '.$price;?></h4>
            </div>
          </div>
          <?php
        //   } }
        //   else{
        //     echo'<h1>No products found. </h1>';}
          ?>
        </div>      
    </section> -->
    </main>
  <!-- Footer -->
  <?php include_once("../includes/footer.php");?>
  <!-- End Footer -->


  <!-- Glidejs Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>

  <!-- Custom Script -->
  <script src="./js/cart.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
</body>

</html>
<?php } ?>