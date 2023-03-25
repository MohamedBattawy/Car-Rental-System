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

<title>Offices</title>
<table class="table">
    <th>Office_Id</th>
    <th>Location</th>
    <th>Name</th>
    <th>E-mail</th>
    <th>Password</th>
    <th>Operation</th>
    <?php    
        session_start();
        $connection=mysqli_connect('localhost','root','',"car_rental_system");
         if($connection-> connect_error){
            die("connection failed:". $connection-> connect_error);
         }
        //mysqli_select_db($connection,"car_rental_system");
        $select = mysqli_query($connection, "SELECT * FROM office");
        while($row=$select->fetch_assoc()){
            echo "<tr> <td>$row[office_id] </td> <td>$row[location] </td> <td>$row[name] </td> <td>$row[e_mail] </td> <td>$row[pass] </td> 
            
            <td>
            <a class='btn btn-primary btn-sm' href='/Final2/Editoffice.php?office_id=$row[office_id]'>Edit<a>
            <a class='btn btn-primary btn-sm' href='/Final2/Deleteoffice.php?office_id=$row[office_id]'>Delete<a>
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