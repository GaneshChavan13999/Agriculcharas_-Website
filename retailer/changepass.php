<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location: ../includes/logout.php');
  } else{
if(isset($_POST['login']))
  {
    $opass=md5($_POST['opass']);
    $password=md5($_POST['pass']);
    $query=mysqli_query($con,"UPDATE retailer SET pass='".$password."' where  id=".$_SESSION['cmsaid']." AND pass='".$opass."' ");
    if($query){
     header('location: login.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/log.css">
<style>
.e{
	color:red;
	display:none;
}
</style>
<script>
// function validateForm(){
	
// 	var username=document.forms["register"]["username"].value;
// 	var password=document.forms["register"]["password"].value;
	
	
// 	if(username==""&& password==""){
// 		document.getElementById("error").style.display="block";
// 		return false;
// 	}
// 	if(username!=""&&password!=""){
// 		return true;
// 	}
	
// 	if(username==""){
// 		document.getElementById("error1").style.display="block";
// 	}
// 	if(password=="")
// 	{
// 		document.getElementById("error2").style.display="block";
// 	}
//      return false
// }
</script>
</head>
<body>
<div class="loginbox">
<img src="source_icon/login.png" class="logo">
<h1 align="center">CHANGE PASSWORD</h1>
<br>
<form method="post" name="login" >
<?php
if (isset($found)){
echo'<p style="color:red;"><b>Please Enter Correct Username and password </b></p>';
}
?>
<input type="password" name="opass" placeholder="Old Password" required ><br>
<input type="password" name="pass" placeholder="New Password" required><br>
<br>
<div>
        <p style="font-size:16px; color:red" id="e" align="center"> <?php if($msg!=""){ echo $msg; $msg="";}?> </p>
        </div>
<br>
<div id="container">

<button type="submit" name="login" value="submit">CHANGE</button> &nbsp;
<button type="reset" value="Reset">RESET</button> 
<br>
<br>
<br>
<a href="dashboard.php" style="margin-right:0px;
font-size:15px; font-family: Tahoma, Geneva, sans-serif;"><b>HOME</b></a>
</div>
</form>
</div>
</body>
</html>
<?php } ?>