<html>
    <head>
    <body>
    <link rel="stylesheet" href="style3.css" type="text/css">

            <img src="welcomepic.png" alt="HTML5 Icon" width="200" height="200">
    <h1>Office Registration Form</h1>
    <form method="post">
    Location:<input type='text' name='location'> <br> <br>
    Name:<input type='text' name='name'> <br> <br>
    Email:<input type='text' name='email'> <br> <br>
    Password:<input type='password' name='pwd'> <br> <br>
    Confirm Password:<input type='password' name='confirmpwd'> <br> <br>
    <input type='submit' name='submit' value='Register'>
</form>
<form action="WelcomeAdmin.php">
    <input type="submit" value="Back" />
</form>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php
session_start();
if(isset($_POST['submit']))
{
 $connection=mysqli_connect('localhost','root','');
echo $connection ? 'connected' : 'not connected';
 mysqli_select_db($connection,"car_rental_system");
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
   $select = mysqli_query($connection, "SELECT * FROM office WHERE e_mail = '".$_POST['email']."'");
   if(mysqli_num_rows($select)) {
       exit('This email address is already used!');
   }

//$t=time();
$email=$_POST['email'];
$inserting = "INSERT INTO office (location,name,e_mail,pass) VALUES ('$location','$name','$email','$pwd')";
if ($connection->query($inserting) === TRUE) {
    #echo '<script>alert("Registered Successfuly")</script>';
  header('location:WelcomeAdmin.php');
}
 }
}

?>
    </body>
</html>