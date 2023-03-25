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

<title>Customers</title>
<table class="table">
    <th>Customer_id</th>
    <th>Fname</th>
    <th>Lname</th>
    <th>E-mail</th>
    <th>Password</th>
    <th>Delete</th>
    <?php    
        session_start();
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
         if($connection-> connect_error){
            die("connection failed:". $connection-> connect_error);
         }
        //mysqli_select_db($connection,"car_rental_system");
        $select = mysqli_query($connection, "SELECT * FROM customer");
        while($row=$select->fetch_assoc()){
            echo "<tr> <td>$row[customer_id] </td> <td>$row[fname] </td> <td>$row[lname] </td>  <td>$row[e_mail] </td> <td>$row[pass] </td>
             <td>
             <a class='btn btn-primary btn-sm' href='/Final2/deletecustomer.php?customer_id=$row[customer_id]'>Delete<a>
            </td>
            </tr>
            ";
        }
?> 
</table>
<div class="container">
  <div class="row">
    <div class="col text-center">
    <a class='btn btn-primary btn-sm' href='/Final2/WelcomeAdmin.php?'>Back<a>
    </div>
  </div>
</div>
</body>
</html>