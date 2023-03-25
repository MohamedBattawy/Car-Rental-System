<?php
header('location:/race/admin.php')
?>
<html>
    <head>
    <link rel="stylesheet" href="style3.css" type="text/css">

    <body>
<img src="adminpicture.png" alt="HTML5 Icon" width="200" height="200"> <br>
<form action="RegisterOffice.php">
    <input type="submit" value="Register New Office" />
</form>
<form action="ViewOffice.php">
    <input type="submit" value="View Offices" />
</form>
<form action="ViewCarAdmin.php">
    <input type="submit" value="View Cars" />
</form>
<form action="ViewCarsForm.php">
    <input type="submit" value="Search Cars" />
</form>
<form action="query2form.php">
    <input type="submit" value="View Car Reservations" />
</form>
<form action="ViewCustomer.php">
    <input type="submit" value="View Customers" />
</form>
<form action="ViewCustomersForm.php">
    <input type="submit" value="Search Customers" />
</form>
<form action="query4form.php">
    <input type="submit" value="View Customer Reservations" />
</form>
<form action="query1form.php">
    <input type="submit" value="View Reservations By Date" />
</form>
<form action="query5form.php">
    <input type="submit" value="View Payments" />
</form>
<form action="query3form.php">
    <input type="submit" value="View Car Status" />
</form>
<form action="form.php">
    <input type="submit" value="Logout" />
</form>
    </body>
</html>