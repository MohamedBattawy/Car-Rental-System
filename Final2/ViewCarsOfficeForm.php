<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
</br>
<h1>Find Cars</h1>
</br>
<?php
         session_start();
         $office_id=$_SESSION['office_id'];
?>
<div class="div-1">
<form action="ViewCarsOfficeView.php"  method="POST"  >
<text>Plate Id:</text> <input type="number" class="plate_id" name="plate_id" >
<br><br>
<text>Year:</text> <input type="number" class="year" name="year" >
<br><br>
<text>Color:</text> <input type="string" class="color" name="color" >
<br><br>
<text>Model:</text> <input type="string" class="model" name="model" >
<br><br>
 <input type="submit" value="search" name="search" >
</form>
</div>

</body>        
</html>