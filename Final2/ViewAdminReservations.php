<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <style>
        body{
    background-color: lightblue;
        }
    </style>
    <body>

<title>Reservations</title>
<table class="table">
    <th>Customer_Id</th>
    <th>Plate_Id</th>
    <th>Start_Date</th>
    <th>End_Date</th>
    <th>Price</th>
    <?php    
        session_start();
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
         if($connection-> connect_error){
            die("connection failed:". $connection-> connect_error);
         }
        //mysqli_select_db($connection,"car_rental_system");
        $select = mysqli_query($connection, "SELECT * FROM rent");
        while($row=$select->fetch_assoc()){
            echo "<tr> <td>$row[customer_id] </td> <td>$row[plate_id] </td> <td>$row[start_date] </td> <td>$row[end_date] </td> <td>$row[price] </td>
            </tr>
            ";
        }
?> 
</table>
</body>
</html>