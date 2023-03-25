<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>History Of Reservations</title>
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
    <th>Plate Id</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Price</th>
    <th>Payment Details</th>
    <?php    
        session_start();
        $customer_id=$_SESSION['customer_id'];
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
        if($connection-> connect_error){
          die("connection failed:". $connection-> connect_error);
        }
        $get_name = "SELECT c.fname,c.lname
        FROM customer as c where c.customer_id=$customer_id";
        $resultN = mysqli_query($connection,$get_name);
        $name= mysqli_fetch_assoc($resultN);
        //echo "<div style='padding:20px; text-align: center;'><h2>$name[fname] $name[lname]</h2>
        //<h3> History of Reservation  </h3>
        //</div>"; 
        //mysqli_select_db($connection,"car_rental_system");
        $query="SELECT r.start_date,r.end_date,r.payment_date,r.plate_id,r.price,c.model,c.year
        from rent as r join car as c on r.plate_id=c.plate_id 
        where r.customer_id=$customer_id";
        $select = mysqli_query($connection,$query);
        while($row=$select->fetch_assoc()){
            echo "<tr> 
            <td>$row[model] </td> 
            <td>$row[plate_id] </td> 
            <td>$row[start_date] </td> 
            <td>$row[end_date] </td> 
            <td>$row[price] </td>
            
            ";
            if($row['payment_date']!=NULL){
                echo "<td>$row[payment_date]</td></tr>";
            }else{
                echo "<td>
                        <a class='btn btn-primary btn-sm' href='PayNow.php?plate_id=$row[plate_id]&start_date=$row[start_date]&'>Pay Now<a>
                       </td></tr>";
            }
        } 
?>
<tr>
    <td><a href='user.php?'>Back<a></td> 
</tr>
</table>
</body>

</html>