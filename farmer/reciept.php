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
    <title>Reciept</title>
    <link href="./css/styles.css" rel="stylesheet"/>
    <link href="../css/table.css" rel="stylesheet">
</head>
<body class="fixed-left">
<?php include_once('./include/header.php');?>
      <div id="wrapper" style="background-color: var(--grey-alt);">
        <!-- Begin page -->
        <table name="table1">
        <caption> <h4 >Reciept</h4></caption>
        <tbody>
<?php
$oid=$_GET['oid'];
$amt=0;
$ret=mysqli_query($con,"select * from uorders where orderid='$oid'");
$cnt=1;
$cid1=0;
while ($row=mysqli_fetch_array($ret)) {
?>
    
            <tr>
            <td scope="row" colspan=2><?php echo "<p><strong>Order ID:</strong> ".$oid."</p>";?></td>
            </tr>
            <tr>
            <td scope="row" colspan=2><?php echo "<p><strong>Order Date :</strong> ".$row['txndate']."</p>";?></td>
            </tr>
            <tr>
            <td scope="row" colspan=2 >
                <table id="table2" >    
                <caption> <h5 >Shipping Information</h5></caption>
                <thead>
                <tr>
                    <th scope="col">Reciever Full Name</th>
                    <th scope="col">Reciever email ID</th>
                    <th scope="col">Reciever Address</th>
                    <th scope="col">Reciever City</th>
                    <th scope="col">Reciever State</th>
                    <th scope="col">Reciever Pincode</th>
                    <th scope="col">Reciever Country</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row" data-label="Reciever Full Name"><?php  echo $row['name'];?></td>
                    
                        <td scope="row" data-label="Reciever email ID"><?php  echo $row['email'];?></td>
                    
                        <td scope="row" data-label="Reciever Address"><?php  echo $row['addr'];?></td>
                    
                        <td scope="row" data-label="Reciever City"><?php  echo $row['city'];?></td>
                    
                        <td scope="row" data-label="Reciever State"><?php  echo $row['state'];?></td>
                    
                        <td scope="row" data-label="Reciever Pincode"><?php  echo $row['pincode'];?></td>
                    
                        <td scope="row" data-label="Reciever Country.">India</td>
                    </tr>
                </tbody>
                </table>
             </td>
            </tr>
            <tr>
                <td scope="row" colspan="2">
                    <table id="table4" >    
                    <caption > <h5 >Order Information</h5></caption>
                    <thead>
                        <tr>
                            <th scope="col">SR. NO.</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt1=0;
                    $amt=0;
                    $ret1 = mysqli_query($con1,"select * from porders o, fproduct p where o.pid=p.id AND o.orderid= ".$oid." AND o.fid=".$_SESSION['cmsaid']);
                    while ($row1=mysqli_fetch_array($ret1)) { $cnt1++;?>
                     <tr>
                            <td scope="row" data-label="SR. NO."><?php echo $cnt1;?></td>
                            <td data-label="Product Name"><?php echo $row1["title"];?></td>
                            <td data-label="Quantity"><?php echo $row1["qnt"];?></td>
                            <td data-label="Rate">₹<?php echo $row1["price"];?></td>
                            <td data-label="Discount"><?php echo $row1["disc"];?></td>
                            <td data-label="Total">₹ <?php echo $row1["amt"];?></td>
                            
                        </tr>
                        <?php $amt+= $row1["amt"] ;}?>
                        <!-- <tr>
                        <td scope="row" colspan=7 style="text-align:end;" >Shipping</td>
                        <td data-label="Shipping">₹50</td>
                        </tr> -->
                        <tr>
                        <td scope="row" colspan=5 style="text-align:end;" >Total Amount</td>
                        <td data-label="Total Amount">₹<?php echo $amt; ?></td>
                        </tr>
                    </tbody>
                    </table>
                </td>
            </tr>
            
            <tr>
                <td scope="row" colspan="2">
                    <table id="table5" >    
                    <caption > <h5 >Payment Details</h5></caption>
                    <thead>
                        <tr>
                            <th scope="col">Payment ID</th>
                            <th scope="col">Payment Amount</th>
                            <th scope="col">Payment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td scope="row" data-label="Payment ID"><?php echo $row['id']; ?></td>
                            <td data-label="Payment Amount"><?php echo $amt; ?></td>
                            <td data-label="Payment Date"> <?php echo $row['txndate']; ?></td>
                        </tr>
                    
                    </tbody>
                    </table>
                </td>
            </tr>
            <?php } ?>
            <?php // } ?>
        </tbody>
</table>

<!-- Footer -->
<?php include_once("./include/footer.php");?>
  <!-- End Footer -->
    </body>
</html>
<?php }  ?>