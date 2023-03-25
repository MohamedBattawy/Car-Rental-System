<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Offices</title>
</head>
    <body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
<table class="ptable">
    <th>Office_Id</th>
    <th>Location</th>
    <th>Name</th>
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
            echo "<tr> 
            <td>$row[office_id] </td> 
            <td>$row[location] </td> 
            <td>$row[name] </td> 
            <td>$row[pass] </td> 
            
            <td class='batt'>
            <a class='btn btn-primary btn-sm' href='/Final2/Editoffice.php?office_id=$row[office_id]'>Edit<a>
            <a class='btn btn-primary btn-sm' href='/Final2/Deleteoffice.php?office_id=$row[office_id]'>Delete<a>
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