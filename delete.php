<?php
include('config.php');
$userid=$_REQUEST['userid'];
$query=mysqli_query($con,"delete from usermaster where userid='$userid'");
header('location:adminlanding.php');
?>