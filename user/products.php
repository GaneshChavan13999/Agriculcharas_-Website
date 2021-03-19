
<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:../includes/logout.php');
    } else{
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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

  <!-- Glidejs StyleSheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <!-- StyleSheet -->
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/search.css" />
  <title>Products</title>
</head>

<body>
  <div id="pre-loader">
    <div class="loader"></div>
  </div>

  <!-- <div class="adverts">
    <span>30% off your first purchase</span>
  </div> -->

  <!-- Header -->
  <?php include_once("include/header.php");?>

  <!-- Main -->
  <main>
    <!-- Search Box -->
    <div class="wrap">
    <div class="search"><form name="search" methode="GET" >
        <input type="text" name="searchfor" class="searchTerm" placeholder="What are you looking for?">
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
      </button></form>
    </div>
  </div>
  <!-- All Products -->
  <section class="section" id="shop">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active" data-id="latest">
            <span class="dot"></span>
            <?php if(isset($_GET["searchfor"])){?>
              <h1 class="primary-title">Searched for: <?php echo $_GET["searchfor"];?></h1>
            <?php } elseif(isset($_GET["category"])){?>
              <h1 class="primary-title">Category: <?php
                $ret1=mysqli_query($con,"SELECT * FROM  farmcategories WHERE id=".(int)$_GET["category"]);
                $row1=mysqli_fetch_array($ret1);
                echo $row1["category"];?></h1>
              <?php } else {?>
                <h1 class="primary-title">All Products</h1>
                <?php } ?>
          </div>
        </div>
      </div>


      <div class="product-center container">
      <?php 
        if(isset($_GET["searchfor"])){
          $ret=mysqli_query($con,"SELECT * FROM fproduct WHERE title LIKE '%".$_GET["searchfor"]."%'");
        }
        elseif(isset($_GET["category"])){
          $ret=mysqli_query($con,"SELECT * FROM fproduct WHERE category=".(int)$_GET["category"]);
        }
        else{
          $ret=mysqli_query($con,"SELECT * FROM fproduct");
        }
        $num=mysqli_num_rows($ret);
          if($num >0){
          while ($row=mysqli_fetch_array($ret)) {
      ?>
      <div class="product">
        <?php echo'<a href="product.php?pid='.$row["id"].'">';?>
          <div class="product-header">
            <?php echo'<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="200" width="200" class="img-thumnail" alt="product">';?>
          </div></a>
          <div class="product-footer">
            <h3><?php echo $row['title'];?></h3>
            <div class="rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <div class="product-price">
              <h4><?php 
              $price= $row['price']-($row['price']* 0.01* $row['disc']);
              echo '<strike>'.$row['price'].'</strike>  '.$price;?></h4>
            </div>
          </div></div>
          <?php
          } }
          else{
            echo'<h1>No products found. </h1>';}
          ?>
        </div>      
    </section>
  <!-- Footer -->
  <?php include_once("../includes/footer.php");?>
  <!-- End Footer -->


  <!-- Glidejs Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>

  <!-- Custom Script -->
  <script src="./js/product.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
</body>

</html>
<?php } ?>