<?php
session_start();
// error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:../includes/logout.php');
    } else{
        $msg="";
        $msg1="";
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
  <link rel="stylesheet" type="text/css" href="css/form.css" />
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
<div class="title-container">
    <div class="section-titles">
        <div class="section-title active" data-id="latest">
        <span class="dot"></span>
        <h1 class="primary-title">All Blogs</h1>
        </div>
    </div>
</div>

<div class="blog-container container" style="margin-bottom:10px;">
    <div class="glide" id="glide3">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
            <?php
                $ret=mysqli_query($con,"SELECT * FROM blog ");
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
<?php }?>