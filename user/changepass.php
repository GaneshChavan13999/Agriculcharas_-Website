<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location: ../includes/logout.php');
  } else{
$msg="";
if(isset($_POST['login']))
  {
    $user=(int)$_SESSION['cmsaid'];
    $opassword=md5($_POST['opass']);
    $password=md5($_POST['pass']);
    $cpassword=md5($_POST['cpass']);
    $pass="";
    if($password==$cpassword){
        $ret=mysqli_query($con,"SELECT pass FROM user  WHERE id=".$user);
        $num=mysqli_num_rows($ret);
        if($num >0){
        while ($row=mysqli_fetch_array($ret)) {
            $pass=$row["pass"];
        }}
        if($pass==$opassword){
            $query=mysqli_query($con,"UPDATE user SET pass='".$password."' WHERE id=".$user);
            if($query){
                include "../includes/mail.php";
                $m="Hello <br> Your Password Has been Changed. If its not you please contact admin and change your password.";
                $s=mailto($_SESSION["email"],"Password Changed",$m);
            header('location: login.php');
            }
            else{
            $msg="Something went Wrong.";
            }
        }
        else{
            $msg="Please enter coreect old password.";
        }
    }
    else {
        $msg="Password and Confirm password not matched.";
        }
  }
  ?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/log.css">
  <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
.e{
	color:red;
	display:none;
}
</style>
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
<input type="password" name="opass" placeholder="Enter old Password" required ><br>
<input type="password" name="pass" placeholder="Enter new Password" required><br>
<input type="password" name="cpass" placeholder="confirm new Password" required><br>
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
<script>
$(document).ready(function(){
  console.log("loaded");
  localStorage.clear();
  console.log("cleared");
})
</script>
</body>
</html>
<?php } ?>
