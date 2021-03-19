<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location: ../includes/logout.php');
  } else{
  ?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>My Profile</title>
    <link href="./css/styles.css" rel="stylesheet"/>
    <link href="../css/table.css" rel="stylesheet">
</head>
<body >
<?php include_once('./include/header.php');?>
<table style="background-color: var(--grey-alt);">
  <caption> My Profile </caption>
  <?php
  $ret=mysqli_query($con,"SELECT * FROM farmer  WHERE id=".$_SESSION['cmsaid']);
  $num=mysqli_num_rows($ret);
  if($num >0){
  while ($row=mysqli_fetch_array($ret)) {
    $count++;
  ?>
  <tr>
        <th> First Name</th>
        <td><?php echo $row["fname"];?> </td>
  </tr>
  <tr>
        <th> Last Name</th>
        <td><?php echo $row["lname"];?> </td>
  </tr>
  <tr>
        <th> Gender</th>
        <td> <?php echo $row["gender"];?></td>
  </tr>
  <tr>
        <th> Email ID</th>
        <td><?php echo $row["email"];?> </td>
  </tr>
  <tr>
        <th> Phone Number</th>
        <td><?php echo $row["phone"];?> </td>
  </tr>
  <tr>
        <th> Address</th>
        <td><?php echo $row["address"];?> </td>
  </tr>
  <tr>
        <th> City</th>
        <td><?php echo $row["city"];?> </td>
  </tr>
  <tr>
        <th> State</th>
        <td><?php echo $row["state"];?> </td>
  </tr>
  <tr>
        <th> Country</th>
        <td><?php echo $row["country"];?> </td>
  </tr>
  <tr>
        <th> Pin Code</th>
        <td><?php echo $row["pin"];?> </td>
  </tr>  
  <tr>
        <th colspan=2> Bank Account Details</th>
  </tr>
  <tr>
        <th> Account Holder Name</th>
        <td><?php echo $row["acname"];?> </td>
  </tr>
  <tr>
        <th> Bank ACcount NUmber</th>
        <td><?php echo $row["acnum"];?> </td>
  </tr>
  <tr>
        <th> IFSC Code</th>
        <td><?php echo $row["ifsc"];?> </td>
  </tr>
 
  <tr>
        <td colspan=2><a class="btn-success btn" href="update.php">Update INFO </a> </td>
  </tr>
    <?php
}}
?>
    
  </tbody>
</table>
    
<?php include_once('./include/footer.php');?>
</body>
</html>
<?php } ?>