<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location: ../includes/logout.php');
  } else{
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact US</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="./css/styles.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="/css/global.css" />  
<link rel="stylesheet" type="text/css" href="/css/contact1.css" />


<script src="logout.js"></script>
<script src="navigation.js"></script>
<script src="jquery-1.7.1.min.js"></script>
<script src="animation.js"></script>
<script src="navigation.js"></script>

<style>
/* Dropdown Button */
.dropbtn {
  background-color:red;
  color: white;
  padding: 16px;
  font-size: 18px;
  border: none;
  border-radius:05px;
  margin-right:15px;
  margin-top:-10px;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>

<body>

<?php include_once('./include/header.php');?>
<div class="body" style="text-align:center;">	
<div class="block">

<p >Contact us</p><br><hr>
<br>
<br>
<div class="block2">

<p>For any Query Please Mail on :
<br> <b class="hed1">agricultura@gmail.com</b></p>
<br>
<p>Contact No : <b class="hed1">25208156/8286140114</b></p>
</div>
</div>  
</div>
<?php include_once("./include/footer.php");?>
</body>
</html>
<?php } ?>