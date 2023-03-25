<?php
$plate_id=$_GET['plate_id'];
$start_date=$_GET['start_date'];
session_start();
$pay_date=date("Y-m-d");
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");
$sql4="UPDATE rent SET payment_date='$pay_date' where plate_id=$plate_id and start_date='$start_date'";
$result4 = mysqli_query($connection,$sql4);
#echo '<script type="text/javascript">alert("Payment Done Successfully");</script>';
header('location:ViewCustomerReservations.php');


?>