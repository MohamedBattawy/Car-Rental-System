<html>
    <head>
    <body>
</form>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<?php
$plate_id=$_GET["plate_id"];
session_start();
 $connection=mysqli_connect('localhost','root','');
echo $connection ? '' : 'not connected';
 mysqli_select_db($connection,"car_rental_system");

$deleting = "delete from car where plate_id=$plate_id";
if ($connection->query($deleting) === TRUE) {
    #echo '<script>alert("Registered Successfuly")</script>';
  header('location:WelcomeOffice.php');
}
?>
    </body>
</html>