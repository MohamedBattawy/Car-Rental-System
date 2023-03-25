<html>
    <head>
    <link rel="stylesheet" href="style3.css" type="text/css">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<link rel="stylesheet" href="style3.css">
<body>
    <img src="png_server_72492.png" alt="HTML5 Icon" width="200" height="200">
    <h1>Login</h1>
    <form method="post">
     <text>Email:</text> <input type='text' name='email'> <br> <br> <br>
     <text>Password:</text> <input type='password' name='pwd'> <br> <br> <br>
    <input type='submit' name='submit' value='Login'>
</form>
<form action="RegisterUser.php">
    <input type="submit" value="Register" />
</form>
<?php
session_start();
if(isset($_POST['submit']))
{
 $connection=mysqli_connect('localhost','root','');
echo $connection ? '' : 'not connected';
 mysqli_select_db($connection,"car_rental_system");
 $email=$_POST['email'];
 $pwd=$_POST['pwd'];
 if($email=='')
 {
    echo 'Missing e-mail';
 }
    elseif($pwd==''){
        echo 'Missing password';
    }
    else{
   $query=mysqli_query($connection,"select * from admin where e_mail='".$email."' and pass='".$pwd."'");
   $res=mysqli_fetch_row($query);
   if($res)
   {
    header('location:WelcomeAdmin.php');
   }
   else
   {
    $query=mysqli_query($connection,"select * from office where e_mail='".$email."' and pass='".$pwd."'");
   $res=mysqli_fetch_row($query);
   if($res)
   {
    $office_id=$res[0];
    $_SESSION['office_id']=$office_id;
    header('location:WelcomeOffice.php');
    }
   else {
    $query=mysqli_query($connection,"select * from customer where e_mail='".$email."' and pass='".$pwd."'");
    $res=mysqli_fetch_row($query);
    if($res)
    {
        $customer_id=$res[0];
        $_SESSION['customer_id']=$customer_id;
     header('location:WelcomeUser.php');
   }
   else{
    echo '<script>alert("Invalid Information")</script>';

   }
   }
}
}
}
?>
    </body>
</html>