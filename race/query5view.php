<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Table of payments</title>
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
    <th>Color</th>
    <th>Year</th>
    <th>Plate_id</th>
    <th>Price</th>
    <th>Status</th>
    <th>Modification</th>
    <?php    
        session_start();

        $date1=$_POST['startdate'];
$date2=$_POST['enddate'];
//echo"first date:$date1";
//echo"last date:$date2";
$connection=mysqli_connect('localhost','root','');
mysqli_select_db($connection,"car_rental_system");
                                                  
$sql="SELECT price,payment_date,plate_id,customer_id FROM rent where (rent.payment_date>='$date1' and rent.payment_date<='$date2') ;";
$result=mysqli_query($connection,$sql);
$sql="SELECT sum(price) AS total FROM rent where (rent.payment_date>='$date1' and rent.payment_date<='$date2') ;";
$result2=mysqli_query($connection,$sql);
$resultCheck=mysqli_num_rows($result);
$c=1;
while($row = mysqli_fetch_assoc($result) ){
    //echo "<tr>";
    echo "<tr>
          <td>".$c.")</td>
          <td>". $row['payment_date']."</td>
          <td>". $row['price']."</td>
          <td>". $row['plate_id']."</td>
          <td>". $row['customer_id']."</td>
          </tr>
          ";
    $c++;

}
if($c==1)
    echo"no data with such requirments";
if ($c>1){
    $row = mysqli_fetch_assoc($result2);
    #echo"SUM = ". $row['total']."";
    echo "<tr>
          <td></td>
          <td></td>
          <td>Total = ". $row['total']."</td>
          <td></td>
          <td></td>
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