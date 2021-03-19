<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:../includes/logout.php');
    } else{
        $msg="";
        if(isset($_GET['pid']))
        {
          $query= mysqli_query($con,"DELETE FROM farmer WHERE id=".(int)$_GET["pid"]);
          if(!$query){
              $msg=" Product is not removed. Please try again later.";
          }
          else{
                            include "../includes/mail.php";
                            $m="Hello <br> Your Farmer Account has been deleted by Admin Please contact Admin for further details. <br> Thank you. ";
                            $s=mailto($_GET["email"],"Account removed",$m);
          }
            
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

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

  <!-- Glidejs StyleSheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <!-- StyleSheet -->
    <link href="./css/styles.css" rel="stylesheet"/>
    <link href="../css/table.css" rel="stylesheet">
  <title>Home</title>
</head>

<body>
  <div id="pre-loader">
    <div class="loader"></div>
  </div>
<?php
if($msg!=""){?>
  <div class="adverts">
    <span>3<?php echo $msg;?></span>
  </div>
        <?php } ?>
  <!-- Header -->
  <?php include_once("include/header.php");?>

   <!-- Main -->
   <main>
   <div class="title-container">
        <div class="section-titles">
          <div class="section-title active" data-id="latest">
            <span class="dot"></span>
            <h1 class="primary-title">All Farmers</h1>
          </div>
        </div>
    </div>
    <table style="background-color: var(--grey-alt);">
        <thead>
            <tr>
                <th scope="col">SR. NO.</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Country</th>
                <th scope="col">Account Name</th>
                <th scope="col">Account Number</th>
                <th scope="col">IFSC Code</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody><?php
        $ret=mysqli_query($con,"SELECT * FROM farmer");
        $num=mysqli_num_rows($ret);
        if($num >0){
            $count=0;
        while ($row=mysqli_fetch_array($ret)) {
            $count++;
        ?>
            <tr>
            <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
            <td data-label="Name"><?php echo $row["fname"]." ".$row["lname"];?></td>
            <td data-label="Email"><?php echo $row["email"];?></td>
            <td data-label="Phone"><?php echo $row["phone"];?></td>
            <td data-label="Address"><?php echo $row["address"];?></td>
            <td data-label="City"><?php echo $row["city"];?></td>
            <td data-label="State"><?php echo $row["state"];?></td>
            <td data-label="Country"><?php echo $row["country"];?></td>
            <td data-label="Account Name"><?php echo $row["acname"];?></td>
            <td data-label="Account Number"><?php echo $row["acnum"];?></td>
            <td data-label="IFSC Code"><?php echo $row["ifsc"];?></td>
            <td data-label="Action"> <?php echo '<a class="btn-danger btn" href=" ./farmer.php?pid='.$row["id"].'&email='.$row["email"].'">Remove</a>';?></td>
            </tr>
            <?php
        }}
        ?>
            
        </tbody>
    </table>
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