<html>
    <head>
    <body>
    <link rel="stylesheet" href="style3.css" type="text/css">
<?php    
         session_start();
         $office_id=$_SESSION['office_id'];
?> 
<img src="officepicture.png" alt="HTML5 Icon" width="200" height="200"> <br>
<form action="RegisterCar.php">
    <input type="submit" value="Register New Car" />
</form>
<form action="ViewCar.php">
    <input type="submit" value="View Cars" />
</form>
<form action="ViewCarsOfficeForm.php">
    <input type="submit" value="Search Cars" />
</form>
<form action="ViewOfficeReservations.php">
    <input type="submit" value="View Reservations" />
</form>
<form action="query5formoffice.php">
    <input type="submit" value="View Payments" />
</form>
<form action="form.php">
    <input type="submit" value="Logout" />
</form>

    </body>
</html>