<html>
    <head>
        <title>Welcome User</title>
    <?php    
         session_start();
         $customer_id=$_SESSION['customer_id'];
         $connection=mysqli_connect('localhost','root','',"car_rental_system");
        if($connection-> connect_error){
           die("connection failed:". $connection-> connect_error);
        }
        $customer_id=$_SESSION['customer_id'];
        $get_name = "SELECT c.fname,c.lname
        FROM customer as c where c.customer_id=$customer_id";
        $resultN = mysqli_query($connection,$get_name);
        $name= mysqli_fetch_assoc($resultN);
        echo "<div style='padding:20px; text-align: center;'><h2>Welcome, $name[fname] $name[lname]</h2>
    
        </div>";
        ?>
    <body>
    <style type="text/css">
    body{
     background-color: lightblue;
     text-align: center;
    }
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 text{
    padding: 3px;
    font-size:15px;
    text-align:center;
    margin: 0;
 }
 h1{
  color:darkgreen;
  font-size:25px;
  text-align:center;
 }
 img {
  display: block;
  margin-left: auto;
  margin-right: auto;
 }
 input[type=button], input[type=submit], input[type=reset] {
  background-color: darkgreen;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
 
<img src="Welcome-message.jpg" alt="HTML5 Icon" width="200" height="200"> <br>
<form action="ViewUserCar.php">
    <input type="submit" value="View Cars" />
</form>
<form action="ViewCustomerReservations.php">
    <input type="submit" value="View Reservations" />
</form>
<form action="SearchUser.php">
    <input type="submit" value="Search" />
</form>
<form action="form.php">
    <input type="submit" value="Logout" />
</form>
    </body>
</html>