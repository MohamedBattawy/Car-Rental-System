<DOCTYPE html>
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
            <h1>Add Office</h1>
        </div>
        <div class="pbody">
            <form method="post" id="form">
                <div class="pelement">  Name:<input type='text' name='name'></div><br>
                <div class="pelement">Email:<input type='text' name='email'></div><br>
                <div class="pelement">Password:<input type='password' name='pwd'></div><br>
                <div class="pelement">  Confirm Password:<input type='password' name='confirmpwd'></div><br>
                <div class="pelement">  Location:<input type='text' name='location'></div><br>
                <div class="pheading">
                    <button class="back" type="submit" formaction="office.php">back</button>
                    <button class="back" form="form" type='submit' id="submit" name='submit'>Add Car</button></div> <br>
            </form>
            <br><br>
        </div>
    </div>

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
    echo '<html><p class="errmssg">Missing name!!</p></html>';
 }
    elseif($location==''){
        echo '<html><p class="errmssg">Missing location!!</p></html>';

    }
    elseif($pwd==''){
        echo '<html><p class="errmssg">Missing password!!</p></html>';
    }
    elseif($pwd!=$confirmpwd){
        echo '<html><p class="errmssg">Passwords dont match!!</p></html>';
    }
    elseif($email=''){
        echo '<html><p class="errmssg">Missing E-mail!!</p></html>';
    }
    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo '<html><p class="errmssg">invalid E-mail format!!</p></html>';
    }
    else{
   $select = mysqli_query($connection, "SELECT * FROM office WHERE e_mail = '".$_POST['email']."'");
   if(mysqli_num_rows($select)) {
       exit('<html><p class="errmssg">There already is an account using this email!!</p></html>');
   }

$email=$_POST['email'];
$inserting = "INSERT INTO office (location,name,e_mail,pass) VALUES ('$location','$name','$email','$pwd')";
if ($connection->query($inserting) === TRUE) {
    #echo '<script>alert("Registered Successfuly")</script>';
  header('location:admin.php');
}
}
}
?>
    </body>
</html>