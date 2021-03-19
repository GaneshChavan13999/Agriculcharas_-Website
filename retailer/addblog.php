<?php
session_start();
// error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:../includes/logout.php');
    } else{
        $msg="";
        $msg1="";
        // if(isset($_GET['id']))
        // {
        //   $query= mysqli_query($con,"DELETE FROM tblbranch WHERE ID=".$_GET["id"]);
        //   if(!$query){
        //       $msg=" Branch is not removed. Please try again later.";
        //   }
            
        // }
        if(isset($_POST["add"]))  
        {  
            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
            $query = "INSERT INTO `blog`( `rid`, `title`, `descr`, `photo`, `email`) VALUES(
               ".(int)$_SESSION['cmsaid'].",
               '".$_POST["title"]."',
               '".$_POST["descr"]."',
               '".$file."',
               '".$_SESSION['email']."')";  
            if(mysqli_query($con, $query))  
            {  
                $msg1="Blog added.";  
            }
            else{
              $msg="Blog not added. Please try again.";
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
            <h1 class="primary-title">Add Blogs</h1>
          </div>
        </div>
    </div>
    <div class="wrapper">
    <form name="add" method="post" enctype="multipart/form-data">
    
    <div class="form">
    <?php if($msg1!="") {?>
       <div>
          <h2 style="color:blue;"><?php echo $msg1;?></h2>
          
       </div> <?php } ?> 
       <div class="inputfield">
          <label>Title of Blog</label>
          <input type="text" name="title" class="input">
       </div>  
       <div class="inputfield">
          <label>Description of Blog</label>
          <textarea name="descr" class="textarea"></textarea>
       </div>  
       <div class="inputfield">
          <label>Photo  for reference(only jpg,jpeg and png formats are allowed)</label>
          <input type="file" name="image" id="image" class="input">
       </div> <?php if($msg!="") {?>
       <div>
          <h2 style="color:red;"><?php echo $msg;?></h2>
          
       </div> <?php } ?> 
      <div class="inputfield">
        <input type="submit" value="Add" id="add" name="add" class="btn">
      </div>
    </div>
    </form>
</div>
<div class="title-container">
    <div class="section-titles">
        <div class="section-title active" data-id="latest">
        <span class="dot"></span>
        <h1 class="primary-title">My Blogs</h1>
        </div>
    </div>
</div>

<div class="blog-container container">
    <div class="glide" id="glide3">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
            <?php
                $ret=mysqli_query($con,"SELECT * FROM blog  WHERE rid=".$_SESSION['cmsaid']);
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
   <script>  
            $(document).ready(function(){  
                $('#add').click(function(){  
                    var image_name = $('#image').val();  
                    if(image_name == '')  
                    {  
                            alert("Please Select Image");  
                            return false;  
                    }  
                    else  
                    {  
                            var extension = $('#image').val().split('.').pop().toLowerCase();  
                            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                            {  
                                alert('Invalid Image File');  
                                $('#image').val('');  
                                return false;  
                            }  
                    }  
                });  
            });  
 </script>  
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