<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Reservations from to</title>
</head>
    <body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
<table class="ptable">
<tr>
    <th>#</th>
    <th>Customer Id</th>
    <th>Customer Name</th>
    <th>Model</th>
    <th>Plate Id</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Price</th>
    <th>Year</th>
    <th>Stats</th>
    <th>Office Id</th>
    </tr>
    <?php    
        session_start();

        $date1=$_POST['startdate'];
        $date2=$_POST['enddate'];
        echo"</br><h1>View Reservations from ".$date1." to ".$date2."</h1></br>";
        //echo"last date:$date2";
        $connection=mysqli_connect('localhost','root','');
        mysqli_select_db($connection,"car_rental_system");

        $sql="SELECT * FROM customer natural join car natural join rent where (rent.start_date <= '$date2' and rent.end_date >= '$date1' );";
        $result=mysqli_query($connection,$sql);
        $resultCheck=mysqli_num_rows($result);
        $c=1;
        while($row = mysqli_fetch_assoc($result) ){

            echo "<tr>
            <td>".$c." )</td>
            <td>".$row['customer_id']." </td>
            <td>".$row['fname']." ".$row['lname']." </td>
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