<html>
<head>
<link rel="stylesheet" href="style2.css">
</head>
<body>
</br>
<h1>Table of Cars</h1>
</br>
<?php
$model=$_POST['model'];
$year=$_POST['year'];
$plate_id=$_POST['plate_id'];
$color=$_POST['color'];
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");
                                                  
$sql="SELECT * FROM car where (plate_id='$plate_id' OR year='$year' OR model='$model' or color='$color');";
$result=mysqli_query($connection,$sql);
$resultCheck=mysqli_num_rows($result);
$c=1;
?>
<table>
<tr>
    <th>#</th>
    <th>Plate ID</th>
    <th>Model</th>
    <th>Year</th>
    <th>Color</th>
    <th>Price Per Day</th>
    <th>Status</th>
    <th>Office ID</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($result) ){
    //echo "<tr>";
    echo "<tr>
          <td>".$c.")</td>
          <td>". $row['plate_id']."</td>
          <td>". $row['model']."</td>
          <td>". $row['year']."</td>
          <td>". $row['color']."</td>
          <td>". $row['price_per_day']."</td>
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