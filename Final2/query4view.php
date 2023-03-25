<html>
<head>
<link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
$id=$_POST['customer_id'];
echo"<h1>Customer With Id #".$id." Info. </h1>";
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");

$sql="SELECT * FROM customer natural join car natural join rent where (customer.customer_id = '$id' );";
$result=mysqli_query($connection,$sql);
$resultCheck=mysqli_num_rows($result);
$c=1;
$check=0;
?>
<table>
<tr>
    <th>#</th>
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
    if($check<1){
        echo"<h3>Name:  ".$row['fname']." ".$row['lname']."</h3>
             <h3>E-mail:".$row['e_mail']."</h3>
        
        ";
        echo"<h2>List of Cars Rented:</h2>  ";

        $check=1;
    }    
    echo "<tr>
    <td>".$c." )</td>
    <td>".$row['model']." </td>
    <td>".$row['plate_id']." </td>
    <td>".$row['start_date']." </td>
    <td>".$row['end_date']." </td>
    <td>".$row['price']." </td>
    <td>".$row['year']." </td>
    <td>".$row['stats']." </td>
    <td>".$row['office_id']." </td>
    </tr>";
   /* echo $c;
    echo ") "; 

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
    echo"<br>";  */

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