<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>View Payments</h1>
<?php 
         session_start();
         $office_id=$_SESSION['office_id'];
?>
<form action="query5viewoffice.php"  method="POST"  >
<text>Start date:</text><input type="date" class="startdate" name="startdate" >
<br><br>
<text>End date:</text><input type="date" class="enddate" name="enddate" >
<br><br>
<input type="submit" value="search" name="search" >
</form>

</body>        
</html>