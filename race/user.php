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
?>
<html>

<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>office</title>
</head>

<body>
    <div class='topbar'>
        <img src="download.png" alt="logo" height="80">
        <a href="index.html">
            <h2>user</h2>
        </a>
    </div>
    <div class="panel">
        <div class="pheading">
            <h1><?php echo "Welcome, $name[fname]" ?></h1>
        </div>
        <div class="pbody">
            <form method="post" id="form">
                <div class="praido"><input name="radio" type="radio" value="New Car"><label for="New Car">New Car</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View all Cars"><label for="View all Cars">View all Cars</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Reservations"><label for="View Reservations">View Reservations</label></div><br>
                <div class="praido"><input name="radio" type="radio" value="search car"><label for="search car">Search in available cars</label></div><br>
                <div class="pheading"><button type="submit" formaction="/race/login.php">Logout</button> <button type="submit" form="form" id='submit' name='submit'>Submit</button></div>
            </form>


<?php
if (isset($_POST['submit'])){
    if(!empty($_POST['radio'])){
        switch ($_POST['radio']){
            case "New Car":
                header('location:newcar.php');
                break;
            case "View all Cars":
                header('location:usercarview.php');
                break;
            case "View Reservations":
                header('location:userresview.php');
                break;
            case "search car":
                header('location:usersearchcarform.php');
                break;                
        }
        echo $_POST['radio'];
    }
   else echo "<html><p class='errmssg'>You need to select an operation!!</p></html>";
}
?> 