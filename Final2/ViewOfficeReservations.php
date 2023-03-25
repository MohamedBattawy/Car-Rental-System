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
        $office_id=$_SESSION['office_id'];
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
         if($connection-> connect_error){
            die("connection failed:". $connection-> connect_error);
         }
        //mysqli_select_db($connection,"car_rental_system");
        $query="select r.customer_id,r.plate_id,r.start_date,r.end_date,r.price from rent r
        inner join car c on c.plate_id=r.plate_id
        inner join office f on f.office_id = c.office_id
        where f.office_id=$office_id";
        $select = mysqli_query($connection,$query);
        while($row=$select->fetch_assoc()){
            echo "<tr> <td>$row[customer_id] </td> <td>$row[plate_id] </td> <td>$row[start_date] </td> <td>$row[end_date] </td> <td>$row[price] </td>
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