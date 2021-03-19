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
  <title>Home</title>
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
    <!-- Hero -->
    <section class="hero">
      <div class="glide glide1" id="glide1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides glide__hero">

            <li class="glide__slide">
              <div class="banner">
                <div class="banner-content">
                  <span>New Inspiration 2021</span>
                  <h1>AGRICULTURAL MACHINERY <br> FOR YOU!</h1>
                  <h3>DIRECTLY COMPANY TO YOUR FARM</h3>
                  <div class="buttons-group">
                  <a href="products.php"><button>SHOP NOW</button></a>
                  </div>
                </div>
                <img src="./source_background/machine1.jpg" class="special_01" alt="">
            </li>

            <li class="glide__slide">
              <div class="banner banner1">
                <div class="banner-content">
                <span>New Inspiration 2021</span>
                  <h1>BEST SAMPLINGS AND<br> SEEDS FOR YOU!</h1>
                  <h3>DIRECTLY COMPANY TO YOUR FARM</h3>
                  <div class="buttons-group">
                  <a href="products.php"><button>SHOP NOW</button></a>
                  </div>
                </div>
                <img src="./source_background/sapling1.jpg" class="special_02" alt="">
              </div>
            </li>

            <li class="glide__slide">
              <div class="banner">
                <div class="banner-content">
                <span>New Inspiration 2021</span>
                  <h1>CROP PROTECTION AND<br> NUTRITION PRODUCTS FOR YOU!</h1>
                  <h3>DIRECTLY COMPANY TO YOUR FARM</h3>
                  <div class="buttons-group">
                  <a href="products.php"><button>SHOP NOW</button></a>
                  </div>
                </div>
                <img src="./source_background/crop1.jpg" class="special_03" alt="">
              </div>
            </li>

          </ul>
        </div>

        <!-- Arrows -->
        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-arrow-left"></i></button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i
              class="fas fa-arrow-right"></i></button>
        </div>
      </div>
    </section>

    <!-- Category -->
    <section class="section category">
      <h2 class="title">Eat Healthy Stay Healthy.</h2>
      <div class="category-center container">

        <div class="category-box">
          <img src="./source_background/sapling.jpg" alt="">
          <div class="content">
            <h2>Sapling And Seeds</h2>
            <a href="products.php?category=1">shop now</a>
          </div>
        </div>

        <div class="category-box">
          <img src="./source_background/machine.jpg" alt="">
          <div class="content">
            <h2>Agricultural Machinery Products</h2>
            <a href="products.php?category=2">shop now</a>
          </div>
        </div>
        <div class="category-box">
          <img src="./source_background/crop.jpg" alt="">
          <div class="content">
            <h2>Crop Protection And Nutrition Products</h2>
            <a href="products.php?category=3">shop now</a>
          </div>
        </div>
        <div class="category-box">
          <img src="./source_background/animal.jpg" alt="">
          <div class="content">
            <h2>Animal Nutrition products</h2>
            <a href="products.php?category=4">shop now</a>
          </div>
        </div>

      </div>
    </section>

    <!-- blog -->
    <div class="title-container">
    <div class="section-titles">
        <div class="section-title active" data-id="latest">
        <span class="dot"></span>
        <h1 class="primary-title">Blogs</h1>
        </div>
    </div>
</div>

<div class="blog-container container" style="margin-bottom: 10px;">
    <div class="glide" id="glide3">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
            <?php
                $ret=mysqli_query($con,"SELECT * FROM blog");
                $num=mysqli_num_rows($ret);
                if($num >0){
                while ($row=mysqli_fetch_array($ret)) {
            ?>
              <li class="glide__slide">
                <div class="blog-card">
                  <div class="card-header">
                  <?php echo'<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="200" width="200" class="img-thumnail" alt="Blog">';?>
                  </div>
                  <div class="card-footer">
                    <h3><?php echo $row["title"];?></h3>
                    <span>By <?php echo $row["email"];?></span>
                    <span><?php echo $row["bdate"];?></span>
                    <p><?php echo $row["descr"];?></p>
                  </div>
                </div>
              </li>
              <?php }}
              else{
              ?>
              <li class="glide__slide">
              <h1> No blog found. </h1>
              </li>
              <?php }?>
            </ul>
        </div>
    </div>
    </div>
    </section>

    <!-- Facility -->
    <section class="facility section" id="facility">
        <div class="facility-contianer container">
          <div class="facility-box">
            <div class="facility-icon">
              <i class="fas fa-plane"></i>
            </div>
            <p>ONLY ₹ 50 SHIPPING WORLD WIDE</p>
          </div>

          <div class="facility-box">
            <div class="facility-icon">
              <i class="fas fa-credit-card"></i>
            </div>
            <p>100% MONEY BACK GUARANTEE</p>
          </div>

          <div class="facility-box">
            <div class="facility-icon">
              <i class="far fa-credit-card"></i>
            </div>
            <p>MANY PAYMENT GATWAYS</p>
          </div>

          <div class="facility-box">
            <div class="facility-icon">
              <i class="fas fa-headset"></i>
            </div>
            <p>24/7 ONLINE SUPPORT</p>
          </div>
        </div>
    </section>
  </main>
  <!-- Footer -->
  <?php include_once("./include/footer.php");?>
  <!-- End Footer -->


  <!-- Glidejs Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>

  <!-- Custom Script -->
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
</body>

</html>
<?php } ?>