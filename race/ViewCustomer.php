<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Customers</title>
</head>
    <body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
<table class="ptable">
    <th>Customer_id</th>
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
            echo "<tr> 
            <td>$row[customer_id] </td> 
            <td>$row[e_mail] </td> 
            <td>$row[pass] </td>
            <td class='batt'>
             <a class='btn btn-primary btn-sm' href='/Final2/deletecustomer.php?customer_id=$row[customer_id]'>Delete<a>
            </td>
            </tr>
            ";
        }
?>
<tr>
    <td><a href='admin.php?'>Back<a></td> 
</tr>
</table>
</body>

</html>