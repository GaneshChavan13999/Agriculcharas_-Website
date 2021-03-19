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
  <title>Codevo Shop</title>
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
                  <h1>GROSSARY FOR YOU!</h1>
                  <h3>DIRECTLY FARM TO YOUR HOME</h3>
                  <div class="buttons-group">
                    <a href="products.php"><button>SHOP NOW</button></a>
                  </div>
                </div>
                <img src="./source_background/AG6.jpg" class="special_01" alt="">
            </li>

            <li class="glide__slide">
              <div class="banner banner1">
                <div class="banner-content">
                <span>New Inspiration 2021</span>
                  <h1>GROSSARY FOR YOU!</h1>
                  <h3>DIRECTLY FARM TO YOUR HOME</h3>
                  <div class="buttons-group">
                  <a href="products.php"><button>SHOP NOW</button></a>
                  </div>
                </div>
                <img src="./source_background/AG13.jpg" class="special_02" alt="">
              </div>
            </li>

            <li class="glide__slide">
              <div class="banner">
                <div class="banner-content">
                <span>New Inspiration 2021</span>
                  <h1>GROSSARY FOR YOU!</h1>
                  <h3>DIRECTLY FARM TO YOUR HOME</h3>
                  <div class="buttons-group">
                  <a href="products.php"><button>SHOP NOW</button></a>
                  </div>
                </div>
                <img src="./source_background/AG15.jpeg" class="special_03" alt="">
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
          <img src="./source_background/grain.jpg" alt="">
          <div class="content">
            <h2>Grains and Cereals</h2>
            <a href="products.php?category=1">shop now</a>
          </div>
        </div>

        <div class="category-box">
          <img src="./source_background/fruit.jpg" alt="">
          <div class="content">
            <h2>Fruits</h2>
            <a href="products.php?category=2">shop now</a>
          </div>
        </div>
        <div class="category-box">
          <img src="./source_background/vegi.jpg" alt="">
          <div class="content">
            <h2>Vegitables and Eggs</h2>
            <a href="products.php?category=3">shop now</a>
          </div>
        </div>
        <div class="category-box">
          <img src="./source_background/milk.jpg" alt="">
          <div class="content">
            <h2>Milk and Milk products</h2>
            <a href="products.php?category=4">shop now</a>
          </div>
        </div>

      </div>
    </section>

    <!-- Filtered Products -->
    <!-- <section class="section sort-category">
      <div class="title-container ">
        <div class="section-titles">
          <div class="section-title active filter-btn" data-id="trend">
            <span class="dot"></span>
            <h1 class="primary-title">Trending Products</h1>
          </div>
        </div>

        <div class="section-titles">
          <div class="section-title filter-btn" data-id="special">
            <span class="dot"></span>
            <h1 class="primary-title">Special Products</h1>
          </div>
        </div>

        <div class="section-titles">
          <div class="section-title filter-btn" data-id="featured">
            <span class="dot"></span>
            <h1 class="primary-title">Featured Products</h1>
          </div>
        </div>
      </div>

      <div class="product-center container">
        <div class="product">
          <div class="product-header">
            <img src="images/pic1.png" alt="product">
          </div>
          <div class="product-footer">
            <h3>Men Casual Shoe</h3>
            <div class="rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <div class="product-price">
              <h4>$300</h4>
            </div>
          </div>
          <ul>
            <li>
              <a href="#">
                <i class="far fa-eye"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="far fa-heart"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fas fa-sync"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Grid -->
    <!--<section class="gallary container">
      <figure class="gallary-item item-1">
        <img src="./images/grid_1.jpg" alt="" class="gallary-img">
        <div class="content">
          <h2>Our Popular Products</h2>
          <a href="#">View more</a>
        </div>
      </figure>

      <figure class="gallary-item item-2">
        <img src="./images/grid_2.jpg" alt="" class="gallary-img">
        <div class="content">
          <h2>Winter Collections</h2>
        </div>
      </figure>

      <figure class="gallary-item item-3">
        <img src="./images/grid_3.jpg" alt="" class="gallary-img">
        <div class="content">
          <h2>Summer Collections</h2>
        </div>
      </figure>

      <figure class="gallary-item item-4">
        <img src="./images/grid_4.jpg" alt="" class="gallary-img">
        <div class="content">
          <h2>Up to 70% OFF Spring Sale!</h2>
        </div>
      </figure>
    </section>

    <!-- All Products -->
   <!-- <section class="section" id="shop">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active" data-id="latest">
            <span class="dot"></span>
            <h1 class="primary-title">All Products</h1>
          </div>
        </div>
      </div>

      <div class="shop-center product-center container">

      </div>
    </section>

    <div class="section brands container">
      <div class="glide" id="glide2">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <img src="./images/brand_1.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_2.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_3.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_2.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_1.png" cla alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_3.png" alt="">
            </li>

          </ul>
        </div>
      </div>

    </div>

    <!-- Latest Products -->
    <!--<section class="section latest-products" id="new">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active" data-id="latest">
            <span class="dot"></span>
            <h1 class="primary-title">Latest Products</h1>
          </div>
        </div>
      </div>
      <div class="latest-center product-center container"></div>

    </section> -->

    <!-- blog -->
    <section class="section blog" id="blog">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active">
            <span class="dot"></span>
            <h1 class="primary-title">Latest News</h1>
          </div>
        </div>
      </div>

      <div class="blog-container container">
        <div class="glide" id="glide3">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
              <li class="glide__slide">
                <div class="blog-card">
                  <div class="card-header">
                    <img src="./images/grid_1.jpg" alt="">
                  </div>
                  <div class="card-footer">
                    <h3>Styling White Shirts After A Cool Day</h3>
                    <span>By Admin</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo praesentium, numquam non
                      provident rem sed minus natus unde vel modi!</p>
                    <a href="#"><button>Read More</button></a>
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="blog-card">
                  <div class="card-header">
                    <img src="./images/grid_2.jpg" alt="">
                  </div>
                  <div class="card-footer">
                    <h3>Styling White Shirts After A Cool Day</h3>
                    <span>By Admin</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo praesentium, numquam non
                      provident rem sed minus natus unde vel modi!</p>
                    <a href="#"><button>Read More</button></a>
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="blog-card">
                  <div class="card-header">
                    <img src="./images/grid_3.jpg" alt="">
                  </div>
                  <div class="card-footer">
                    <h3>Styling White Shirts After A Cool Day</h3>
                    <span>By Admin</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo praesentium, numquam non
                      provident rem sed minus natus unde vel modi!</p>
                    <a href="#"><button>Read More</button></a>
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="blog-card">
                  <div class="card-header">
                    <img src="./images/grid_4.jpg" alt="">
                  </div>
                  <div class="card-footer">
                    <h3>Styling White Shirts After A Cool Day</h3>
                    <span>By Admin</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo praesentium, numquam non
                      provident rem sed minus natus unde vel modi!</p>
                    <a href="#"><button>Read More</button></a>
                  </div>
                </div>
              </li>
              <li class="glide__slide">
                <div class="blog-card">
                  <div class="card-header">
                    <img src="./images/grid_2.jpg" alt="">
                  </div>
                  <div class="card-footer">
                    <h3>Styling White Shirts After A Cool Day</h3>
                    <span>By Admin</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo praesentium, numquam non
                      provident rem sed minus natus unde vel modi!</p>
                    <a href="#"><button>Read More</button></a>
                  </div>
                </div>
              </li>
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
            <p>FREE SHIPPING WORLD WIDE</p>
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

  <!-- PopUp -->
  <!-- <div class="popup">
    <div class="popup-content">
      <div class="popup-close">
        <i class="fas fa-times"></i>
      </div>
      <div class="popup-left">
        <div class="popup-img">
          <img  src="./images/cat2.jpg" alt="popup">
        </div>
      </div>
      <div class="popup-right">
        <div class="right-content">
          <h1>Get Discount <span>30%</span> Off</h1>
          <p>Sign up to our blogletter and save 30% for you next purchase. No spam, we promise!
          </p>
          <form action="#">
            <input type="email" placeholder="Enter your email..." class="popup-form">
            <a href="#">Subscribe</a>
          </form>
        </div>
      </div>
    </div>
  </div> -->


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