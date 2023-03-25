<html>
    <head>
    <body>
    <link rel="stylesheet" href="style3.css" type="text/css">
    <h1>Office Edit Form</h1>
    <?php 
    $office_id=$_GET["office_id"];
    ?>
    <form method="post">
    Location:<input type='text' name='location'> <br> <br>
    Name:<input type='text' name='name'> <br> <br>
    Email:<input type='text' name='email'> <br> <br>
    Password:<input type='password' name='pwd'> <br> <br>
    Confirm Password:<input type='password' name='confirmpwd'> <br> <br>
    <input type='submit' name='submit' value='Edit'>
</form>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php
session_start();
$connection=mysqli_connect('localhost','root','');
echo $connection ? 'connected' : 'not connected';
 mysqli_select_db($connection,"car_rental_system");
 $find = mysqli_query($connection, "SELECT * FROM office WHERE office_id=$office_id");
 $target=$find->fetch_assoc();
 if (!$target){
    echo '<script>alert("ID not found")</script>';

 }

if(isset($_POST['submit']))
{
 $name=$_POST['name'];
 $location=$_POST['location'];
 $pwd=$_POST['pwd'];
 $email=$_POST['email'];
 $confirmpwd=$_POST['confirmpwd'];
 if($name =='')
 {
    echo '<script>alert("Name is missing")</script>';
 }
    elseif($location==''){
        echo '<script>alert("Location is missing")</script>';

    }
    elseif($pwd==''){
        echo '<script>alert("Password is missing")</script>';
    }
    elseif($pwd!=$confirmpwd){
        echo '<script>alert("Passwords do not match!")</script>';
    }
    elseif($email=''){
        echo '<script>alert("E-mail is missing!")</script>';
    }
    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo '<script>alert("Invalid E-mail Format!")</script>';
    }
    else{
        $email=$_POST['email'];
    $updating = "UPDATE office set location='$location',name='$name',pass='$pwd',e_mail='$email' where office_id=$office_id";
    $select = mysqli_query($connection, "SELECT * FROM office WHERE e_mail = '".$_POST['email']."' AND office_id<>$office_id");
    if(mysqli_num_rows($select)) {
        echo '<script>alert("This e-mail is already in use!")</script>';
    }
if ($connection->query($updating) === TRUE) {
    #echo '<script>alert("Registered Successfuly")</script>';
  header('location:WelcomeAdmin.php');
}
 }
}
?>
    </body>
</html>