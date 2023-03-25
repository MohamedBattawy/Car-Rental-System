<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>Searched Cars</title>
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
    <th>Plate ID</th>
    <th>Model</th>
    <th>Year</th>
    <th>Color</th>
    <th>Price Per Day</th>
    <th>Status</th>
    <th>Office ID</th>
    <?php    
        session_start();

        $model=$_POST['model'];
        $year=$_POST['year'];
        $plate_id=$_POST['plate_id'];
        $color=$_POST['color'];
        $connection=mysqli_connect('localhost','root','');
        mysqli_select_db($connection,"car_rental_system");                                           
        $sql="SELECT * FROM car where (plate_id='$plate_id' OR year='$year' OR model='$model' or color='$color');";
        $result=mysqli_query($connection,$sql);
        $resultCheck=mysqli_num_rows($result);
        $c=1;
        while($row = mysqli_fetch_assoc($result) ){
            //echo "<tr>";
            echo "<tr>
                  <td>".$c.")</td>
                  <td>". $row['plate_id']."</td>
                  <td>". $row['model']."</td>
                  <td>". $row['year']."</td>
                  <td>". $row['color']."</td>
                  <td>". $row['price_per_day']."</td>
                  <td>". $row['stats']."</td>
                  <td>". $row['office_id']."</td>
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