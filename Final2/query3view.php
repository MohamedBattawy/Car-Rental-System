<html>
<head>
<link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
$date1=$_POST['startdate'];
echo"</br><h1>View Car Stats at ".$date1."</h1></br>";
//echo"last date:$date2";
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");

$sql="SELECT * from rent where (rent.start_date <= '$date1' and rent.end_date >= '$date1' );";
$result=mysqli_query($connection,$sql);
$sql2="SELECT cs.plate_id,cs.stats FROM carstats cs where (cs.start_date = '$date1');";
$result2=mysqli_query($connection,$sql2);
$sql3="select cs.stats,cs.plate_id from carstats cs inner join
(select plate_id,max(start_date) as highest from carstats where (start_date<'$date1' AND  plate_id not in(SELECT plate_id FROM car natural join rent where (rent.start_date <= '$date1' and rent.end_date >= '$date1' )) AND plate_id not in(SELECT cs.plate_id FROM carstats cs where (cs.start_date = '$date1')) ) group by plate_id) r
on cs.start_date=r.highest and cs.plate_id=r.plate_id order by start_date desc"; 
$result3=mysqli_query($connection,$sql3);
$resultCheck=mysqli_num_rows($result);
$reserved='reserved';
$c=1;
?>
<table>
    <tr>
    <th>#</th>
    <th>Plate Id</th>
    <th>Stats</th>
    </tr>

<?php
while($row = mysqli_fetch_assoc($result) ){

    echo "<tr>
    <td>".$c." )</td>
    <td>".$row['plate_id']." </td>
    <td>".$reserved." </td>
    </tr>";
    $c++;
}

while($row = mysqli_fetch_assoc($result2) ){

  echo "<tr>
  <td>".$c." )</td>
  <td>".$row['plate_id']." </td>
  <td>".$row['stats']." </td>
  </tr>";
  $c++;
}
while($row = mysqli_fetch_assoc($result3) ){

  echo "<tr>
  <td>".$c." )</td>
  <td>".$row['plate_id']." </td>
  <td>".$row['stats']." </td>
  </tr>";
  $c++;
}
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