<html>
<head>
<link rel="stylesheet" href="style2.css">
</head>
<body>
</br>
<h1>Table of Payments</h1>
</br>
<?php
$date1=$_POST['startdate'];
$date2=$_POST['enddate'];
//echo"first date:$date1";
//echo"last date:$date2";
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");
                                                  
$sql="SELECT price,payment_date,plate_id,customer_id FROM rent where (rent.payment_date>='$date1' and rent.payment_date<='$date2') ;";
$result=mysqli_query($connection,$sql);
$sql="SELECT sum(price) AS total FROM rent where (rent.payment_date>='$date1' and rent.payment_date<='$date2') ;";
$result2=mysqli_query($connection,$sql);
$resultCheck=mysqli_num_rows($result);
$c=1;
?>
<table>
<tr>
    <th>#</th>
    <th>Payment Date</th>
    <th>Price</th>
    <th>Plate ID</th>
    <th>Customer ID</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($result) ){
    //echo "<tr>";
    echo "<tr>
          <td>".$c.")</td>
          <td>". $row['payment_date']."</td>
          <td>". $row['price']."</td>
          <td>". $row['plate_id']."</td>
          <td>". $row['customer_id']."</td>
          </tr>
          ";
    
    

    $c++;

}
if($c==1)
    echo"no data with such requirments";
?>
</table>
<?php
if ($c>1){
$row = mysqli_fetch_assoc($result2);
echo"SUM = ". $row['total']."";
}
?>
<div class="container">
  <div class="row">
    <div class="col text-center">
    <a class='btn btn-primary btn-sm' href='/Final2/WelcomeAdmin.php?'>Back<a>
    </div>
  </div>
</div>
</body>

</html>