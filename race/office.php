<html>

<head>
    <link href="StyleSheet.css" rel="stylesheet">
    <title>office</title>
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
            <h1>Office</h1>
        </div>
        <div class="pbody">
            <form method="post" id="form">
                <div class="praido"><input name="radio" type="radio" value="New Car"><label for="New Car">New Car</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View all Cars"><label for="View all Cars">View all Cars</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Reservations"><label for="View Reservations">View Reservations</label></div><br>
                <div class="pradio"><input name="radio" type="radio" value="View Payments"><label for="View Payments">View Payments</label></div><br>
                <div class="pheading"><button type="submit" formaction="/race/login.php">back</button> <button type="submit" form="form" id='submit' name='submit'>submit</button></div>
            </form>


<?php    
session_start();
$office_id=$_SESSION['office_id'];
if (isset($_POST['submit'])){
    if(!empty($_POST['radio'])){
        switch ($_POST['radio']){
            case "New Car":
                header('location:newcar.php');
                break;
            case "View all Cars":
                header('location:officecars.php');
                break;
            case "View Reservations":
                header('location:officeresview.php');
                break;
            case "View Payments":
                header('location:officepayform.php');
                break;
        }
        echo "hi";
    }
   else echo "<html><p class='errmssg'>You need to select an operation!!</p></html>";
}
?> 