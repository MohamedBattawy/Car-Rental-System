<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Search Results</title>
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
    <th> Office Email</th>
    <th> Office Location</th>
    <th> View Car </th>
    <?php    
        session_start();
        $customer_id=$_SESSION['customer_id'];
        $model=$_POST['drop_down_model'];
        $year=$_POST['drop_down_year'];
        $color=$_POST['drop_down_color'];
        $price_per_day=$_POST['drop_down_ppd'];
        #echo $model;
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
        if($connection-> connect_error){
          die("connection failed:". $connection-> connect_error);
        }
        $get_name = "SELECT c.fname,c.lname
        FROM customer as c where c.customer_id=$customer_id";
        $resultN = mysqli_query($connection,$get_name);
        $name= mysqli_fetch_assoc($resultN);
        //echo "<div style='padding:20px; text-align: center;'><h2>$name[fname] $name[lname]</h2>
        //<h3> Search Result </h3>
        //</div>";
        //mysqli_select_db($connection,"car_rental_system");
        $select = mysqli_query($connection, "SELECT c.model,c.year,c.color,c.price_per_day,c.plate_id,o.e_mail,o.location
         FROM car as c join office as o on c.office_id=o.office_id where (c.stats='active')and(c.model='$model' or c.year=$year or c.color='$color' or c.price_per_day=$price_per_day)");
        while($row=$select->fetch_assoc()){
            echo "<tr> 
            <td>$row[model] </td> 
            <td>$row[year] </td> 
            <td>$row[color] </td>  
            <td>$row[price_per_day] </td> 
            <td>$row[plate_id] </td>
            <td>$row[e_mail] </td> 
            <td>$row[location] </td> 
            <td>
             <a class='btn btn-primary btn-sm' href='/Final2/SearchReservation.php?plate_id=$row[plate_id]'>View<a>
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