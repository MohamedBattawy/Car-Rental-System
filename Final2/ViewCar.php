<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body>
<title>Cars</title>
<table class="table">
    <th>Plate_id</th>
    <th>Model</th>
    <th>Year</th>
    <th>Color</th>
    <th>Price_Per_Day</th>
    <th>Status</th>
    <th>Office_id</th>
    <th>Operation</th>
    <?php    
        session_start();
        $office_id=$_SESSION['office_id'];
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
         if($connection-> connect_error){
            die("connection failed:". $connection-> connect_error);
         }
        $select = mysqli_query($connection, "SELECT * FROM car where office_id=$office_id");
        while($row=$select->fetch_assoc()){
            echo "<tr> 
            <td>$row[plate_id]</td>
            <td>$row[model]</td>
            <td>$row[year]</td>
            <td>$row[color]</td>
            <td>$row[price_per_day]</td>
            <td>$row[stats]</td>
            <td>$row[office_id] </td> 
            <td>
            <a class='btn btn-primary btn-sm' href='/Final2/EditCar.php?plate_id=$row[plate_id]'>Edit<a>
            <a class='btn btn-primary btn-sm' href='/Final2/DeleteCar.php?plate_id=$row[plate_id]'>Delete<a>
            </td>
            </tr>
            ";
        }
?> 
</table>
<div class="container">
  <div class="row">
    <div class="col text-center">
    <a class='btn btn-primary btn-sm' href='/Final2/WelcomeOffice.php?'>Back<a>
    </div>
  </div>
</div>
</body>
</html>