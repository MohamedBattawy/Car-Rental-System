<html>
    <head>
    <body>
    <link rel="stylesheet" href="style3.css" type="text/css">
    <h1>Car Edit Form</h1>
    <?php 
    $plate_id=$_GET["plate_id"];
    ?>
    <form method="post">
    Model:<input type='text' name='model'> <br> <br>
    Year:<input type='number' name='year'> <br> <br>
    Color:<input type='text' name='color'> <br> <br>
    price_per_day:<input type='number' name='price_per_day'> <br> <br>
    Status:<input type='text' name='stats'> <br> <br>
    <input type='submit' name='submit' value='Edit'>
</form>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php
session_start();
$connection=mysqli_connect('localhost','root','');
echo $connection ? 'connected' : 'not connected';
 mysqli_select_db($connection,"car_rental_system");
 $currentdate=date("Y-m-d");
 $find = mysqli_query($connection, "SELECT * FROM car WHERE plate_id=$plate_id");
 $target=$find->fetch_assoc();
 if (!$target){
    echo '<script>alert("ID not found")</script>';
 }

if(isset($_POST['submit']))
{
 $model=$_POST['model'];
 $year=$_POST['year'];
 $color=$_POST['color'];
 $price_per_day=$_POST['price_per_day'];
 $stats=$_POST['stats'];
 if($plate_id =='' || $model=='' || $year=='' || $color=='' || $price_per_day==''||$stats=='')
 {
    echo '<script>alert("Missing information")</script>';
 }
    else{
    $updating = "UPDATE car set model='$model',year=$year,color='$color',price_per_day=$price_per_day,stats='$stats' where plate_id=$plate_id";
    $insertingstats = "INSERT INTO carstats (plate_id,stats,start_date) VALUES ($plate_id,'$stats','$currentdate')";
if ($connection->query($updating) === TRUE AND $connection->query($insertingstats)) {
    #echo '<script>alert("Registered Successfuly")</script>';
  header('location:WelcomeOffice.php');
}
 }
}
?>
    </body>
</html>