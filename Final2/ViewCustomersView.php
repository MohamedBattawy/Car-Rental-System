<html>
<head>
<link rel="stylesheet" href="style2.css">
</head>
<body>
</br>
<h1>Table of Customers</h1>
</br>
<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$customer_id=$_POST['customer_id'];
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");
                                                  
$sql="SELECT * FROM customer where (customer_id='$customer_id' OR lname='$lname' OR fname='$fname');";
$result=mysqli_query($connection,$sql);
$resultCheck=mysqli_num_rows($result);
$c=1;
?>
<table>
<tr>
    <th>#</th>
    <th>Customer ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>Password</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($result) ){
    //echo "<tr>";
    echo "<tr>
          <td>".$c.")</td>
          <td>". $row['customer_id']."</td>
          <td>". $row['fname']."</td>
          <td>". $row['lname']."</td>
          <td>". $row['e_mail']."</td>
          <td>". $row['pass']."</td>
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