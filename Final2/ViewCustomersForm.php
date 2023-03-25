<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
</br>
<h1>Find Customers</h1>
</br>
<?php 
?>
<div class="div-1">
<form action="ViewCustomersView.php"  method="POST"  >
<text>Customer ID:</text> <input type="number" class="customer_id" name="customer_id" >
<br><br>
<text>First Name:</text> <input type="string" class="fname" name="fname" >
<br><br>
<text>Last Name:</text> <input type="string" class="lname" name="lname" >
<br><br>
 <input type="submit" value="search" name="search" >
</form>
</div>

</body>        
</html>