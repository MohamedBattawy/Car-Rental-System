<!DOCTYPE html>
<html>
<?php 
    $plate_id=$_GET["plate_id"];
    session_start();
    $connection=mysqli_connect('localhost','root','');
    echo $connection ? '' : 'not connected';
    mysqli_select_db($connection,"car_rental_system");
    $currentdate=date("Y-m-d");
    $find = mysqli_query($connection, "SELECT * FROM car WHERE plate_id=$plate_id");
    $target=$find->fetch_assoc();
    if (!$target){
    echo '<script>alert("ID not found")</script>';
 }
?>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>car edit</title>
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
            <h1>Edit car</h1>
        </div>
        <div class="pbody">
            <form method="post" id="form">
                <div class="pelement">Model:<input type='text' name='model' value="<?php echo $target['model']?>"></div><br>
                <div class="pelement">Year:<input type='number' name='year' value="<?php echo $target['year']?>"></div><br>
                <div class="pelement">Color:<input type='text' name='color' value="<?php echo $target['color']?>"></div><br>
                <div class="pelement">price_per_day:<input type='number' name='price_per_day' value="<?php echo $target['price_per_day']?>"></div><br>
                <div class="pelement">Status:<input type='text' name='stats' value="<?php echo $target['stats']?>"></div><br>
                <div class="pheading">
                    <button class="back" type="submit" formaction="officecars.php">back</button>
                    <button class="back" form="form" type='submit' id="submit" name='submit'>Edit</button></div> <br>
</form>
<?php
if(isset($_POST['submit']))
{
 $model=$_POST['model'];
 $year=$_POST['year'];
 $color=$_POST['color'];
 $price_per_day=$_POST['price_per_day'];
 $stats=$_POST['stats'];
 if($plate_id =='' || $model=='' || $year=='' || $color=='' || $price_per_day==''||$stats=='')
 {
    echo '<html><p class="errmssg">missing information</p></html>';
 }
    else{
    $updating = "UPDATE car set model='$model',year=$year,color='$color',price_per_day=$price_per_day,stats='$stats' where plate_id=$plate_id";
    if($stats != $target['stats']){
    $insertingstats = "INSERT INTO carstats (plate_id,stats,start_date) VALUES ($plate_id,'$stats','$currentdate')";
}
if ($connection->query($updating) === TRUE) {
    #echo '<script>alert("Registered Successfuly")</script>';
  header('location:officecars.php');
}
 }
}
?>
    </body>
</html>