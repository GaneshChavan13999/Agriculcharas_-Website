<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location: ../includes/logout.php');
  } else{
      $msg="";
      if(isset($_POST["save"])){
        $ret1=mysqli_query($con,"UPDATE `farmer` SET `fname`='".$_POST["fname"]."',`lname`='".$_POST["lname"]."',`phone`=".(int)$_POST["phone"].",`address`='".$_POST["addr"]."',`city`='".$_POST["city"]."',`state`='".$_POST["state"]."',`country`='".$_POST["country"]."',`pin`='".$_POST["pin"]."', `acnum`='".$_POST["acnum"]."',`acname`='".$_POST["acname"]."',`ifsc`='".$_POST["ifsc"]."' Where `id`=".$_SESSION['cmsaid']);
        if($ret1){
            $msg="Profile Updated Successfully";
            header('location: myprofile.php');
        }
        else{
            $msg="Something went wrong. Please try again later.";
        }
    }
  ?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Update Profile</title>
    <link href="./css/styles.css" rel="stylesheet"/>
    <link href="../css/table.css" rel="stylesheet">
</head>
<body >
<?php include_once('./include/header.php');?>
<table style="background-color: var(--grey-alt);">
  <caption> Update Profile </caption>
  <?php
  $ret=mysqli_query($con,"SELECT * FROM farmer  WHERE id=".$_SESSION['cmsaid']);
  $num=mysqli_num_rows($ret);
  if($num >0){
  while ($row=mysqli_fetch_array($ret)) {
  ?>
  <form name="update" method="post">
  <tr>
        <th> First Name</th>
        <td><?php echo '<input type="text" name="fname" value="'.$row["fname"].'"  required/>';?> </td>
  </tr>
  <tr>
        <th> Last Name</th>
        <td><?php echo '<input type="text" name="lname" value="'.$row["lname"].'" required/>';?> </td>
  </tr>
  <tr>
        <th> Phone Number</th>
        <td><?php echo '<input type="number" name="phone" value="'.$row["phone"].'"required />';?> </td>
  </tr>
  <tr>
        <th> Address</th>
        <td><?php echo '<input type="text" name="addr" value="'.$row["address"].'" required/>';?> </td>
  </tr>
  <tr>
        <th> City</th>
        <td><?php echo '<input type="text" name="city" value="'.$row["city"].'" required/>';?> </td>
  </tr>
  <tr>
        <th> State</th>
        <td><?php echo '<input type="text" name="state" value="'.$row["state"].'" required/>';?> </td>
  </tr>
  <tr>
        <th> Country</th>
        <td><?php echo '<input type="text" name="country" value="'.$row["country"].'" required/>';?> </td>
  </tr>
  <tr>
        <th> Pin Code</th>
        <td><?php echo '<input type="text" name="pin" value="'.$row["pin"].'" required/>';?> </td>
  </tr>
  <tr>
        <th> Bank Account Number</th>
        <td><?php echo '<input type="text" name="acnum" value="'.$row["acnum"].'"required />';?> </td>
  </tr>
  <tr>
        <th> IFSC Code</th>
        <td><?php echo '<input type="text" name="ifsc" value="'.$row["ifsc"].'" required/>';?> </td>
  </tr>
  <tr>
        <th> Bank Account Holder Name </th>
        <td><?php echo '<input type="text" name="acname" value="'.$row["acname"].'" required/>';?> </td>
  </tr>
  <?php if($msg!=""){ echo '<tr><td colspan=2><p style="font-size:16px; color:red" id="e" align="center"> '.$msg.'</p></td></tr>'; 
    $msg="";}?> 
  <tr>
        <td colspan=2><button type="submit" name="save" class="btn-success btn">Update INFO </button> </td>
  </tr>
  </form>
    <?php
}}
?>
    
  </tbody>
</table>
    
<?php include_once('./include/footer.php');?>
</body>
</html>
<?php } ?>