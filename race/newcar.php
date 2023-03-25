<DOCTYPE html>
<html>

<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>login</title>
</head>

<body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
    <div class="panel">
        <div class="pheading">
            <h1>Add Car</h1>
        </div>
        <div class="pbody">
            <form method="post" id="form">
                <div class="pelement"> Plate ID:<input type='number' name='plate_id'></div><br>
                <div class="pelement">Model:<input type='text' name='model'></div><br>
                <div class="pelement"> Year:<input type='number' name='year'></div><br>
                <div class="pelement">Color:<input type='text' name='color'></div><br>
                <div class="pelement">  price_per_day:<input type='number' name='price_per_day'></div><br>
                <div class="pelement">  Status:<input type='text' name='stats'></div><br>
                <div class="pheading">
                    <button class="back" type="submit" formaction="office.php">back</button>
                    <button class="back" form="form" type='submit' id="submit" name='submit'>Add Car</button></div> <br>
            </form>
            <br><br>
        </div>
    </div>

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
    echo '<html><p class="errmssg">Missing information!!</p></html>';
 }
    else{
   $select = mysqli_query($connection, "SELECT * FROM car WHERE plate_id =$plate_id");
   if(mysqli_num_rows($select)) {
       exit('<html><p class="errmssg">Plate ID exsists!!</p></html>');
   }

$inserting = "INSERT INTO car (plate_id,model,year,color,price_per_day,stats,office_id) VALUES ($plate_id,'$model',$year,'$color',$price_per_day,'$stats',$office_id)";
$insertingstats = "INSERT INTO carstats (plate_id,stats,start_date) VALUES ($plate_id,'$stats','$currentdate')";

if ($connection->query($inserting) === TRUE AND $connection->query($insertingstats)) {
  header('location:officecars.php');
}
 }
}
?>
    </body>
</html>