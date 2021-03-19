<?php
// session_start();
error_reporting(0);
// include('..\includes\dbconnection.php');
include('../includes/dbconnection.php');
$msg="";
try{
if(isset($_POST['register']))
  {
    // echo'<script> console.log("hello"); </script>';
    $user=$_POST['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $phn=(int)$_POST['phone'];
    $addr=$_POST['addr'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $pin=$_POST['pin'];
    $password=md5($_POST['pass']);
    $sql="INSERT INTO `user`(`email`, `fname`, `lname`, `gender`, `phone`, `address`, `city`, `state`, `country`, `pin`, `pass`) VALUES (
        '".$user."',
        '".$fname."',
        '".$lname."',
        '".$gender."',
        ".$phn.",
        '".$addr."',
        '".$city."',
        '".$state."',
        '".$country."',
        '".$pin."',
        '".$password."')";
        // $result = mssql_query($con,$sql);
    $result=$con->query($sql);
    if($result){
                    include "../includes/mail.php";
                    $m="Hello <br> You Have been Registered Successfully. Login Credentials Are:<br> Username: ".$user." <br>Password: ".$_POST['pass']." <br> Thank you. ";
                    $s=mailto($user,"Registered Successfully",$m);
                    if($s){
                        $msg2="Registered IS SUCCESSFUL.";
                    }  
        header('location: login.php');
       }
       else{
       $msg="Email id already exists";
       echo "
    <script type=\"text/javascript\">
     document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('e').style.display = 'block';
     });
    </script>";
       }
  }}
  catch(Exception $e) {
	$msg= 'Message: ' .$e->getMessage();
  }
  ?>
  <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Registration</title>
		
<link rel="stylesheet" type="text/css" href="css/global.css" />
<link rel="stylesheet" type="text/css" href="css/reg.css" />


     <style>
   .e{
         color:red;
         display:none; 

     }
     </style>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="../includes/jquery-1.7.1.min.js"></script>
	 <script>
        function validateForm() {
            document.getElementById('e').style.display = "none";
            document.getElementById("error").innerHTML="";
            document.getElementById("error").style.display = "none";
            var letters = /^[A-Za-z]+$/;
            var num = /^[0-9]+$/;
        var fname = document.forms["register"]["fname"].value;
        var lname = document.forms["register"]["lname"].value;
        var gender = document.forms["register"]["gender"].value;
        var phone = document.forms["register"]["phone"].value;
        var email = document.forms["register"]["email"].value;
        var address = document.getElementById("addr").value;
        var pin = document.forms["register"]["pin"].value;
        var state = document.forms["register"]["state"].value;
        var city = document.forms["register"]["city"].value;
        var country = document.forms["register"]["country"].value;
        var pass = document.forms["register"]["pass"].value;
        var cpass = document.forms["register"]["cpass"].value;
        if (fname != "" && lname != "" && gender != "" && phone != "" && email != "" && addr != "" && pin != "" && state != "" && city != "" 
        && country != "" && pass != "" && cpass != ""){
            if(fname.match(letters) && lname.match(letters) && state.match(letters) && city.match(letters) && country.match(letters)  &&
            phone.match('[0-9]{10}') && pin.match('[0-9]{6}') && pass==cpass){
                return true;
            }
            if (!fname.match(letters)){
                document.getElementById("error").textContent += "Please Enter Correct First Name.";
                document.getElementById("error").style.display = "block";
            }  
            if (!lname.match(letters)){
                document.getElementById("error").textContent += "\nPlease Enter Correct Last Name.";
                document.getElementById("error").style.display = "block";
            }
            if (!state.match(letters)){
                document.getElementById("error").textContent += "\nPlease Enter Correct State Name.";
                document.getElementById("error").style.display = "block";
            }
            if (!city.match(letters)){
                document.getElementById("error").textContent += "\nPlease Enter Correct City Name.";
                document.getElementById("error").style.display = "block";
            }
            if (!country.match(letters)){
                document.getElementById("error").textContent += "\nPlease Enter Correct Country Name.";
                document.getElementById("error").style.display = "block";
            }
            
            if (!phone.match('[0-9]{10}')){
                document.getElementById("error").textContent += "\nPlease Enter Correct phone number.";
                document.getElementById("error").style.display = "block";
            }
            if (!pin.match('[0-9]{6}')){
                document.getElementById("error").textContent += "\nPlease Enter Correct Pin Code.";
                document.getElementById("error").style.display = "block";
            }
            
            if (pass!=cpass){
                document.getElementById("error").textContent += "\nPassword and confirm password is not maching.";
                document.getElementById("error").style.display = "block";
            }
        return false;
        }}
    </script>  
	
	

<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/navigation.js"></script>
<script src="js/animation.js"></script>     
</head>
    
<body>
<header>
<div class="main">
<ul>
<li><a href="../index.php">HOME</a></li>
</ul>
</div>

<div class="header">&nbsp;&nbsp;AGRICULTURA's 
</div>

<div class="body">
<div class="block1">
<p class="head1">User Registration</p><hr>


<form  method="post" name="register" onsubmit="return validateForm()" >
<div class="back"><fieldset class="fieldset">
<legend class="legend1"><b>Personal Details</b></legend>

<div class="span1">Firdt Name:<input class="inp1" type="text" name="fname" required /></div>
<div class="span2">Last Name:<input class="inp1" type="text" name="lname" required/></div>

            
<div class="span3">Gender:
<input class="inp2" type="radio" name="gender" value="Male" checked>Male
<input class="inp2" type="radio" name="gender" value="Female">Female
<input class="inp2" type="radio" name="gender" value="Others">Others</div>
            
<div class="span4">Contact:<input class="inp3" type="number" name="phone" required /></div>
            
<div class="span5">Email:<input id="email" type="email" name="email" required/></div>
</fieldset></div>
        
<div class="back"><fieldset class="fieldset">
<legend><b>Residental Details</b></legend>
<p class="address"><div class="span7">Address:</p><textarea class="textarea" name="addr" id="addr" required></textarea></div>
            
<div class="span8">Pincode:<input class="inp3" type="number" name="pin" required></div>
<div class="span10">City:<input class="inp6" type="text" name="city" required></div>
           
<div class="span9">State:<input class="inp5" type="text" name="state" required></div>
            
<div class="span11">Country:<input class="inp5" type="text" name="country" required></div>
</fieldset></div>

<div class="back"><fieldset class="fieldset">
<legend><b>Login Details</b></legend>

<div class="span14">Password:&nbsp;&nbsp;&nbsp;&nbsp;<input class="inp10" type="password" name="pass" required/></div>
<div class="span15">Confirm Password:<input class="inp11" type="password" name="cpass" required/></div><br>
</fieldset></div>
  <br><div class="back"><fieldset class="fieldset">
  <div>
        <pre style="font-size:16px; color:red; display:none;" align="center" id="error"name="error">Errors: <br></pre>
        </div>
        <div>
        <p style="font-size:16px; color:red" id="e" align="center"> <?php if($msg!=""){ echo $msg; $msg="";}?> </p>
        </div>
        </fieldset></div>
        <br>
  <div class="b">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<button type="submit" name="register" >REGISTER</button>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="reset">RESET</button>
		   <br>
		   <br>
</form>
</div>
</div></body>
</html>
