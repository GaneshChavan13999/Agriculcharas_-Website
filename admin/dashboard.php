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
        <section class="section category" style="background-color: var(--grey-alt);">
        <?php
        $query1=mysqli_query($con,"SELECT * from retailer");
        $row1=mysqli_num_rows($query1);
        ?>
        <h2 class="title">Total Retailers:   <?php echo $row1;?></h2>
        <?php
        $query1=mysqli_query($con,"SELECT * from farmer");
        $row1=mysqli_num_rows($query1);
        ?>
        <h2 class="title">Total Farmers: <?php echo $row1;?></h2>
        <?php
        $query1=mysqli_query($con,"SELECT * from user");
        $row1=mysqli_num_rows($query1);
        ?>
        <h2 class="title">Total Customers: <?php echo $row1;?></h2>
        <?php
        $query1=mysqli_query($con,"SELECT * from rorders");
        $row1=mysqli_num_rows($query1);
        $a= $row1;
        ?>
        <h2 class="title">Total Buy Orders By Farmers: <?php echo $row1;?></h2>
        <?php
        $query1=mysqli_query($con,"SELECT * from uorders");
        $row1=mysqli_num_rows($query1);
        $a+=$row1;
        ?>
        <h2 class="title">Total Buy Orders By Customers: <?php echo $row1;?></h2>
        <h2 class="title">Total Amount received For Shipping: <?php echo $a*50;?></h2>


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