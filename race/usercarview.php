<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Available Cars</title>
</head>
    <body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
<table class="ptable">
    <th> Model</th>
    <th> Year Model</th>
    <th> Color</th>
    <th> Price Per Day</th>  
    <th> Plate Id</th>
    <th>Location</th>
    <th> View Car </th>
    <?php    
        session_start();
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
        if($connection-> connect_error){
          die("connection failed:". $connection-> connect_error);
        }
        $customer_id=$_SESSION['customer_id'];
        $get_name = "SELECT c.fname,c.lname
         FROM customer as c where c.customer_id=$customer_id";
        $resultN = mysqli_query($connection,$get_name);
        $name= mysqli_fetch_assoc($resultN);
        #echo "<div style='padding:20px; text-align: center;'><h2>$name[fname] $name[lname]</h2>
        #<h3> All Available Cars For Reservation  </h3>
        #</div>";
        $select = mysqli_query($connection, "SELECT c.model,c.year,c.color,c.price_per_day,c.plate_id,o.e_mail,o.location
        FROM car as c join office as o on c.office_id=o.office_id where c.stats='active'");
        while($row=$select->fetch_assoc()){
            echo "<tr> <td>$row[model] </td> 
            <td>$row[year] </td> 
            <td>$row[color] </td>  
            <td>$row[price_per_day] </td> 
            <td>$row[plate_id] </td>
            <td>$row[location] </td> 
            <td>
            <a class='btn btn-primary btn-sm' href='searchreservation.php?plate_id=$row[plate_id]'>View<a>
            </td>
            </tr>
            ";
        }
?>
<tr>
    <td><a href='user.php?'>Back<a></td> 
</tr>
</table>
</body>

</html>