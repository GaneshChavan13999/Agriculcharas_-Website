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
        
<title>About US</title>
		
<link rel="stylesheet" type="text/css" href="global.css" />
<link rel="stylesheet" type="text/css" href="abtus.css" />

       
<script src="logout.js"></script>
<script src="jquery-1.7.1.min.js"></script>
<script src="animation.js"></script>
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
<header>
<div class="body" style="display: block;">	
<div class="block">

			
<p class="head">About Product</p>
<br>
<hr>
<br>
<div class="block2">
<p><b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agriculture is the backbone of the Indian Economy"- said Mahatma Gandhi six decades 
ago. Even today, the situation is still the same, with almost the entire economy being sustained by agriculture, which is the mainstay of the villages. 
It contributes 16% of the overall GDP and accounts for employment of approximately 52% of the Indian population.</b></p>
<br>
<p><b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i> AGRICULTURA's </i> is an endeavour in this direction 
to create one stop shop for meeting all informational needs relating to Agriculture,of an Indian farmer. With this Indian Farmer will not be required
to surf through maze of websites created for specific purposes.</b></p>
<br>
<p><b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This system a farmer will be able to get all relevant information
on specific crops around his village/block /district or state to be purchased and sold!</b></p>
</div> 
</div> 
</div>
<?php include_once('../includes/footer.php');?>	   
    </body>
</html>
<?php } ?>