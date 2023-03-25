<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Searched Customer</title>
</head>
    <body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>Home</h2>
        </a>
    </div>
<table class="ptable">
    <th>#</th>
    <th>Customer ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>Password</th>
    <?php    
        session_start();
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $customer_id=$_POST['customer_id'];
        $connection=mysqli_connect('localhost','root','');
        mysqli_select_db($connection,"car_rental_system");
                                                  
        $sql="SELECT * FROM customer where (customer_id='$customer_id' OR lname='$lname' OR fname='$fname');";
        $result=mysqli_query($connection,$sql);
        $resultCheck=mysqli_num_rows($result);
        $c=1;
        while($row = mysqli_fetch_assoc($result) ){
       //echo "<tr>";
          echo "<tr>
               <td>".$c.")</td>
               <td>". $row['customer_id']."</td>
               <td>". $row['fname']."</td>
               <td>". $row['lname']."</td>
               <td>". $row['e_mail']."</td>
               <td>". $row['pass']."</td>
               </tr>
               ";
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