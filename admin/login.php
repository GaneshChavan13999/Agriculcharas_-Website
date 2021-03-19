<?php
session_start();
// error_reporting(0);
// include('..\includes\dbconnection.php');
include('../includes/dbconnection.php');
$msg="";
if(isset($_POST['login']))
  {
    $adminuser=$_POST['uname'];
    $password=md5($_POST['pass']);
    $query=mysqli_query($con,"SELECT id from admin where  username='".$adminuser."' && pass='".$password."' ");
    $ret=mysqli_fetch_array($query);
    if($ret > 0){
      $_SESSION['cmsaid']=$ret['id'];
     header('location: dashboard.php');
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
<h1 align="center">LOGIN HERE</h1>
<br>
<form method="post" name="login" >
<?php
if (isset($found)){
echo'<p style="color:red;"><b>Please Enter Correct Username and password </b></p>';
}
?>
<input type="text" name="uname" placeholder="username" required ><br>
<input type="password" name="pass" placeholder="Enter Password" required><br>
<br>
<div>
        <p style="font-size:16px; color:red" id="e" align="center"> <?php if($msg!=""){ echo $msg; $msg="";}?> </p>
        </div>
<br>
<div id="container">

<button type="submit" name="login" value="submit">LOG IN</button> &nbsp;
<button type="reset" value="Reset">RESET</button> 
<br>
<br>
<br>
</div>
</form>
</div>
</body>
</html>
