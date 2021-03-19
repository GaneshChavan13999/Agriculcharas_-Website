<?php
session_start();
// error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
    header('location:../includes/logout.php');
    } else{
      // print_r($_POST);
      // print_r($_POST["products"]);
      // echo"hii \n";
      print_r($_POST["products"]["ids"]);
      echo" <br>";
      // print_r($_POST["products"]["amts"]);
      $a= unserialize($_POST["products"]["ids"]);
      $b= unserialize($_POST["products"]["qnts"]);
      $c= unserialize($_POST["products"]["amts"]);
      for($i=0; $i< sizeof($a)-1; $i++){
        $ret=mysqli_query($con,"SELECT `farmerid` FROM `fproduct` WHERE `id`=".$a[$i]);
        $row=mysqli_fetch_array($ret);
        echo $a[$i]."  ".$b[$i]."  ".$c[$i]."  ".$row["farmerid"]."  <br>";
        // $sql1="INSERT INTO `porders`(`orderid`, `uid`, `fid`, `pid`, `qnt`, `amt`) VALUES (
        //   ".$orderid.",
        //   ".$uid.",
        //   ".(int)$row["farmerid"].",
        //   ".(int)$_POST["products"]["ids"][$i].",
        //   ".(int)$_POST["products"]["qnts"][$i].",
        //   ".(int)$_POST["products"]["amts"][$i].")";
        //   $result1=$con->query($sql1);
      }
      // $ids=explode(",",$_POST["products"]["ids"]);
      // print_r($ids);
      // $ids = array_map('intval', $ids);
      // echo $ids."Hello";
      // print_r($ids);
      // $names=explode(",",$_POST["products"]["names"]);
      // $qnts=explode(",",$_POST["products"]["qnts"]);
      // $qnts = array_map('intval', $qnts);
      // $prices=explode(",",$_POST["products"]["amts"]);
      // $prices = array_map('intval', $prices);
      // $total=intval($_POST["products"]["total"]);
      // print_r($qnts);
      // print_r($prices);
      // print_r($total);

    }
?>