<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Cars</title>
</head>
    <body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
<table class="ptable">
    <th>Plate_id</th>
    <th>Model</th>
    <th>Year</th>
    <th>Color</th>
    <th>Price</th>
    <th>Status</th>
    <th>Office_id</th>
    <?php    
        session_start();
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
         if($connection-> connect_error){
            die("connection failed:". $connection-> connect_error);
         }
        //mysqli_select_db($connection,"car_rental_system");
        $select = mysqli_query($connection, "SELECT * FROM car");
        while($row=$select->fetch_assoc()){
            echo "<tr> 
            <td>$row[plate_id] </td> 
            <td>$row[model] </td> 
            <td>$row[year] </td>  
            <td>$row[color] </td> 
            <td>$row[price_per_day] </td>
            <td>$row[stats] </td> 
            <td>$row[office_id] </td> 
            </tr>
            ";
        }
?>
<tr>
    <td><a href='admin.php?'>Back<a></td> 
</tr>
</table>
</body>

</html>