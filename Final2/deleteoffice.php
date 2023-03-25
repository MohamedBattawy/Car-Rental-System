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
$office_id=$_GET["office_id"];
session_start();
 $connection=mysqli_connect('localhost','root','');
echo $connection ? 'connected' : 'not connected';
 mysqli_select_db($connection,"car_rental_system");

$deleting = "delete from office where office_id=$office_id";
if ($connection->query($deleting) === TRUE) {
    #echo '<script>alert("Registered Successfuly")</script>';
  header('location:ViewOffice.php');
}
?>
    </body>
</html>