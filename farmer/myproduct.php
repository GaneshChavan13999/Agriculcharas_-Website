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
          $query= mysqli_query($con,"DELETE FROM fproduct WHERE id=".$_GET["pid"]);
          if(!$query){
              $msg=" Product is not removed. Please try again later.";
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
    <span><?php echo $msg;?></span>
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
            <h1 class="primary-title">My Products</h1>
          </div>
        </div>
    </div>
    <table style="background-color: var(--grey-alt);">
        <thead>
            <tr>
                <th scope="col">SR. NO.</th>
                <th scope="col">Title</th>
                <th scope="col">Photo</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity per Set</th>
                <th scope="col">Sets available</th>
                <th scope="col">Price Per Set</th>
                <th scope="col">Discount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody><?php
        $ret=mysqli_query($con,"SELECT * FROM fproduct  WHERE farmerid=".$_SESSION['cmsaid']);
        $num=mysqli_num_rows($ret);
        if($num >0){
            $count=0;
        while ($row=mysqli_fetch_array($ret)) {
            $count++;
        ?>
            <tr>
            <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
            <td data-label="Title"><?php echo $row["title"];?></td>
            <td data-label="Photo"><?php echo'<img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="200" width="200" class="img-thumnail" alt="product">';?></td>
            <td data-label="Description"><?php echo $row["descr"];?></td>
            <td data-label="Quantity per Set"><?php echo $row["sunit"]."".$row["munit"];?></td>
            <td data-label="Sets available"><?php echo $row["set"];?></td>
            <td data-label="Price Per Set">₹<?php echo $row["price"];?></td>
            <td data-label="Discount"><?php echo $row["disc"];?>%</td>
            <td data-label="Action"> <?php echo '<a class="btn-danger btn" href=" ./myproduct.php?pid='.$row["id"].'">Remove</a>';?></td>
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