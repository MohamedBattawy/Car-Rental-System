<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>office cars</title>
</head>
    <body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
<table class="ptable">
    <th>Model</th>
    <th>Color</th>
    <th>Year</th>
    <th>Plate_id</th>
    <th>Price</th>
    <th>Status</th>
    <th>Modification</th>
    <?php    
        session_start();
        $office_id=$_SESSION['office_id'];
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
         if($connection-> connect_error){
            die("connection failed:". $connection-> connect_error);
         }
        $select = mysqli_query($connection, "SELECT * FROM car where office_id=$office_id order by stats,model");
        while($row=$select->fetch_assoc()){
            echo "<tr> 
            <td>$row[model]</td>
            <td>$row[color]</td>
            <td>$row[year]</td>
            <td>$row[plate_id]</td>
            <td>$row[price_per_day]</td>
            <td>$row[stats]</td>
            <td class= 'batt'>

            <button><a href='EditCar.php?plate_id=$row[plate_id]'>Edit</a></button>
            <button><a href='DeleteCar.php?plate_id=$row[plate_id]'>Delete</a></button>
            </td>
            </tr>
            ";
        }
?>
<tr>
    <td><a href='office.php?'>Back<a></td> 
</tr>
</table>
</body>

</html>