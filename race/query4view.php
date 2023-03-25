<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Lists of car rented by Customer</title>
</head>
    <body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
<table class="ptable">
    <th>#</th>
    <th>Model</th>
    <th>Plate Id</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Price</th>
    <th>Year</th>
    <th>Stats</th>
    <th>Office Id</th>
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

        $id=$_POST['customer_id'];
        echo"<h1>Customer With Id #".$id." Info. </h1>";
        $connection=mysqli_connect('localhost','root','');
        mysqli_select_db($connection,"car_rental_system");

        $sql="SELECT * FROM customer natural join car natural join rent where (customer.customer_id = '$id' );";
        $result=mysqli_query($connection,$sql);
        $resultCheck=mysqli_num_rows($result);
        $c=1;
        $check=0;

        while($row = mysqli_fetch_assoc($result) ){
            if($check<1){
               echo"<h3>Name:  ".$row['fname']." ".$row['lname']."</h3>
                     <h3>E-mail:".$row['e_mail']."</h3>

               ";
               echo"<h2>List of Cars Rented:</h2>  ";

                $check=1;
            }    
            echo "<tr>
            <td>".$c." )</td>
            <td>".$row['model']." </td>
            <td>".$row['plate_id']." </td>
            <td>".$row['start_date']." </td>
            <td>".$row['end_date']." </td>
            <td>".$row['price']." </td>
            <td>".$row['year']." </td>
            <td>".$row['stats']." </td>
            <td>".$row['office_id']." </td>
            </tr>";

           $c++;

        }
        if($c==1)
            echo"no data with such requirments";
?>
<tr>
    <td><a href='admin.php?'>Back<a></td> 
</tr>
</table>
</body>

</html>