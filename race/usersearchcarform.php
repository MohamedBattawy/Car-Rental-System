<html>
<?php
session_start();
$customer_id = $_SESSION['customer_id'];
$connection = mysqli_connect('localhost', 'root', '');
#echo $connection ? 'connected' : 'not connected';
mysqli_select_db($connection, "car_rental_system");
$get_name = "SELECT c.fname,c.lname
        FROM customer as c where c.customer_id=$customer_id";
$resultN = mysqli_query($connection, $get_name);
$name = mysqli_fetch_assoc($resultN);
$sql1 = "SELECT Distinct c.model from car as c where c.stats='active'";
$sql2 = "SELECT Distinct c.year from car as c where c.stats='active'";
$sql3 = "SELECT Distinct c.color from car as c where c.stats='active'";
$sql4 = "SELECT Distinct c.price_per_day from car as c where c.stats='active'";
?>
<html>

<head>
  <link href="StyleSheet.css" rel="stylesheet">
  <title>login</title>
</head>

<body>
  <div class='topbar'>
    <img src="download.png" alt="logo" height="80">
    <a href="index.html">
      <h2>Home</h2>
    </a>
  </div>
  <div class="panel">
    <div class="pheading">
      <h1>Filter cars</h1>
    </div>
    <div class="pbody">
      <form action="usersearchcarview.php" method="POST" id="form">
        <div class="pelement">
          <label for="model">Model: </label>
          <select name="model">
            <option value="NULL">None</option>
            <?php
            $select = mysqli_query($connection, $sql1);
            while ($row = $select->fetch_assoc()) {
              echo "<option value='$row[model]' > $row[model]</option>
              ";
            }
            ?>
          </select>
        </div><br>
        <div class="pelement">
          <label for="year">Year: </label>
          <select name="year">
            <option value="NULL">None</option>
            <?php
            $select = mysqli_query($connection, $sql2);
            while ($row = $select->fetch_assoc()) {
              echo "<option value='$row[year]' > $row[year]</option>
              ";
            }
            ?>
          </select>
        </div><br>
        <div class="pelement">
          <label for="color">Color: </label>
          <select name="color">
            <option value="NULL">None</option>
            <?php
            $select = mysqli_query($connection, $sql3);
            while ($row = $select->fetch_assoc()) {
              echo "<option value='$row[color]' > $row[color]</option>
              ";
            }
            ?>
          </select>
        </div><br>
        <div class="pelement">
          <label for="price_per_day">Day price: </label>
          <select name="price_per_day">
            <option value="NULL">None</option>
            <?php
            $select = mysqli_query($connection, $sql4);
            while ($row = $select->fetch_assoc()) {
              echo "<option value='$row[price_per_day]' > $row[price_per_day]</option>
              ";
            }
            ?>
          </select>
        </div><br>
        <div class="pheading">
          <button class="back" type="submit" formaction="user.php">back</button>
          <button class="back" type="submit" form="form">Search</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>