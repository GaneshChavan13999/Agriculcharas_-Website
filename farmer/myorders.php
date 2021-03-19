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
    <title>My Orders</title>
    <link href="./css/styles.css" rel="stylesheet"/>
    <link href="../css/table.css" rel="stylesheet">
</head>
<body >
<?php include_once('./include/header.php');?>
<table style="background-color: var(--grey-alt);">
  <caption> My Orders </caption>
  <thead>
    <tr>
        <th scope="col">SR. NO.</th>
        <th scope="col">Order ID</th>
        <th scope="col">Receiver Name</th>
        <th scope="col">Paid Amount</th>
        <th scope="col">Order Date</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody><?php
  $ret=mysqli_query($con,"SELECT * FROM rorders  WHERE fid=".$_SESSION['cmsaid']);
  $num=mysqli_num_rows($ret);
  if($num >0){
    $count=0;
  while ($row=mysqli_fetch_array($ret)) {
    $count++;
  ?>
    <tr>
      <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
      <td data-label="Order ID"><?php echo $row["orderid"];?></td>
      <td data-label="Receiver Name"><?php echo $row["name"];?></td>
      <td data-label="Paid Amount">₹<?php echo $row["amount"];?></td>
      <td data-label="Order Date"><?php echo $row["txndate"];?></td>
      <td data-label="Action"> <?php echo '<a class="btn-danger btn" href=" ./bill.php?oid='.$row["orderid"].'">View Reciept</a>';?></td>
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