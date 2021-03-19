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
    <title>Transactions</title>
    <link href="./css/styles.css" rel="stylesheet"/>
    <link href="../css/table.css" rel="stylesheet">
</head>
<body >
<?php include_once('./include/header.php');?>
<table style="background-color: var(--grey-alt);">
  <caption> Transactions By Farmers </caption>
  <thead>
    <tr>
        <th scope="col">SR. NO.</th>
        <th scope="col">Order ID</th>
        <th scope="col">Farmer Name</th>
        <th scope="col">Retailer Name</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Quantity</th>
        <th scope="col">Paid Amount</th>
    </tr>
  </thead>
  <tbody><?php
  $ret=mysqli_query($con,"SELECT ro.orderid, f.fname , f.lname, r.fname as f1, r.lname as f2, rp.title, ro.qnt, ro.amt  FROM rporders ro, farmer f, retailer r, rproduct rp   WHERE ro.fid= f.id AND ro.rid= r.id AND ro.pid= rp.id");
  $num=mysqli_num_rows($ret);
  if($num >0){
    $count=0;
  while ($row=mysqli_fetch_array($ret)) {
    $count++;
  ?>
    <tr>
      <td scope="row" data-label="SR. NO."><?php echo $count;?></td>
      <td data-label="Order ID"><?php echo $row["orderid"];?></td>
      <td data-label="Farmer Name"><?php echo $row["fname"]." ".$row["lname"];?></td>
      <td data-label="Retailer Name"><?php echo $row["f1"]." ".$row["f2"];?></td>
      <td data-label="Product Name"><?php echo $row["title"];?></td>
      <td data-label="Product Quantity"><?php echo $row["qnt"];?></td>
      <td data-label="Product Amount">₹<?php echo $row["amt"];?></td>
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