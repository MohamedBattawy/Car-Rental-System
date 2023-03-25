<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <style>
        body{
            background-color: grey;
        }
    </style>
     <title>History</title>
    <body>
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
        echo "<div style='padding:20px; text-align: center;'><h2>$name[fname] $name[lname]</h2>
        <h3> History of Reservation  </h3>
        </div>";
        
    ?>
    <title>Customer Reservations</title>
<table class="table">
    <th>Model</th>
    <th>Plate Id</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Price</th>
    <th>Payment Details</th>

    <?php      
       
        //mysqli_select_db($connection,"car_rental_system");
        $query="SELECT r.start_date,r.end_date,r.payment_date,r.plate_id,r.price,c.model,c.year
        from rent as r join car as c on r.plate_id=c.plate_id 
        where r.customer_id=$customer_id";
        $select = mysqli_query($connection,$query);
        while($row=$select->fetch_assoc()){
            echo "<tr> <td>$row[model] </td> <td>$row[plate_id] </td> <td>$row[start_date] </td> <td>$row[end_date] </td> <td>$row[price] </td>
            
            ";
            if($row['payment_date']!=NULL){
                echo "<td>$row[payment_date]</td></tr>";
            }else{
                echo "<td>
                        <a class='btn btn-primary btn-sm' href='/Final2/PayNow.php?plate_id=$row[plate_id]&start_date=$row[start_date]&'>Pay Now<a>
                       </td></tr>";
            }
        }
        
?> 
</table>
<script>

</script>
<form action="WelcomeUser.php" style="text-align:center;">
    <input type="submit"  value="Back to my options" />
</form>
</body>
</html>