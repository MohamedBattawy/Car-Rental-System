<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <style>
        body{
            background-color: grey;
        }
    </style>
     <title>Search Result</title>
    <body>
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
        echo "<div style='padding:20px; text-align: center;'><h2>$name[fname] $name[lname]</h2>
        <h3> Search Result </h3>
        </div>";
        
    ?>
    <title>Customer Reservations</title>
    <table class="table">
    <th> Model</th>
    <th> Year Model</th>
    <th> Color</th>
    <th> Price Per Day</th>  
    <th> Plate Id</th>
    <th> Office Email</th>
    <th> Office Location</th>
    <th> View Car </th>
    <?php    
        
        //mysqli_select_db($connection,"car_rental_system");
        $select = mysqli_query($connection, "SELECT c.model,c.year,c.color,c.price_per_day,c.plate_id,o.e_mail,o.location
         FROM car as c join office as o on c.office_id=o.office_id where (c.stats='active')and(c.model='$model' or c.year=$year or c.color='$color' or c.price_per_day=$price_per_day)");
        while($row=$select->fetch_assoc()){
            echo "<tr> <td>$row[model] </td> <td>$row[year] </td> <td>$row[color] </td>  <td>$row[price_per_day] </td> <td>$row[plate_id] </td>
             <td>$row[e_mail] </td> <td>$row[location] </td> 
             <td>
             <a class='btn btn-primary btn-sm' href='/Final2/SearchReservation.php?plate_id=$row[plate_id]'>View<a>
             </td>
             </tr>
            ";
        }
?> 
</table>
<form action="SearchUser.php" style="text-align:center;">
    <input type="submit"  value="Back to searching" />
</form>
<form action="WelcomeUser.php" style="text-align:center;">
    <input type="submit"  value="Back to my options" />
</form>
</body>
</html>