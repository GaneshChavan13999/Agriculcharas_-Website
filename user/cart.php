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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />

<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

<!-- Glidejs StyleSheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

<!-- Animate CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- <link rel="stylesheet" href="css/table.css" />   -->
<link rel="stylesheet" href="../css/table.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <style>
      .adverts{
        display:none;
      }
    </style>
    <script src="js/cart.js"></script>
</head>
<body>
<?php include_once("include/header.php");?>
<div  class="adverts">
    <span>Product Removed Successfully.</span>
  </div>
<main>
 <div class="cart">
        <!-- <a href="#" class="btn btn-update">Update cart</a> -->
        </div>
        </main>
       <!-- Footer -->
  <?php include_once("../includes/footer.php");?>
  <!-- End Footer -->
  <script src="./js/index.js"></script>
  <script src="./js/slider.js"></script>
</body>
</html>
<?php } ?>