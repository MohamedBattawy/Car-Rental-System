<html>
<head>
<link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
$date1=$_POST['startdate'];
$date2=$_POST['enddate'];
echo"</br><h1>View Reservations from ".$date1." to ".$date2."</h1></br>";
//echo"last date:$date2";
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");

$sql="SELECT * FROM customer natural join car natural join rent where (rent.start_date <= '$date2' and rent.end_date >= '$date1' );";
$result=mysqli_query($connection,$sql);
$resultCheck=mysqli_num_rows($result);
$c=1;
?>
<table>
    <tr>
    <th>#</th>
    <th>Customer Id</th>
    <th>Customer Name</th>
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

    echo "<tr>
    <td>".$c." )</td>
    <td>".$row['customer_id']." </td>
    <td>".$row['fname']." ".$row['lname']." </td>
    <td>".$row['model']." </td>
    <td>".$row['plate_id']." </td>
    <td>".$row['start_date']." </td>
    <td>".$row['end_date']." </td>
    <td>".$row['price']." </td>
    <td>".$row['year']." </td>
    <td>".$row['stats']." </td>
    <td>".$row['office_id']." </td>
    </tr>";
        
  /*  echo $c;
    echo ") ";

    echo "first name: ";
    echo $row['fname'];
    echo"<br>";

    echo "last name: ";
    echo $row['lname'];
    echo"<br>";    

    echo "customer id: ";
    echo $row['customer_id'];
    echo"<br>"; 
    
    echo "e-mail: ";
    echo $row['e_mail'];
    echo"<br>";  

    echo "model: ";
    echo $row['model'];
    echo"<br>";  

    echo "plate id: ";
    echo $row['plate_id'];
    echo"<br>";  
    
    echo "start date: ";
    echo $row['start_date'];
    echo"<br>";      

    echo "end date: ";
    echo $row['end_date'];
    echo"<br>"; 

    echo "price: ";
    echo $row['price'];
    echo"<br>";     

    echo "year: ";
    echo $row['year'];
    echo"<br>";     

    echo "stats: ";
    echo $row['stats'];
    echo"<br>";  
    
    echo "office id: ";
    echo $row['office_id'];
    echo"<br>";  
    echo"<br>";*/  

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