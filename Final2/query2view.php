<html>
<head>
<link rel="stylesheet" href="style2.css">
</head>
<body>
</br>
<h1>Table of Car Reservations</h1>
</br>
<?php
$date1=$_POST['startdate'];
$date2=$_POST['enddate'];
$plate_id=$_POST['plate_id'];
//echo"first date:$date1";
//echo"last date:$date2";
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");
                                                  
$sql="SELECT * FROM car natural join rent where (rent.start_date <= '$date1' and rent.end_date >= '$date2' and car.plate_id= '$plate_id');";
$result=mysqli_query($connection,$sql);
$resultCheck=mysqli_num_rows($result);
$c=1;
?>
<table>
<tr>
    <th>#</th>
    <th>Customer Id</th>
    <th>Model</th>
    <th>Plate Id</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Price</th>
    <th>Year</th>
    <th>Stats</th>
    <th>Office Id</th>



</tr>
<?php
while($row = mysqli_fetch_assoc($result) ){
    //echo "<tr>";
    echo "<tr>
          <td>".$c.")</td>
          <td>". $row['customer_id']."</td>
          <td>". $row['model']."</td>
          <td>". $row['plate_id']."</td>
          <td>". $row['start_date']."</td>
          <td>". $row['end_date']."</td>
          <td>". $row['price']."</td>
          <td>". $row['year']."</td>
          <td>". $row['stats']."</td>
          <td>". $row['office_id']."</td>
          </tr>
          ";
    
    

    $c++;

}
if($c==1)
    echo"no data with such requirments";

?>
</table>
<div class="container">
  <div class="row">
    <div class="col text-center">
    <a class='btn btn-primary btn-sm' href='/Final2/WelcomeAdmin.php?'>Back<a>
    </div>
  </div>
</div>
</body>

</html>