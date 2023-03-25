<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<title>User Searching</title>
<?php 
  session_start();
  $customer_id=$_SESSION['customer_id'];
  $connection=mysqli_connect('localhost','root','');
  #echo $connection ? 'connected' : 'not connected';
  mysqli_select_db($connection,"car_rental_system");
  $get_name = "SELECT c.fname,c.lname
        FROM customer as c where c.customer_id=$customer_id";
        $resultN = mysqli_query($connection,$get_name);
        $name= mysqli_fetch_assoc($resultN);
        echo "<div style='padding:20px; text-align:right;'><h1>$name[fname] $name[lname]</h1>
        
        </div>";
  $sql1="SELECT Distinct c.model from car as c where c.stats='active'";
  $sql2="SELECT Distinct c.year from car as c where c.stats='active'";
  $sql3="SELECT Distinct c.color from car as c where c.stats='active'";
  $sql4="SELECT Distinct c.price_per_day from car as c where c.stats='active'";

?>
</br>
<h1>Search For Cars</h1>
</br>
<div class="div-1">
<form action="SearchUserTable.php"  method="POST"  >
<br><br>
<label for="model"> Available Models</label>
      <select name="drop_down_model" >
        <option value="NULL">None</option>
        <?php
          $select = mysqli_query($connection,$sql1);
          while($row=$select->fetch_assoc()){
              echo "<option value='$row[model]' > $row[model]</option>
              ";
          }
        ?>

      </select>
<br><br>
      <label for="year">Available Model Years</label>
      <select name="drop_down_year" >
        <option value="NULL">None</option>
        <?php
          $select = mysqli_query($connection,$sql2);
          while($row=$select->fetch_assoc()){
              echo "<option value='$row[year]' > $row[year]</option>
              ";
          }
        ?>

      </select>
<br><br>
      <label for="color">Available Colors</label>
      <select name="drop_down_color" >
        <option value="NULL">None</option>
        <?php
          $select = mysqli_query($connection,$sql3);
          while($row=$select->fetch_assoc()){
              echo "<option value='$row[color]' > $row[color]</option>
              ";
          }
        ?>

      </select>
<br><br>

      <label for="price_per_day">Available Prices Per Day</label>
      <select name="drop_down_ppd" >
        <option value="NULL">None</option>
        <?php
          $select = mysqli_query($connection,$sql4);
          while($row=$select->fetch_assoc()){
              echo "<option value='$row[price_per_day]' > $row[price_per_day]</option>
              ";
          }
        ?>

      </select>
      <br><br>
 <input type="submit" value="search" name="search" />
 
</form>
<form action="WelcomeUser.php" style="text-align:center;">
    <input type="submit"  value="Back to my options" />
</form>
</div>

</body>        
</html>