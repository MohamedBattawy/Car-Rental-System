<html>
    <head>
    <body>
    <link rel="stylesheet" href="style3.css" type="text/css">

            <img src="welcomepic.png" alt="HTML5 Icon" width="200" height="200">
    <h1>Car Registration Form</h1>
    <form method="post">
    Plate ID:<input type='number' name='plate_id'> <br> <br>
    Model:<input type='text' name='model'> <br> <br>
    Year:<input type='number' name='year'> <br> <br>
    Color:<input type='text' name='color'> <br> <br>
    price_per_day:<input type='number' name='price_per_day'> <br> <br>
    Status:<input type='text' name='stats'> <br> <br>
    <input type='submit' name='submit' value='Register'>
</form>
<form action="WelcomeOffice.php">
    <input type="submit" value="Back" />
</form>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php
session_start();
$office_id=$_SESSION['office_id'];
if(isset($_POST['submit']))
{
 $connection=mysqli_connect('localhost','root','');
 mysqli_select_db($connection,"car_rental_system");
 $plate_id=$_POST['plate_id'];
 $model=$_POST['model'];
 $year=$_POST['year'];
 $color=$_POST['color'];
 $price_per_day=$_POST['price_per_day'];
 $stats=$_POST['stats'];
 $currentdate=date("Y-m-d");
 if($plate_id =='' || $model=='' || $year=='' || $color=='' || $price_per_day==''||$stats=='')
 {
    echo '<script>alert("Missing information")</script>';
 }
    else{
   $select = mysqli_query($connection, "SELECT * FROM car WHERE plate_id =$plate_id");
   if(mysqli_num_rows($select)) {
       exit('plate_id already exists!');
   }

$inserting = "INSERT INTO car (plate_id,model,year,color,price_per_day,stats,office_id) VALUES ($plate_id,'$model',$year,'$color',$price_per_day,'$stats',$office_id)";
$insertingstats = "INSERT INTO carstats (plate_id,stats,start_date) VALUES ($plate_id,'$stats','$currentdate')";

if ($connection->query($inserting) === TRUE AND $connection->query($insertingstats)) {
  header('location:WelcomeOffice.php');
}
 }
}
?>
    </body>
</html>